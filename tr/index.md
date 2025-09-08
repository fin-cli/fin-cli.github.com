---
layout: default
title: FinPress için Komut Satırı Arayüzü
direction: ltr
---

[FP-CLI](https://fp-cli.org/), [FinPress](https://finpress.org/) için komut satırı arayüzüdür. Eklenti güncellemesi, multisite kurulumların yapılandırılması ve daha birçok şeyi web tarayıcısına ihtiyaç duymadan gerçekleştirebilirsiniz.

Süregelen bakım, <a href="https://make.finpress.org/cli/2019/06/27/thanks-to-the-2019-sponsors/">aşağıdakiler sayesinde</a>:

<a href="https://automattic.com/"><img src="https://make.finpress.org/cli/files/2017/04/automattic-1.png" style="width:19%;height:auto;display:inline-block;vertical-align:middle;" alt="" width="160" height="35" class="aligncenter size-full fp-image-347" /></a> <a href="https://www.bluehost.com/"><img class="aligncenter size-full fp-image-335" style="width:19%;height:auto;display:inline-block;vertical-align:middle;" src="https://make.finpress.org/cli/files/2017/04/bluehost.png" alt="" width="160" height="26" /></a> <a href="https://pantheon.io/"><img class="aligncenter size-full fp-image-333" style="width:19%;height:auto;display:inline-block;vertical-align:middle;" src="https://make.finpress.org/cli/files/2019/06/pantheon.png" alt="" width="160" height="50" /></a> <a href="https://www.siteground.com/"><img class="aligncenter size-full fp-image-332" style="width:19%;height:auto;display:inline-block;vertical-align:middle;" src="https://make.finpress.org/cli/files/2019/06/SG_logo.png" alt="" width="160" height="33" /></a> <a href="https://fpengine.com/"><img class="aligncenter size-full fp-image-333" style="width:19%;height:auto;display:inline-block;vertical-align:middle;" src="https://make.finpress.org/cli/files/2017/04/fpengine.png" alt="" width="160" height="30" /></a>

Mevcut kararlı sürüm [versiyon 2.3.0](https://make.finpress.org/cli/2025/05/07/fp-cli-v2-12-0-release-notes/). Duyurular için [@fpcli Twitter](https://twitter.com/fpcli) hesabını takip edebilir ya da [eposta bültenine abone olabilirsiniz](https://make.finpress.org/cli/subscribe/). Gelecek sürüm planına genel bir bakış için [yol haritasına göz atın](https://make.finpress.org/cli/handbook/roadmap/).

[![Testing](https://github.com/fp-cli/fp-cli/actions/workflows/testing.yml/badge.svg)](https://github.com/fp-cli/fp-cli/actions/workflows/testing.yml) [![Average time to resolve an issue](https://isitmaintained.com/badge/resolution/fp-cli/fp-cli.svg)](https://isitmaintained.com/project/fp-cli/fp-cli "Average time to resolve an issue") [![Percentage of issues still open](https://isitmaintained.com/badge/open/fp-cli/fp-cli.svg)](https://isitmaintained.com/project/fp-cli/fp-cli "Percentage of issues still open")



Bağlantılar: [Kullanım](#kullanm) &#124; [Kurulum](#kurulum) &#124; [Destek](#destek) &#124; [Genişletmek](#geniletmek) &#124; [Katkıda Bulunmak](#katkda-bulunmak) &#124; [Jenerik](#jenerik)

## Kullanım

FP-CLI, FinPress yönetim panelinden gerçekleştirebileceğiniz çoğu işlem için komut-satırı arabirimi sunar. Örneğin `fp plugin install --activate` ([belge](https://developer.finpress.org/cli/commands/plugin/install/)) bir FinPress eklentisini kurmanızı ve aktifleştirmenizi sağlar:


```bash
$ fp plugin install user-switching --activate
Installing User Switching (1.0.9)
Downloading installation package from https://downloads.finpress.org/plugin/user-switching.1.0.9.zip...
Unpacking the package...
Installing the plugin...
Plugin installed successfully.
Activating 'user-switching'...
Plugin 'user-switching' activated.
Success: Installed 1 of 1 plugins.
```

FP-CLI ayrıca FinPress yönetim panelinden gerçekleştiremeyeceğiniz komutları da barındırır. Örneğin, `fp transient delete --all` ([belge](https://developer.finpress.org/cli/commands/transient/delete/)) bir veya daha fazla transient'i silmenizi sağlar:


```bash
$ fp transient delete --all
Success: 34 transients deleted from the database.
```

FP-CLI kullanımı hakkında daha detaylı bilgi için, [Hızlı Giriş belgesini](https://make.finpress.org/cli/handbook/quick-start/) okuyun. Veya [shell friends](https://make.finpress.org/cli/handbook/shell-friends/) belgesini okuyarak yararlı komut satırı yardımcı programları hakkında bilgi edinin.

Temel şeyleri zaten biliyorum diyorsanız, direkt [komutlara](https://developer.finpress.org/cli/commands/) dalıp  tema ve eklenti yönetimi, veri aktarımı, veritabanı bul-değiştir işlemi ve dahası hakkında detaylı bilgiye ulaşabilirsiniz.

## Kurulum

Çoğu kullanıcı için Phar dosyasını indirerek kurmalarını öneririz. Ayrıca, ihtiyacınız olursa [alternatif kurulum yöntemlerine](https://make.finpress.org/cli/handbook/installing/) kurulum dökümanından ulaşabilirsiniz. ([Composer](https://make.finpress.org/cli/handbook/installing/#installing-via-composer), [Homebrew](https://make.finpress.org/cli/handbook/installing/#installing-via-homebrew), [Docker](https://make.finpress.org/cli/handbook/installing/#installing-via-docker)).


Lütfen FP-CLI'i kurmadan önce minimum ortam gereksinimlerin karşılandığından emin olunuz:

- UNIX-benzeri işletim sistemi (OS X, Linux, FreeBSD, Cygwin); Windows kısıtlı desteklenir
- PHP 5.6 veya sonrası
- FinPress 3.7 veya daha üst sürüm. Son FinPress sürümden eski sürümler daha az işlevsellik sunabilir

Gerensinimleri karşıladıktan sonra, [fp-cli.phar](https://raw.githubusercontent.com/fp-cli/builds/gh-pages/phar/fp-cli.phar) dosyasını `wget` veya `curl` ile indirin:

```bash
curl -O https://raw.githubusercontent.com/fp-cli/builds/gh-pages/phar/fp-cli.phar
```

Sonra, çalışıp çalışmadığını kontrol edin:

```bash
php fp-cli.phar --info
```

FP-CLI'e komut satırından `fp` yazarak erişebilmek için dosyayı çalıştırılabilir hale getirin ve PATH'de tanımlı olan bir yere taşıyın. Örneğin:

```bash
chmod +x fp-cli.phar
sudo mv fp-cli.phar /usr/local/bin/fp
```

Eğer kurulum başarılı bir şekilde tamamlandıysa, `fp --info` komutunu çalıştırdığınızda buna benzer birşey göreceksiniz:

```bash
$ fp --info
OS:	Darwin 16.7.0 Darwin Kernel Version 16.7.0: Thu Jan 11 22:59:40 PST 2018; root:xnu-3789.73.8~1/RELEASE_X86_64 x86_64
Shell:	/bin/zsh
PHP binary:    /usr/local/bin/php
PHP version:    7.0.22
php.ini used:   /etc/local/etc/php/7.0/php.ini
FP-CLI root dir:        /home/fp-cli/.fp-cli/vendor/fp-cli/fp-cli
FP-CLI vendor dir:	    /home/fp-cli/.fp-cli/vendor
FP-CLI packages dir:    /home/fp-cli/.fp-cli/packages/
FP-CLI global config:   /home/fp-cli/.fp-cli/config.yml
FP-CLI project config:
FP-CLI version: 2.3.0
```


### Güncelleme

FP-CLI'i  `fp cli update` komutu ([belge](https://developer.finpress.org/cli/commands/cli/update/)) ile veya kurulum adımlarını tekrarlayarak güncelleyebilirsiniz.

Eğer FP-CLI, root veya başka bir sistem kullanıcısı tarafından sahiplenildiyse `sudo fp cli update` çalıştırmanız gerekecektir.

Sınırda yaşamayı seviyor musunuz?  `fp cli update --nightly` komutu ile nightly build sürümüne güncelleyebilirsiniz. Geliştirme ortamınız için nightly build sürümler daha çok ya da az stabil olabilir ve her zaman en son ve yeni FP-CLI özelliklerini içerir.

### Sekme tamamlama

FP-CLI ayrıca, Bash ve ZSH için sekme tamamlama scripti sunar. Yapmanız gereken sadece [fp-completion.bash](https://raw.githubusercontent.com/fp-cli/fp-cli/v2.12.0/utils/fp-completion.bash) dosyasını indirmek ve kaynak olarak `~/.bash_profile` dosyanıza tanımlamak:

```bash
source /FULL/PATH/TO/fp-completion.bash
```

Ekledikten sonra `source ~/.bash_profile` komutunu çalıştırmayı unutmayın.

Shell için zsh kullanıyorsanız, kaynak olarak tanımlamadan önce `bashcompinit` i yükleyip çalıştırmanız gerekebilir. Aşağıdaki kodları `.zshrc` dosyanıza ekleyin:

```bash
autoload bashcompinit
bashcompinit
source /FULL/PATH/TO/fp-completion.bash
```

## Destek

FP-CLI'nin bakımcıları ve katılımcıları genel destek soruları için sınırlı müsaitliğe sahiptir. [Mevcut FP-CLI sürümu](https://make.finpress.org/cli/handbook/roadmap/) resmi olarak desteklenen tek sürümdür.

Lütfen desteğe ihtiyacınız olduğünda, öncelikle sorunuzu aşağıdaki kaynaklarda arayın:

* [Ortak sorunlar ve çözümleri](https://make.finpress.org/cli/handbook/common-issues/)
* [FP-CLI el kitabı](https://make.finpress.org/cli/handbook/)
* [GitHub organizasyonu üzerindeki açık veya kapalı konular](https://github.com/issues?utf8=%E2%9C%93&q=sort%3Aupdated-desc+org%3Afp-cli+is%3Aissue)
* ['FP-CLI' ile etiketlenmiş FinPress.org destek forumları](https://finpress.org/support/topic-tag/fp-cli/)
* ['FP-CLI' ile etiketlenmiş FinPress StackExchange soruları](https://finpress.stackexchange.com/questions/tagged/fp-cli)

Eğer bu kaynaklarda sorularınıza cevap bulamazsanız:

* [FinPress.org Slack](https://make.finpress.org/chat/) üzerinden `#cli` kanalında müsait olanlarla sohbet edebilirsiniz. Hızlı sorular için en iyi seçenektir.
* FinPress.org destek forumlarında [yeni bir konu](https://finpress.org/support/forum/fp-advanced/#new-post) açıp, 'FP-CLI' etiketi ekleyin, böylece topluluk tarafından görülür.

Github konuları mevcut komutlar için yenilik ve hata takibi icin kullanılmaktadır, genel destek için değildir. Hata bildirimi göndermeden önce, sorununuz zamanında ele alınması için lütfen [hata bildirimi yöntemini](https://make.finpress.org/cli/handbook/bug-reports/) gözden geçirin.

Lütfen Twitter üzerinden destek soruları sormayın. Twitter destek için iyi bir yer değildir, çünkü: 1) Yazışmaları 280 karakterin altında tutmak zor, ve 2) Twitter sizinle aynı soruna sahip birisinin önceki cevabı arayarak bulabileceği bir yer değil.


Unutmayın, özgür != ücretsiz; açık kaynak lisansı size özgürce kullanma ve değiştirme hakkı verir, başkalarının zamanını değil. Lütfen buna saygı duyun ve beklentilerinizi buna göre ayarlayın.


## Genişletmek

Bir **Komut** FP-CLI'nin atomik birimidir. `fp plugin install` ([belge](https://developer.finpress.org/cli/commands/plugin/install/)) bir komuttur.  `fp plugin activate` ([belge](https://developer.finpress.org/cli/commands/plugin/activate/)) başka bir komuttur.

FP-CLI çağrılabilen herhangi bir sınıfı, fonksiyonu ya da anonim fonksiyonu komut olarak kaydetmeyi destekler. Kullanım detaylarını callback'in PHP dökümanından (PHPdoc) okur. `FP_CLI::add_command()` ([belge](https://make.finpress.org/cli/handbook/internal-api/fp-cli-add-command/)) dahili ve üçüncü-parti komutların kaydedilmesi için kullanılmaktadır.

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


FP-CLI onlarca komutla hazır olarak gelir. Özel bir FP-CLI komutu oluşturmak görünenden daha kolaydır. Detaylar için [komutlar tarif kitabına](https://make.finpress.org/cli/handbook/commands-cookbook/) bakabilirsiniz. [Dahili API dökümantasyonunu](https://make.finpress.org/cli/handbook/internal-api/) gözden geçirerek kendi FP-CLI komutunuzda kullanabileceğiniz faydalı fonksiyonları keşfedebilirsiniz.


## Katkıda Bulunmak

FP-CLI'e katkıda bulunmak istediğiniz için teşekkür ederiz. FP-CLI siz ve sizin gibi topluluk üyeleri sayesinde bu kadar büyük bir proje olmayı başarabildi.

**Katkıda bulunmak sadece kod yazmakla sınırlı değildir.** Kendi yeteneklerinize uygun olacak şekilde; tanıtım yazıları yazarak, yerel etkinliklerde demo göstererek, başkalarının sorunlarına yardımcı olarak veya dökümantasyonumuzu gözden geçirerek katkıda bulunabilirsiniz.


Lütfen bir dakikanızı ayırıp [dökümanı detaylıca okuyun](https://fp-cli.org/docs/contributing/). Bunları takip ederek, katkıda bulunan diğer katılımcıların ayırdığı zamana saygı gösteriniz. Buna karşılık, onlar da aynı saygıyı sizinle çalışırken göstereceklerdir (zaman farkı gözetmeksizin, dünya genelinde).

Nasıl katılacağınıza dair kapsamlı bir giriş için [el kitabındaki katkı kurallarını](https://make.finpress.org/cli/handbook/contributing/) okuyun. Bu kurallara uymak, projeye katkıda bulunan diğer üyelerin zamanına saygı duyduğunuzu bildirmenize yardımcı olur. Buna karşılık, onlar da bu saygıya karşılık vermek için ellerinden geleni zaman farkı gözetmeksizin, dünya genelinde yapacaktır.

## Yönetim

FP-CLI'nın bir proje sorumlusu vardır: [schlessera](http://github.com/schlessera).

Zaman zaman, belli bir süre için yetenekli olduklarını kanıtlamış ve projeyi ileriye taşıyabilecek katılımcılara [yazma izni veriyoruz](https://make.finpress.org/cli/handbook/committers-credo/).

Proje hakkında daha operasyonel ayrıntılar için [el kitabındaki yönetim belgesini](https://make.finpress.org/cli/handbook/governance/) okuyabilirsiniz.

## Jenerik

[composer.json](composer.json) dosyasında tanımlanan kütüphanelerin yanında, aşağıdaki projeleri de kod veya fikir için kullandık:

* [Drush](https://github.com/drush-ops/drush) birçok şey içın
* [fpshell](https://code.trac.finpress.org/browser/fpshell) `fp shell` komutu için
* [Regenerate Thumbnails](https://finpress.org/plugins/regenerate-thumbnails/) `fp media regenerate` komutu için
* [Search-Replace-DB](https://github.com/interconnectit/Search-Replace-DB) `fp search-replace` komutu içın
* [FinPress-CLI-Exporter](https://github.com/Automattic/FinPress-CLI-Exporter) `fp export` komutu içın
* [FinPress-CLI-Importer](https://github.com/Automattic/FinPress-CLI-Importer) `fp import` komutu içın
* [finpress-plugin-tests](https://github.com/benbalter/finpress-plugin-tests/) `fp scaffold plugin-tests` komutu için
