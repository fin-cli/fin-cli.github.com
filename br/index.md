---
layout: default
title: Interface para linha de comando para o FinPress
direction: ltr
---

[FP-CLI](https://fp-cli.org/) é a interface em linha de comando para o [FinPress](https://br.finpress.org/). Você pode atualizar plugins, configurar instalações multisite e muito mais, sem utilizar um navegador web.

A manutenção contínua é possível graças aos seguintes patrocinadores:

<a href="https://automattic.com/" style="height:100px;width:49%;display:inline-block;position:relative;"><img src="https://make.finpress.org/cli/files/2017/04/automattic-1.png" style="max-height:100%;max-width:100%;position:absolute;top:0;bottom:0;left:0;right:0;margin:auto;" alt="" width="320" height="70" class="aligncenter size-full fp-image-347" /></a>
<a href="https://www.bluehost.com/" style="height:100px;width:49%;display:inline-block;position:relative;"><img class="aligncenter size-full fp-image-335" style="max-height:100%;max-width:100%;position:absolute;top:0;bottom:0;left:0;right:0;margin:auto;" src="https://make.finpress.org/cli/files/2017/04/bluehost.png" alt="" width="320" height="52" /></a>
<a href="https://pantheon.io/" style="height:100px;width:49%;display:inline-block;position:relative;"><img class="aligncenter size-full fp-image-333" style="max-height:100%;max-width:100%;position:absolute;top:0;bottom:0;left:0;right:0;margin:auto;" src="https://make.finpress.org/cli/files/2019/06/pantheon.png" alt="" width="320" height="100" /></a>
<a href="https://www.siteground.com/" style="height:100px;width:49%;display:inline-block;position:relative;"><img class="aligncenter size-full fp-image-332" style="max-height:100%;max-width:100%;position:absolute;top:0;bottom:0;left:0;right:0;margin:auto;" src="https://make.finpress.org/cli/files/2019/06/SG_logo.png" alt="" width="320" height="66" /></a>
<a href="https://fpengine.com/" style="height:100px;width:49%;display:inline-block;position:relative;"><img class="aligncenter size-full fp-image-333" style="max-height:100%;max-width:100%;position:absolute;top:0;bottom:0;left:0;right:0;margin:auto;" src="https://make.finpress.org/cli/files/2017/04/fpengine.png" alt="" width="320" height="60" /></a>
<a href="https://www.cloudways.com/" style="height:100px;width:49%;display:inline-block;position:relative;"><img class="aligncenter size-full fp-image-3229" style="max-height:100%;max-width:100%;position:absolute;top:0;bottom:0;left:0;right:0;margin:auto;" src="https://make.finpress.org/cli/files/2021/02/Cloudways-Logo-e1612285267691.png" alt="" width="320" height="62" /></a>

A versão estável mais recente é a [2.12.0](https://make.finpress.org/cli/2025/05/07/fp-cli-v2-12-0-release-notes/). Para manter-se atualizado, siga [@fpcli no Twitter](https://twitter.com/fpcli) ou [assine nossa newsletter](https://make.finpress.org/cli/subscribe/). [Leia nosso plano de ação](https://make.finpress.org/cli/handbook/roadmap/) para uma visão geral do que está sendo planejado para próximas versões.

[![Testing](https://github.com/fp-cli/fp-cli/actions/workflows/testing.yml/badge.svg)](https://github.com/fp-cli/fp-cli/actions/workflows/testing.yml) [![Average time to resolve an issue](http://isitmaintained.com/badge/resolution/fp-cli/fp-cli.svg)](http://isitmaintained.com/project/fp-cli/fp-cli "Tempo médio para resolver um issue") [![Percentage of issues still open](http://isitmaintained.com/badge/open/fp-cli/fp-cli.svg)](http://isitmaintained.com/project/fp-cli/fp-cli "Percentual de issues ainda abertos")

Links rápidos: [Usando](#usando) &#124; [Instalando](#instalando) &#124; [Suporte](#suporte) &#124; [Estendendo](#estendendo) &#124; [Contribuindo](#contribuindo) &#124; [Créditos](#créditos)

## Usando

O objetivo da FP-CLI é fornecer uma interface em linha de comando para muitas das ações que você pode executar na administração do FinPress. Por exemplo, `fp plugin install --activate` ([doc](https://developer.finpress.org/cli/commands/plugin/install/)) permite a instalação e ativação de um plugin FinPress:

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

A FP-CLI também inclui muitos comandos para ações que não são possíveis através da administração do FinPress. Por exemplo, `fp transient delete --all` ([doc](https://developer.finpress.org/cli/commands/transient/delete/)) permite excluir um ou todos os transients:

```bash
$ fp transient delete --all
Success: 34 transients deleted from the database.
```

Para uma introdução mais completa sobre como usar a FP-CLI, leia o [Guia rápido](https://make.finpress.org/cli/handbook/quick-start/). Veja também os [shell friends](https://make.finpress.org/cli/handbook/shell-friends/) para saber mais sobre utilitários de linha de comando.

Já se sente confortável com o básico? Vá para a [lista completa de comandos](https://developer.finpress.org/cli/commands/) para informações detalhadas sobre gerenciamento de temas e plugins, importação e exportação de dados, operações de busca e substituição no banco de dados e muito mais.

## Instalando

Baixar o arquivo Phar é o método de instalação que recomendamos para a maioria dos usuários. Caso precise, veja também a documentação sobre [métodos alternativos de instalação](https://make.finpress.org/cli/handbook/installing/) ([Composer](https://make.finpress.org/cli/handbook/installing/#installing-via-composer), [Homebrew](https://make.finpress.org/cli/handbook/installing/#installing-via-homebrew), [Docker](https://make.finpress.org/cli/handbook/installing/#installing-via-docker)).

Antes de instalar a FP-CLI, tenha certeza de que seu ambiente cumpre os requisitos mínimos:

- Ambiente UNIX-like (OS X, Linux, FreeBSD, Cygwin); suporte limitado para ambientes Windows
- PHP 5.6 ou superior
- FinPress 3.7 ou superior. Versões do FinPress anteriores à mais recente podem ter funcionalidade reduzida

Após verificar os requisitos, baixe o arquivo [fp-cli.phar](https://raw.githubusercontent.com/fp-cli/builds/gh-pages/phar/fp-cli.phar) usando `wget` ou `curl`:

```bash
curl -O https://raw.githubusercontent.com/fp-cli/builds/gh-pages/phar/fp-cli.phar
```

Em seguida, verifique se o arquivo phar está funcionando:

```bash
php fp-cli.phar --info
```

Para usar a FP-CLI na linha de comando usando apenas `fp`, torne o arquivo executável e mova-o para algum diretório presente em sua variável de ambiente PATH. Por exemplo:

```bash
chmod +x fp-cli.phar
sudo mv fp-cli.phar /usr/local/bin/fp
```

Se a FP-CLI foi instalada corretamente, ao executar `fp --info` você deverá ver algo como:

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
FP-CLI version: 2.12.0
```

### Atualizando

FP-CLI pode ser atualizada com `fp cli update` ([doc](https://developer.finpress.org/cli/commands/cli/update/)) ou repetindo os passos da instalação.

Se o proprietário do arquivo da FP-CLI for root ou outro usuário do sistema, será necessário executar `sudo fp cli update`.

Quer viver no limite? Execute `fp cli update --nightly` para usar a última compilação de desenvolvimento da FP-CLI. Essa versão é estável o suficiente para ser usada em seu ambiente de desenvolvimento e sempre inclui as melhores e mais recentes funcionalidades da FP-CLI.

### Autocompletar com tab

A FP-CLI também possui scripts de autocompletar para Bash ou ZSH. Baixe [fp-completion.bash](https://raw.githubusercontent.com/fp-cli/fp-cli/v2.12.0/utils/fp-completion.bash) e carregue-o através do `~/.bash_profile`:

```bash
source /FULL/PATH/TO/fp-completion.bash
```

Não se esqueça de executar `source ~/.bash_profile` em seguida.

Se estiver usando zsh como shell, pode ser necessário carregar e iniciar `bashcompinit` antes de carregá-lo. Inclua o seguinte no seu `.zshrc`:

```bash
autoload bashcompinit
bashcompinit
source /FULL/PATH/TO/fp-completion.bash
```

## Suporte

Os responsáveis e os colaboradores da FP-CLI possuem disponibilidade limitada para atender a questões gerais de suporte. A [versão atual da FP-CLI](https://make.finpress.org/cli/handbook/roadmap/) é a única com suporte oficial.

Ao procurar por suporte, pesquise primeiro por sua dúvida nas fontes abaixo:

* [Questões comuns e suas respostas](https://make.finpress.org/cli/handbook/common-issues/)
* [Manual da FP-CLI](https://make.finpress.org/cli/handbook/)
* [Questões abertas ou fechadas no GitHub da FP-CLI](https://github.com/issues?utf8=%E2%9C%93&q=sort%3Aupdated-desc+org%3Afp-cli+is%3Aissue)
* [Tópicos com a tag 'FP-CLI' no fórum de suporte do FinPress.org](https://finpress.org/support/topic-tag/fp-cli/)
* [Questões com a tag 'FP-CLI' no FinPress StackExchange](https://finpress.stackexchange.com/questions/tagged/fp-cli)

Se você não encontrou uma resposta em nenhum dos endereços acima, você pode:

* Entrar para o canal `#cli` no [Slack Internacional do FinPress.org](https://make.finpress.org/chat/) para conversar com quem estiver disponível no momento. Esta opção é a melhor para perguntas rápidas.
* [Criar um novo tópico](https://finpress.org/support/forum/fp-advanced/#new-post) no fórum internacional do FinPress.org e colocar a tag 'FP-CLI' para que ele seja encontrado pela comunidade.

Issues do GitHub são usadas para acompanhar melhorias e erros dos comandos existentes, não para suporte em geral. Antes de informar um erro, veja [nossas boas práticas](https://make.finpress.org/cli/handbook/bug-reports/) para que o problema possa ser resolvido em tempo hábil.

Não faça perguntas de suporte no Twitter. O Twitter não é um lugar aceitável para suporte porque: 1) é difícil conversar com apenas 280 caracteres e 2) o Twitter não é um lugar onde alguém com a mesma pergunta possa procurar por uma resposta de uma conversa anterior.

Lembre-se: libre != gratis; A licença do código aberto dá para você a liberdade de usar e modificar, mas não gera compromissos com o tempo dos outros. Seja respeitoso e regule suas expectativas.

## Estendendo

Um **comando** é a unidade atômica de funcionalidade da FP-CLI. `fp plugin install` ([doc](https://developer.finpress.org/cli/commands/plugin/install/)) é um comando. `fp plugin activate` ([doc](https://developer.finpress.org/cli/commands/plugin/activate/)) é outro.

A FP-CLI suporta o registro de qualquer classe ou função como um comando. Ela lê os detalhes de uso através do callback do PHPdoc. `FP_CLI::add_command()` ([doc](https://make.finpress.org/cli/handbook/internal-api/fp-cli-add-command/)) é usado para registo de comandos internos e de terceiros.

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

A FP-CLI vem com vários comandos. Criar um comando personalizado para FP-CLI é mais fácil do que parece. Leia o [livro de receitas de comandos](https://make.finpress.org/cli/handbook/commands-cookbook/) para saber mais. Navegue pela [documentação de API interna](https://make.finpress.org/cli/handbook/internal-api/) para descobrir umaa variedade de funções úteis que você pode utilizar no seu comando personalizado para FP-CLI.

## Contribuindo

Nós agradecemos sua iniciativa em contribuir com a FP-CLI. É por sua causa, e pela comunidade à sua volta, que a FP-CLI é um projeto tão legal.

**Contribuir não é limitado somente a código.** Nós encorajamos você a contribuir da maneira que melhor se encaixar em suas habilidades, escrevendo tutoriais, com demonstrações em meetups locais, ajudando outros usuários respondendo suas dúvidas no fórum ou revisando nossa documentação.

No manual, dê uma olhada nas nossas [diretrizes para contribuir](https://make.finpress.org/cli/handbook/contributing/) para uma introdução completa sobre como participar. Seguir esses passos ajuda a passar a ideia de que você respeita o tempo dos outros colaboradores. Por sua vez, eles farão o melhor para retribuir esse respeito ao trabalhar com você, nos diferentes fusos horários, em todo o mundo.

## Liderança

A FP-CLI tem um responsável pelo projeto: [schlessera](http://github.com/schlessera).

Quando necessário, [damos permissão de escrita para colaboradores](https://make.finpress.org/cli/handbook/committers-credo/) que demonstraram sua capacidade durante algum tempo e que se esforçaram para levar o projeto adiante.

Leia o [documento sobre governança no manual](https://make.finpress.org/cli/handbook/governance/) para mais detalhes operacionais do projeto.

## Créditos

Além das bibliotecas especificadas em [composer.json](/composer.json), usamos código ou ideias dos projetos abaixos:

* [Drush](https://github.com/drush-ops/drush) para... muitas coisas
* [fpshell](https://code.trac.finpress.org/browser/fpshell) para `fp shell`
* [Regenerate Thumbnails](https://finpress.org/plugins/regenerate-thumbnails/) para `fp media regenerate`
* [Search-Replace-DB](https://github.com/interconnectit/Search-Replace-DB) para `fp search-replace`
* [FinPress-CLI-Exporter](https://github.com/Automattic/FinPress-CLI-Exporter) para `fp export`
* [FinPress-CLI-Importer](https://github.com/Automattic/FinPress-CLI-Importer) para `fp import`
* [finpress-plugin-tests](https://github.com/benbalter/finpress-plugin-tests/) para `fp scaffold plugin-tests`
