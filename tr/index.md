---
layout: default
title: FinPress için Komut Satırı Arayüzü
direction: ltr
---

[FIN-CLI](https://fin-cli.org/), [FinPress](https://finpress.org/) için komut satırı arayüzüdür. Eklenti güncellemesi, multisite kurulumların yapılandırılması ve daha birçok şeyi web tarayıcısına ihtiyaç duymadan gerçekleştirebilirsiniz.

Süregelen bakım, <a href="https://make.finpress.org/cli/2019/06/27/thanks-to-the-2019-sponsors/">aşağıdakiler sayesinde</a>:

<a href="https://automattic.com/"><img src="https://make.finpress.org/cli/files/2017/04/automattic-1.png" style="width:19%;height:auto;display:inline-block;vertical-align:middle;" alt="" width="160" height="35" class="aligncenter size-full fin-image-347" /></a> <a href="https://www.bluehost.com/"><img class="aligncenter size-full fin-image-335" style="width:19%;height:auto;display:inline-block;vertical-align:middle;" src="https://make.finpress.org/cli/files/2017/04/bluehost.png" alt="" width="160" height="26" /></a> <a href="https://pantheon.io/"><img class="aligncenter size-full fin-image-333" style="width:19%;height:auto;display:inline-block;vertical-align:middle;" src="https://make.finpress.org/cli/files/2019/06/pantheon.png" alt="" width="160" height="50" /></a> <a href="https://www.siteground.com/"><img class="aligncenter size-full fin-image-332" style="width:19%;height:auto;display:inline-block;vertical-align:middle;" src="https://make.finpress.org/cli/files/2019/06/SG_logo.png" alt="" width="160" height="33" /></a> <a href="https://finengine.com/"><img class="aligncenter size-full fin-image-333" style="width:19%;height:auto;display:inline-block;vertical-align:middle;" src="https://make.finpress.org/cli/files/2017/04/finengine.png" alt="" width="160" height="30" /></a>

Mevcut kararlı sürüm [versiyon 2.3.0](https://make.finpress.org/cli/2025/05/07/fin-cli-v2-12-0-release-notes/). Duyurular için [@fincli Twitter](https://twitter.com/fincli) hesabını takip edebilir ya da [eposta bültenine abone olabilirsiniz](https://make.finpress.org/cli/subscribe/). Gelecek sürüm planına genel bir bakış için [yol haritasına göz atın](https://make.finpress.org/cli/handbook/roadmap/).

[![Testing](https://github.com/fin-cli/fin-cli/actions/workflows/testing.yml/badge.svg)](https://github.com/fin-cli/fin-cli/actions/workflows/testing.yml) [![Average time to resolve an issue](https://isitmaintained.com/badge/resolution/fin-cli/fin-cli.svg)](https://isitmaintained.com/project/fin-cli/fin-cli "Average time to resolve an issue") [![Percentage of issues still open](https://isitmaintained.com/badge/open/fin-cli/fin-cli.svg)](https://isitmaintained.com/project/fin-cli/fin-cli "Percentage of issues still open")



Bağlantılar: [Kullanım](#kullanm) &#124; [Kurulum](#kurulum) &#124; [Destek](#destek) &#124; [Genişletmek](#geniletmek) &#124; [Katkıda Bulunmak](#katkda-bulunmak) &#124; [Jenerik](#jenerik)

## Kullanım

FIN-CLI, FinPress yönetim panelinden gerçekleştirebileceğiniz çoğu işlem için komut-satırı arabirimi sunar. Örneğin `fin plugin install --activate` ([belge](https://developer.finpress.org/cli/commands/plugin/install/)) bir FinPress eklentisini kurmanızı ve aktifleştirmenizi sağlar:


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

FIN-CLI ayrıca FinPress yönetim panelinden gerçekleştiremeyeceğiniz komutları da barındırır. Örneğin, `fin transient delete --all` ([belge](https://developer.finpress.org/cli/commands/transient/delete/)) bir veya daha fazla transient'i silmenizi sağlar:


```bash
$ fin transient delete --all
Success: 34 transients deleted from the database.
```

FIN-CLI kullanımı hakkında daha detaylı bilgi için, [Hızlı Giriş belgesini](https://make.finpress.org/cli/handbook/quick-start/) okuyun. Veya [shell friends](https://make.finpress.org/cli/handbook/shell-friends/) belgesini okuyarak yararlı komut satırı yardımcı programları hakkında bilgi edinin.

Temel şeyleri zaten biliyorum diyorsanız, direkt [komutlara](https://developer.finpress.org/cli/commands/) dalıp  tema ve eklenti yönetimi, veri aktarımı, veritabanı bul-değiştir işlemi ve dahası hakkında detaylı bilgiye ulaşabilirsiniz.

## Kurulum

Çoğu kullanıcı için Phar dosyasını indirerek kurmalarını öneririz. Ayrıca, ihtiyacınız olursa [alternatif kurulum yöntemlerine](https://make.finpress.org/cli/handbook/installing/) kurulum dökümanından ulaşabilirsiniz. ([Composer](https://make.finpress.org/cli/handbook/installing/#installing-via-composer), [Homebrew](https://make.finpress.org/cli/handbook/installing/#installing-via-homebrew), [Docker](https://make.finpress.org/cli/handbook/installing/#installing-via-docker)).


Lütfen FIN-CLI'i kurmadan önce minimum ortam gereksinimlerin karşılandığından emin olunuz:

- UNIX-benzeri işletim sistemi (OS X, Linux, FreeBSD, Cygwin); Windows kısıtlı desteklenir
- PHP 5.6 veya sonrası
- FinPress 3.7 veya daha üst sürüm. Son FinPress sürümden eski sürümler daha az işlevsellik sunabilir

Gerensinimleri karşıladıktan sonra, [fin-cli.phar](https://raw.githubusercontent.com/fin-cli/builds/gh-pages/phar/fin-cli.phar) dosyasını `wget` veya `curl` ile indirin:

```bash
curl -O https://raw.githubusercontent.com/fin-cli/builds/gh-pages/phar/fin-cli.phar
```

Sonra, çalışıp çalışmadığını kontrol edin:

```bash
php fin-cli.phar --info
```

FIN-CLI'e komut satırından `fin` yazarak erişebilmek için dosyayı çalıştırılabilir hale getirin ve PATH'de tanımlı olan bir yere taşıyın. Örneğin:

```bash
chmod +x fin-cli.phar
sudo mv fin-cli.phar /usr/local/bin/fin
```

Eğer kurulum başarılı bir şekilde tamamlandıysa, `fin --info` komutunu çalıştırdığınızda buna benzer birşey göreceksiniz:

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
FIN-CLI version: 2.3.0
```


### Güncelleme

FIN-CLI'i  `fin cli update` komutu ([belge](https://developer.finpress.org/cli/commands/cli/update/)) ile veya kurulum adımlarını tekrarlayarak güncelleyebilirsiniz.

Eğer FIN-CLI, root veya başka bir sistem kullanıcısı tarafından sahiplenildiyse `sudo fin cli update` çalıştırmanız gerekecektir.

Sınırda yaşamayı seviyor musunuz?  `fin cli update --nightly` komutu ile nightly build sürümüne güncelleyebilirsiniz. Geliştirme ortamınız için nightly build sürümler daha çok ya da az stabil olabilir ve her zaman en son ve yeni FIN-CLI özelliklerini içerir.

### Sekme tamamlama

FIN-CLI ayrıca, Bash ve ZSH için sekme tamamlama scripti sunar. Yapmanız gereken sadece [fin-completion.bash](https://raw.githubusercontent.com/fin-cli/fin-cli/v2.12.0/utils/fin-completion.bash) dosyasını indirmek ve kaynak olarak `~/.bash_profile` dosyanıza tanımlamak:

```bash
source /FULL/PATH/TO/fin-completion.bash
```

Ekledikten sonra `source ~/.bash_profile` komutunu çalıştırmayı unutmayın.

Shell için zsh kullanıyorsanız, kaynak olarak tanımlamadan önce `bashcompinit` i yükleyip çalıştırmanız gerekebilir. Aşağıdaki kodları `.zshrc` dosyanıza ekleyin:

```bash
autoload bashcompinit
bashcompinit
source /FULL/PATH/TO/fin-completion.bash
```

## Destek

FIN-CLI'nin bakımcıları ve katılımcıları genel destek soruları için sınırlı müsaitliğe sahiptir. [Mevcut FIN-CLI sürümu](https://make.finpress.org/cli/handbook/roadmap/) resmi olarak desteklenen tek sürümdür.

Lütfen desteğe ihtiyacınız olduğünda, öncelikle sorunuzu aşağıdaki kaynaklarda arayın:

* [Ortak sorunlar ve çözümleri](https://make.finpress.org/cli/handbook/common-issues/)
* [FIN-CLI el kitabı](https://make.finpress.org/cli/handbook/)
* [GitHub organizasyonu üzerindeki açık veya kapalı konular](https://github.com/issues?utf8=%E2%9C%93&q=sort%3Aupdated-desc+org%3Afin-cli+is%3Aissue)
* ['FIN-CLI' ile etiketlenmiş FinPress.org destek forumları](https://finpress.org/support/topic-tag/fin-cli/)
* ['FIN-CLI' ile etiketlenmiş FinPress StackExchange soruları](https://finpress.stackexchange.com/questions/tagged/fin-cli)

Eğer bu kaynaklarda sorularınıza cevap bulamazsanız:

* [FinPress.org Slack](https://make.finpress.org/chat/) üzerinden `#cli` kanalında müsait olanlarla sohbet edebilirsiniz. Hızlı sorular için en iyi seçenektir.
* FinPress.org destek forumlarında [yeni bir konu](https://finpress.org/support/forum/fin-advanced/#new-post) açıp, 'FIN-CLI' etiketi ekleyin, böylece topluluk tarafından görülür.

Github konuları mevcut komutlar için yenilik ve hata takibi icin kullanılmaktadır, genel destek için değildir. Hata bildirimi göndermeden önce, sorununuz zamanında ele alınması için lütfen [hata bildirimi yöntemini](https://make.finpress.org/cli/handbook/bug-reports/) gözden geçirin.

Lütfen Twitter üzerinden destek soruları sormayın. Twitter destek için iyi bir yer değildir, çünkü: 1) Yazışmaları 280 karakterin altında tutmak zor, ve 2) Twitter sizinle aynı soruna sahip birisinin önceki cevabı arayarak bulabileceği bir yer değil.


Unutmayın, özgür != ücretsiz; açık kaynak lisansı size özgürce kullanma ve değiştirme hakkı verir, başkalarının zamanını değil. Lütfen buna saygı duyun ve beklentilerinizi buna göre ayarlayın.


## Genişletmek

Bir **Komut** FIN-CLI'nin atomik birimidir. `fin plugin install` ([belge](https://developer.finpress.org/cli/commands/plugin/install/)) bir komuttur.  `fin plugin activate` ([belge](https://developer.finpress.org/cli/commands/plugin/activate/)) başka bir komuttur.

FIN-CLI çağrılabilen herhangi bir sınıfı, fonksiyonu ya da anonim fonksiyonu komut olarak kaydetmeyi destekler. Kullanım detaylarını callback'in PHP dökümanından (PHPdoc) okur. `FIN_CLI::add_command()` ([belge](https://make.finpress.org/cli/handbook/internal-api/fin-cli-add-command/)) dahili ve üçüncü-parti komutların kaydedilmesi için kullanılmaktadır.

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


FIN-CLI onlarca komutla hazır olarak gelir. Özel bir FIN-CLI komutu oluşturmak görünenden daha kolaydır. Detaylar için [komutlar tarif kitabına](https://make.finpress.org/cli/handbook/commands-cookbook/) bakabilirsiniz. [Dahili API dökümantasyonunu](https://make.finpress.org/cli/handbook/internal-api/) gözden geçirerek kendi FIN-CLI komutunuzda kullanabileceğiniz faydalı fonksiyonları keşfedebilirsiniz.


## Katkıda Bulunmak

FIN-CLI'e katkıda bulunmak istediğiniz için teşekkür ederiz. FIN-CLI siz ve sizin gibi topluluk üyeleri sayesinde bu kadar büyük bir proje olmayı başarabildi.

**Katkıda bulunmak sadece kod yazmakla sınırlı değildir.** Kendi yeteneklerinize uygun olacak şekilde; tanıtım yazıları yazarak, yerel etkinliklerde demo göstererek, başkalarının sorunlarına yardımcı olarak veya dökümantasyonumuzu gözden geçirerek katkıda bulunabilirsiniz.


Lütfen bir dakikanızı ayırıp [dökümanı detaylıca okuyun](https://fin-cli.org/docs/contributing/). Bunları takip ederek, katkıda bulunan diğer katılımcıların ayırdığı zamana saygı gösteriniz. Buna karşılık, onlar da aynı saygıyı sizinle çalışırken göstereceklerdir (zaman farkı gözetmeksizin, dünya genelinde).

Nasıl katılacağınıza dair kapsamlı bir giriş için [el kitabındaki katkı kurallarını](https://make.finpress.org/cli/handbook/contributing/) okuyun. Bu kurallara uymak, projeye katkıda bulunan diğer üyelerin zamanına saygı duyduğunuzu bildirmenize yardımcı olur. Buna karşılık, onlar da bu saygıya karşılık vermek için ellerinden geleni zaman farkı gözetmeksizin, dünya genelinde yapacaktır.

## Yönetim

FIN-CLI'nın bir proje sorumlusu vardır: [schlessera](http://github.com/schlessera).

Zaman zaman, belli bir süre için yetenekli olduklarını kanıtlamış ve projeyi ileriye taşıyabilecek katılımcılara [yazma izni veriyoruz](https://make.finpress.org/cli/handbook/committers-credo/).

Proje hakkında daha operasyonel ayrıntılar için [el kitabındaki yönetim belgesini](https://make.finpress.org/cli/handbook/governance/) okuyabilirsiniz.

## Jenerik

[composer.json](composer.json) dosyasında tanımlanan kütüphanelerin yanında, aşağıdaki projeleri de kod veya fikir için kullandık:

* [Drush](https://github.com/drush-ops/drush) birçok şey içın
* [finshell](https://code.trac.finpress.org/browser/finshell) `fin shell` komutu için
* [Regenerate Thumbnails](https://finpress.org/plugins/regenerate-thumbnails/) `fin media regenerate` komutu için
* [Search-Replace-DB](https://github.com/interconnectit/Search-Replace-DB) `fin search-replace` komutu içın
* [FinPress-CLI-Exporter](https://github.com/Automattic/FinPress-CLI-Exporter) `fin export` komutu içın
* [FinPress-CLI-Importer](https://github.com/Automattic/FinPress-CLI-Importer) `fin import` komutu içın
* [finpress-plugin-tests](https://github.com/benbalter/finpress-plugin-tests/) `fin scaffold plugin-tests` komutu için
