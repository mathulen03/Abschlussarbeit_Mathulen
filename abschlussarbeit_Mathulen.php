<?php

/*******************************************************
 * Author: Mathulen Sathees
 * Released: 18.11.2026

 *******************************************************/

// Ask the user for the budget and the first article
echo("Einkaufsliste\n");
$budget = readline("Budget: ");
$article = readline("Artikel:");
$price = readline("Preis:");

// Empty list for all prices and start total at 0
$prices = [];
$total = 0;

// Round an amount to 5 Rappen and return it
function roundRappen(float $amount)
{
    return round($amount * 20) / 20;
}

// Repeat until the user enters "x"
while ($article != "x") {
    // Save the price and add it to the total
    $prices[] = $price;
    $total = $total + $price;

    // Write the article and price into the file
    file_put_contents("einkaufsliste.txt", "$article - CHF $price\n", FILE_APPEND);

    // Ask for the next article
    $article = readline("Artikel:");
    $price = readline("Preis:");
}

// Calculate the results
$total = roundRappen($total);
$rest = $budget - $total;
$count = count($prices);
$highest = max($prices);
$lowest = min($prices);

// Show the results
echo("Anzahl Artikel: $count\n");
echo("Teuerste Artikel: CHF $highest\n");
echo("Billigste Artikel: CHF $lowest\n");
echo("Total: CHF $total\n");

// Check if the budget is enough
if ($rest >= 0) {
    echo("Rest: CHF $rest\n");
} else {
    echo("Rest: Budget ueberschritten\n");
}
