<?php
// Joshua Lee 09/08/2025 - 25/FA-CIS-239-101
$letters = ['A', 'B', 'C'];
$spin = 0;
$money = 0;
$results = [];

/* While loop. This uses && instead of ||, DO NOT USE || in this, it is the wrong logic, it is easy to mix up.
 * || (or) means if either statements are true, run. So the loop will never stop until $spin is greater than 20 AND $money is greater than 500
 * && (and) means if only both statements are true, run. So the loop can be invalidated by having over 20 $spin, OR more than 500 $money.
 * It's weird how it kind of works backwords.
 */
while ($spin < 20 && $money < 500) {
    $spinResult = '';
    for ($x = 0; $x < 3; $x++) {
        $randomLetter = array_rand($letters);
        $spinResult .= $letters[$randomLetter];
    }

    /* match expression checks if a value given is the same, then outputs something, in this case increases our money. 
    * There were multiple missing two identical symbol payouts in the Slots.pdf, so I added the rest. It makes the odds of winning all 500 incredibly
    high, making it seem like the program could be bugged. The program is working as it's intended. For reference, here is a commented code
    of this same thing, but the 50 payout only uses the two identical symbols given from the pdf. With this version of the code, you'll 
    find run throughs where you don't get all 500 significantly more!
    */
    //     $money = match ($spinResult) {
    //    'AAA', 'BBB', 'CCC' => $money + 100,
    //    'AAB', 'ABA', 'BAA', 'AAC', 'ABB', 'BBA', 'BAB', 'BCC', 'CBC', 'CCB', 'ACC', 'CAC', 'CCA', => $money + 50,
    //    default => $money,
    // };
    $money = match ($spinResult) {
        'AAA', 'BBB', 'CCC' => $money + 100,
        'AAB', 'ABA', 'BAA', 'AAC', 'ACA', 'CAA', 'ABB', 'BAB', 'BBA', 'BBC', 'BCB', 'CBB', 'ACC', 'CAC', 'CCA', 'BCC', 'CBC', 'CCB' => $money + 50,
        default => $money,
    };

    /* This was created so I could store both the spinResult's spin value ((AAA), (BBB), (CCC), (BCA)) and store how much money each spin
       gave in the results[] array.
     */
    $spinResultValue = match ($spinResult) {
        'AAA', 'BBB', 'CCC' => '100',
        'AAB', 'ABA', 'BAA', 'AAC', 'ACA', 'CAA', 'ABB', 'BAB', 'BBA', 'BBC', 'BCB', 'CBB', 'ACC', 'CAC', 'CCA', 'BCC', 'CBC', 'CCB' => '50',
        default => '0',
    };

    // Add's a string into the results[] array.
    $results[] = "$spinResult you won {$spinResultValue}\n";
    $spin++;
}

// Iterates through the results[] array.
foreach ($results as $spinningOutput) {
    echo $spinningOutput;
}

// Forces $money to not go to $550 in the case a spin wins 100 while at 450.
if ($money > 500) {
    $money = 500;
}

echo "Game over. Total winnings: \${$money}\n";
