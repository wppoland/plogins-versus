=== Plogins Versus - Product Compare for WooCommerce ===
Contributors: motylanogha
Tags: woocommerce, product compare, compare products, product comparison, comparison table
Requires at least: 6.5
Tested up to: 7.0
Requires PHP: 8.1
Stable tag: 1.0.1
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Szybkie porównanie produktów dla WooCommerce: tabela porównawcza obok siebie, podkreślenie różnic, listy gości i klientów. Bez jQuery.

== Description ==

Versus dodaje przycisk „Porównaj” do Twojego sklepu WooCommerce, archiwum i stron pojedynczych produktów. Kupujący porównują produkty obok siebie w tabeli porównawczej WooCommerce, a dane produktów są przechowywane w Twoim sklepie.

Versus jest rozwijany na otwartej przestrzeni. Kod i miejsce do zgłaszania błędów lub zgłaszania próśb o nowe funkcje są dostępne pod adresem https://github.com/wppoland/plogins-versus.

Tabela pokazuje zdjęcie produktu, nazwę, cenę, SKU, dostępność i krótki opis, a także wiersz dla każdego atrybutu produktu (kolor, rozmiar, materiał i inne). Wiersze, których wartości różnią się w zależności od produktu, są podświetlone, a pojedynczy przełącznik ukrywa wszystko, co jest identyczne, dzięki czemu rzeczywiste różnice są widoczne.

= Documentation and links =

* <strong>Dokumentacja</strong> - https://plogins.com/pl/plogins-versus/docs/
* <strong>Strona wtyczki</strong> - https://plogins.com/pl/plogins-versus/
* <strong>Kod źródłowy</strong> - https://github.com/wppoland/plogins-versus
* <strong>Raporty o błędach i prośby o nowe funkcje</strong> - https://github.com/wppoland/plogins-versus/issues


= Built for speed and accessibility =

* <strong>Brak jQuery</strong> we własnym kodzie frontonu wtyczki, skrypt to waniliowy JS, odroczony i załadowany w stopce.
* <strong>Brak zmiany układu (CLS).</strong> Tabela porównawcza przewija się poziomo wewnątrz własnego opakowania, więc dodanie kolumn nigdy nie powoduje ponownego rozmieszczenia strony.
* <strong>Przyjazny dla klawiatury.</strong> Przyciski porównania to prawdziwe przyciski ze stanem „wciśnięty arią”, które aktualizują się przez AJAX.
* <strong>Goście i klienci.</strong> Zalogowani goście tworzą porównanie przechowywane w przeglądarce; zalogowani klienci otrzymują zakładkę „Porównaj” w Moim Koncie, a lista gości zostaje połączona z kontem po zalogowaniu.

= Settings =

Strona ustawień możliwości WooCommerce (menu Versus) umożliwia:

* Włącz lub wyłącz porównanie i ustaw, ile produktów można porównać jednocześnie (2–6).
* Wybierz, gdzie pojawia się przycisk porównania (pętle, pojedynczy produkt) i czy goście mogą z niego korzystać.
* Wybierz, które standardowe pola mają być wyświetlane w wierszach (cena, SKU, dostępność, krótki opis) i czy uwzględniać atrybuty produktu.
* Przełącz podświetlanie różnic, ustawienie domyślne „tylko różnice” oraz elementy sterujące obrazem / dodawaniem do koszyka / usuwaniem w nagłówkach każdej kolumny.
* Dostosuj ciągi znaków front-end, przycisk porównania, przycisk usuwania, łącze porównania, przełączanie różnic, przycisk czyszczenia wszystkiego i komunikat o pustej liście lub pozostaw je w przetłumaczonych ustawieniach domyślnych.

= Translation ready =

Wszystkie ciągi znaków można tłumaczyć poprzez domenę tekstową `versus`, a szablon `versus.pot` jest dostarczany w `/languages`. Usunięcie wtyczki powoduje usunięcie jej opcji i tabeli porównawczej.

= How it works =

Dodanie lub usunięcie produktu to pojedyncze, niezweryfikowane żądanie AJAX; bez ponownego ładowania całej strony. Wybrane przez gościa są przechowywane w pliku cookie przeglądarki przez sześć miesięcy i łączone z kontem po zalogowaniu. CSS i JavaScript są kolejkowane tylko na stronach, które faktycznie wyświetlają przycisk porównania lub tabelę.

== Installation ==

1. Prześlij wtyczkę do `/wp-content/plugins/versus` lub zainstaluj poprzez Wtyczki → Dodaj nową.
2. Aktywuj. WooCommerce musi być aktywny.
3. Odwiedź menu <strong>Kontra</strong> w wp-admin, aby wybrać porównywane pola i położenie.

== Frequently Asked Questions ==

= Does it require WooCommerce? =

Tak. Versus wymaga aktywnej instalacji WooCommerce.

= Does it use jQuery? =

Nie. Własnym skryptem front-end wtyczki jest waniliowy JavaScript, bez zależności od jQuery.

= Can guests compare products? =

Tak, gdy włączona jest opcja „Zezwalaj na gości”. Porównanie gościa jest przechowywane w każdej przeglądarce i łączone z jego kontem po zalogowaniu.

= Where does the compare button appear? =

W pętlach sklepu i archiwum oraz na stronie pojedynczego produktu, w zależności od ustawień. Samo porównanie otwiera się w zakładce Moje konto „Porównaj” dla klientów lub pod dedykowanym adresem URL porównania dla gości.

= What fields appear in the comparison table? =

Tabela może pokazywać zdjęcie produktu, nazwę, cenę, SKU, dostępność, krótki opis i atrybuty produktu, takie jak rozmiar, kolor czy materiał.

= Can shoppers hide identical rows? =

Tak. Podświetlanie różnic i przełącznik „tylko różnice” pomagają kupującym skupić się na tym, co faktycznie zmienia się między porównywanymi produktami.

= Does the product compare list work for logged-in customers? =

Tak. Zalogowani klienci otrzymują zakładkę „Porównaj moje konto”. Listy porównawcze gości można połączyć z kontem po zalogowaniu.


= Does this plugin work on WordPress Multisite? =

Tak. Ta wtyczka jest kompatybilna z WordPress Multisite. Aktywuj go w sieci lub aktywuj na poszczególnych stronach; każda witryna przechowuje własne ustawienia i dane.

== Screenshots ==

1. Tabela porównawcza obok siebie z zaznaczeniem różnic.
2. Ekran ustawień Versus.

== External Services ==

Versus nie łączy się ani nie wysyła żadnych danych do żadnej usługi zewnętrznej ani serwera strony trzeciej. Nie zawiera pakietu SDK, klienta API, czcionki internetowej, kafelka mapy, zasobu CDN ani wywołania analitycznego, wszystko działa na Twojej własnej witrynie.

Dane porównawcze pozostają w Twojej bazie danych WordPress: niestandardowa tabela `{prefix}versus_compare_items` przechowuje porównywane identyfikatory produktów, ustawienia wtyczki są dostępne w opcji `versus_settings` (z opcją `versus_db_version` śledzącą schemat), a wybór gościa jest przechowywany we własnym pliku cookie w jego własnej przeglądarce. Dodanie lub usunięcie produktu to żądanie AJAX tego samego pochodzenia skierowane do własnego pliku `admin-ajax.php` Twojej witryny; nigdy nie jest wysyłane żadne wychodzące żądanie HTTP. Usunięcie wtyczki usuwa te opcje i usuwa tabelę.

== Changelog ==

= 1.0.1 =
* Pierwsza stabilna wersja.

= 0.2.1 =
* Zmieniono nazwę na Plogins Versus dla WooCommerce, aby uzyskać bardziej charakterystyczną nazwę wtyczki.

= 0.2.0 =
* Dopracowany każdy interfejs: wbudowane podpowiedzi pomocy dla każdego ustawienia, nowoczesna, tematyczna tabela porównawcza (niestandardowe właściwości CSS, płynne dobieranie rozmiaru, obsługa trybu ciemnego i zmniejszonego ruchu), przyjazny stan pusty na stronie porównania oraz plakietka z licznikiem aktywności na łączu porównawczym.
* Poprawiona dostępność: dostępne „?” pomoc przekazywana poprzez `aria-descriptiondby`, uprzejmy region na żywo, który ogłasza zmiany w czytnikach ekranu, widoczne style fokusu i pełną obsługę klawiatury.
* Bardziej niezawodny interfejs: płynna obsługa awarii sieci, ochrona przed podwójnym przesyłaniem, automatyczne odświeżanie tabeli po usunięciu i przyjazne rozwiązania awaryjne w przypadku brakujących danych.
* Dodano sekcję „Etykiety i tekst” do ekranu ustawień, dzięki czemu można dostosować przycisk porównania, przycisk usuwania, link porównania, przełączanie różnic, przycisk czyszczenia wszystkiego i komunikat o pustej liście (pusty powraca do przetłumaczonego ustawienia domyślnego).
* Przygotowano wtyczkę do pełnego tłumaczenia: nagłówek `Domain Path` i szablon `versus.pot` w `/languages` (WordPress ładuje tłumaczenia automatycznie).
* Dodano funkcję czyszczenia `uninstall.php`, która usuwa opcje wtyczki i tabelę elementów porównawczych po usunięciu wtyczki.

= 0.1.0 =
* Pierwsza wersja: dostępne porównanie produktów dla WooCommerce z tabelą podkreślającą różnice, listami gości i klientów oraz stroną ustawień dla porównywanych pól i miejsc docelowych.
