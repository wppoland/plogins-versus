=== Plogins Versus - Product Compare for WooCommerce ===
Contributors: motylanogha
Tags: woocommerce, product compare, compare products, product comparison, comparison table
Requires at least: 6.5
Tested up to: 7.0
Requires PHP: 8.1
Stable tag: 1.0.1
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Comparación rápida de productos para WooCommerce: tabla de comparación lado a lado, resaltado de diferencias, listas de invitados y clientes. Sin jQuery.

== Description ==

Versus añade un botón "Comparar" a su tienda WooCommerce, archivo y páginas de productos individuales. Los compradores comparan productos uno al lado del otro en una tabla comparativa de WooCommerce, y los datos del producto se guardan dentro de su tienda.

Versus se desarrolla al aire libre. El código y un lugar para informar errores o solicitar funciones se encuentran en https://github.com/wppoland/plogins-versus.

La tabla muestra la imagen del producto, el nombre, el precio, el SKU, la disponibilidad y una breve descripción, además de una fila para cada atributo del producto (color, tamaño, material y más). Las filas cuyos valores difieren entre productos se resaltan y un solo interruptor oculta todo lo que es idéntico para que se destaquen las diferencias reales.

= Documentation and links =

* <strong>Documentación</strong> - https://plogins.com/es/plogins-versus/docs/
* <strong>Página de complementos</strong> - https://plogins.com/es/plogins-versus/
* <strong>Código fuente</strong> - https://github.com/wppoland/plogins-versus
* <strong>Informes de errores y solicitudes de funciones</strong> - https://github.com/wppoland/plogins-versus/issues


= Built for speed and accessibility =

* <strong>No hay jQuery</strong> en el código de interfaz del complemento, el script es Vanilla JS, diferido y cargado en el pie de página.
* <strong>Sin cambio de diseño (CLS).</strong> La tabla de comparación se desplaza horizontalmente dentro de su propio contenedor, por lo que al añadir columnas nunca se redistribuye la página.
* <strong>Amigable con el teclado.</strong> Los botones de comparación son botones reales con estado "aria-pulsado" que se actualiza a través de AJAX.
* <strong>Invitados y clientes.</strong> Los visitantes desconectados crean una comparación almacenada por navegador; los clientes que han iniciado sesión obtienen una pestaña "Comparar" en Mi cuenta y una lista de invitados se fusiona en la cuenta al iniciar sesión.

= Settings =

Una página de configuración de capacidad de WooCommerce (menú Versus) le permite:

* Activa o deshabilite la comparación y establezca cuántos productos se pueden comparar a la vez (2 a 6).
* Elige dónde aparece el botón de comparar (bucles, producto único) y si los invitados pueden usarlo.
* Elija qué campos estándar aparecen como filas (precio, SKU, disponibilidad, descripción breve) y si desea incluir atributos del producto.
* Alternar resaltado de diferencias, el valor predeterminado "solo diferencias" y los controles de imagen / añadir al carrito / eliminar en el encabezado de cada columna.
* Personalice las cadenas de front-end, el botón de comparación, el botón de eliminación, el enlace de comparación, la alternancia de diferencias, el botón de borrar todo y el mensaje de lista vacía, o déjelos en sus valores predeterminados traducidos.

= Translation ready =

Todas las cadenas se pueden traducir a través del dominio de texto `versus` y se incluye una plantilla `versus.pot` en `/languages`. Al eliminar el complemento, se eliminan sus opciones y la tabla de comparación.

= How it works =

Añadir o eliminar un producto es una única solicitud AJAX no verificada; no hay recarga de página completa. Las selecciones de invitados se guardan en una cookie por navegador durante seis meses y se fusionan con la cuenta al iniciar sesión. CSS y JavaScript se ponen en cola solo en páginas que realmente muestran el botón de comparación o la tabla.

== Installation ==

1. Cargue el complemento en `/wp-content/plugins/versus`, o instálelo a través de Complementos → Añadir nuevo.
2. Actívalo. WooCommerce debe estar activo.
3. Visita el menú <strong>Versus</strong> en wp-admin para elegir los campos comparados y la ubicación.

== Frequently Asked Questions ==

= Does it require WooCommerce? =

Sí. Versus requiere una instalación activa de WooCommerce.

= Does it use jQuery? =

No. El script de interfaz del complemento es JavaScript básico sin dependencia de jQuery.

= Can guests compare products? =

Sí, cuando "Permitir invitados" está habilitado. La comparación de un huésped se almacena por navegador y se fusiona con su cuenta cuando inicia sesión.

= Where does the compare button appear? =

En bucles de tienda y archivo y en la página de un solo producto, según tu configuración. La comparación en sí se abre en la pestaña "Comparar" de Mi cuenta para los clientes, o en una URL de comparación dedicada para los invitados.

= What fields appear in the comparison table? =

La tabla puede mostrar la imagen del producto, el nombre, el precio, el SKU, la disponibilidad, una breve descripción y atributos del producto como tamaño, color o material.

= Can shoppers hide identical rows? =

Sí. El resaltado de diferencias y la opción "solo diferencias" ayudan a los compradores a centrarse en lo que realmente cambia entre los productos comparados.

= Does the product compare list work for logged-in customers? =

Sí. Los clientes que hayan iniciado sesión obtienen una pestaña Comparar Mi cuenta. Las listas de comparación de invitados se pueden fusionar en la cuenta después de iniciar sesión.


= Does this plugin work on WordPress Multisite? =

Sí. Este complemento es compatible con WordPress Multisite. Activarlo en red o activarlo en sitios individuales; Cada sitio mantiene su propia configuración y datos.

== Screenshots ==

1. La tabla de comparación lado a lado con resaltado de diferencias.
2. La pantalla de configuración de Versus.

== External Services ==

Versus no se conecta ni envía datos a ningún servicio externo o servidor de terceros. No incluye SDK, cliente API, fuente web, mosaico de mapa, activo CDN ni llamada de análisis; todo se ejecuta en tu propio sitio.

Los datos de comparación permanecen dentro de tu base de datos de WordPress: una tabla personalizada `{prefix}versus_compare_items` contiene los ID de los productos comparados, la configuración del complemento se encuentra en la opción `versus_settings` (con `versus_db_version` rastreando el esquema) y la selección de un invitado se guarda en una cookie de origen en su propio navegador. Añadir o eliminar un producto es una solicitud AJAX del mismo origen al `admin-ajax.php` de tu sitio; nunca se realiza ninguna solicitud HTTP saliente. Al eliminar el complemento, se eliminan esas opciones y se elimina la tabla.

== Changelog ==

= 1.0.1 =
* Primera versión estable.

= 0.2.1 =
* Renombrado a Plogins Versus para WooCommerce para obtener un nombre de complemento más distintivo.

= 0.2.0 =
* Se pulió cada interfaz: información sobre herramientas de ayuda en línea en cada configuración, una tabla de comparación temática moderna (propiedades personalizadas de CSS, tamaño de fluido, modo oscuro y compatibilidad con movimiento reducido), un estado vacío amigable en la página de comparación y una insignia de conteo en vivo en el enlace de comparación.
* Accesibilidad mejorada: accesible "?" funciones de ayuda conectadas a través de `aria-describedby`, una región en vivo educada que anuncia cambios de comparación en los lectores de pantalla, estilos de enfoque visibles y operatividad total del teclado.
* Interfaz de usuario más robusta: manejo elegante de fallas de red, protección contra envíos dobles, actualización automática de tablas después de una eliminación y respaldos amigables para datos faltantes.
* Se agregó una sección "Etiquetas y texto" a la pantalla de configuración para que se puedan personalizar el botón de comparación, el botón de eliminar, el enlace de comparación, el cambio de diferencias, el botón de borrar todo y el mensaje de lista vacía (vacío vuelve al valor predeterminado traducido).
* Hizo que el complemento estuviera completamente listo para la traducción: encabezado `Domain Path` y una plantilla `versus.pot` en `/languages` (WordPress carga las traducciones automáticamente).
* Se agregó la limpieza `uninstall.php` que elimina las opciones del complemento y la tabla de elementos de comparación cuando se elimina el complemento.

= 0.1.0 =
* Lanzamiento inicial: comparación de productos accesible para WooCommerce con una tabla que resalta las diferencias, listas de invitados + clientes y una página de configuración para campos y ubicaciones comparados.
