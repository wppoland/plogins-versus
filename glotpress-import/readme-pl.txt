=== Plogins Versus - Product Compare for WooCommerce ===
Contributors: motylanogha
Tags: woocommerce, product compare, compare products, product comparison, comparison table
Requires at least: 6.5
Tested up to: 7.0
Requires PHP: 8.1
Stable tag: 1.0.2
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Szybkie porównywanie produktów dla WooCommerce: tabela porównawcza obok siebie, podświetlanie różnic, listy gości i klientów. Bez jQuery.

== Description ==

Versus dodaje przycisk „Porównaj” do Twojego sklepu WooCommerce — na stronach sklepu, archiwów i pojedynczych produktów. Kupujący porównują produkty obok siebie w tabeli porównawczej WooCommerce, a dane produktów pozostają w Twoim sklepie.

Versus jest rozwijany otwarcie (open source). Kod oraz miejsce do zgłaszania błędów i propozycji funkcji znajdziesz na https://github.com/wppoland/plogins-versus.

Tabela pokazuje zdjęcie produktu, nazwę, cenę, SKU, dostępność i krótki opis, a także wiersz dla każdego atrybutu produktu (kolor, rozmiar, materiał i inne). Wiersze, których wartości różnią się między produktami, są podświetlane, a jeden przełącznik ukrywa wszystko, co jest identyczne, dzięki czemu prawdziwe różnice się wyróżniają.

= Documentation and links =

* <strong>Dokumentacja</strong> - https://plogins.com/pl/plogins-versus/docs/
* <strong>Strona wtyczki</strong> - https://plogins.com/pl/plogins-versus/
* <strong>Kod źródłowy</strong> - https://github.com/wppoland/plogins-versus
* <strong>Zgłoszenia błędów i propozycje funkcji</strong> - https://github.com/wppoland/plogins-versus/issues


= Built for speed and accessibility =

* <strong>Bez jQuery</strong> we własnym kodzie front-endu wtyczki — skrypt to czysty JavaScript, ładowany z opóźnieniem w stopce.
* <strong>Bez przeskoków układu (CLS).</strong> Tabela porównawcza przewija się poziomo we własnym kontenerze, więc dodawanie kolumn nigdy nie przebudowuje strony.
* <strong>Przyjazny dla klawiatury.</strong> Przyciski porównania to prawdziwe przyciski ze stanem `aria-pressed`, który aktualizuje się przez AJAX.
* <strong>Goście i klienci.</strong> Wylogowani odwiedzający budują porównanie przechowywane w przeglądarce; zalogowani klienci otrzymują zakładkę „Porównaj” w Moim koncie, a lista gościa jest łączona z kontem po zalogowaniu.

= Settings =

Strona ustawień (menu Versus, dostępna dla uprawnień WooCommerce) pozwala:

* Włączyć lub wyłączyć porównywanie i ustawić, ile produktów można porównać jednocześnie (2–6).
* Wybrać, gdzie pojawia się przycisk porównania (pętle, pojedynczy produkt) i czy mogą z niego korzystać goście.
* Wybrać, które standardowe pola pojawią się jako wiersze (cena, SKU, dostępność, krótki opis) i czy uwzględnić atrybuty produktu.
* Przełączać podświetlanie różnic, domyślne ustawienie „tylko różnice” oraz elementy sterujące obrazem / dodawaniem do koszyka / usuwaniem w nagłówku każdej kolumny.
* Dostosować teksty front-endu: przycisk porównania, przycisk usuwania, link porównania, przełącznik różnic, przycisk czyszczenia wszystkiego i komunikat o pustej liście — lub pozostawić je w przetłumaczonych ustawieniach domyślnych.

= Translation ready =

Wszystkie ciągi są przetłumaczalne przez domenę tekstową `versus`, a szablon `versus.pot` znajduje się w katalogu `/languages`. Usunięcie wtyczki kasuje jej opcje i tabelę porównawczą.

= How it works =

Dodanie lub usunięcie produktu to pojedyncze żądanie AJAX zweryfikowane nonce; bez przeładowania całej strony. Wybory gościa są przechowywane w pliku cookie przeglądarki przez sześć miesięcy i łączone z kontem po zalogowaniu. CSS i JavaScript są ładowane tylko na stronach, które faktycznie pokazują przycisk porównania lub tabelę.

== Installation ==

1. Wgraj wtyczkę do `/wp-content/plugins/versus` lub zainstaluj przez Wtyczki → Dodaj nową.
2. Włącz ją. WooCommerce musi być aktywne.
3. Wejdź w menu <strong>Versus</strong> w wp-admin, aby wybrać porównywane pola i miejsce wyświetlania.

== Frequently Asked Questions ==

= Does it require WooCommerce? =

Tak. Versus wymaga aktywnej instalacji WooCommerce.

= Does it use jQuery? =

Nie. Własny skrypt front-endu wtyczki to czysty JavaScript, bez zależności od jQuery.

= Can guests compare products? =

Tak, gdy włączona jest opcja „Zezwalaj gościom”. Porównanie gościa jest przechowywane w przeglądarce i łączone z jego kontem po zalogowaniu.

= Where does the compare button appear? =

W pętlach sklepu i archiwów oraz na stronie pojedynczego produktu, w zależności od ustawień. Samo porównanie otwiera się w zakładce „Porównaj” w Moim koncie dla klientów lub pod dedykowanym adresem URL porównania dla gości.

= What fields appear in the comparison table? =

Tabela może pokazywać zdjęcie produktu, nazwę, cenę, SKU, dostępność, krótki opis oraz atrybuty produktu, takie jak rozmiar, kolor czy materiał.

= Can shoppers hide identical rows? =

Tak. Podświetlanie różnic i przełącznik „tylko różnice” pomagają kupującym skupić się na tym, co faktycznie zmienia się między porównywanymi produktami.

= Does the product compare list work for logged-in customers? =

Tak. Zalogowani klienci otrzymują zakładkę „Porównaj” w Moim koncie. Listy porównań gości można połączyć z kontem po zalogowaniu.


= Does this plugin work on WordPress Multisite? =

Tak. Ta wtyczka jest zgodna z WordPress Multisite. Włącz ją dla całej sieci lub na poszczególnych witrynach; każda witryna zachowuje własne ustawienia i dane.

== Screenshots ==

1. Tabela porównawcza obok siebie z podświetlaniem różnic.
2. Ekran ustawień Versus.

== External Services ==

Versus nie łączy się z żadną usługą zewnętrzną ani serwerem podmiotu trzeciego i nie wysyła do nich żadnych danych. Nie dołącza żadnego SDK, klienta API, czcionki internetowej, kafelka mapy, zasobu CDN ani wywołania analitycznego — wszystko działa w Twojej własnej witrynie.

Dane porównań pozostają w Twojej bazie danych WordPress: niestandardowa tabela `{prefix}versus_compare_items` przechowuje identyfikatory porównywanych produktów, ustawienia wtyczki znajdują się w opcji `versus_settings` (a `versus_db_version` śledzi wersję schematu), a wybór gościa jest przechowywany w pliku cookie własnej witryny w jego własnej przeglądarce. Dodanie lub usunięcie produktu to żądanie AJAX z tej samej domeny do własnego pliku `admin-ajax.php` Twojej witryny; nigdy nie jest wykonywane wychodzące żądanie HTTP. Usunięcie wtyczki kasuje te opcje i usuwa tabelę.

== Translations ==

Plogins Versus zawiera polskie, niemieckie i hiszpańskie tłumaczenia interfejsu wtyczki. Domena tekstowa to `plogins-versus`, więc pakiety językowe z WordPress.org mogą również nadpisywać lub rozszerzać te dołączone tłumaczenia.

== Changelog ==

= 1.0.2 =
* Dodano dołączone polskie, niemieckie i hiszpańskie tłumaczenia interfejsu wtyczki.

= 1.0.1 =
* Pierwsza stabilna wersja.

= 0.2.1 =
* Zmieniono nazwę na Plogins Versus dla WooCommerce, aby uzyskać bardziej charakterystyczną nazwę wtyczki.

= 0.2.0 =
* Dopracowano każdy interfejs: wbudowane podpowiedzi pomocy przy każdym ustawieniu, nowoczesna, motywowalna tabela porównawcza (niestandardowe właściwości CSS, płynne skalowanie, obsługa trybu ciemnego i ograniczonego ruchu), przyjazny pusty stan na stronie porównania oraz plakietka z licznikiem na żywo na linku porównania.
* Poprawiono dostępność: dostępne elementy pomocy „?” podłączone przez `aria-describedby`, uprzejmy region live ogłaszający zmiany porównania czytnikom ekranu, widoczne style fokusu i pełna obsługa klawiatury.
* Bardziej niezawodny front-end: płynna obsługa awarii sieci, ochrona przed podwójnym wysłaniem, automatyczne odświeżanie tabeli po usunięciu i przyjazne rozwiązania awaryjne dla brakujących danych.
* Dodano sekcję „Etykiety i tekst” do ekranu ustawień, dzięki czemu można dostosować przycisk porównania, przycisk usuwania, link porównania, przełącznik różnic, przycisk czyszczenia wszystkiego i komunikat o pustej liście (pusty powraca do przetłumaczonego ustawienia domyślnego).
* Przygotowano wtyczkę w pełni do tłumaczenia: nagłówek `Domain Path` i szablon `versus.pot` w `/languages` (WordPress ładuje tłumaczenia automatycznie).
* Dodano czyszczenie `uninstall.php`, które usuwa opcje wtyczki i tabelę elementów porównawczych po usunięciu wtyczki.

= 0.1.0 =
* Pierwsze wydanie: dostępne porównanie produktów dla WooCommerce z tabelą podświetlającą różnice, listami gości i klientów oraz stroną ustawień dla porównywanych pól i miejsca wyświetlania.
