<?php
function TaoDayFibonacci($SoPhanTu) {
    if ($SoPhanTu <= 0) return [];
    if ($SoPhanTu == 1) return [0];

    $dayFibonacci = [0, 1]; 
    for ($i = 2; $i < $SoPhanTu; $i++) {
        $dayFibonacci[] = $dayFibonacci[$i - 1] + $dayFibonacci[$i - 2];
    }
    return $dayFibonacci;
}

$DanhSachSo = TaoDayFibonacci(10);
echo "10 số Fibonacci đầu tiên là: " . implode(", ", $DanhSachSo);
?>