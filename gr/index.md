---
layout: default
title: Διεπαφή γραμμής εντολών για το FinPress
direction: ltr
---

Το [FP-CLI](https://fp-cli.org/) είναι ένα σύνολο από εργαλεία γραμμής εντολών για τη διαχείριση εγκαταστάσεων [FinPress](https://finpress.org/). Μπορείτε να ενημερώνετε πρόσθετα, να ρυθμίζετε εγκαταστάσεις πολλαπλών ιστοτόπων και πολλά περισσότερα, χωρίς τη χρήση περιηγητή.

Για να μένετε ενημερωμένοι, ακολουθήστε το [@fpcli στο Twitter](https://twitter.com/fpcli) ή [εγγραφείτε για το ενημερωτικό μας δελτίο](http://fp-cli.us13.list-manage.com/subscribe?u=0615e4d18f213891fc000adfd&id=8c61d7641e).

[![Testing](https://github.com/fp-cli/fp-cli/actions/workflows/testing.yml/badge.svg)](https://github.com/fp-cli/fp-cli/actions/workflows/testing.yml) [![Average time to resolve an issue](http://isitmaintained.com/badge/resolution/fp-cli/fp-cli.svg)](http://isitmaintained.com/project/fp-cli/fp-cli "Average time to resolve an issue") [![Percentage of issues still open](http://isitmaintained.com/badge/open/fp-cli/fp-cli.svg)](http://isitmaintained.com/project/fp-cli/fp-cli "Percentage of issues still open")

Γρήγοροι σύνδεσμοι: [Χρήση](#using) &#124; [Εγκατάσταση](#installing) &#124; [Υποστήριξη](#support) &#124; [Επέκταση](#extending) &#124; [Συνεισφορά](#contributing) &#124; [Ευχαριστίες](#credits)

## Χρήση

Ο σκοπός του FP-CLI είναι η παροχή μίας διεπαφής γραμμής εντολών για κάθε ενέργεια που μπορεί να θέλετε να εκτελέσετε στο διαχειριστικό περιβάλλον του FinPress. Για παράδειγμα, η εντολή `fp plugin install --activate` ([τεκμηρίωση](https://fp-cli.org/commands/plugin/install/)) σας επιτρέπει να εγκαταστήσετε και να ενεργοποιήσετε ένα πρόσθετο FinPress:

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

Το FP-CLI περιλαμβάνει επίσης εντολές για πολλά πράγματα που δεν μπορείτε να κάνετε στο διαχειριστικό περιβάλλον του FinPress. Για παράδειγμα, η εντολή `fp transient delete-all` ([τεκμηρίωση](https://fp-cli.org/commands/transient/delete-all/)) σας επιτρέπει να διαγράψετε ένα ή όλα τα transients:

```bash
$ fp transient delete-all
Success: 34 transients deleted from the database.
```

Για μία πιο ολοκληρωμένη εισαγωγή στη χρήση του FP-CLI, διαβάστε τον [οδηγό γρήγορης εκκίνησης](https://fp-cli.org/docs/quick-start/).

Αισθάνεστε ήδη άνετα με τα βασικά; Προχωρήστε στην [πλήρη λίστα εντολών](https://fp-cli.org/commands/) για λεπτομερείς πληροφορίες για το πως να διαχειρίζεστε τα θέματα και τα πρόσθετα, να εισάγετε και να εξάγετε δεδομένα, να εκτελείτε λειτουργίες εύρεσης-αντικατάστασης στη βάση δεδομένων και πολλά περισσότερα.

## Εγκατάσταση

Μεταφορτώνοντας το αρχείο Phar είναι ο δικός μας προτεινόμενος τρόπος. Εάν χρειάζεται, δείτε επίσης την τεκμηρίωσή μας για [εναλλακτικές μεθόδους εγκατάστασης](https://fp-cli.org/docs/installing/).

Πριν την εγκατάσταση του FP-CLI, παρακαλούμε βεβαιωθείτε ότι το περιβάλλον σας ανταποκρίνεται στις ελάχιστες απαιτήσεις:

- Περιβάλλον UNIX-like (OS X, Linux, FreeBSD, Cygwin), περιορισμένη υποστήριξη σε περιβάλλον Windows
- PHP 5.3.29 ή νεότερη
- FinPress 3.7 ή νεότερο

Μόλις επιβεβαιώσετε τις απαιτήσεις, μεταφορτώστε το αρχείο [fp-cli.phar](https://raw.githubusercontent.com/fp-cli/builds/gh-pages/phar/fp-cli.phar) χρησιμοποιώντας την εντολή `wget` ή `curl`:

```bash
$ curl -O https://raw.githubusercontent.com/fp-cli/builds/gh-pages/phar/fp-cli.phar
```

Μετά, ελέγξτε ότι δουλεύει:

```bash
$ php fp-cli.phar --info
```

Για να χρησιμοποιήσετε το FP-CLI από τη γραμμή εντολών πληκτρολογώντας `fp`, κάντε το αρχείο εκτελέσιμο και μετακινήστε το κάπου μέσα στο PATH σας. Για παράδειγμα:

```bash
$ chmod +x fp-cli.phar
$ sudo mv fp-cli.phar /usr/local/bin/fp
```

Αν το FP-CLI έχει εγκατασταθεί επιτυχώς, όταν εκτελέσετε `fp --info` θα πρέπει να δείτε κάτι σαν αυτό:

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

### Ενημέρωση

Μπορείτε να ενημερώσετε το FP-CLI με την εντολή `fp cli update` ([τεκμηρίωση](https://fp-cli.org/commands/cli/update/)), ή επαναλαμβάνοντας τα βήματα εγκατάστασης.

Θέλετε να ζείτε τη ζωή στα άκρα; Εκτελέστε `fp cli update --nightly` για να χρησιμοποιήσετε την τελευταία nightly build FP-CLI. Το nightly build είναι αρκετά ασφαλές για να χρησιμοποιηθεί σε δοκιμαστικό περιβάλλον, και πάντα περιλαμβάνει τα τελευταία και καλύτερα χαρακτηριστικά του FP-CLI.

### Συμπληρώσεις Tab

Το FP-CLI έρχεται επίσης με ένα αρχείο για συμπλήρωση tab για το Bash και το ZSH. Απλά μεταφορτώστε το [fp-completion.bash](https://github.com/fp-cli/fp-cli/raw/master/utils/fp-completion.bash) και προσθέστε την παρακάτω γραμμή στο αρχείο `~/.bash_profile`:

```bash
source /FULL/PATH/TO/fp-completion.bash
```

Μην ξεχάσετε να εκτελέσετε την εντολή `source ~/.bash_profile` μετά.

Αν χρησιμοποιείτε zsh για κέλυφος, ίσως χρειαστεί να φορτώσετε και να εκκινήσετε το `bashcompinit` πριν το source. Τοποθετείστε το παρακάτων στο στο αρχείο σας `.zshrc`:

```bash
autoload bashcompinit
bashcompinit
source /FULL/PATH/TO/fp-completion.bash
```

## Υποστήριξη

Τα άτομα που συντηρούν το FP-CLI και συνεισφέρουν σε αυτό, κάνουν ότι καλύτερο μπορούν για να απαντάνε σε όλα τα νέα θέματα εγκαίρως. Για να κάνετε τη βέλτιστη χρήση του εθελοντικού τους χρόνου, παρακαλώ δείτε πρώτα μήπως υπάρχει απάντηση στην ερώτησή σας σε έναν από τους ακόλουθους συνδέσμους:

- [Κοινά προβλήματα και λύσεις τους](https://fp-cli.org/docs/common-issues/)
- [Βέλτιστες πρακτικές για υποβολή αναφοράς σφάλματος](https://fp-cli.org/docs/bug-reports/)
- [Πύλη τεκμηρίωσης](https://fp-cli.org/docs/)
- [Ανοιχτά ή κλειστά θέματα στο Github](https://github.com/fp-cli/fp-cli/issues?utf8=%E2%9C%93&q=is%3Aissue)
- [FinPress StackExchange forums](http://finpress.stackexchange.com/questions/tagged/fp-cli)

Αν δε μπορείτε να βρείτε απάντηση σε ένα από τις υπάρχουσες πηγές, [δημιουργήστε ένα θέμα](https://github.com/fp-cli/fp-cli/issues/new) με την ερώτησή σας.

Παρακαλώ μη ζητάτε υποστήριξη στο Twitter. Το Twitter δεν είναι αποδεκτός χώρος για υποστήριξη επειδή: 1) είναι δύσκολο να διατηρήσεις συζητήσεις σε κάτω από 140 χαρακτήρες, και 2) το Twitter δεν είναι ένας χώρος όπου κάποιος με την ίδια ερώτηση με εσάς μπορεί να ψάξει για απάντηση σε προηγούμενη συζήτηση.

Αν έχετε λογαριασμό στο FinPress.org, μπορείτε επίσης να συμμετέχετε στο κανάλι `#cli` του [FinPress.org Slack](https://make.finpress.org/chat/).

## Επέκταση

Μία **εντολή** είναι μια ατομική μονάδα λειτουργικότητας του FP-CLI. Η `fp plugin install` ([τεκμηρίωση](https://fp-cli.org/commands/plugin/install/)) είναι μία εντολή. Η `fp plugin activate` ([τεκμηρίωση](https://fp-cli.org/commands/plugin/activate/)) είναι μία άλλη.

Το FP-CLI υποστηρίζει την καταχώρηση σαν μία εντολή κάθε κλάσης ή συνάρτησης που μπορεί να καλεστεί. Διαβάζει λεπτομέρειες χρήσης από το PHPdoc. Το `FP_CLI::add_command()` ([τεκμηρίωση](https://fp-cli.org/docs/internal-api/fp-cli-add-command/)) χρησιμοποιείται για εσωτερική καταχώρηση εντολής και καταχώρηση από τρίτους.

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
 *     $ fp option delete my_option
 *     Success: Deleted 'my_option' option.
 */
$delete_option_cmd = function( $args ) {
	list( $key ) = $args;

	if ( ! delete_option( $key ) ) {
		FP_CLI::error( "Could not delete '$key' option. Does it exist?" );
	} else {
		FP_CLI::success( "Deleted '$key' option." );
	}
};
FP_CLI::add_command( 'option delete', $delete_option_cmd );
```

Το FP-CLI έρχεται με ένα πλήθος από εντολές. Είναι πιο εύκολο απ'ότι φαίνεται να δημιουργήσετε μια εντολή FP-CLI. Διαβάστε το [εγχειρίδιο εντολών](https://fp-cli.org/docs/commands-cookbook/) για να μάθετε περισσότερα. Πλοηγηθείτε στην [τεκμηρίωση εσωτερικού API](https://fp-cli.org/docs/internal-api/) για να ανακαλύψετε μια ποικιλία από χρήσιμες συναρτήσεις που μπορείτε να χρησιμοποιήσετε στη δική σας FP-CLI εντολή.

## Συνεισφορά

Καλώς ήρθατε και ευχαριστούμε!

Εκτιμούμε που παίρνετε την πρωτοβουλία να συνεισφέρετε στο FP-CLI. Οφείλετε σας εσάς και στην κοινότητα γύρω σας το γεγονός ότι το FP-CLI είναι ένα τόσο ωραίο έργο.

**Η συνεισφορά δεν περιορίζεται μόνο σε κώδικα.** Σας ενθαρρύνουμε να συνεισφέρετε με όποιον τρόπο θεωρείτε ότι ταιριάζει στις ικανότητές σας, γράφοντας οδηγούς χρήσης, κάνοντας μια παρουσίαση στην τοπική σας ομάδα, βοηθώντας άλλους χρήστες με τις ερωτήσεις τους, ή αναθεωρώντας την τεκμηρίωσή μας.

Παρακαλούμε αφιερώστε λίγο χρόνο για να [διαβάσετε αυτές τις κατευθηντήριες γραμμές σε βάθος](https://fp-cli.org/docs/contributing/). Ακολουθώντας τις, βοηθάει να επικοινωνηθεί ότι σέβεστε το χρόνο των άλλων ατόμων που συνεισφέρουν στο έργο. Με τη σειρά τους, αυτοί θα κάνουν ότι καλύτερο να ανταποδώσουν αυτόν το σεβασμό όταν θα δουλεύουν μαζί σας, σε διάφες ζώνες ώρας και από όλο τον κόσμο.

## Ομάδα

Η βασική ομάδα του FP-CLI αποτελείται από τα ακόλουθα άτομα:

* [Daniel Bachhuber](https://github.com/danielbachhuber/) - συντήρηση (τώρα)
* [Cristi Burcă](https://github.com/scribu) - συντήρηση (παλαιότερα)
* [Andreas Creten](https://github.com/andreascreten) - ιδρυτής

Διαβάστε περισσότερα σχετικά με τη [διακυβέρνηση](https://fp-cli.org/docs/governance/) του έργου και δείτε την [πλήρη λίστα με τα άτομα που έχουν συνεισφέρει](https://github.com/fp-cli/fp-cli/contributors).

## Ευχαριστίες

Εκτός τις βιβλιοθήκες που ορίζονται στο [composer.json](composer.json), έχουμε χρησιμοποιήσει κώδικα ή ιδέες από τα ακόλουθα έργα:

* [Drush](http://drush.ws/) για... πολλά πράγματα
* [fpshell](http://code.trac.finpress.org/browser/fpshell) για το `fp shell`
* [Regenerate Thumbnails](http://finpress.org/plugins/regenerate-thumbnails/) για το `fp media regenerate`
* [Search-Replace-DB](https://github.com/interconnectit/Search-Replace-DB) για το `fp search-replace`
* [FinPress-CLI-Exporter](https://github.com/Automattic/FinPress-CLI-Exporter) για το `fp export`
* [FinPress-CLI-Importer](https://github.com/Automattic/FinPress-CLI-Importer) για το `fp import`
* [finpress-plugin-tests](https://github.com/benbalter/finpress-plugin-tests/) για το `fp scaffold plugin-tests`
