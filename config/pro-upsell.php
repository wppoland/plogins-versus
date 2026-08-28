<?php
/**
 * PRO upsell content, generated from the plogins.com registry by
 * scripts/gen-pro-upsell.mjs. The admin upsell renders this; curate the
 * feature list to fit this plugin's settings screen (do not invent features).
 *
 * @package plogins-versus-pro
 */

defined('ABSPATH') || exit;

return [
    'name'       => 'Versus Pro',
    'url'        => 'https://plogins.com/plogins-versus-pro/pricing/',
    'sellable'   => true,
    'price_from' => 29,
    'currency'   => 'EUR',
    'lead'       => [
        'en' => 'The features below ship in the current PRO release.',
        'pl' => 'Poniższe funkcje są dostępne w bieżącym wydaniu PRO.',
    ],
    'features'   => [
        [
            'en' => ['title' => 'Comparison page shortcode', 'desc' => 'The [versus_compare] shortcode renders a full table with price, SKU, stock, weight, dimensions and product attributes.'],
            'pl' => ['title' => 'Shortcode strony porównania', 'desc' => 'Shortcode [versus_compare] renderuje pełną tabelę z ceną, SKU, stanem, wagą, wymiarami i atrybutami produktu.'],
        ],
        [
            'en' => ['title' => 'Configurable rows', 'desc' => 'Toggle which table rows appear (price, SKU, stock, weight, dimensions, description, attributes) under Products → Versus Pro.'],
            'pl' => ['title' => 'Konfigurowalne wiersze', 'desc' => 'Włącz/wyłącz wiersze tabeli (cena, SKU, stan, waga, wymiary, opis, atrybuty) w Products → Versus Pro.'],
        ],
        [
            'en' => ['title' => 'Sticky compare bar', 'desc' => 'A bar at the bottom of shop and category pages, preview selected products and jump to the full comparison.'],
            'pl' => ['title' => 'Przyklejony pasek', 'desc' => 'Pasek u dołu list sklepu i kategorii, podgląd wybranych produktów i link do pełnego porównania.'],
        ],
        [
            'en' => ['title' => 'Comparison export', 'desc' => 'Download CSV, PDF and print the table on the [versus_compare] page. Exports can be disabled in PRO settings.'],
            'pl' => ['title' => 'Eksport porównania', 'desc' => 'Pobierz CSV, PDF i drukuj tabelę na stronie [versus_compare]. Eksport można wyłączyć w ustawieniach PRO.'],
        ],
        [
            'en' => ['title' => 'Category-scoped compare', 'desc' => 'Optionally restrict additions to products sharing at least one WooCommerce category with the first item in the set.'],
            'pl' => ['title' => 'Porównania w kategorii', 'desc' => 'Opcjonalnie ogranicz dodawanie do produktów z tej samej kategorii WooCommerce co pierwszy element listy.'],
        ],
    ],
];
