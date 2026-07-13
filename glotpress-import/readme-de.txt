=== Plogins Versus - Product Compare for WooCommerce ===
Contributors: motylanogha
Tags: woocommerce, product compare, compare products, product comparison, comparison table
Requires at least: 6.5
Tested up to: 7.0
Requires PHP: 8.1
Stable tag: 1.0.2
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Schneller Produktvergleich für WooCommerce: Vergleichstabelle nebeneinander, Hervorhebung von Unterschieden, Gäste- und Kundenlisten. Kein jQuery.

== Description ==

Versus fügt deinem WooCommerce-Shop einen „Vergleichen“-Button auf den Shop-, Archiv- und einzelnen Produktseiten hinzu. Käufer vergleichen Produkte nebeneinander in einer WooCommerce-Vergleichstabelle, wobei die Produktdaten in deinem Shop bleiben.

Versus wird quelloffen entwickelt. Den Code sowie eine Stelle, um Fehler zu melden oder Funktionen vorzuschlagen, findest du unter https://github.com/wppoland/plogins-versus.

Die Tabelle zeigt das Produktbild, den Namen, den Preis, die Artikelnummer, die Verfügbarkeit und die Kurzbeschreibung sowie eine Zeile für jedes Produktattribut (Farbe, Größe, Material und mehr). Zeilen, deren Werte sich zwischen den Produkten unterscheiden, werden hervorgehoben, und ein einziger Schalter blendet alles aus, was identisch ist, sodass die tatsächlichen Unterschiede hervorstechen.

= Documentation and links =

* <strong>Dokumentation</strong> - https://plogins.com/de/plogins-versus/docs/
* <strong>Plugin-Seite</strong> - https://plogins.com/de/plogins-versus/
* <strong>Quellcode</strong> - https://github.com/wppoland/plogins-versus
* <strong>Fehlerberichte und Funktionswünsche</strong> - https://github.com/wppoland/plogins-versus/issues


= Built for speed and accessibility =

* <strong>Kein jQuery</strong> im eigenen Frontend-Code des Plugins – das Skript ist reines JavaScript, verzögert und im Footer geladen.
* <strong>Keine Layout-Verschiebung (CLS).</strong> Die Vergleichstabelle scrollt horizontal in ihrem eigenen Wrapper, sodass das Hinzufügen von Spalten die Seite nie neu umbricht.
* <strong>Tastaturfreundlich.</strong> Die Vergleichs-Buttons sind echte Buttons mit dem Status `aria-pressed`, der über AJAX aktualisiert wird.
* <strong>Gäste und Kunden.</strong> Abgemeldete Besucher erstellen einen pro Browser gespeicherten Vergleich; eingeloggte Kunden erhalten in „Mein Konto“ die Registerkarte „Vergleichen“, und beim Anmelden wird eine Gästeliste in das Konto übernommen.

= Settings =

Eine Einstellungsseite (Menü „Versus“, für WooCommerce-Berechtigungen) lässt dich:

* Den Vergleich aktivieren oder deaktivieren und festlegen, wie viele Produkte gleichzeitig verglichen werden können (2–6).
* Wählen, wo der Vergleichs-Button erscheint (Loops, einzelnes Produkt) und ob Gäste ihn verwenden können.
* Wählen, welche Standardfelder als Zeilen angezeigt werden (Preis, SKU, Verfügbarkeit, Kurzbeschreibung) und ob Produktattribute einbezogen werden.
* Die Hervorhebung von Unterschieden, die Standardeinstellung „Nur Unterschiede“ und die Steuerelemente für Bild / In den Warenkorb / Entfernen in jeder Spaltenüberschrift umschalten.
* Die Frontend-Texte anpassen: den Vergleichen-Button, den Entfernen-Button, den Vergleichslink, den Unterschiede-Umschalter, den Alles-löschen-Button und die Meldung für die leere Liste – oder sie bei den übersetzten Standardwerten belassen.

= Translation ready =

Alle Zeichenketten sind über die Textdomain `versus` übersetzbar, und eine Vorlage `versus.pot` liegt im Verzeichnis `/languages`. Beim Löschen des Plugins werden seine Optionen und die Vergleichstabelle entfernt.

= How it works =

Das Hinzufügen oder Entfernen eines Produkts ist eine einzelne, per Nonce verifizierte AJAX-Anfrage; kein vollständiges Neuladen der Seite. Die Auswahl eines Gastes wird sechs Monate lang in einem Browser-Cookie gespeichert und beim Anmelden mit dem Konto zusammengeführt. CSS und JavaScript werden nur auf Seiten geladen, auf denen tatsächlich der Vergleichs-Button oder die Tabelle angezeigt wird.

== Installation ==

1. Lade das Plugin nach `/wp-content/plugins/versus` hoch oder installiere es über Plugins → Neu hinzufügen.
2. Aktiviere es. WooCommerce muss aktiv sein.
3. Besuche das Menü <strong>Versus</strong> in wp-admin, um die verglichenen Felder und die Platzierung auszuwählen.

== Frequently Asked Questions ==

= Does it require WooCommerce? =

Ja. Versus erfordert eine aktive WooCommerce-Installation.

= Does it use jQuery? =

Nein. Das eigene Frontend-Skript des Plugins ist reines JavaScript ohne jQuery-Abhängigkeit.

= Can guests compare products? =

Ja, wenn „Gäste zulassen“ aktiviert ist. Der Vergleich eines Gastes wird pro Browser gespeichert und beim Anmelden in sein Konto übernommen.

= Where does the compare button appear? =

Je nach deinen Einstellungen in den Shop- und Archiv-Loops und auf der einzelnen Produktseite. Der Vergleich selbst öffnet sich für Kunden auf der Registerkarte „Vergleichen“ in „Mein Konto“ oder für Gäste über eine eigene Vergleichs-URL.

= What fields appear in the comparison table? =

Die Tabelle kann Produktbild, Name, Preis, SKU, Verfügbarkeit, Kurzbeschreibung und Produktattribute wie Größe, Farbe oder Material anzeigen.

= Can shoppers hide identical rows? =

Ja. Die Hervorhebung von Unterschieden und der Umschalter „Nur Unterschiede“ helfen Käufern, sich darauf zu konzentrieren, was sich zwischen den verglichenen Produkten tatsächlich ändert.

= Does the product compare list work for logged-in customers? =

Ja. Eingeloggte Kunden erhalten in „Mein Konto“ die Registerkarte „Vergleichen“. Gäste-Vergleichslisten können nach der Anmeldung in das Konto übernommen werden.


= Does this plugin work on WordPress Multisite? =

Ja. Dieses Plugin ist mit WordPress Multisite kompatibel. Aktiviere es im Netzwerk oder auf einzelnen Websites; jede Website behält ihre eigenen Einstellungen und Daten.

== Screenshots ==

1. Die Vergleichstabelle nebeneinander mit Hervorhebung der Unterschiede.
2. Der Einstellungsbildschirm von Versus.

== External Services ==

Versus stellt keine Verbindung zu externen Diensten oder Servern Dritter her und sendet keine Daten an diese. Es bündelt kein SDK, keinen API-Client, keine Web-Schriftart, keine Kartenkachel, kein CDN-Asset und keinen Analyse-Aufruf – alles läuft auf deiner eigenen Website.

Die Vergleichsdaten bleiben in deiner WordPress-Datenbank: Eine eigene Tabelle `{prefix}versus_compare_items` enthält die IDs der verglichenen Produkte, die Plugin-Einstellungen liegen in der Option `versus_settings` (wobei `versus_db_version` das Schema verfolgt), und die Auswahl eines Gastes wird in einem Erstanbieter-Cookie in seinem eigenen Browser gespeichert. Das Hinzufügen oder Entfernen eines Produkts ist eine AJAX-Anfrage gleichen Ursprungs an die eigene `admin-ajax.php` deiner Website; es wird nie eine ausgehende HTTP-Anfrage gestellt. Beim Löschen des Plugins werden diese Optionen entfernt und die Tabelle gelöscht.

== Translations ==

Plogins Versus enthält polnische, deutsche und spanische Übersetzungen der Plugin-Oberfläche. Die Textdomain ist `plogins-versus`, sodass Sprachpakete von WordPress.org diese gebündelten Übersetzungen ebenfalls überschreiben oder erweitern können.

== Changelog ==

= 1.0.2 =
* Gebündelte polnische, deutsche und spanische Übersetzungen der Plugin-Oberfläche hinzugefügt.

= 1.0.1 =
* Erste stabile Version.

= 0.2.1 =
* In Plogins Versus für WooCommerce umbenannt, um einen eindeutigeren Plugin-Namen zu erhalten.

= 0.2.0 =
* Jede Oberfläche aufpoliert: Inline-Hilfe-Tooltips zu jeder Einstellung, eine moderne, themenfähige Vergleichstabelle (eigene CSS-Eigenschaften, flüssige Größenanpassung, Unterstützung für Dunkelmodus und reduzierte Bewegung), ein freundlicher Leerzustand auf der Vergleichsseite und ein Live-Zähler-Abzeichen am Vergleichslink.
* Verbesserte Barrierefreiheit: barrierefreie „?“-Hilfen, verdrahtet über `aria-describedby`, eine höfliche Live-Region, die Vergleichsänderungen an Screenreader meldet, sichtbare Fokus-Stile und volle Bedienbarkeit per Tastatur.
* Robusteres Frontend: elegante Behandlung von Netzwerkfehlern, Schutz vor doppeltem Absenden, automatische Tabellenaktualisierung nach dem Entfernen und freundliche Fallbacks für fehlende Daten.
* Dem Einstellungsbildschirm wurde ein Abschnitt „Beschriftungen und Text“ hinzugefügt, sodass der Vergleichen-Button, der Entfernen-Button, der Vergleichslink, der Unterschiede-Umschalter, der Alles-löschen-Button und die Meldung für die leere Liste angepasst werden können (leer fällt auf den übersetzten Standardwert zurück).
* Das Plugin vollständig für die Übersetzung vorbereitet: `Domain Path`-Header und eine Vorlage `versus.pot` in `/languages` (WordPress lädt die Übersetzungen automatisch).
* `uninstall.php`-Bereinigung hinzugefügt, die die Plugin-Optionen und die Tabelle der Vergleichselemente entfernt, wenn das Plugin gelöscht wird.

= 0.1.0 =
* Erstveröffentlichung: barrierefreier Produktvergleich für WooCommerce mit einer Tabelle zur Hervorhebung der Unterschiede, Gäste- und Kundenlisten und einer Einstellungsseite für verglichene Felder und Platzierung.
