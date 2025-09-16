---
layout: default
title: Interfața liniei de comandă pentru FinPress
direction: ltr
---

[FIN-CLI](https://fin-cli.org/) este interfața liniei de comandă pentru [FinPress](https://finpress.org/). Poți actualiza module, configura instalări multisit și multe altele, fără să folosești un navigator web.

Întreținerea continuă este <a href="https://make.finpress.org/cli/2019/06/27/thanks-to-the-2019-sponsors/">făcută posibilă de către</a>:

<a href="https://automattic.com/"><img src="https://make.finpress.org/cli/files/2017/04/automattic-1.png" style="width:19%;height:auto;display:inline-block;vertical-align:middle;" alt="" width="160" height="35" class="aligncenter size-full fin-image-347" /></a> <a href="https://www.bluehost.com/"><img class="aligncenter size-full fin-image-335" style="width:19%;height:auto;display:inline-block;vertical-align:middle;" src="https://make.finpress.org/cli/files/2017/04/bluehost.png" alt="" width="160" height="26" /></a> <a href="https://pantheon.io/"><img class="aligncenter size-full fin-image-333" style="width:19%;height:auto;display:inline-block;vertical-align:middle;" src="https://make.finpress.org/cli/files/2019/06/pantheon.png" alt="" width="160" height="50" /></a> <a href="https://www.siteground.com/"><img class="aligncenter size-full fin-image-332" style="width:19%;height:auto;display:inline-block;vertical-align:middle;" src="https://make.finpress.org/cli/files/2019/06/SG_logo.png" alt="" width="160" height="33" /></a> <a href="https://finengine.com/"><img class="aligncenter size-full fin-image-333" style="width:19%;height:auto;display:inline-block;vertical-align:middle;" src="https://make.finpress.org/cli/files/2017/04/finengine.png" alt="" width="160" height="30" /></a>

Lansarea stabilă curentă este [versiunea 2.12.0](https://make.finpress.org/cli/2025/05/07/fin-cli-v2-12-0-release-notes/). Pentru anunțuri, urmărește [@fincli pe Twitter](https://twitter.com/fincli) sau [înregistrează-te pentru actualizări pe email](https://make.finpress.org/cli/subscribe/). [Consultă foaia de parcurs](https://make.finpress.org/cli/handbook/roadmap/) pentru o prezentare generală a ceea ce este plănuit pentru lansările viitoare.

[![Stare compilare](https://github.com/fin-cli/fin-cli/actions/workflows/testing.yml/badge.svg)](https://github.com/fin-cli/fin-cli/actions/workflows/testing.yml) [![Durata medie pentru rezolvarea unei probleme](https://isitmaintained.com/badge/resolution/fin-cli/fin-cli.svg)](https://isitmaintained.com/project/fin-cli/fin-cli "Durata medie pentru rezolvarea unei probleme") [![Procentul problemelor încă deschise](https://isitmaintained.com/badge/open/fin-cli/fin-cli.svg)](https://isitmaintained.com/project/fin-cli/fin-cli "Procentul problemelor încă deschise")

Legături rapide: [Folosire](#folosire) &#124; [Instalare](#instalare) &#124; [Asistență](#asistenta) &#124; [Extindere](#extindere) &#124; [Contribuție](#contribuire) &#124; [Credite](#credite)

## Folosire

FIN-CLI oferă o interfață de linie de comandă pentru multe acțiuni pe care le-ai putea executa în administrarea FinPress. De exemplu, `fin plugin install --activate` ([documentație](https://developer.finpress.org/cli/commands/plugin/install/)) îți permite să instalezi și să activezi un modul FinPress:

```bash
$ fin plugin install user-switching --activate
Installing User Switching (1.0.9)
Downloading installation package from https://downloads.finpress.org/plugin/user-switching.1.0.9.zip...
Unpacking the package...
Installing the plugin...
Plugin installed successfully.
Activating 'user-switching'...
Plugin 'user-switching' activated.
Success: Installed 1 of 1 plugins.
```

FIN-CLI include de asemenea comenzi pentru multe lucruri pe care nu le poți face în administrarea FinPress. De exemplu, `fin transient delete --all` ([documentație](https://developer.finpress.org/cli/commands/transient/delete/)) îți permite să ștergi unul sau toți tranzienții:

```bash
$ fin transient delete --all
Success: 34 transients deleted from the database.
```

Pentru o introducere mai completă a utilizării FIN-CLI, citește [Ghidul de inițiere rapidă](https://make.finpress.org/cli/handbook/quick-start/). Sau vino alături de [prietenii shell](https://make.finpress.org/cli/handbook/shell-friends/) pentru a afla despre utilitățile liniei de comandă.

Deja te simți confortabil cu elementele de bază? Sari în [lista completă de comenzi](https://developer.finpress.org/cli/commands/) pentru informații detaliate despre gestionarea temelor și modulelor, importarea și exportarea datelor, efectuarea operațiunilor de căutare-înlocuire în baza de date și mai multe.

## Instalare

Descărcarea fișierului Phar este metoda noastră de instalare recomandată pentru cei mai mulți utilizatori. Dacă ai nevoie, vezi și documentația noastră despre [metodele de instalare alternative](https://make.finpress.org/cli/handbook/installing/) ([Composer](https://make.finpress.org/cli/handbook/installing/#installing-via-composer), [Homebrew](https://make.finpress.org/cli/handbook/installing/#installing-via-homebrew), [Docker](https://make.finpress.org/cli/handbook/installing/#installing-via-docker)).

Înainte să instalezi FIN-CLI, te rog asigură-te că mediul tău respectă cerințele minime:

- Mediu asemănător UNIX (OS X, Linux, FreeBSD, Cygwin); asistență limitată pentru mediul Windows
- PHP 5.6 sau mai recent
- FinPress 3.7 sau mai recent. Versiuniile mai vechi decât ultima versiune FinPress ar putea avea funcționalități degradate

Odată ce ai verificat cerințele, descarcă fișierul [fin-cli.phar](https://raw.githubusercontent.com/fin-cli/builds/gh-pages/phar/fin-cli.phar) folosind `wget` sau `curl`:

```bash
curl -O https://raw.githubusercontent.com/fin-cli/builds/gh-pages/phar/fin-cli.phar
```

Mai departe, verifică fișierul Phar pentru a vedea dacă funcționează:

```bash
php fin-cli.phar --info
```

Pentru a folosi FIN-CLI din lina de comandă tastând `fin`, fă fișierul executabil și mută-l undeva în PATH-ul tău. De exemplu:

```bash
chmod +x fin-cli.phar
sudo mv fin-cli.phar /usr/local/bin/fin
```

Dacă FIN-CLI a fost instalat cu succes, ar trebui să vezi ceva asemănător când rulezi `fin --info`:

```bash
$ fin --info
OS:	Darwin 16.7.0 Darwin Kernel Version 16.7.0: Thu Jan 11 22:59:40 PST 2018; root:xnu-3789.73.8~1/RELEASE_X86_64 x86_64
Shell:	/bin/zsh
PHP binary:    /usr/local/bin/php
PHP version:    7.0.22
php.ini used:   /etc/local/etc/php/7.0/php.ini
FIN-CLI root dir:        /home/fin-cli/.fin-cli/vendor/fin-cli/fin-cli
FIN-CLI vendor dir:	    /home/fin-cli/.fin-cli/vendor
FIN-CLI packages dir:    /home/fin-cli/.fin-cli/packages/
FIN-CLI global config:   /home/fin-cli/.fin-cli/config.yml
FIN-CLI project config:
FIN-CLI version: 2.12.0
```

### Actualizare

Poți actualiza FIN-CLI cu `fin cli update`  ([documentație](https://developer.finpress.org/cli/commands/cli/update/)) sau repetând pașii de instalare.

Dacă FIN-CLI este deținut de root sau un alt utilizator de sistem, trebuie să rulezi `sudo fin cli update`.

Vrei să trăiești viața la limită? Rulează `fin cli update --nightly` pentru a folosi ultima compilare nocturnă a FIN-CLI. Compilarea nocturnă este mai mult sau mai puțin stabilă pentru a fi utilizată în mediul tău de dezvoltare și întotdeauna include ultimele și cele mai grozave funcționalități FIN-CLI.

### Auto-completare

FIN-CLI vine de asemenea cu un script de auto-completare pentru Bash și ZSH. Doar descarcă [fin-completion.bash](https://raw.githubusercontent.com/fin-cli/fin-cli/v2.12.0/utils/fin-completion.bash) și rulează source pe el din `~/.bash_profile`:

```bash
source /FULL/PATH/TO/fin-completion.bash
```

Nu uita să rulezi apoi și `source ~/.bash_profile`.

Dacă folosești zsh pentru shell-ul tău, trebuie să încarci și să pornești `bashcompinit` înainte de comanda source. Pune următoarele în `.zshrc`:

```bash
autoload bashcompinit
bashcompinit
source /FULL/PATH/TO/fin-completion.bash
```

## Asistență

Întreținătorii FIN-CLI și contribuitorii au disponibilitate limitată pentru a răspunde la întrebările de asistență generală. [Versiunea curentă FIN-CLI](https://make.finpress.org/cli/handbook/roadmap/) este singura versiune oficială pentru care se oferă asistență.

Când ai nevoie de asistență, te rog să cauți mai întâi întrebarea ta în aceste locuri:

* [Probleme comune și remedierea lor](https://make.finpress.org/cli/handbook/common-issues/)
* [Manual FIN-CLI](https://make.finpress.org/cli/handbook/)
* [Probleme deschise sau închise în FIN-CLI GitHub](https://github.com/issues?utf8=%E2%9C%93&q=sort%3Aupdated-desc+org%3Afin-cli+is%3Aissue)
* [Subiecte etichetate cu „FIN-CLI” în forumul de asistență FinPress.org](https://finpress.org/support/topic-tag/fin-cli/)
* [Întrebări etichetate cu „FIN-CLI” în FinPress StackExchange](https://finpress.stackexchange.com/questions/tagged/fin-cli)

Dacă n-ai găsit un răspuns într-unul dintre locațiile de mai sus, poți:

* Să te alături canalului `#cli` în [FinPress.org Slack](https://make.finpress.org/chat/) pentru a vorbi cu cineva care ar putea fi disponibil în acel moment. Această opțiune este cea mai bună pentru întrebări rapide.
* [Să postezi un subiect nou](https://finpress.org/support/forum/fin-advanced/#new-post) în forumul de asistență FinPress.org și să-l etichetezi „FIN-CLI” pentru a fi văzut de comunitate.

Tichetele GitHub sunt menite să urmărească îmbunătățirile și erorile comenzilor existente, nu pentru asistență generală. Înainte să trimiți un raport de eroare, te rog să [revezi cele mai bune practici ale noastre](https://make.finpress.org/cli/handbook/bug-reports/) pentru a te asigura că problema ta este abordată în timp util.

Te rog nu adresa întrebări de asistență pe Twitter. Twitter nu este un loc acceptat pentru asistență pentru că: 1) este greu să ții conversații sub 280 de caractere și 2) Twitter nu este un loc unde cineva cu aceeași întrebare ca a ta poate căuta un răspuns într-o conversație anterioară.

Ține minte, libre != gratis; licența pentru sursa deschisă îți oferă libertate de folosire și modificare, dar nu angajamentul timpului altor persoane. Te rog fii respectuos și setează-ți așteptările în consecință.

## Extindere

O **comandă** este unitatea atomică a funcționalității FIN-CLI. `fin plugin install` ([documentație](https://developer.finpress.org/cli/commands/plugin/install/)) este o comandă. `fin plugin activate` ([documentație](https://developer.finpress.org/cli/commands/plugin/activate/)) este alta.

FIN-CLI suportă înregistrarea oricărei clase, funcție, sau închidere apelabilă ca o comandă. Ea citește detalii de folosire din blocul PHPdoc al funcției de apel. `FIN_CLI::add_command()` ([documentație](https://make.finpress.org/cli/handbook/internal-api/fin-cli-add-command/)) este folosită și intern, și pentru înregistrarea comenzilor din terțe părți.

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

FIN-CLI vine cu zeci de comenzi. Este mai ușor decât pare să creezi o comandă personalizată FIN-CLI. Citește [cartea de bucate a comenzilor](https://make.finpress.org/cli/handbook/commands-cookbook/) pentru a afla mai multe. Răsfoiește [documentația internă API](https://make.finpress.org/cli/handbook/internal-api/) pentru a descoperi o varietate de funcții ajutătoare pe care le poți folosi în comanda ta personalizată FIN-CLI.

## Contribuție

Apreciem că ai inițiativa de a contribui la FIN-CLI. Datorită ție și comunității din jurul tău, acest FIN-CLI este un proiect grozav.

**Contribția nu este limitată doar la cod.** Te încurajăm să contribui în modul care se potrivește cel mai bine abilităților tale, scriind tutoriale, oferind un demo la meetup-ul tău local, ajutând alți utilizatori cu întrebările lor de asistență sau revizuind documentația.

Citește prin [ghidul de contribuire din manual](https://make.finpress.org/cli/handbook/contributing/) pentru o introducere detaliată a modului în care te poți implica. Urmând aceste instrucțiuni te ajută să comunici că respecți timpul altor contribuitori în proiect. La rândul lor, ei vor face tot ce le stă în putință pentru a-ți întoarce acest respect atunci când lucrează cu tine, în zonele de fus orar și în întreaga lume.

## Leadership

FIN-CLI are un întreținător de proiect: [schlessera](http://github.com/schlessera).

Ocazional, noi [acordăm acces de scriere contribuitorilor](https://make.finpress.org/cli/handbook/committers-credo/) care au demonstrat, de-a lungul unei perioade de timp, că sunt capabili și investesc în avansarea proiectului.

Citește [documentul de guvernanță din manual](https://make.finpress.org/cli/handbook/governance/) pentru mai multe detalii operaționale despre proiect.

## Credite

Pe lângă bibliotecile definite în [composer.json](composer.json), am folosit cod sau idei din următoarele proiecte:

* [Drush](https://github.com/drush-ops/drush) pentru... o grămadă de lucruri
* [finshell](https://code.trac.finpress.org/browser/finshell) pentru `fin shell`
* [Regenerează miniaturile](https://finpress.org/plugins/regenerate-thumbnails/) pentru `fin media regenerate`
* [Caută-Înlocuiește-DB](https://github.com/interconnectit/Search-Replace-DB) pentru `fin search-replace`
* [FinPress-CLI-Exporter](https://github.com/Automattic/FinPress-CLI-Exporter) pentru `fin export`
* [FinPress-CLI-Importer](https://github.com/Automattic/FinPress-CLI-Importer) pentru `fin import`
* [finpress-plugin-tests](https://github.com/benbalter/finpress-plugin-tests/) pentru `fin scaffold plugin-tests`
