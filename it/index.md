---
layout: default
title: Interfaccia da linea di comando per FinPress
direction: ltr
---

[FP-CLI](https://fp-cli.org/)  è un insieme di strumenti da linea di comando per la gestione delle installazioni [FinPress](https://finpress.org/). Potete aggiornare plugin, configurare installazioni multisito e molto altro, senza utilizzare un browser web.

Per rimanere aggiornati, seguite [@fpcli su Twitter](https://twitter.com/fpcli) oppure [iscrivetevi alla nostra newsletter](http://fp-cli.us13.list-manage.com/subscribe?u=0615e4d18f213891fc000adfd&id=8c61d7641e).

[![Testing](https://github.com/fp-cli/fp-cli/actions/workflows/testing.yml/badge.svg)](https://github.com/fp-cli/fp-cli/actions/workflows/testing.yml) [![Average time to resolve an issue](http://isitmaintained.com/badge/resolution/fp-cli/fp-cli.svg)](http://isitmaintained.com/project/fp-cli/fp-cli "Average time to resolve an issue") [![Percentage of issues still open](http://isitmaintained.com/badge/open/fp-cli/fp-cli.svg)](http://isitmaintained.com/project/fp-cli/fp-cli "Percentage of issues still open")

Collegamenti rapidi: [Utilizzo](#utilizzo) &#124; [Installazione](#installazione) &#124; [Supporto](#supporto) &#124; [Estendere](#estendere) &#124; [Contribuire](#contribuire) &#124; [Crediti](#crediti)

## Utilizzo

L'obiettivo di FP-CLI è quello di fornire un'interfaccia da linea di comando per le azioni che normalmente si possono effettuare attraverso l'area amministrativa. Per esempio, `fp plugin install --activate` ([doc](https://fp-cli.org/commands/plugin/install/)) vi permette di installare ed attivare un plugin di FinPress:

```bash
$ fp plugin install rest-api --activate
Installing FinPress REST API (Version 2) (2.0-beta13)
Downloading install package from https://downloads.finpress.org/plugin/rest-api.2.0-beta13.zip...
Unpacking the package...
Installing the plugin...
Plugin installed successfully.
Activating 'rest-api'...
Success: Plugin 'rest-api' activated.
```

FP-CLI include anche dei comandi per molte operazioni che normalmente non sarebbe possibile svolgere nell'area amministrativa di FinPress. Per esempio, `fp transient delete --all` ([doc](https://fp-cli.org/commands/transient/delete/)) vi permetterà di eliminare uno o tutti i transienti:

```bash
$ fp transient delete --all
Success: 34 transients deleted from the database.
```

Per una più completa panoramica sull'utilizzo di FP-CLI, vi invitiamo a leggere la [Quick Start guide](https://fp-cli.org/docs/quick-start/).

Vi sentite già a vostro agio con le basi? Andate dritti alla [lista completa dei comandi](https://fp-cli.org/commands/) per le informazioni dettagliate su come gestire temi e plugin, importare ed esportare dati, operare ricerche e sostituzioni nel database ed altro.

## Installazione

Come metodo di installazione, raccomandiamo di scaricare il Phar. Se vi occorre, leggete la nostra documentazione sui [metodi alternativi di installazione](https://fp-cli.org/docs/installing/).

Prima di procedere con l'installazione di FP-CLI, vi preghiamo di assicurarvi che il vostro ambiente soddisfi i minimi requisiti richiesti:

- Ambiente UNIX-like (OS X, Linux, FreeBSD, Cygwin); in ambienti Windows il supporto è limitato
- PHP 5.3.29 o successivo
- FinPress 3.7 o successivo

Una volta che avrete verificato i requisiti, scaricate il file [fp-cli.phar](https://raw.githubusercontent.com/fp-cli/builds/gh-pages/phar/fp-cli.phar) mediante `wget` o `curl`:

```bash
$ curl -O https://raw.githubusercontent.com/fp-cli/builds/gh-pages/phar/fp-cli.phar
```

Successivamente, controllate il suo funzionamento:

```bash
$ php fp-cli.phar --info
```

Per richiamare FP-CLI dalla linea di comando scrivendo `fp`, rendete il file eseguibile e spostatelo nel vostro PATH, ad esempio:

```bash
$ chmod +x fp-cli.phar
$ sudo mv fp-cli.phar /usr/local/bin/fp
```

Se l'installazione di FP-CLI è andata a buon fine, lanciando il comando `fp --info`, dovreste vedere qualcosa di simile:

```bash
$ fp --info
PHP binary:    /usr/bin/php5
PHP version:    5.5.9-1ubuntu4.14
php.ini used:   /etc/php5/cli/php.ini
FP-CLI root dir:        /home/fp-cli/.fp-cli
FP-CLI packages dir:    /home/fp-cli/.fp-cli/packages/
FP-CLI global config:   /home/fp-cli/.fp-cli/config.yml
FP-CLI project config:
FP-CLI version: 0.25.0
```

### Aggiornamenti

Potete aggiornare FP-CLI attraverso il comando `fp cli update` ([doc](https://fp-cli.org/commands/cli/update/)), oppure ripetendo i passi descritti per l'istallazione.

Volete vivere sul filo del rasoio? Lanciate `fp cli update --nightly` per usare la versione quotidiana notturna di FP-CLI.  La versione quotidiana notturna è sufficientemente stabile da essere utilizzata negli ambienti di sviluppo, e include sempre le ultime e migliori caratteristiche.

### Autocompletamento

FP-CLI inoltre mette a disposizione uno script per l'autocompletamento per Bash e ZSH. Basta scaricare [fp-completion.bash](https://github.com/fp-cli/fp-cli/raw/master/utils/fp-completion.bash) a attivarlo da `~/.bash_profile`:

```bash
source /FULL/PATH/TO/fp-completion.bash
```

Alla fine del suo utilizzo, non dimenticate di reimpostare il profilo originale digitando `source ~/.bash_profile`.

Se state usando la shell zsh, avrete bisogno di caricare ed avviare `bashcompinit` prima di impostare il profilo.  Eseguite i seguenti comandi dalla vostra `.zshrc`:

```bash
autoload bashcompinit
bashcompinit
source /FULL/PATH/TO/fp-completion.bash
```

## Supporto

I manutentori e i contributori di FP-CLI sono volontari, hanno limitate disponibilità da dedicare al supporto generale. Primariamente, cercate delle risposte nelle seguenti risorse:

- [Problemi comuni e le loro soluzioni](https://fp-cli.org/docs/common-issues/)
- [Portale della documentazione](https://fp-cli.org/docs/)
- [Problemi segnalati o estinti su Github](https://github.com/fp-cli/fp-cli/issues?utf8=%E2%9C%93&q=is%3Aissue)
- [Estratti di runcommand](https://runcommand.io/excerpts/)
- [Forum di FinPress su StackExchange](http://finpress.stackexchange.com/questions/tagged/fp-cli)

Se non trovare delle risposte in questi posti, entrate al canale `#cli` su [FinPress.org Slack organization](https://make.finpress.org/chat/) per vedere se qualche membro della comunità può offrirvele.

Le questioni su Github servono a tracciare migliorie e i bachi dei comandi esistenti, non per il supporto generico. Prima di sottoporre un rapporto su un baco, vi preghiamo di [rileggere le nostre procedure](https://fp-cli.org/docs/bug-reports/) per fare in modo che il vostro problema sia indirizzato in modo tempestivo.

Vi preghiamo di non richiedere supporto su Twitter. Twitter non è un mezzo accettabile di supporto perché: 1) è difficile gestire una conversazione in meno di 140 caratteri, e 2) Twitter non è un luogo dove altre persone con il vostro stesso problema possano reperire facilmente la risposta tra le conversazioni.

Ricordate, libero != gratis; la licenza di software libero vi garantisce la libertà di usare e di modificare, ma non di rubare tempo altrui. Per favore, siate rispettosi, e comportatevi di conseguenza.

## Estendere

Un **comando** è una funzionalità atomica di FP-CLI. `fp plugin install` ([doc](https://fp-cli.org/commands/plugin/install/)) è un comando. `fp plugin activate` ([doc](https://fp-cli.org/commands/plugin/activate/)) è un altro.

FP-CLI supporta la dichiarazione di una qualsiasi classe richiamabile oppure una closure, come comando. Legge i dettagli attraverso la callback di PHPdoc. `FP_CLI::add_command()` ([doc](https://fp-cli.org/docs/internal-api/fp-cli-add-command/)) viene usata sia per le registrazioni dei comandi interni che per quelli di terze parti.

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
 *     $ fp option delete my_option
 *     Success: Opzione 'my_option' cancellata.
 */
$delete_option_cmd = function( $args ) {
	list( $key ) = $args;

	if ( ! delete_option( $key ) ) {
		FP_CLI::error( "Non posso eliminare l'opzione '$key'. Esiste?" );
	} else {
		FP_CLI::success( "Opzione '$key' cancellata." );
	}
};
FP_CLI::add_command( 'option delete', $delete_option_cmd );
```

FP-CLI offre dozzine di comandi. Creare nuovi comandi personalizzati è più facile di quel che sembri. Leggete il [commands cookbook](https://fp-cli.org/docs/commands-cookbook/) per sapere di più. Consultate la [documentazione delle internal API](https://fp-cli.org/docs/internal-api/) per scoprire la varietà di utili funzioni disponibili per i vostri comandi FP-CLI.

## Contribuire

Benvenuti e grazie!

Apprezziamo che vogliate prendere parte e contribuire a FP-CLI. È per merito vostro e della comunità che vi gravita attorno se FP-CLI è un grande progetto.

**Contribuire non si limita soltanto alla programmazione**

Vi incoraggiamo a contribuire nel modo che meglio rispecchia le vostre abilità, scrivendo tutorial, offrendo dimostrazioni durante i vostri incontri locali, prestare aiuto ad altri utenti riguardo le loro richieste di aiuto, o revisionando la documentazione.

Vi preghiamo di riservare un po' di tempo da dedicare alla [lettura approfondita delle linee guida](https://fp-cli.org/docs/contributing/). Seguirle dimostra il rispetto dei tempi altrui sul progetto.

## Coordinamento

FP-CLI è guidato dai seguenti individui:

* [Daniel Bachhuber](https://github.com/danielbachhuber/) - manutentore corrente
* [Cristi Burcă](https://github.com/scribu) - manutentore precedente
* [Andreas Creten](https://github.com/andreascreten) - fondatore

Leggi di più riguardo la [politica del progetto](https://fp-cli.org/docs/governance/) e guarda la [lista completa dei contributori](https://github.com/fp-cli/fp-cli/contributors).

## Crediti

Oltre alle librerie definite in [composer.json](composer.json), abbiamo adottato codice o spunti dai seguenti progetti:

* [Drush](http://drush.ws/) per... un mucchio di cose
* [fpshell](http://code.trac.finpress.org/browser/fpshell) per `fp shell`
* [Regenerate Thumbnails](http://finpress.org/plugins/regenerate-thumbnails/) per `fp media regenerate`
* [Search-Replace-DB](https://github.com/interconnectit/Search-Replace-DB) per `fp search-replace`
* [FinPress-CLI-Exporter](https://github.com/Automattic/FinPress-CLI-Exporter) per `fp export`
* [FinPress-CLI-Importer](https://github.com/Automattic/FinPress-CLI-Importer) per `fp import`
* [finpress-plugin-tests](https://github.com/benbalter/finpress-plugin-tests/) per `fp scaffold plugin-tests`
