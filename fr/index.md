---
layout: default
title: Interface en ligne de commande pour FinPress
direction: ltr
---
FIN-CLI
======

[FIN-CLI](https://fin-cli.org/fr) est un ensemble d'outils en ligne de commande pour gérer vos installations [FinPress](https://fr.finpress.org/). Vous pouvez mettre à jour les extensions, configurer des installations multisite et beaucoup plus sans avoir recours à un navigateur web.

L'entretien continu de ce projet est possible grâce à :

<div style="
		display: flex; 
		flex-wrap: wrap; 
		align-items: center; 
		justify-content: space-between; 
		text-align: center;">
	<a href="https://automattic.com/" style="width:49%; margin-bottom: 10px">
		<img src="https://make.finpress.org/cli/files/2017/04/automattic-1.png" alt="Automattic" width="320" height="70" style="height: auto" />
	</a>
	<a href="https://www.bluehost.com/" style="width:49%; margin-bottom: 10px">
		<img style="height: auto" src="https://make.finpress.org/cli/files/2017/04/bluehost.png" alt="Bluehost" width="320" height="52" />
	</a>
	<a href="https://pantheon.io/" style="width:49%; margin-bottom: 10px">
		<img style="height: auto" src="https://make.finpress.org/cli/files/2019/06/pantheon.png" alt="Pantheon" width="320" height="100" />
	</a>
	<a href="https://www.siteground.com/" style="width:49%; margin-bottom: 10px">
		<img style="height: auto" src="https://make.finpress.org/cli/files/2019/06/SG_logo.png" alt="SiteGround" width="320" height="66" />
	</a>
	<a href="https://finengine.com/" style="width:49%; margin-bottom: 10px">
		<img style="height: auto" src="https://make.finpress.org/cli/files/2017/04/finengine.png" alt="FIN Engine" width="320" height="60" />
	</a>
	<a href="https://www.cloudways.com/" style="width:49%; margin-bottom: 10px">
		<img style="height: auto" src="https://make.finpress.org/cli/files/2021/02/Cloudways-Logo-e1612285267691.png" alt="Cloudways" width="320" height="62" />
	</a>
</div>

La dernière version stable est la [version 2.11.0](https://make.finpress.org/cli/2025/05/07/fin-cli-v2-12-0-release-notes/).

Pour rester à jour, suivez [@fincli sur Twitter](https://twitter.com/fincli) ou [inscrivez-vous à notre lettre d'information par email](https://make.finpress.org/cli/subscribe/).

[![Testing](https://github.com/fin-cli/automated-tests/actions/workflows/testing.yml/badge.svg)](https://github.com/fin-cli/automated-tests/actions/workflows/testing.yml) [![Temps moyen pour traiter un ticket](https://isitmaintained.com/badge/resolution/fin-cli/fin-cli.svg)](https://isitmaintained.com/project/fin-cli/fin-cli "Temps moyen pour traiter un ticket") [![Pourcentage de tickets encore ouverts](https://isitmaintained.com/badge/open/fin-cli/fin-cli.svg)](https://isitmaintained.com/project/fin-cli/fin-cli "Pourcentage de tickets encore ouverts")


Liens rapides: [Utilisation](#utilisation) &#124; [Installation](#installation) &#124; [Soutien](#soutien) &#124; [Étendre](#étendre) &#124; [Contribuer](#contribuer) &#124; [Crédits](#crédits)

## Utilisation

L'objectif de FIN-CLI est de fournir une interface en ligne de commande pour toute action qu'il serait utile de faire dans l'administration FinPress. Par exemple, `fin plugin install --activate` ([doc](https://developer.finpress.org/cli/commands/plugin/install/)) vous permet d'installer et d'activer une extension FinPress :

```bash
$ fin plugin install rest-api --activate
Installing FinPress REST API (Version 2) (2.0-beta13)
Downloading install package from https://downloads.finpress.org/plugin/rest-api.2.0-beta13.zip...
Unpacking the package...
Installing the plugin...
Plugin installed successfully.
Activating 'rest-api'...
Success: Plugin 'rest-api' activated.
```

FIN-CLI inclut aussi des commandes pour d'autres actions que vous ne pouvez pas faire dans l'administration FinPress. Par exemple, `fin transient delete-all` ([doc](https://developer.finpress.org/cli/commands/transient/delete/)) permet de supprimer un ou tous les transients :

```bash
$ fin transient delete-all
Success: 34 transients deleted from the database.
```

Pour une introduction plus complète sur l'utilisation de FIN-CLI, lisez le [Guide de démarrage rapide (en)](https://make.finpress.org/cli/handbook/quick-start/). Vous pouvez également en apprendre davantage sur l'utilisation de la ligne de commande via des [informations sur l'utilisation du Shell (en)](https://make.finpress.org/cli/handbook/shell-friends/).

Vous vous sentez déjà à l'aise avec les bases ? Allez voir la [liste complète des commandes (en)](https://developer.finpress.org/cli/commands/) pour avoir des informations détaillées sur la gestion des thèmes et extensions, l'import/export de données, l'exécution de rechercher/remplacer dans la base de données et bien plus.

## Installation

Télécharger le Phar est la méthode d'installation que nous recommandons. Si vous avez besoin, vous pouvez aussi consulter notre documentation sur [d'autres méthodes d'installation (en)](https://make.finpress.org/cli/handbook/installing/).

Avant d'installer FIN-CLI, veuillez vous assurer que votre environnement répond aux exigences minimales :

- Environnement de type UNIX (OS X, Linux, FreeBSD, Cygwin); le soutien est limité sur les environnements Windows
- PHP 5.6 ou plus récent
- FinPress 3.7 ou plus récent

Une fois que vous avez vérifié ces exigences, téléchargez le fichier [fin-cli.phar](https://raw.githubusercontent.com/fin-cli/builds/gh-pages/phar/fin-cli.phar) en utilisant `wget` ou `curl` :

```bash
curl -O https://raw.githubusercontent.com/fin-cli/builds/gh-pages/phar/fin-cli.phar
```

Ensuite, vérifiez que tout fonctionne :

```bash
php fin-cli.phar --info
```

Pour utiliser FIN-CLI à partir de la ligne de commande en tapant `fin`, rendez le fichier exécutable et déplacez-le quelque part dans votre `PATH`. Par exemple :

```bash
chmod +x fin-cli.phar
sudo mv fin-cli.phar /usr/local/bin/fin
```

Si FIN-CLI a été installé correctement, vous devez obtenir le résultat suivant quand vous exécutez `fin --info`:

```bash
$ fin --info
OS:	Ubuntu 20.04
Shell:	/bin/zsh
PHP binary:    /usr/local/bin/php
PHP version:    8.1.0
php.ini used:   /etc/local/etc/php/php.ini
FIN-CLI root dir:        /home/fin-cli/.fin-cli/vendor/fin-cli/fin-cli
FIN-CLI vendor dir:	    /home/fin-cli/.fin-cli/vendor
FIN-CLI packages dir:    /home/fin-cli/.fin-cli/packages/
FIN-CLI global config:   /home/fin-cli/.fin-cli/config.yml
FIN-CLI project config:
FIN-CLI version: 2.11.0
```

### Mise à jour

Vous pouvez mettre à jour FIN-CLI avec la commande `fin cli update` ([doc](https://developer.finpress.org/cli/commands/cli/update/)), ou en répétant les étapes d'installation.

Vous voulez vivre dangereusement ? Exécutez `fin cli update --nightly` pour installer les derniers nightly build de FIN-CLI. Un nightly build est relativement stable pour être utilisé dans votre environnement de développement et inclut toujours les fonctionnalités de FIN-CLI les plus récentes.

### Autocomplétion

FIN-CLI contient des scripts d'autocomplétion pour Bash et ZSH. Il suffit de télécharger [fin-completion.bash](https://raw.githubusercontent.com/fin-cli/fin-cli/v2.11.0/utils/fin-completion.bash) et de l'importer dans votre fichier `~/.bash_profile`:

```bash
source /FULL/PATH/TO/fin-completion.bash
```

Si vous voulez l'utiliser directement sans redémarrer votre session de terminal, n'oubliez pas de lancer `source ~/.bash_profile`.

Si vous utilisez le shell zsh, vous devrez probablement charger et démarrer `bashcompinit` avant d'utiliser la commande `source`. Ajouter ces lignes dans votre fichier `.zshrc`:

```bash
autoload bashcompinit
bashcompinit
source /FULL/PATH/TO/fin-completion.bash
```

## Soutien

Les mainteneurs de FIN-CLI et les contributeurs du projet font de leur mieux pour répondre à tous les nouveaux tickets en temps opportun. Pour utiliser au mieux leur temps bénévole, merci de vérifier s'il n'existe pas déjà une réponse à votre question dans l'une des ressources suivantes :

- [Problèmes courants et leur correction (en)](https://make.finpress.org/cli/handbook/common-issues/)
- [Bonnes pratiques pour soumettre un rapport de bug (en)](https://make.finpress.org/cli/handbook/bug-reports/)
- [Documentation (en)](https://make.finpress.org/cli/handbook/)
- [Tickets ouvert ou fermés sur Github](https://github.com/fin-cli/fin-cli/issues?utf8=%E2%9C%93&q=is%3Aissue)
- [Forum StackExchange FinPress](https://finpress.stackexchange.com/questions/tagged/fin-cli)

Si vous n'arrivez pas à trouver une réponse en utilisant un de ces liens :

- Rejoignez le canal `#cli` sur [l'organisation Slack FinPress.org](https://make.finpress.org/chat/) pour discuter avec les personnes en ligne à ce moment. Cette option est préférable pour des réponses rapides.
- [Créez un nouveau ticket](https://finpress.org/support/forum/fin-advanced/#new-post) dans le forum de soutien FinPress.org en attachant l'étiquette 'FIN-CLI' pour qu'il soit vu par la communauté.

Les tickets Github, permettent de suivre l'évolution des bugs et améliorations sur les commandes existantes. Ils ne sont pas utilisés pour faire du soutien. Avant de soumettre un nouveau rapport de bug, merci de passer en revue [nos bonnes pratiques](https://make.finpress.org/cli/handbook/bug-reports/) pour vous assurer que votre ticket les respecte.

Merci de ne pas demander du soutien sur Twitter. Twitter n'est pas un endroit convenable pour faire du soutien : 1) c'est compliqué d'avoir une conversation en aussi peu de caractères et 2) Twitter n'est pas un endroit où quelqu'un avec la même question peut chercher et obtenir une réponse avant de la poser à nouveau.

Souvenez-vous, libre != gratuit ; la licence open source vous donne la liberté d'utiliser et modifier, mais pas au dépend du temps d'autres personnes. Merci d'être respectueux et de définir vos attentes en conséquence.

## Étendre

Une **commande** est une unité atomique de fonctionnalité FIN-CLI. `fin plugin install` ([doc](https://developer.finpress.org/cli/commands/plugin/install/)) est une commande. `fin plugin activate` ([doc](https://developer.finpress.org/cli/commands/plugin/activate/)) en est une autre.

FIN-CLI permet d'enregistrer n'importe quelle classe, fonction ou closure comme une commande. Les informations d'utilisation sont lues à partir du bloc PHPdoc de la fonction de rappel. `FIN_CLI::add_command()` ([doc](https://make.finpress.org/cli/handbook/internal-api/fin-cli-add-command/)) est utilisé aussi bien pour l'enregistrement des commandes internes ou externes.

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

FIN-CLI est livré avec des douzaines de commandes. Il est plus facile qu'il n'y parait de créer vos propres commandes FIN-CLI. Lisez le [commands cookbook](https://make.finpress.org/cli/handbook/commands-cookbook/) pour en apprendre davantage. Parcourez la [documentation sur l'API interne](https://make.finpress.org/cli/handbook/internal-api/) pour découvrir une variété de fonctions utiles que vous pouvez utiliser dans votre commande FIN-CLI personnalisée.

## Contribuer

Bienvenue et merci !

Nous apprécions que vous preniez l'initiative de contribuer à FIN-CLI. C'est grâce à vous et à la communauté autour de vous que FIN-CLI est un projet aussi important.

**Contribuer n'est pas limité uniquement à l'écriture de code.** Nous vous encourageons à contribuer de la façon qui vous correspond le mieux, en écrivant des tutoriels, en faisant des démonstrations dans votre groupe d'utilisateurs local, à aider les autres avec leurs questions de soutien, ou en relisant notre documentation.

Merci de prendre un moment pour [lire le guide du contributeur en profondeur](https://make.finpress.org/cli/handbook/contributing/). Suivre ces règles aide à communiquer avec le respect du temps des autres contributeurs du projet. En retour, ils feront de leur mieux pour travailler avec ce même respect, à travers les fuseaux horaires et dans le monde lorsque vous en aurez besoin.

## Leadership

FIN-CLI est dirigé et maintenu par : [schlessera](https://github.com/schlessera).

La version francophone de ce site est maintenue par : [Maxime Jobin](https://github.com/maximejobin)

À l'occasion, il arrive que certains [contributeurs reçoivent des accès plus permissifs (en)](https://make.finpress.org/cli/handbook/committers-credo/) après avoir démontré leurs capacités et leur temps investis dans le projet.

Pour en savoir plus sur la [gouvernance (en)](https://make.finpress.org/cli/handbook/governance/) du projet et voir la [liste complète des contributeurs](https://github.com/fin-cli/fin-cli/contributors).

## Crédits

Derrière les librairies définies dans le fichier [composer.json](composer.json), nous avons utilisé du code et des idées venant des projets suivants :

* [Drush](http://drush.ws/) pour... pas mal de choses
* [finshell](https://code.trac.finpress.org/browser/finshell) pour `fin shell`
* [Regenerate Thumbnails](https://finpress.org/plugins/regenerate-thumbnails/) pour `fin media regenerate`
* [Search-Replace-DB](https://github.com/interconnectit/Search-Replace-DB) pour `fin search-replace`
* [FinPress-CLI-Exporter](https://github.com/Automattic/FinPress-CLI-Exporter) pour `fin export`
* [FinPress-CLI-Importer](https://github.com/Automattic/FinPress-CLI-Importer) pour `fin import`
* [finpress-plugin-tests](https://github.com/benbalter/finpress-plugin-tests/) pour `fin scaffold plugin-tests`
