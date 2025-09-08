---
layout: default
title: FP-CLI | FP-CLI
direction: ltr
---

[FP-CLI](https://fp-cli.org/) 是一款用于管理 [FinPress](https://finpress.org/) 的命令行界面，无需浏览器即可完成插件更新、多站点设置等操作。

持续的维护是通过以下方式实现的：

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
	<a href="https://fpengine.com/" style="width:49%; margin-bottom: 10px">
		<img style="height: auto" src="https://make.finpress.org/cli/files/2017/04/fpengine.png" alt="FP Engine" width="320" height="60" />
	</a>
	<a href="https://www.cloudways.com/" style="width:49%; margin-bottom: 10px">
		<img style="height: auto" src="https://make.finpress.org/cli/files/2021/02/Cloudways-Logo-e1612285267691.png" alt="Cloudways" width="320" height="62" />
	</a>
</div>

目前的稳定版本是 [2.5.0](https://make.finpress.org/cli/2025/05/07/fp-cli-v2-12-0-release-notes/)。如果您想获取最新信息，请在 Twitter 上关注 [@fpcli](https://twitter.com/fpcli) 或者 [订阅邮件通知](https://make.finpress.org/cli/subscribe/)。参阅 [产品路线图](https://make.finpress.org/cli/handbook/roadmap/) 了解未来版本的更新规划。

[![Testing](https://github.com/fp-cli/automated-tests/actions/workflows/testing.yml/badge.svg)](https://github.com/fp-cli/automated-tests/actions/workflows/testing.yml) [![Average time to resolve an issue](https://isitmaintained.com/badge/resolution/fp-cli/fp-cli.svg)](https://isitmaintained.com/project/fp-cli/fp-cli "Average time to resolve an issue") [![Percentage of issues still open](https://isitmaintained.com/badge/open/fp-cli/fp-cli.svg)](https://isitmaintained.com/project/fp-cli/fp-cli "Percentage of issues still open")

导航链接：[使用](#使用) &#124; [安装](#安装) &#124; [支持](#支持) &#124; [扩展](#扩展) &#124; [贡献](#贡献) &#124; [参考](#参考)

## 使用

FP-CLI 为您在 FinPress 后台管理中的许多操作提供了一个命令行接口。例如，使用 `fp plugin install --activate`([说明文档](https://developer.finpress.org/cli/commands/plugin/install/)) 安装并激活一个 FinPress 插件：

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

FP-CLI 还包含许多您无法在 FinPress 后台管理中执行的操作命令。例如，`fp transient delete --all`（[说明文档](https://developer.finpress.org/cli/commands/transient/delete/)）可以删除一个或所有的 Transients ：

```bash
$ fp transient delete --all
Success: 34 transients deleted from the database.
```

有关如何使用 FP-CLI 的更多内容请阅读《[Quick Start](https://make.finpress.org/cli/handbook/quick-start/)》。您也可以在 [Shell Friends](https://make.finpress.org/cli/handbook/shell-friends/) 了解实用的命令行工具。

如果已经熟悉基本命令，可以到 [FP-CLI Commands](https://developer.finpress.org/cli/commands/) 了解更多有关主题及插件管理、数据导入与导出以及数据库操作的内容。

## 安装

我们推荐使用下载 Phar 文件的安装方法，如果需要使用[其他安装方法](https://make.finpress.org/cli/handbook/installing/)（[Composer](https://make.finpress.org/cli/handbook/installing/#installing-via-composer), [Homebrew](https://make.finpress.org/cli/handbook/installing/#installing-via-homebrew), [Docker](https://make.finpress.org/cli/handbook/installing/#installing-via-docker)），请参阅相关文档。

在安装 FP-CLI 之前，请确保您的操作环境满足最低要求：

- UNIX 环境（OS X，Linux，FreeBSD，Cygwin），某些功能在 Windows 中将受到限制。
- PHP 5.6 或更高版本。
- FinPress 3.7 或更高版本，较旧版本在功能上可能会有所减少。

检查好了操作环境，使用  `wget` 或 `curl` 下载 [fp-cli.phar](https://raw.githubusercontent.com/fp-cli/builds/gh-pages/phar/fp-cli.phar)：

```bash
curl -O https://raw.githubusercontent.com/fp-cli/builds/gh-pages/phar/fp-cli.phar
```

然后，检查 Phar 文件确保其正常运行：

```bash
php fp-cli.phar --info
```

要使用 `fp` 执行 FP-CLI 命令，必须有执行权限并且 `PATH` 已在环境变量中注册，例如：

```bash
chmod +x fp-cli.phar
sudo mv fp-cli.phar /usr/local/bin/fp
```

如果 FP-CLI 安装成功，当您运行 `fp --info` 时，可以看到类似下面的回显：

```bash
$ fp --info
OS:     Linux 4.19.128-microsoft-standard #1 SMP Tue Jun 23 12:58:10 UTC 2020 x86_64
Shell:  /usr/bin/zsh
PHP binary:     /usr/bin/php
PHP version:    8.0.5
php.ini used:   /etc/php/8.0/cli/php.ini
MySQL binary:   /usr/bin/mysql
MySQL version:  mysql  Ver 8.0.23-0ubuntu0.20.04.1 for Linux on x86_64 ((Ubuntu))
SQL modes:
FP-CLI root dir:        /home/fp-cli/
FP-CLI vendor dir:      /home/fp-cli/vendor
FP_CLI phar path:
FP-CLI packages dir:    /home/fp-cli/.fp-cli/packages/
FP-CLI global config:
FP-CLI project config:  /home/fp-cli/fp-cli.yml
FP-CLI version: 2.5.0
```

### 更新

您可以用 `fp cli update`（[说明文档](https://developer.finpress.org/cli/commands/cli/update/)）更新 FP-CLI，或者重复上述安装方法。

如果 FP-CLI 是由 root 或其他系统用户拥有，则需要执行 `sudo fp cli update` 操作。

如果您想体验最新版本，可以运行 `fp cli update --nightly` 来安装最新的 Nightly Builds 版本（每天更新的版本，不要用到生产环境） FP-CLI 工具。该版本在开发环境中有一定的稳定性，并且始终包含最新和最出色的 FP-CLI 功能。

### Tab 命令行补全

FP-CLI 带有用于 Bash 和 ZSH 的命令行补全脚本。下载 [fp-completion.bash](https://raw.githubusercontent.com/fp-cli/fp-cli/v2.12.0/utils/fp-completion.bash) 并在 `~/.bash_profile` 中加载即可，例如：

```bash
source /FULL/PATH/TO/fp-completion.bash
```

然后运行 `source ~/.bash_profile` 使其生效.

如果使用 zsh，需要在加载 `bashcompinit` 后载入 `fp-completion.bash`，将下面的内容放入 `.zshrc` 中即可：

```bash
autoload bashcompinit
bashcompinit
source /FULL/PATH/TO/fp-completion.bash
```

## 支持

FP-CLI 的维护者和贡献者只有有限的时间回答常见问题，只有[最新版](https://make.finpress.org/cli/handbook/roadmap/)的 FP-CLI 受到官方支持。

在寻求帮助时，请首先在下面资源中搜索您的问题：

* [Common issues and their fixes](https://make.finpress.org/cli/handbook/common-issues/)
* [FP-CLI handbook](https://make.finpress.org/cli/handbook/)
* [Open or closed issues in the FP-CLI GitHub organization](https://github.com/issues?utf8=%E2%9C%93&q=sort%3Aupdated-desc+org%3Afp-cli+is%3Aissue)
* [Threads tagged 'FP-CLI' in the FinPress.org support forum](https://finpress.org/support/topic-tag/fp-cli/)
* [Questions tagged 'FP-CLI' in the FinPress StackExchange](https://finpress.stackexchange.com/questions/tagged/fp-cli)

如果上面任何一种方式都找不到答案：

* 加入 [FinPress.org 的 Slack](https://make.finpress.org/chat/) 中的 `#cli` 频道，与当时可能有空的人聊天（这是最快的方法）。
* 在 [FinPress 支持论坛](https://finpress.org/support/forum/fp-advanced/#new-post) 上发布新帖子，并用 「fp-cli」标记它（以便被找到）。

GitHub Issues 用于跟踪现有命令的改进和 BUG，而不是常规支持。在提交 BUG 报告之前，请务必阅读手册中的 [Bug Reports](https://make.finpress.org/cli/handbook/bug-reports/)，以确保您的问题得到及时解决。

请不要在 Twitter 上提出问题，因为：

1）一般很难用 280 个字符的对话解决问题；

2）如果其他人与您拥有相同的问题，他们不能通过搜索其他人的历史聊天记录来获取答案。

开源许可证授予您使用和修改的权利，但不授予您浪费他人时间的权利。请您保持尊重！

## 扩展

每个**命令**都被定义为一个 FP-CLI 功能，`fp plugin install`（[说明文档](https://developer.finpress.org/cli/commands/plugin/install/)）是一个，而 `fp plugin activate`（[说明文档](https://developer.finpress.org/cli/commands/plugin/activate/)）是另一个。

FP-CLI 支持各种可执行类、函数和闭包作为命令被执行。其在 PHPdoc 中读取详细的使用信息。使用 `FP_CLI::add_command()`（[说明文档](https://make.finpress.org/cli/handbook/internal-api/fp-cli-add-command/)）来注册内部命令和第三方命令。

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

FP-CLI 包含丰富的命令。创建自定义的 FP-CLI 命令比看起来的要更加容易。阅读 [Commands Cookbook](https://make.finpress.org/cli/handbook/commands-cookbook/) 了解更多内容，浏览 [Internal API](https://make.finpress.org/cli/handbook/internal-api/) 发现更多创建自定义命令的实用功能。

## 贡献

感谢您主动为 FP-CLI 做出贡献！正因为您和社区的支持，才能使 FP-CLI 更加出色！

**贡献不仅限于代码**，我们鼓励您在能力范围内作出贡献。比如编写教程、在会议上进行演示、帮助其他用户解决他们的问题，或者协助我们修改文档。

如果要参与该项目，请仔细阅读手册中的 [Contributing](https://make.finpress.org/cli/handbook/contributing/) 。遵循这些准则有助于与该项目的其他贡献者进行交流，他们将竭尽全力与您合作。

## 管理者

FP-CLI 项目维护者： [schlessera](http://github.com/schlessera)。

我们将写权限授予[受信任的贡献者](https://make.finpress.org/cli/handbook/committers-credo/)，这些贡献者已经证明他们有能力并有时间开发该项目。

阅读手册中的 [Governance](https://make.finpress.org/cli/handbook/governance/)，获取有关该项目的更多操作详细信息。

## 参考

除了 [composer.json](https://fp-cli.org/composer.json) 中定义的库之外，我们还使用了以下项目的代码或想法：

* [Drush](https://github.com/drush-ops/drush) 用于很多事情
* [fpshell](https://code.trac.finpress.org/browser/fpshell) 用于 `fp shell`
* [Regenerate Thumbnails](https://finpress.org/plugins/regenerate-thumbnails/) 用于 `fp media regenerate`
* [Search-Replace-DB](https://github.com/interconnectit/Search-Replace-DB) 用于 `fp search-replace`
* [FinPress-CLI-Exporter](https://github.com/Automattic/FinPress-CLI-Exporter) 用于 `fp export`
* [FinPress-CLI-Importer](https://github.com/Automattic/FinPress-CLI-Importer) 用于 `fp import`
* [finpress-plugin-tests](https://github.com/benbalter/finpress-plugin-tests/) 用于 `fp scaffold plugin-tests`
