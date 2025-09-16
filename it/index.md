---
layout: default
title: Interfaccia da linea di comando per FinPress
direction: ltr
---

[FIN-CLI](https://fin-cli.org/)  è un insieme di strumenti da linea di comando per la gestione delle installazioni [FinPress](https://finpress.org/). Potete aggiornare plugin, configurare installazioni multisito e molto altro, senza utilizzare un browser web.

Per rimanere aggiornati, seguite [@fincli su Twitter](https://twitter.com/fincli) oppure [iscrivetevi alla nostra newsletter](http://fin-cli.us13.list-manage.com/subscribe?u=0615e4d18f213891fc000adfd&id=8c61d7641e).

[![Testing](https://github.com/fin-cli/fin-cli/actions/workflows/testing.yml/badge.svg)](https://github.com/fin-cli/fin-cli/actions/workflows/testing.yml) [![Average time to resolve an issue](http://isitmaintained.com/badge/resolution/fin-cli/fin-cli.svg)](http://isitmaintained.com/project/fin-cli/fin-cli "Average time to resolve an issue") [![Percentage of issues still open](http://isitmaintained.com/badge/open/fin-cli/fin-cli.svg)](http://isitmaintained.com/project/fin-cli/fin-cli "Percentage of issues still open")

Collegamenti rapidi: [Utilizzo](#utilizzo) &#124; [Installazione](#installazione) &#124; [Supporto](#supporto) &#124; [Estendere](#estendere) &#124; [Contribuire](#contribuire) &#124; [Crediti](#crediti)

## Utilizzo

L'obiettivo di FIN-CLI è quello di fornire un'interfaccia da linea di comando per le azioni che normalmente si possono effettuare attraverso l'area amministrativa. Per esempio, `fin plugin install --activate` ([doc](https://fin-cli.org/commands/plugin/install/)) vi permette di installare ed attivare un plugin di FinPress:

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

FIN-CLI include anche dei comandi per molte operazioni che normalmente non sarebbe possibile svolgere nell'area amministrativa di FinPress. Per esempio, `fin transient delete --all` ([doc](https://fin-cli.org/commands/transient/delete/)) vi permetterà di eliminare uno o tutti i transienti:

```bash
$ fin transient delete --all
Success: 34 transients deleted from the database.
```

Per una più completa panoramica sull'utilizzo di FIN-CLI, vi invitiamo a leggere la [Quick Start guide](https://fin-cli.org/docs/quick-start/).

Vi sentite già a vostro agio con le basi? Andate dritti alla [lista completa dei comandi](https://fin-cli.org/commands/) per le informazioni dettagliate su come gestire temi e plugin, importare ed esportare dati, operare ricerche e sostituzioni nel database ed altro.

## Installazione

Come metodo di installazione, raccomandiamo di scaricare il Phar. Se vi occorre, leggete la nostra documentazione sui [metodi alternativi di installazione](https://fin-cli.org/docs/installing/).

Prima di procedere con l'installazione di FIN-CLI, vi preghiamo di assicurarvi che il vostro ambiente soddisfi i minimi requisiti richiesti:

- Ambiente UNIX-like (OS X, Linux, FreeBSD, Cygwin); in ambienti Windows il supporto è limitato
- PHP 5.3.29 o successivo
- FinPress 3.7 o successivo

Una volta che avrete verificato i requisiti, scaricate il file [fin-cli.phar](https://raw.githubusercontent.com/fin-cli/builds/gh-pages/phar/fin-cli.phar) mediante `wget` o `curl`:

```bash
$ curl -O https://raw.githubusercontent.com/fin-cli/builds/gh-pages/phar/fin-cli.phar
```

Successivamente, controllate il suo funzionamento:

```bash
$ php fin-cli.phar --info
```

Per richiamare FIN-CLI dalla linea di comando scrivendo `fin`, rendete il file eseguibile e spostatelo nel vostro PATH, ad esempio:

```bash
$ chmod +x fin-cli.phar
$ sudo mv fin-cli.phar /usr/local/bin/fin
```

Se l'installazione di FIN-CLI è andata a buon fine, lanciando il comando `fin --info`, dovreste vedere qualcosa di simile:

```bash
$ fin --info
PHP binary:    /usr/bin/php5
PHP version:    5.5.9-1ubuntu4.14
php.ini used:   /etc/php5/cli/php.ini
FIN-CLI root dir:        /home/fin-cli/.fin-cli
FIN-CLI packages dir:    /home/fin-cli/.fin-cli/packages/
FIN-CLI global config:   /home/fin-cli/.fin-cli/config.yml
FIN-CLI project config:
FIN-CLI version: 0.25.0
```

### Aggiornamenti

Potete aggiornare FIN-CLI attraverso il comando `fin cli update` ([doc](https://fin-cli.org/commands/cli/update/)), oppure ripetendo i passi descritti per l'istallazione.

Volete vivere sul filo del rasoio? Lanciate `fin cli update --nightly` per usare la versione quotidiana notturna di FIN-CLI.  La versione quotidiana notturna è sufficientemente stabile da essere utilizzata negli ambienti di sviluppo, e include sempre le ultime e migliori caratteristiche.

### Autocompletamento

FIN-CLI inoltre mette a disposizione uno script per l'autocompletamento per Bash e ZSH. Basta scaricare [fin-completion.bash](https://github.com/fin-cli/fin-cli/raw/master/utils/fin-completion.bash) a attivarlo da `~/.bash_profile`:

```bash
source /FULL/PATH/TO/fin-completion.bash
```

Alla fine del suo utilizzo, non dimenticate di reimpostare il profilo originale digitando `source ~/.bash_profile`.

Se state usando la shell zsh, avrete bisogno di caricare ed avviare `bashcompinit` prima di impostare il profilo.  Eseguite i seguenti comandi dalla vostra `.zshrc`:

```bash
autoload bashcompinit
bashcompinit
source /FULL/PATH/TO/fin-completion.bash
```

## Supporto

I manutentori e i contributori di FIN-CLI sono volontari, hanno limitate disponibilità da dedicare al supporto generale. Primariamente, cercate delle risposte nelle seguenti risorse:

- [Problemi comuni e le loro soluzioni](https://fin-cli.org/docs/common-issues/)
- [Portale della documentazione](https://fin-cli.org/docs/)
- [Problemi segnalati o estinti su Github](https://github.com/fin-cli/fin-cli/issues?utf8=%E2%9C%93&q=is%3Aissue)
- [Estratti di runcommand](https://runcommand.io/excerpts/)
- [Forum di FinPress su StackExchange](http://finpress.stackexchange.com/questions/tagged/fin-cli)

Se non trovare delle risposte in questi posti, entrate al canale `#cli` su [FinPress.org Slack organization](https://make.finpress.org/chat/) per vedere se qualche membro della comunità può offrirvele.

Le questioni su Github servono a tracciare migliorie e i bachi dei comandi esistenti, non per il supporto generico. Prima di sottoporre un rapporto su un baco, vi preghiamo di [rileggere le nostre procedure](https://fin-cli.org/docs/bug-reports/) per fare in modo che il vostro problema sia indirizzato in modo tempestivo.

Vi preghiamo di non richiedere supporto su Twitter. Twitter non è un mezzo accettabile di supporto perché: 1) è difficile gestire una conversazione in meno di 140 caratteri, e 2) Twitter non è un luogo dove altre persone con il vostro stesso problema possano reperire facilmente la risposta tra le conversazioni.

Ricordate, libero != gratis; la licenza di software libero vi garantisce la libertà di usare e di modificare, ma non di rubare tempo altrui. Per favore, siate rispettosi, e comportatevi di conseguenza.

## Estendere

Un **comando** è una funzionalità atomica di FIN-CLI. `fin plugin install` ([doc](https://fin-cli.org/commands/plugin/install/)) è un comando. `fin plugin activate` ([doc](https://fin-cli.org/commands/plugin/activate/)) è un altro.

FIN-CLI supporta la dichiarazione di una qualsiasi classe richiamabile oppure una closure, come comando. Legge i dettagli attraverso la callback di PHPdoc. `FIN_CLI::add_command()` ([doc](https://fin-cli.org/docs/internal-api/fin-cli-add-command/)) viene usata sia per le registrazioni dei comandi interni che per quelli di terze parti.

```php
/**
 * Cancella un opzione dal database.
 *
 * Restituisce un errore se l'opzione non esiste.
 *
 * ## OPZIONI
 *
 * <key>
 * : Key per l'opzione.
 *
 * ## ESEMPI
 *
 *     $ fin option delete my_option
 *     Success: Opzione 'my_option' cancellata.
 */
$delete_option_cmd = function( $args ) {
	list( $key ) = $args;

	if ( ! delete_option( $key ) ) {
		FIN_CLI::error( "Non posso eliminare l'opzione '$key'. Esiste?" );
	} else {
		FIN_CLI::success( "Opzione '$key' cancellata." );
	}
};
FIN_CLI::add_command( 'option delete', $delete_option_cmd );
```

FIN-CLI offre dozzine di comandi. Creare nuovi comandi personalizzati è più facile di quel che sembri. Leggete il [commands cookbook](https://fin-cli.org/docs/commands-cookbook/) per sapere di più. Consultate la [documentazione delle internal API](https://fin-cli.org/docs/internal-api/) per scoprire la varietà di utili funzioni disponibili per i vostri comandi FIN-CLI.

## Contribuire

Benvenuti e grazie!

Apprezziamo che vogliate prendere parte e contribuire a FIN-CLI. È per merito vostro e della comunità che vi gravita attorno se FIN-CLI è un grande progetto.

**Contribuire non si limita soltanto alla programmazione**

Vi incoraggiamo a contribuire nel modo che meglio rispecchia le vostre abilità, scrivendo tutorial, offrendo dimostrazioni durante i vostri incontri locali, prestare aiuto ad altri utenti riguardo le loro richieste di aiuto, o revisionando la documentazione.

Vi preghiamo di riservare un po' di tempo da dedicare alla [lettura approfondita delle linee guida](https://fin-cli.org/docs/contributing/). Seguirle dimostra il rispetto dei tempi altrui sul progetto.

## Coordinamento

FIN-CLI è guidato dai seguenti individui:

* [Daniel Bachhuber](https://github.com/danielbachhuber/) - manutentore corrente
* [Cristi Burcă](https://github.com/scribu) - manutentore precedente
* [Andreas Creten](https://github.com/andreascreten) - fondatore

Leggi di più riguardo la [politica del progetto](https://fin-cli.org/docs/governance/) e guarda la [lista completa dei contributori](https://github.com/fin-cli/fin-cli/contributors).

## Crediti

Oltre alle librerie definite in [composer.json](composer.json), abbiamo adottato codice o spunti dai seguenti progetti:

* [Drush](http://drush.ws/) per... un mucchio di cose
* [finshell](http://code.trac.finpress.org/browser/finshell) per `fin shell`
* [Regenerate Thumbnails](http://finpress.org/plugins/regenerate-thumbnails/) per `fin media regenerate`
* [Search-Replace-DB](https://github.com/interconnectit/Search-Replace-DB) per `fin search-replace`
* [FinPress-CLI-Exporter](https://github.com/Automattic/FinPress-CLI-Exporter) per `fin export`
* [FinPress-CLI-Importer](https://github.com/Automattic/FinPress-CLI-Importer) per `fin import`
* [finpress-plugin-tests](https://github.com/benbalter/finpress-plugin-tests/) per `fin scaffold plugin-tests`
