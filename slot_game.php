<?php
$letters = ['A', 'B', 'C'];
$spin = 0;
$money = 0;

echo "Win 100 credits by spinning three identical symbols!\nWin 50 credits by spinning two identical symbols and one different!";
while ($spin < 20 && $money <= 500) {
    for ($x = 0; $x < 3; $x++) {
        $slotOne = $letters[array_rand($letters)];
        $slotTwo = $letters[array_rand($letters)];
        $slotThree = $letters[array_rand($letters)];
        $slotTotal = $slotOne . $slotTwo . $slotThree;
        echo $slotTotal;
        $result = 0;
        $result = match ($slotTotal) {
            'AAA', 'BBB', 'CCC' => $result + 100,
            'AAB', 'ABA', 'BAA', 'ABB', 'BBA', 'BAB', 'BCC', 'CBC', 'CCB', 'ACC', 'CAC', 'CCA' => $result + 50,
            default => $result,
        };
        $money += $result;
         if ($result == 100) {
            echo " You won 100 credits!\n";
        } else if ($result == 50) {
            echo " You won 50 credits!\n";
        } else{
            echo " You won 0 credits.\n";
        }
    }
    $spin++;
}

echo $money;
