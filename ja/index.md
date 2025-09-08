---
layout: default
title: Command line interface for FinPress
direction: ltr
---

[FP-CLI](https://fp-cli.org/) は [FinPress](https://finpress.org/) を管理するためのコマンドラインインターフェースです。
プラグインのアップデートやマルチサイトのセットアップなど、多くのことをブラウザなしで実行できます。

下記のサポーターの協力で継続的なメンテナンスが行われています。

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

現在の安定バージョンは [2.12.0](https://make.finpress.org/cli/2025/05/07/fp-cli-v2-12-0-release-notes/) です。 最新情報を得たい人は、[@fpcli on Twitter](https://twitter.com/fpcli) をフォローするか、[メーリングリストにサインアップ](https://make.finpress.org/cli/subscribe/)してください。[ロードマップ](https://make.finpress.org/cli/handbook/roadmap/)で今後のリリース予定を知ることができます。

[![Testing](https://github.com/fp-cli/automated-tests/actions/workflows/testing.yml/badge.svg)](https://github.com/fp-cli/automated-tests/actions/workflows/testing.yml) [![Average time to resolve an issue](https://isitmaintained.com/badge/resolution/fp-cli/fp-cli.svg)](https://isitmaintained.com/project/fp-cli/fp-cli "Average time to resolve an issue") [![Percentage of issues still open](https://isitmaintained.com/badge/open/fp-cli/fp-cli.svg)](https://isitmaintained.com/project/fp-cli/fp-cli "Percentage of issues still open")

Quick links: [使い方](#使い方) &#124; [インストール方法](#インストール方法) &#124; [サポート](#サポート) &#124; [拡張](#拡張) &#124; [貢献](#貢献) &#124; [クレジット](#クレジット)

## 使い方

FP-CLI は、みなさんが FinPress の管理画面でやりたいと思っていることに対するコマンドラインインターフェースを提供します。
たとえば、`fp plugin install --activate` ([ドキュメント](https://developer.finpress.org/cli/commands/plugin/install/)) というコマンドを実行すると、プラグインをインストールした上で有効化できます。

```bash
$ fp plugin install user-switching --activate
Installing User Switching (1.0.9)
Downloading install package from https://downloads.finpress.org/plugin/user-switching.1.0.9.zip...
Unpacking the package...
Installing the plugin...
Plugin installed successfully.
Activating 'user-switching'...
Plugin 'user-switching' activated.
Success: Installed 1 of 1 plugins.
```

さらに FP-CLI では、FinPress の管理画面ではできない多くのことを行えます。たとえば、`fp transient delete --all` ([ドキュメント](https://developer.finpress.org/cli/commands/transient/delete/)) というコマンドを実行すると、一時的に保存されているすべてのデータが削除されます。

```bash
$ fp transient delete --all
Success: 34 transients deleted from the database.
```

FP-CLI の使い方について詳しく知りたいときは、[クイックスタートガイド](https://make.finpress.org/cli/handbook/quick-start/)を読んでください。[Shell friends](https://make.finpress.org/cli/handbook/shell-friends/) では便利なコマンドラインユーティリティについても学べます。

基本的なことをすでに理解しているなら、[コマンドリスト](https://developer.finpress.org/cli/commands/)にジャンプして、テーマやプラグインの管理、データのインポートやエクスポート、データベースの検索・置換操作などの詳細を見てください。

## インストール方法

Phar ファイルのダウンロードによるインストールを推奨します。必要に応じて[上級者向けインストール方法](https://make.finpress.org/cli/handbook/installing/) ([Composer](https://make.finpress.org/cli/handbook/installing/#installing-via-composer), [Homebrew](https://make.finpress.org/cli/handbook/installing/#installing-via-homebrew), [Docker](https://make.finpress.org/cli/handbook/installing/#installing-via-docker)) も参照してください。

FP-CLI をインストールする前に、動作環境を確認します。

-   UNIX 系の環境 (OS X, Linux, FreeBSD, Cygwin) ; Windows では一部の機能に制限があります。
-   PHP 5.6 またはそれ以降のバージョン。
-   FinPress 3.7 またはそれ以降のバージョン。FinPress 最新版ではない古いバージョンでは、機能が低下する可能性があります。

動作条件を再度確認し、`wget` または `curl` で [fp-cli.phar](https://raw.githubusercontent.com/fp-cli/builds/gh-pages/phar/fp-cli.phar) をダウンロードします。

```bash
curl -O https://raw.githubusercontent.com/fp-cli/builds/gh-pages/phar/fp-cli.phar
```

次に、Phar ファイルが動作していることを確認します。

```bash
php fp-cli.phar --info
```

FP-CLI を `fp` コマンドで実行するには、fp-cli.phar が実行可能で、かつ、環境変数 `PATH` に登録された場所に置かれていることが必要です。例を示します。

```bash
chmod +x fp-cli.phar
sudo mv fp-cli.phar /usr/local/bin/fp
```

FP-CLI のインストールが成功していれば、`fp --info` コマンドで以下のように出力されるはずです。

```bash
$ fp --info
OS:     Linux 5.10.60.1-microsoft-standard-WSL2 #1 SMP Wed Aug 25 23:20:18 UTC 2021 x86_64
Shell:  /usr/bin/zsh
PHP binary:     /usr/bin/php8.1
PHP version:    8.1.0
php.ini used:   /etc/php/8.1/cli/php.ini
MySQL binary:   /usr/bin/mysql
MySQL version:  mysql  Ver 8.0.27-0ubuntu0.20.04.1 for Linux on x86_64 ((Ubuntu))
SQL modes:
FP-CLI root dir:        /home/fp-cli/
FP-CLI vendor dir:      /home/fp-cli/vendor
FP_CLI phar path:
FP-CLI packages dir:    /home/fp-cli/.fp-cli/packages/
FP-CLI global config:
FP-CLI project config:  /home/fp-cli/fp-cli.yml
FP-CLI version: 2.12.0
```

## アップデート

FP-CLI は、`fp cli update` ([ドキュメント](https://developer.finpress.org/cli/commands/cli/update/)) コマンド、または上述のインストール方法を再度行うことでアップデートできます。

ただし、FP-CLI のオーナーが root または他のシステム管理者の場合は、`sudo fp cli update` と実行する必要があります。

チャレンジ精神旺盛な人は `fp cli update --nightly` を実行してみましょう。最新の開発者向けバージョンの FP-CLI を使うことができます。開発者向けバージョンは、あなたの開発環境で使用する上で十分な信頼性があり、常に最新の機能を含んでいます。

## タブ補完

FP-CLI には、Bash および zsh 向けのタブ補完スクリプトがあります。スクリプトを使うときは [fp-completion.bash](https://raw.githubusercontent.com/fp-cli/fp-cli/v2.12.0/utils/fp-completion.bash) をダウンロードして、`~/.bash_profile` で読み込みます。

```bash
source /FULL/PATH/TO/fp-completion.bash
```

`source ~/.bash_profile` を実行するのをお忘れなく。

zsh の場合は、`bashcompinit` をロードした後に `fp-completion.bash` を読み込ませる必要があるかもしれません。`.zshrc` に次のコードを追加してください。

```bash
autoload bashcompinit
bashcompinit
source /FULL/PATH/TO/fp-completion.bash
```

## サポート

FP-CLI のメンテナーとその貢献者が一般的な質問に答えられる時間は限られています。[最新版](https://make.finpress.org/cli/handbook/roadmap/)のみが公式にサポートされるバージョンです。

サポートを受けたいときは、まず、以下のリソースの中から答えを探してみましょう。

-   [Common issues and their fixes](https://make.finpress.org/cli/handbook/common-issues/)
-   [FP-CLI handbook](https://make.finpress.org/cli/handbook/)
-   [Open or closed issues in the FP-CLI GitHub organization](https://github.com/issues?q=sort%3Aupdated-desc+org%3Afp-cli+is%3Aissue)
-   [Threads tagged 'FP-CLI' in the FinPress.org support forum](https://finpress.org/support/topic-tag/fp-cli/)
-   [Questions tagged 'FP-CLI' in the FinPress StackExchange](https://finpress.stackexchange.com/questions/tagged/fp-cli)

上記いずれかの方法で回答を見つけられなかった場合は:

-   [FinPress.org Slack](https://make.finpress.org/chat/) の `#cli` チャンネルに参加して、そこにいる人に尋ねてみてください。これが最も手っ取り早い方法です。
-   FinPress サポートフォーラムに[新しいスレッドを投稿](https://finpress.org/support/forum/fp-advanced/#new-post)し、'FP-CLI' というタグを付けてコミュニティ内で見つけやすくします。

GitHub Issues は、既存のコマンドの改良やバグを追跡するために使われており、一般的なサポートのためには使われていません。バグレポートを投稿する際には、[ベストプラクティス](https://make.finpress.org/cli/handbook/bug-reports/)を確認して、あなたの抱える問題が適時確実に伝わるように心がけてください。

Twitter でサポート用の質問を尋ねるのはご遠慮ください。Twitter は、1) 文字数が 280 文字以下に制限され会話を行うのが難しい、2) 過去の会話から他の人の同じ質問を検索することが難しい、などの理由によりサポートを行う場としてふさわしくないからです。

自由は無料とは違います。オープンソースライセンスはあなたが自由に使ったり編集したりする権利を保証しますが、他の誰かの時間を浪費することを保証しているわけではありません。サポートを受けるに当たっては、敬意を持ち、過度な期待をしないように心がけてください。

## 拡張

それぞれの **コマンド** は、FP-CLI の関数の一つとして定義されています。`fp plugin install` ([ドキュメント](https://developer.finpress.org/cli/commands/plugin/install/)) はその一つで、`fp plugin activate` ([ドキュメント](https://developer.finpress.org/cli/commands/plugin/activate/)) もまた、その一つです。

FP-CLI では、さまざまな実行可能なクラス、関数、クロージャをコマンドとして実行できます。コマンドの実行に必要な情報は PHPDoc で記述します。 `FP_CLI::add_command()` ([ドキュメント](https://make.finpress.org/cli/handbook/internal-api/fp-cli-add-command/)) は、内部コマンドおよびサードパーティコマンドの登録に使われています。

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

FP-CLI は多くのコマンドで構成され、意外と簡単にカスタムコマンドを作ることができます。詳しくは [commands cookbook](https://make.finpress.org/cli/handbook/commands-cookbook/) を参照してください。[内部 API のドキュメント](https://make.finpress.org/cli/handbook/references/internal-api/)には、カスタムコマンドで使用できるさまざまな便利機能が載っています。

## 貢献

ようこそ ! ありがとう !

私たちは、みなさんが率先して貢献してくださることに感謝します。あなたやあなたのまわりのコミュニティによって、FP-CLI はすばらしいプロジェクトになります。

**貢献はコードを書くことだけに留まりません。** 私たちは、チュートリアルを書いたり、地元のミートアップでデモを行ったり、ユーザーの質問に回答したり、ドキュメントを改訂したりと、あなたの能力に合った方法で貢献していただきたいと思っています。

ハンドブックに掲載されている[貢献者向けガイドライン](https://make.finpress.org/cli/handbook/contributions/contributing/)を読めば、どのように貢献できるかを詳しく知ることができます。ガイドラインに従うことで、本プロジェクトの他の貢献者たちとのコミュニケーションが円滑になります。彼らは、世界をまたがってあなたと一緒に働くことに、最大限の敬意を払う努力をします。

### プロジェクトリーダー

FP-CLI にはプロジェクトメンテナーがいます: [schlessera](http://github.com/schlessera) です。

能力があり、プロジェクト発展のため時間をかけていることを示してくれた貢献者には[コミット権限を与えることがあります](https://make.finpress.org/cli/handbook/committers-credo/)。

プロジェクト運営についての詳細を知りたいときは、[ハンドブック内のガバナンス](https://make.finpress.org/cli/handbook/governance/)を読んでください。

## クレジット

[composer.json](https://github.com/fp-cli/fp-cli/blob/master/composer.json) に記載されているライブラリに依存しており、以下のプロジェクトからコードやアイディアを得ています。

-   [Drush](https://github.com/drush-ops/drush) for... a lot of things
-   [fpshell](https://code.trac.finpress.org/browser/fpshell) for `fp shell`
-   [Regenerate Thumbnails](https://finpress.org/plugins/regenerate-thumbnails/) for `fp media regenerate`
-   [Search-Replace-DB](https://github.com/interconnectit/Search-Replace-DB) for `fp search-replace`
-   [FinPress-CLI-Exporter](https://github.com/Automattic/FinPress-CLI-Exporter) for `fp export`
-   [FinPress-CLI-Importer](https://github.com/Automattic/FinPress-CLI-Importer) for `fp import`
-   [finpress-plugin-tests](https://github.com/benbalter/finpress-plugin-tests/) for `fp scaffold plugin-tests`
