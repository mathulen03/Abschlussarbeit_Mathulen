<?php

/*******************************************************
 * Author: Mathulen Sathees
 * Released: 18.11.2026
 *******************************************************
 * Checkliste der Anforderungen
 *   Dateisystem verwenden
 *   Typenfunktionen verwenden
 *   UDF verwenden (roundRappen)
 *   Schleife verwenden (while)
 *   Verzweigung verwenden (if/else)
 *******************************************************/

function roundRappen($amount)
{
    return round($amount * 20) / 20;
}

function main()
{
    echo("Einkaufsliste\n");
    $budget = readline("Budget: ");
    $article = readline("Artikel:");
    $price = readline("Preis:");

    $prices = [];
    $total = 0;

    while ($article != "x") {
        $prices[] = $price;
        $total = $total + $price;
        file_put_contents("einkaufsliste.txt", "$article - CHF $price\n", FILE_APPEND);

        $article = readline("Artikel:");
        $price = readline("Preis:");
    }

    $total = roundRappen($total);
    $rest = $budget - $total;
    $count = count($prices);
    $highest = max($prices);
    $lowest = min($prices);
}
