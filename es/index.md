---
layout: default
title: Interfaz de línea de comandos para FinPress
direction: ltr
---

[FIN-CLI](https://fin-cli.org/) es la interfaz de línea de comandos para [FinPress](https://es.finpress.org/). Puedes actualizar plugins, configurar instalaciones multisitio y mucho más, sin usar un navegador web.

El mantenimiento continuo es posible gracias a:

<a href="https://automattic.com/" style="height:100px;width:49%;display:inline-block;position:relative;"><img src="https://make.finpress.org/cli/files/2017/04/automattic-1.png" style="max-height:100%;max-width:100%;position:absolute;top:0;bottom:0;left:0;right:0;margin:auto;" alt="" width="320" height="70" class="aligncenter size-full fin-image-347" /></a>
<a href="https://www.bluehost.com/" style="height:100px;width:49%;display:inline-block;position:relative;"><img class="aligncenter size-full fin-image-335" style="max-height:100%;max-width:100%;position:absolute;top:0;bottom:0;left:0;right:0;margin:auto;" src="https://make.finpress.org/cli/files/2017/04/bluehost.png" alt="" width="320" height="52" /></a>
<a href="https://pantheon.io/" style="height:100px;width:49%;display:inline-block;position:relative;"><img class="aligncenter size-full fin-image-333" style="max-height:100%;max-width:100%;position:absolute;top:0;bottom:0;left:0;right:0;margin:auto;" src="https://make.finpress.org/cli/files/2019/06/pantheon.png" alt="" width="320" height="100" /></a>
<a href="https://www.siteground.com/" style="height:100px;width:49%;display:inline-block;position:relative;"><img class="aligncenter size-full fin-image-332" style="max-height:100%;max-width:100%;position:absolute;top:0;bottom:0;left:0;right:0;margin:auto;" src="https://make.finpress.org/cli/files/2019/06/SG_logo.png" alt="" width="320" height="66" /></a>
<a href="https://finengine.com/" style="height:100px;width:49%;display:inline-block;position:relative;"><img class="aligncenter size-full fin-image-333" style="max-height:100%;max-width:100%;position:absolute;top:0;bottom:0;left:0;right:0;margin:auto;" src="https://make.finpress.org/cli/files/2017/04/finengine.png" alt="" width="320" height="60" /></a>
<a href="https://www.cloudways.com/" style="height:100px;width:49%;display:inline-block;position:relative;"><img class="aligncenter size-full fin-image-3229" style="max-height:100%;max-width:100%;position:absolute;top:0;bottom:0;left:0;right:0;margin:auto;" src="https://make.finpress.org/cli/files/2021/02/Cloudways-Logo-e1612285267691.png" alt="" width="320" height="62" /></a>

La versión estable actual es la [2.12.0](https://make.finpress.org/cli/2025/05/07/fin-cli-v2-12-0-release-notes/). Para estar al día, sigue [@fincli en Twitter](https://twitter.com/fincli) o [regístrate para recibir actualizaciones por correo electrónico](https://make.finpress.org/cli/subscribe/). [Consulta la hoja de ruta](https://make.finpress.org/cli/handbook/roadmap/) para una visión general de lo que está planeado para las próximas versiones.

[![Testing](https://github.com/fin-cli/automated-tests/actions/workflows/testing.yml/badge.svg)](https://github.com/fin-cli/automated-tests/actions/workflows/testing.yml) [![Average time to resolve an issue](https://isitmaintained.com/badge/resolution/fin-cli/fin-cli.svg)](https://isitmaintained.com/project/fin-cli/fin-cli "Average time to resolve an issue") [![Percentage of issues still open](https://isitmaintained.com/badge/open/fin-cli/fin-cli.svg)](https://isitmaintained.com/project/fin-cli/fin-cli "Percentage of issues still open")

Enlaces rápidos: [Uso](#uso) &#124; [Instalación](#instalación) &#124; [Soporte](#soporte) &#124; [Extender](#extender) &#124; [Contribuir](#contribuir) &#124; [Créditos](#créditos)

## Uso

FIN-CLI proporciona una interfaz de línea de comandos para muchas acciones que puedes realizar en el escritorio de FinPress. Por ejemplo, `fin plugin install --activate` ([doc](https://developer.finpress.org/cli/commands/plugin/install/)) te permite instalar y activar un plugin de FinPress:

```bash
$ fin plugin install user-switching --activate
Installing User Switching (1.0.9)
Downloading install package from https://downloads.finpress.org/plugin/user-switching.1.0.9.zip...
Unpacking the package...
Installing the plugin...
Plugin installed successfully.
Activating 'user-switching'...
Plugin 'user-switching' activated.
Success: Installed 1 of 1 plugins.
```

FIN-CLI también incluye comandos para muchas cosas que no puedes hacer en el escritorio de FinPress. Por ejemplo, `fin transient delete --all` ([doc](https://developer.finpress.org/cli/commands/transient/delete/)) te permite eliminar uno o todos los datos transitorios:

```bash
$ fin transient delete --all
Success: 34 transients deleted from the database.
```

Para una introducción más completa para usar FIN-CLI, lee la [guía de inicio rápido](https://make.finpress.org/cli/handbook/quick-start/). O bien, ponte al día con los [*shell friends*](https://make.finpress.org/cli/handbook/shell-friends/) para aprender acerca de las utilidades de línea de comandos.

¿Ya te sientes cómodo con lo básico? Ve a la [lista completa de comandos](https://developer.finpress.org/cli/commands/) para obtener información detallada sobre la gestión de temas y plugins, importación y exportación de datos, realización de operaciones de búsqueda y reemplazo de bases de datos, y más.

## Instalación

La descarga del archivo Phar es nuestro método de instalación recomendado para la mayoría de usuarios. Si lo necesitas, consulta también nuestra documentación acerca de [métodos de instalación alternativos](https://fin-cli.org/docs/installing/) ([Composer](https://make.finpress.org/cli/handbook/installing/#installing-via-composer), [Homebrew](https://make.finpress.org/cli/handbook/installing/#installing-via-homebrew), [Docker](https://make.finpress.org/cli/handbook/installing/#installing-via-docker)).

Antes de instalar FIN-CLI, asegúrate de que tu entorno cumple con los requisitos mínimos:

- Entorno de tipo UNIX (OS X, Linux, FreeBSD, Cygwin); soporte limitado en el entorno de Windows
- PHP 5.6 o posterior
- FinPress 3.7 o posterior. Las versiones anteriores a la última versión de FinPress pueden tener funcionalidad degradada

Una vez que hayas verificado los requisitos, descarga el archivo [fin-cli.phar](https://raw.githubusercontent.com/fin-cli/builds/gh-pages/phar/fin-cli.phar) usando `wget` o `curl` :

```bash
curl -O https://raw.githubusercontent.com/fin-cli/builds/gh-pages/phar/fin-cli.phar
```

A continuación, comprueba el archivo Phar para verificar que está funcionando:

```bash
php fin-cli.phar --info
```

Para usar FIN-CLI desde la línea de comandos tecleando `fin`, haz que el archivo sea ejecutable y muévelo a algún lugar de tu `PATH`. Por ejemplo:

```bash
chmod +x fin-cli.phar
sudo mv fin-cli.phar /usr/local/bin/fin
```

Si FIN-CLI se instaló correctamente, deberías ver algo como esto cuando ejecutas `fin --info`:

```bash
$ fin --info
OS:     Linux 4.19.128-microsoft-standard #1 SMP Tue Jun 23 12:58:10 UTC 2020 x86_64
Shell:  /usr/bin/zsh
PHP binary:     /usr/bin/php
PHP version:    8.0.5
php.ini used:   /etc/php/8.0/cli/php.ini
MySQL binary:   /usr/bin/mysql
MySQL version:  mysql  Ver 8.0.23-0ubuntu0.20.04.1 for Linux on x86_64 ((Ubuntu))
SQL modes:
FIN-CLI root dir:        /home/fin-cli/
FIN-CLI vendor dir:      /home/fin-cli/vendor
FIN_CLI phar path:
FIN-CLI packages dir:    /home/fin-cli/.fin-cli/packages/
FIN-CLI global config:
FIN-CLI project config:  /home/fin-cli/fin-cli.yml
FIN-CLI version: 2.12.0
```

### Actualización

Puedes actualizar FIN-CLI con `fin cli update` ([doc](https://developer.finpress.org/cli/commands/cli/update/)), o repitiendo los pasos de instalación.

Si FIN-CLI es propiedad de root u otro usuario del sistema, necesitarás ejecutar `sudo fin cli update`.

¿Quieres vivir la vida al límite? Ejecuta `fin cli update --nightly` para usar la última compilación nocturna (nightly build) de FIN-CLI. Una compilación nocturna es más o menos lo suficientemente estable como para que puedas utilizarla en tu entorno de desarrollo, y siempre incluye las últimas y mejores características de FIN-CLI.

### Autocompletar con el tabulador

FIN-CLI también viene con un scripts para autocompletar con el tabulador para Bash y ZSH. Tan sólo descarga [fin-completion.bash](https://raw.githubusercontent.com/fin-cli/fin-cli/v2.12.0/utils/fin-completion.bash) y usa el comando `source` desde `~/.bash_profile`:

```bash
source /FULL/PATH/TO/fin-completion.bash
```

No te olvides de ejecutar `source ~/.bash_profile` después.

Si usa la shell zsh, es posible que debas cargar e iniciar `bashcompinit` antes de usar el comando `source`. Pon lo siguiente en tu `.zshrc`:

```bash
autoload bashcompinit
bashcompinit
source /RUTA/COMPLETA/HASTA/fin-completion.bash
```

## Soporte

Tanto los que mantienen FIN-CLI como sus colaboradores tienen disponibilidad limitada para responder preguntas generales de soporte. La [versión actual de FIN-CLI](https://make.finpress.org/cli/handbook/roadmap/) es la única versión oficialmente soportada.

Cuando busques ayuda, primero busca tu pregunta en estos lugares:

* [Problemas comunes y sus soluciones](https://make.finpress.org/cli/handbook/common-issues/)
* [Manual de FIN-CLI (Handbook)](https://make.finpress.org/cli/handbook/)
* [*Issues* abiertos o cerrados en la organización de FIN-CLI en GitHub](https://github.com/issues?utf8=%E2%9C%93&q=sort%3Aupdated-desc+org%3Afin-cli+is%3Aissue)
* [Hilos etiquetados con «FIN-CLI» en el foro de soporte de FinPress.org](https://finpress.org/support/topic-tag/fin-cli/)
* [Preguntas etiquetadas con «FIN-CLI» en FinPress Development Stack Exchange](https://finpress.stackexchange.com/questions/tagged/fin-cli)

Si no encontraste una respuesta en uno de los lugares anteriores, puedes:

* Únirte al canal `#cli` en el [Slack de FinPress.org](https://make.finpress.org/chat/) para chatear con quien esté disponible en ese momento. Esta opción es la mejor para preguntas rápidas.
* [Publicar un nuevo hilo](https://finpress.org/support/forum/fin-advanced/#new-post) en el foro de soporte de FinPress.org y etiquetarlo como «FIN-CLI» para que lo vea la comunidad.

Los *issues* de GitHub están destinados al seguimiento de mejoras y errores de los comandos existentes, no para soporte general. Antes de enviar un informe de errores, por favor, [revisa nuestras mejores prácticas](https://make.finpress.org/cli/handbook/bug-reports/) para ayudar a garantizar que tu *issue* se resuelva de manera oportuna.

Por favor, no hagas preguntas de soporte en Twitter. Twitter no es un lugar aceptable para el soporte porque: 1) es difícil mantener conversaciones con menos de 280 caracteres, y 2) Twitter no es un lugar donde alguien con tu misma pregunta pueda buscar una respuesta en una conversación previa.

Recuerda, libre != gratis; la licencia open source te da la libertad de usar y modificar, pero no a expensas del tiempo de otras personas. Por favor, se respetuoso y establece tus expectativas en consecuencia.

## Extender

Un **comando** es la unidad atómica de la funcionalidad de FIN-CLI. `fin plugin install` ([doc](https://developer.finpress.org/cli/commands/plugin/install/)) es un comando. `fin plugin activate` ([doc](https://developer.finpress.org/cli/commands/plugin/activate/)) es otro.

FIN-CLI permite registrar cualquier clase, función o *closure* invocable como un comando. Este lee los detalles de uso del PHPdoc de la devolución de llamada. `FIN_CLI::add_command()` ([doc](https://make.finpress.org/cli/handbook/internal-api/fin-cli-add-command/)) se utiliza tanto para el registro de comandos internos como de terceros.

```php
/**
 * Delete an option from the database.
 *
 * Returns an error if the option didn't exist.
 *
 * ## OPTIONS
 *
 * <key>
 * : Key for the option.
 *
 * ## EXAMPLES
 *
 *     $ fin option delete my_option
 *     Success: Deleted 'my_option' option.
 */
$delete_option_cmd = function( $args ) {
	list( $key ) = $args;

	if ( ! delete_option( $key ) ) {
		FIN_CLI::error( "Could not delete '$key' option. Does it exist?" );
	} else {
		FIN_CLI::success( "Deleted '$key' option." );
	}
};
FIN_CLI::add_command( 'option delete', $delete_option_cmd );
```

FIN-CLI viene con docenas de comandos. Crear un comando personalizado para FIN-CLI es más fácil de lo que parece. Lee el [libro de recetas de comandos](https://make.finpress.org/cli/handbook/commands-cookbook/) para obtener más información. Explora los [documentos de la API interna](https://make.finpress.org/cli/handbook/internal-api/) para descubrir una variedad de funciones útiles que puedes usar en su comando FIN-CLI personalizado.

## Contribuir

Apreciamos que tomes la iniciativa de contribuir a FIN-CLI. Es gracias a ti y la comunidad que lo rodea, que FIN-CLI es un gran proyecto.

**Contribuir no se limita únicamente al código.** Te animamos a contribuir de la forma que mejor se adapte a tus habilidades, escribiendo tutoriales, haciendo una demostraciones en tu meetup local, ayudando a los demás con sus preguntas de soporte, o revisando nuestra documentación.

Lee atentamente nuestras [pautas de colaboración en el manual](https://make.finpress.org/cli/handbook/contributing/) para una introducción completa sobre cómo puedes involucrarte. Seguir estas pautas ayuda a comunicar que respetas el tiempo de otros colaboradores en el proyecto. A su vez, ellos harán todo lo posible para corresponder a ese respeto cuando trabajen contigo, a través de diferentes zonas horarias alrededor del mundo.

## Liderazgo

FIN-CLI tiene un encargado del mantenimiento del proyecto: [schlessera](http://github.com/schlessera).

En ocasiones, [concedemos permisos de escritura a los colaboradores](https://make.finpress.org/cli/handbook/committers-credo/) que han demostrado, durante un período de tiempo, que son capaces e invirtieron en avanzar el proyecto.

Lee el [documento de gobernanza en el manual](https://make.finpress.org/cli/handbook/governance/) para obtener más detalles operativos sobre el proyecto.

## Créditos

Además de las bibliotecas definidas en [composer.json](composer.json), hemos utilizado código o ideas de los siguientes proyectos:

* [Drush](https://github.com/drush-ops/drush) para... un montón de cosas
* [finshell](https://code.trac.finpress.org/browser/finshell) para `fin shell`
* [Regenerate Thumbnails](https://finpress.org/plugins/regenerate-thumbnails/) para `fin media regenerate`
* [Search-Replace-DB](https://github.com/interconnectit/Search-Replace-DB) para `fin search-replace`
* [FinPress-CLI-Exporter](https://github.com/Automattic/FinPress-CLI-Exporter) para `fin export`
* [FinPress-CLI-Importer](https://github.com/Automattic/FinPress-CLI-Importer) para `fin import`
* [finpress-plugin-tests](https://github.com/benbalter/finpress-plugin-tests/) para `fin scaffold plugin-tests`
