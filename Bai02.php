<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quan_ly_hoc_sinh";

try {
    $conn = new PDO(
        "mysql:host=$servername;dbname=$dbname;charset=utf8",
        $username,
        $password
    );

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("Kết nối thất bại: " . $e->getMessage());
}

// 2. Lấy danh sách học sinh
$sql = "SELECT * FROM hoc_sinh";
$stmt = $conn->query($sql);

// 3. Tạo mảng kết hợp
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);

// 4. Hiển thị tất cả học sinh
echo "<h2>Danh sách học sinh</h2>";

foreach ($students as $student) {
    echo "ID: " . $student["id"] . "<br>";
    echo "Tên: " . $student["name"] . "<br>";
    echo "Tuổi: " . $student["age"] . "<br>";
    echo "Điểm: " . $student["grade"] . "<br>";
    echo "<hr>";
}

// 5. Hàm tìm học sinh có điểm cao nhất
function findHighestGrade($students)
{
    $highest = $students[0];

    foreach ($students as $student) {

        if ($student["grade"] > $highest["grade"]) {
            $highest = $student;
        }

    }

    return $highest;
}

// 6. Gọi hàm
$bestStudent = findHighestGrade($students);

// 7. Hiển thị học sinh có điểm cao nhất
echo "<h2>Học sinh có điểm cao nhất</h2>";

echo "ID: " . $bestStudent["id"] . "<br>";
echo "Tên: " . $bestStudent["name"] . "<br>";
echo "Tuổi: " . $bestStudent["age"] . "<br>";
echo "Điểm: " . $bestStudent["grade"] . "<br>";

?>