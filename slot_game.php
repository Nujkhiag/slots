<?php
$letters = ['A', 'B', 'C'];
$spin = 0;
$money = 0;

while ($spin < 20 && $money <= 500) {
    $spinResult = '';
    for ($x = 0; $x < 3; $x++) {
        $randomLetter = array_rand($letters);
        $spinResult .= $letters[$randomLetter];
    }
    echo $spinResult;
    $money = match ($spinResult) {
        'AAA', 'BBB', 'CCC' => $money + 100,
        'AAB', 'ABA', 'BAA', 'ABB', 'BBA', 'BAB', 'BCC', 'CBC', 'CCB', 'ACC', 'CAC', 'CCA' => $money + 50,
        default => $money,
    };
        $spinResult = match ($spinResult) {
        'AAA', 'BBB', 'CCC' => '100',
        'AAB', 'ABA', 'BAA', 'ABB', 'BBA', 'BAB', 'BCC', 'CBC', 'CCB', 'ACC', 'CAC', 'CCA' => '50',
        default => '0',
    };
    echo " you won {$spinResult}\n";
    $spin++;
}
