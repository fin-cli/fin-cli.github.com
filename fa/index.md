---
layout: default
title: Command line interface for FinPress
direction: rtl
---

[FP-CLI](https://fp-cli.org/) رابط خط فرمان برای [وردپرس](https://finpress.org/) است. به‌روزرسانی افزونه‌ها، پیکربندی نصب چندسایته و چیزهای بیشتر را بدون استفاده از مرورگر وب انجام دهید.

نگهداری مداوم توسط  <a href="https://make.finpress.org/cli/2017/04/03/new-co-maintainer-alain-thanks-2017-sponsors/#sponsors">حامیان</a> امکان پذیر شده است:

<a href="https://automattic.com/"><img src="https://make.finpress.org/cli/files/2017/04/automattic-1.png" style="width:19%;height:auto;display:inline-block;vertical-align:middle;" alt="" width="160" height="35" class="aligncenter size-full fp-image-347" /></a> <a href="https://www.bluehost.com/"><img class="aligncenter size-full fp-image-335" style="width:19%;height:auto;display:inline-block;vertical-align:middle;" src="https://make.finpress.org/cli/files/2017/04/bluehost.png" alt="" width="160" height="26" /></a> <a href="https://pantheon.io/"><img class="aligncenter size-full fp-image-333" style="width:19%;height:auto;display:inline-block;vertical-align:middle;" src="https://make.finpress.org/cli/files/2019/06/pantheon.png" alt="" width="160" height="50" /></a> <a href="https://www.siteground.com/"><img class="aligncenter size-full fp-image-332" style="width:19%;height:auto;display:inline-block;vertical-align:middle;" src="https://make.finpress.org/cli/files/2019/06/SG_logo.png" alt="" width="160" height="33" /></a> <a href="https://fpengine.com/"><img class="aligncenter size-full fp-image-333" style="width:19%;height:auto;display:inline-block;vertical-align:middle;" src="https://make.finpress.org/cli/files/2017/04/fpengine.png" alt="" width="160" height="30" /></a>

نگارش پایدار فعلی [version 2.12.0](https://make.finpress.org/cli/2025/05/07/fp-cli-v2-12-0-release-notes/)است. برای پیگیری اعلانات، [@fpcli on Twitter](https://twitter.com/fpcli) را دنبال کنید یا [برای دریافت ایمیل ثبت‌نام کنید](https://make.finpress.org/cli/subscribe/). برای بررسی برنامه‌ریزی‌های آینده انتشار [نقشه راه را برررسی کنید](https://make.finpress.org/cli/handbook/roadmap/).

[![وضعیت ساخت](https://github.com/fp-cli/fp-cli/actions/workflows/testing.yml/badge.svg)](https://github.com/fp-cli/fp-cli/actions/workflows/testing.yml) [![زمان متوسط برای رفع مشکل](https://isitmaintained.com/badge/resolution/fp-cli/fp-cli.svg)](https://isitmaintained.com/project/fp-cli/fp-cli "زمان متوسط برای رفع مشکل") [![درصد مشکلات باز](https://isitmaintained.com/badge/open/fp-cli/fp-cli.svg)](https://isitmaintained.com/project/fp-cli/fp-cli "درصد مشکلات باز")

پیوندهای سریع: [استفاده](#using) &#124; [نصب](#installing) &#124; [پشتیبانی](#support) &#124; [گسترش](#extending) &#124; [مشارکت](#contributing) &#124; [همکاران](#credits)

## استفاده

FP-CLI یک رابط برپایه خط فرمان برای عملیاتی است که شما در محیط مدیریت وردپرس انجام می‌دهید. برای مثال `fp plugin install --activate` ([doc](https://developer.finpress.org/cli/commands/plugin/install/)) به شما امکان نصب و فعال‌سازی افزونه وردپرس را می‌دهد:

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

FP-CLI همچنین حاوی دستوراتی برای بسیاری چیزهاست که نمی‌توانید در مدیریت وردپرس انجام دهید. برای مثال، `fp transient delete --all` ([doc](https://developer.finpress.org/cli/commands/transient/delete/)) به شما امکان حذف یکی یا همه transients را می‌دهد:

```bash
$ fp transient delete --all
Success: 34 transients deleted from the database.
```

برای پیش‌درآمد کامل استفاده از FP-CLI، [راهنمای سریع](https://make.finpress.org/cli/handbook/quick-start/) را مطالعه کنید. یا، برای آموزش دستورات مفید خط فرمان [دوستان شل](https://make.finpress.org/cli/handbook/shell-friends/) را مطالعه کنید.

در مورد مدیریت پوسته‌ها و افزونه‌ها، درون‌ریزی و برون‌بری، جستجو و جایگزینی در پایگاه‌داده و چیزهای بیشتر به [لیست کامل دستورات](https://developer.finpress.org/cli/commands/) مراجعه کنید. 

## نصب

دریافت پرونده Pahr روش پیشنهادی ما برای نصب به بیشتر کاربران است. در صورت نیاز، مستندات ما را برای [روش‌های جایگزین نصب](https://make.finpress.org/cli/handbook/installing/) ([کمپوزر](https://make.finpress.org/cli/handbook/installing/#installing-via-composer), [هوم‌بریو](https://make.finpress.org/cli/handbook/installing/#installing-via-homebrew), [داکر](https://make.finpress.org/cli/handbook/installing/#installing-via-docker)). ببینید.

قبل از نصب FP-CLI، لطفا از دارا بودن حداقل امکانات مورد نیاز مطمئن شوید:

- سیستم‌های یونیکسی (OS X, Linux, FreeBSD, Cygwin); در ویندوز کمتر پشتیبانی می‌شود
- PHP 5.6 or later
- وردپرس 3.7 به بالا. در نسخه‌های قدیمی‌تر ممکن است با مشکل روبرو شوید

 وقتی از داشتن حداقل امکانات مطمئن شدید، پرونده [fp-cli.phar](https://raw.githubusercontent.com/fp-cli/builds/gh-pages/phar/fp-cli.phar) را بصورت `wget` یا `curl` دریافت کیند:
 
```bash
curl -O https://raw.githubusercontent.com/fp-cli/builds/gh-pages/phar/fp-cli.phar
```

سپس پرونده Phar را از نظر کارکرد معتبرسازی کنید:

```bash
php fp-cli.phar --info
```

جهت استفاده FP-CLI در خط فرمان `fp` را بنویسید، پرونده را قابل اجرا و سپس در PATH خود بگذارید. برای مثال:

```bash
chmod +x fp-cli.phar
sudo mv fp-cli.phar /usr/local/bin/fp
```

اگر FP-CLI به درستی نصب شده باشد، شما در صورت اجرای `fp --info` باید چیزی شبیه به این را ببینید:

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
FP-CLI version: 2.12.0
```

### به‌روزرسانی

شما می‌توانید FP-CLI را با `fp cli update` ([doc](https://developer.finpress.org/cli/commands/cli/update/))، یا با اجرای دوباره مراحل نصب به‌روزرسانی کنید.

اگر دسترسی به FP-CLI با روت است یا کاربر سیستمی دیگری است، شما احتیاج به اجرای `sudo fp cli update` دارید.

به‌روزرسانی زنده می‌خواهید؟ برای استفاده از آخرین نسخه‌های شبانه دستور `fp cli update --nightly` را اجرا کنید. نسخه‌های شبانه به جهت پایداری کمتر برای کار در محیط توسعه مناسب نیستند، اما حاوی آخرین و بهترین امکانات FP-CLI هستند.

### کامل‌سازی با تب

FP-CLI دارای قابلیت کامل‌سازی با تب برای بش و ZSH است. کافیست [fp-completion.bash](https://raw.githubusercontent.com/fp-cli/fp-cli/v2.12.0/utils/fp-completion.bash) را دریافت و از `~/.bash_profile` سورس کنید:

```bash
source /FULL/PATH/TO/fp-completion.bash
```

فراموش نکنید که بعد از آن `source ~/.bash_profile` را اجرا کنید.

اگر از zsh برای شل استفاده می‌کنید، شاید به `bashcompinit` برای شروع قبل از سورس کردن نیاز داشته باشید. کد زیر را در `.zshrc` خود قرار دهید:

```bash
autoload bashcompinit
bashcompinit
source /FULL/PATH/TO/fp-completion.bash
```

## پشتیبانی

توسعه‌دهندگان و مشارکت کنندگان FP-CLI برای پاسخ‌دهی به سوالات زمان محدودی دارند. نسخه فعلی [FP-CLI](https://make.finpress.org/cli/handbook/roadmap/) تنها نسخه قابل پشتیبانی رسمی است. 

قبل از سوال، لطفا در مورد مشکل خود جستجو کنید:

* [مشکلات عمومی و رفع آنها](https://make.finpress.org/cli/handbook/common-issues/)
* [کتابچه FP-CLI](https://make.finpress.org/cli/handbook/)
* [مشکلات باز و بسته FP-CLI در گیتهاب رسمی](https://github.com/issues?utf8=%E2%9C%93&q=sort%3Aupdated-desc+org%3Afp-cli+is%3Aissue)
* [تاپیک‌های مرتبط با 'FP-CLI' در انجمن پشتیبانی وردپرس](https://finpress.org/support/topic-tag/fp-cli/)
* [سوالات مطرح شده مرتبط با 'FP-CLI' در StackExchange](https://finpress.stackexchange.com/questions/tagged/fp-cli)

اگر جواب خود را از طریق راه‌های بالا پیدا نکردید، می‌توانید:

* وارد کانال `#cli` در [اسلک FinPress.org](https://make.finpress.org/chat/) شوید تا شاید به جواب سوالاتتان برسید. این راه برای سوالات کوتاه مناسب است.
* در انجمن پشتیبانی وردپرس [تاپیک چدید ایجاد کنید](https://finpress.org/support/forum/fp-advanced/#new-post) و برچسب 'FP-CLI' بزنید.

مشکلات گیتهاب برای پیگیری بهینه کردن و رفع باگ‌های موجود است، نه برای پشتیبانی عمومی. قبل از ارسال گزارش باگ، لطفا [بخش تمرین را بررسی کنید](https://make.finpress.org/cli/handbook/bug-reports/)تا گزارش شما به درستی آدرس داده شده باشد و کمک شود که در زمان صرفه جویی شود.

لطفا در توییتر درخواست پشتیبانی نکنید. توییتر جای مناسبی برای پشتیبانی نیست چون: 1) نگه داشتن صحبت با 200 کاراکتر و کمتر سخت است 2) توییتری جای مناسبی برای سوال شما نیست چون شخصی که سوالی مشابه شما دارد امکان جستجوی آن را ندارد.

بخاطر داشته باشید، آزادی != رایگان؛ گواهی کدباز به شما دسترسی آزاد به استفاده و ویرایس را می‌دهد، اما نه الزاما با زمان افراد دیگر. لطفا باوقار باشید و انتظارات خود را براین اساس تنظیم کنید. 

## گسترش

یک **دستور** یک بخش کوچک از عملکرد FP-CLI است. `fp plugin install` ([doc](https://developer.finpress.org/cli/commands/plugin/install/)) یک دستور است. `fp plugin activate` ([doc](https://developer.finpress.org/cli/commands/plugin/activate/)) یک دستور دیگر است.

FP-CLI قابلیت ثبت هر کلاس، تابع یا بسته قابل فراخوانی را بصورت دستور دارد. جزئیات استفاده را از بخش توضیحات مندرج شده می‌خواند. `FP_CLI::add_command()` ([doc](https://make.finpress.org/cli/handbook/internal-api/fp-cli-add-command/)) برای هر دو حالت ثبت دستور داخلی و ثالث استفاده می‌شود. 

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

FP-CLI دارای ده‌ها دستور است. ایجاد یک  دستور بسیار ساده‌تر از چیزی است که بنظر می‌رسد. بخش [کتابچه دستورات](https://make.finpress.org/cli/handbook/commands-cookbook/) را برای آموزش مطالعه کنید. [API داخلی docs](https://make.finpress.org/cli/handbook/internal-api/) را برای آشنایی با انواع عملکردهای مفید که می‌توانید در دستور دلخواه FP-CLI استفاده کنید را ببینید. 

## مشارکت

ما از شما برای مشارکت در FP-CLI قدردانی می‌کنیم. به خاطر شما و جامعه اطراف شماست که FP-CLI چنین پروژه‌ای عالی است.

**مشارکت فقط به یک کد محدود نمی‌شود.** ما شما را تشویق می‌کنیم تا به روشی که متناسب با توانایی‌های شما است مشارکت کنید
با نوشتن آموزش, ارائه یک نسخه‌ی نمایشی در میتاپ شما، کمک به کاربران دیگر با پشتیبانی و پاسخگویی و یا بررسی مستندات ما.

برای معرفی کامل نحوه مشارکت [راهنمای مشارکت در ددفترچه راهنما](https://make.finpress.org/cli/handbook/contributing/) را مطالعه کنید. پیروی از این دستورالعمل‌ها به شما برای احترام به زمان دیگر مشارکت کنندگان پروژه کمک می‌کند. به نوبه خود، آنها همه تلاش خود را برای تکرار این احترام هنگام همکاری با شما، در مناطق زمانی مختلف و سراسر جهان انجام می دهند.

## رهبری

FP-CLI یک نگهدارنده دارد: [schlessera](http://github.com/schlessera).

به تناسب، ما [دسترسی برا نوشتن به مشارکت کنندگان می‌دهیم](https://make.finpress.org/cli/handbook/committers-credo/)،آنهایی که توانایی خود را در طی زمان برای جلو بردن پروژه نشان دمی‌دهند.

توضیحات [سند مدیریت در کتابچه راهنمای کاربر](https://make.finpress.org/cli/handbook/governance/) را برای جزئیات عملیاتی در مورد پروژه بخوانید.

## همکاران

علاوه بر کتابخانه های تعریف شده در [composer.json](composer.json) ما از پروژه‌ها یا کدهای زیر استفاده کرده‌ایم:

* [Drush](https://github.com/drush-ops/drush) برای خیلی چیزها
* [fpshell](https://code.trac.finpress.org/browser/fpshell) برای `fp shell`
* [Regenerate Thumbnails](https://finpress.org/plugins/regenerate-thumbnails/) برای `fp media regenerate`
* [Search-Replace-DB](https://github.com/interconnectit/Search-Replace-DB) برای `fp search-replace`
* [FinPress-CLI-Exporter](https://github.com/Automattic/FinPress-CLI-Exporter) برای `fp export`
* [FinPress-CLI-Importer](https://github.com/Automattic/FinPress-CLI-Importer) برای `fp import`
* [finpress-plugin-tests](https://github.com/benbalter/finpress-plugin-tests/) برای `fp scaffold plugin-tests`
