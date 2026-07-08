=== Plogins Versus - Product Compare for WooCommerce ===
Contributors: motylanogha
Tags: woocommerce, product compare, compare products, product comparison, comparison table
Requires at least: 6.5
Tested up to: 7.0
Requires PHP: 8.1
Stable tag: 1.0.1
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Schneller Produktvergleich für WooCommerce: Vergleichstabelle nebeneinander, Hervorhebung von Unterschieden, Gäste- und Kundenlisten. Kein jQuery.

== Description ==

Versus fügt deinem WooCommerce-Shop, Archiv und einzelnen Produktseiten eine Schaltfläche „Vergleichen“ hinzu. Käufer vergleichen Produkte nebeneinander in einer WooCommerce-Vergleichstabelle, wobei die Produktdaten in deinem Shop gespeichert werden.

Versus wird im Freien entwickelt. Der Code und ein Ort zum Melden von Fehlern oder Anfordern von Funktionen findest du live unter https://github.com/wppoland/plogins-versus.

Die Tabelle zeigt das Produktbild, den Namen, den Preis, die Artikelnummer, die Verfügbarkeit und die Kurzbeschreibung sowie eine Zeile für jedes Produktattribut (Farbe, Größe, Material und mehr). Zeilen, deren Werte sich zwischen den Produkten unterscheiden, werden hervorgehoben, und ein einziger Schalter blendet alles aus, was identisch ist, sodass die tatsächlichen Unterschiede hervorstechen.

= Documentation and links =

* <strong>Dokumentation</strong> - https://plogins.com/de/plogins-versus/docs/
* <strong>Plugin-Seite</strong> - https://plogins.com/de/plogins-versus/
* <strong>Quellcode</strong> – https://github.com/wppoland/plogins-versus
* <strong>Fehlerberichte und Funktionsanfragen</strong> – https://github.com/wppoland/plogins-versus/issues


= Built for speed and accessibility =

* <strong>Kein jQuery</strong> im eigenen Front-End-Code des Plugins, das Skript ist Vanilla JS, verzögert und wird in der Fußzeile geladen.
* <strong>Keine Layoutverschiebung (CLS).</strong> Die Vergleichstabelle scrollt horizontal innerhalb ihres eigenen Wrappers, sodass durch das Hinzufügen von Spalten die Seite nie neu umbrochen wird.
* <strong>Tastaturfreundlich.</strong> Die Vergleichsschaltflächen sind echte Schaltflächen mit dem Status „aria-pressed“, die über AJAX aktualisiert werden.
* <strong>Gäste und Kunden.</strong> Abgemeldete Besucher erstellen einen pro Browser gespeicherten Vergleich; Eingeloggte Kunden erhalten in „Mein Konto“ die Registerkarte „Vergleichen“ und beim Anmelden wird eine Gästeliste in das Konto eingefügt.

= Settings =

Auf einer Einstellungsseite für die WooCommerce-Funktionalität (Versus-Menü) kannst du:

* Aktivieren oder deaktiviere den Vergleich und lege fest, wie viele Produkte gleichzeitig verglichen werden können (2–6).
* Wähle, wo die Vergleichsschaltfläche angezeigt wird (Loops, einzelnes Produkt) und ob Gäste sie verwenden können.
* Wähle aus, welche Standardfelder als Zeilen angezeigt werden (Preis, SKU, Verfügbarkeit, Kurzbeschreibung) und ob Produktattribute einbezogen werden sollen.
* Schalte die Hervorhebung von Unterschieden, die Standardeinstellung „Nur Unterschiede“ und die Steuerelemente „Bild“, „In den Warenkorb hinzufügen“ und „Entfernen“ in jeder Spaltenüberschrift um.
* Passe die Front-End-Strings, die Schaltfläche „Vergleichen“, die Schaltfläche „Entfernen“, den Vergleichslink, das Umschalten zwischen den Unterschieden, die Schaltfläche „Alles löschen“ und die Meldung „Liste leeren“ an oder belasse sie bei den übersetzten Standardeinstellungen.

= Translation ready =

Alle Zeichenfolgen sind über die Textdomäne „versus“ übersetzbar und eine Vorlage „versus.pot“ wird in „/sprachen“ ausgeliefert. Durch das Löschen des Plugins werden seine Optionen und die Vergleichstabelle entfernt.

= How it works =

Das Hinzufügen oder Entfernen eines Produkts ist eine einzelne, nicht verifizierte AJAX-Anfrage. Kein vollständiges Neuladen der Seite. Die Auswahl der Gäste wird sechs Monate lang in einem Browser-Cookie gespeichert und bei der Anmeldung mit dem Konto zusammengeführt. CSS und JavaScript werden nur auf Seiten in die Warteschlange gestellt, auf denen tatsächlich die Vergleichsschaltfläche oder die Tabelle angezeigt wird.

== Installation ==

1. Lade das Plugin nach „/wp-content/plugins/versus“ hoch oder installiere es über Plugins → Neu hinzufügen.
2. Aktiviere es. WooCommerce muss aktiv sein.
3. Besuche das Menü <strong>Versus</strong> in wp-admin, um die verglichenen Felder und die Platzierung auszuwählen.

== Frequently Asked Questions ==

= Does it require WooCommerce? =

Ja. Versus erfordert eine aktive WooCommerce-Installation.

= Does it use jQuery? =

Nein. Das eigene Front-End-Skript des Plugins ist Vanilla-JavaScript ohne jQuery-Abhängigkeit.

= Can guests compare products? =

Ja, wenn „Gäste zulassen“ aktiviert ist. Der Vergleich eines Gastes wird pro Browser gespeichert und beim Anmelden in sein Konto eingefügt.

= Where does the compare button appear? =

Abhängig von deinen Einstellungen auf Shop- und Archivschleifen und auf der einzelnen Produktseite. Der Vergleich selbst wird auf der Registerkarte „Vergleichen“ meines Kontos für Kunden oder über eine spezielle Vergleichs-URL für Gäste geöffnet.

= What fields appear in the comparison table? =

Die Tabelle kann Produktbild, Name, Preis, SKU, Verfügbarkeit, Kurzbeschreibung und Produktattribute wie Größe, Farbe oder Material anzeigen.

= Can shoppers hide identical rows? =

Ja. Durch die Hervorhebung von Unterschieden und die Option „Nur Unterschiede“ können sich Käufer darauf konzentrieren, was sich zwischen den verglichenen Produkten tatsächlich ändert.

= Does the product compare list work for logged-in customers? =

Ja. Eingeloggte Kunden erhalten die Registerkarte „Mein Konto vergleichen“. Gastvergleichslisten können nach der Anmeldung in das Konto eingebunden werden.


= Does this plugin work on WordPress Multisite? =

Ja. Dieses Plugin ist mit WordPress Multisite kompatibel. Aktiviere es im Netzwerk oder auf einzelnen Websites. Jede Site behält ihre eigenen Einstellungen und Daten.

== Screenshots ==

1. Die Vergleichstabelle nebeneinander mit Hervorhebung der Unterschiede.
2. Der Versus-Einstellungsbildschirm.

== External Services ==

Versus stellt keine Verbindung zu externen Diensten oder Servern Dritter her und sendet keine Daten an diese. Es bündelt kein SDK, API-Client, Web-Font, Kartenkachel, CDN-Asset oder Analyseaufruf, alles läuft auf deiner eigenen Website.

Vergleichsdaten bleiben in deiner WordPress-Datenbank: Eine benutzerdefinierte Tabelle „{prefix}versus_compare_items“ enthält die verglichenen Produkt-IDs, die Plugin-Einstellungen befinden sich in der Option „versus_settings“ (wobei „versus_db_version“ das Schema verfolgt) und die Auswahl eines Gastes wird in einem Erstanbieter-Cookie in seinem eigenen Browser gespeichert. Das Hinzufügen oder Entfernen eines Produkts ist eine AJAX-Anfrage gleichen Ursprungs an die eigene „admin-ajax.php“ deiner Website. Es wird nie eine ausgehende HTTP-Anfrage gestellt. Durch das Löschen des Plugins werden diese Optionen entfernt und die Tabelle gelöscht.

== Changelog ==

= 1.0.1 =
* Erste stabile Version.

= 0.2.1 =
* Für einen eindeutigeren Plugin-Namen in Plogins Versus für WooCommerce umbenannt.

= 0.2.0 =
* Jede Benutzeroberfläche wurde aufpoliert: Inline-Hilfe-Tooltips zu jeder Einstellung, eine moderne thematische Vergleichstabelle (benutzerdefinierte CSS-Eigenschaften, flüssige Größenanpassung, Unterstützung für Dunkelmodus und reduzierte Bewegung), ein benutzerfreundlicher leerer Status auf der Vergleichsseite und ein Live-Count-Symbol auf dem Vergleichslink.
* Verbesserte Barrierefreiheit: zugängliches „?“ Hilfeangebote über „aria-describedby“, eine höfliche Live-Region, die Vergleichsänderungen an Screenreadern, sichtbare Fokusstile und volle Tastaturbedienbarkeit ankündigt.
* Robusteres Frontend: elegante Handhabung von Netzwerkausfällen, Schutz vor doppelter Übermittlung, automatische Tabellenaktualisierung nach dem Entfernen und benutzerfreundliche Fallbacks für fehlende Daten.
* Dem Einstellungsbildschirm wurde ein Abschnitt „Beschriftungen und Text“ hinzugefügt, damit die Schaltflächen „Vergleichen“, „Entfernen“, „Link vergleichen“, „Unterschiede umschalten“, „Alles löschen“ und „Leere-Liste“-Nachricht angepasst werden können (leer fällt auf die übersetzte Standardeinstellung zurück).
* Das Plugin wurde vollständig für die Übersetzung vorbereitet: „Domain Path“-Header und eine „versus.pot“-Vorlage in „/sprachen“ (WordPress lädt die Übersetzungen automatisch).
* „uninstall.php“-Bereinigung hinzugefügt, die die Plugin-Optionen und die Vergleichselemente-Tabelle entfernt, wenn das Plugin gelöscht wird.

= 0.1.0 =
* Erstveröffentlichung: barrierefreier Produktvergleich für WooCommerce mit einer Tabelle zur Hervorhebung der Unterschiede, Gäste- und Kundenlisten und einer Einstellungsseite für verglichene Felder und Platzierung.
