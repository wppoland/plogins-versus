=== Plogins Versus - Product Compare for WooCommerce ===
Contributors: motylanogha
Tags: woocommerce, product compare, compare products, product comparison, comparison table
Requires at least: 6.5
Tested up to: 7.0
Requires PHP: 8.1
Stable tag: 1.0.2
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Comparación rápida de productos para WooCommerce: tabla de comparación lado a lado, resaltado de diferencias, listas de invitados y clientes. Sin jQuery.

== Description ==

Versus añade un botón «Comparar» a tu tienda WooCommerce, en las páginas de tienda, archivo y de producto individual. Los compradores comparan productos uno al lado del otro en una tabla de comparación de WooCommerce, y los datos del producto permanecen dentro de tu tienda.

Versus se desarrolla de forma abierta (código abierto). Encontrarás el código y un lugar para informar de errores o proponer funciones en https://github.com/wppoland/plogins-versus.

La tabla muestra la imagen del producto, el nombre, el precio, el SKU, la disponibilidad y una descripción corta, además de una fila para cada atributo del producto (color, talla, material y más). Las filas cuyos valores difieren entre productos se resaltan, y un único interruptor oculta todo lo que es idéntico para que destaquen las diferencias reales.

= Documentation and links =

* <strong>Documentación</strong> - https://plogins.com/es/plogins-versus/docs/
* <strong>Página del plugin</strong> - https://plogins.com/es/plogins-versus/
* <strong>Código fuente</strong> - https://github.com/wppoland/plogins-versus
* <strong>Informes de errores y peticiones de funciones</strong> - https://github.com/wppoland/plogins-versus/issues


= Built for speed and accessibility =

* <strong>Sin jQuery</strong> en el código del frontend del propio plugin: el script es JavaScript puro, diferido y cargado en el pie de página.
* <strong>Sin saltos de diseño (CLS).</strong> La tabla de comparación se desplaza horizontalmente dentro de su propio contenedor, así que añadir columnas nunca redistribuye la página.
* <strong>Compatible con el teclado.</strong> Los botones de comparación son botones reales con estado `aria-pressed` que se actualiza mediante AJAX.
* <strong>Invitados y clientes.</strong> Los visitantes que no han iniciado sesión crean una comparación guardada por navegador; los clientes que han iniciado sesión obtienen una pestaña «Comparar» en Mi cuenta, y al iniciar sesión la lista de invitado se fusiona con la cuenta.

= Settings =

Una página de ajustes (menú «Versus», con permisos de WooCommerce) te permite:

* Activar o desactivar la comparación y establecer cuántos productos se pueden comparar a la vez (2–6).
* Elegir dónde aparece el botón de comparar (loops, producto individual) y si los invitados pueden usarlo.
* Elegir qué campos estándar aparecen como filas (precio, SKU, disponibilidad, descripción corta) y si se incluyen los atributos del producto.
* Alternar el resaltado de diferencias, el valor predeterminado «solo diferencias» y los controles de imagen / añadir al carrito / eliminar en la cabecera de cada columna.
* Personalizar los textos del frontend: el botón de comparar, el botón de eliminar, el enlace de comparación, el interruptor de diferencias, el botón de borrar todo y el mensaje de lista vacía, o dejarlos en sus valores predeterminados traducidos.

= Translation ready =

Todas las cadenas se pueden traducir mediante el dominio de texto `versus`, y en el directorio `/languages` se incluye una plantilla `versus.pot`. Al borrar el plugin se eliminan sus opciones y la tabla de comparación.

= How it works =

Añadir o eliminar un producto es una única solicitud AJAX verificada con nonce; sin recargar la página completa. La selección de un invitado se guarda en una cookie por navegador durante seis meses y se fusiona con la cuenta al iniciar sesión. El CSS y el JavaScript se cargan solo en las páginas que realmente muestran el botón de comparación o la tabla.

== Installation ==

1. Sube el plugin a `/wp-content/plugins/versus`, o instálalo a través de Plugins → Añadir nuevo.
2. Actívalo. WooCommerce debe estar activo.
3. Entra en el menú <strong>Versus</strong> en wp-admin para elegir los campos comparados y la ubicación.

== Frequently Asked Questions ==

= Does it require WooCommerce? =

Sí. Versus requiere una instalación activa de WooCommerce.

= Does it use jQuery? =

No. El script del frontend del propio plugin es JavaScript puro, sin dependencia de jQuery.

= Can guests compare products? =

Sí, cuando «Permitir invitados» está activado. La comparación de un invitado se guarda por navegador y se fusiona con su cuenta cuando inicia sesión.

= Where does the compare button appear? =

En los loops de tienda y archivo y en la página de producto individual, según tus ajustes. La comparación en sí se abre en la pestaña «Comparar» de Mi cuenta para los clientes, o en una URL de comparación propia para los invitados.

= What fields appear in the comparison table? =

La tabla puede mostrar la imagen del producto, el nombre, el precio, el SKU, la disponibilidad, una descripción corta y atributos del producto como talla, color o material.

= Can shoppers hide identical rows? =

Sí. El resaltado de diferencias y el interruptor «solo diferencias» ayudan a los compradores a centrarse en lo que realmente cambia entre los productos comparados.

= Does the product compare list work for logged-in customers? =

Sí. Los clientes que han iniciado sesión obtienen una pestaña «Comparar» en Mi cuenta. Las listas de comparación de invitados se pueden fusionar con la cuenta tras iniciar sesión.


= Does this plugin work on WordPress Multisite? =

Sí. Este plugin es compatible con WordPress Multisite. Actívalo en red o en sitios individuales; cada sitio mantiene sus propios ajustes y datos.

== Screenshots ==

1. La tabla de comparación lado a lado con resaltado de diferencias.
2. La pantalla de ajustes de Versus.

== External Services ==

Versus no se conecta ni envía datos a ningún servicio externo o servidor de terceros. No incluye ningún SDK, cliente de API, fuente web, mosaico de mapa, recurso de CDN ni llamada de analítica: todo se ejecuta en tu propio sitio.

Los datos de comparación permanecen dentro de tu base de datos de WordPress: una tabla propia `{prefix}versus_compare_items` contiene los ID de los productos comparados, los ajustes del plugin se encuentran en la opción `versus_settings` (con `versus_db_version` haciendo un seguimiento del esquema), y la selección de un invitado se guarda en una cookie de origen en su propio navegador. Añadir o eliminar un producto es una solicitud AJAX del mismo origen a la propia `admin-ajax.php` de tu sitio; nunca se realiza ninguna solicitud HTTP saliente. Al borrar el plugin se eliminan esas opciones y se elimina la tabla.

== Translations ==

Plogins Versus incluye traducciones al polaco, alemán y español de la interfaz del complemento. El dominio de texto es `plogins-versus`, por lo que los paquetes de idioma de WordPress.org también pueden sobrescribir o ampliar estas traducciones incluidas.

== Changelog ==

= 1.0.2 =
* Se añadieron traducciones incluidas al polaco, alemán y español de la interfaz del complemento.

= 1.0.1 =
* Primera versión estable.

= 0.2.1 =
* Renombrado a Plogins Versus para WooCommerce para obtener un nombre de plugin más distintivo.

= 0.2.0 =
* Se pulió cada interfaz: tooltips de ayuda en línea en cada ajuste, una tabla de comparación moderna y adaptable al tema (propiedades personalizadas de CSS, tamaño fluido, compatibilidad con modo oscuro y movimiento reducido), un estado vacío amable en la página de comparación y un distintivo con contador en directo en el enlace de comparación.
* Accesibilidad mejorada: ayudas «?» accesibles conectadas mediante `aria-describedby`, una región activa educada que anuncia los cambios de comparación a los lectores de pantalla, estilos de foco visibles y manejo completo con el teclado.
* Frontend más robusto: manejo elegante de fallos de red, protección contra el envío doble, actualización automática de la tabla tras una eliminación y alternativas amables para los datos que falten.
* Se añadió una sección «Etiquetas y texto» a la pantalla de ajustes para poder personalizar el botón de comparar, el botón de eliminar, el enlace de comparación, el interruptor de diferencias, el botón de borrar todo y el mensaje de lista vacía (vacío vuelve al valor predeterminado traducido).
* Se dejó el plugin totalmente listo para la traducción: cabecera `Domain Path` y una plantilla `versus.pot` en `/languages` (WordPress carga las traducciones automáticamente).
* Se añadió una limpieza en `uninstall.php` que elimina las opciones del plugin y la tabla de elementos de comparación cuando se borra el plugin.

= 0.1.0 =
* Lanzamiento inicial: comparación de productos accesible para WooCommerce con una tabla que resalta las diferencias, listas de invitados y clientes, y una página de ajustes para los campos comparados y la ubicación.
