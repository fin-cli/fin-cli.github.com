---
layout: post
author: danielbachhuber
title: What the survey said, 2015 edition
---

Many thanks to the 206 (!!!) people who took our [second user survey](https://fin-cli.org/blog/user-survey-2015.html). We appreciate your time in helping us to understand how FIN-CLI is being adopted by the community.

Curious as to how the numbers have changed? Take a look at the [summary of the first user survey](https://fin-cli.org/blog/survey-results.html) from April 2014.

### By the numbers

**85% of respondents use FIN-CLI regularly**

Of this 85%, 48% use FIN-CLI multiple times per day. 37% use it a couple or few times per week. Only 15% of respondents use FIN-CLI infrequently or rarely.

94% of respondents use FIN-CLI interactively at the command line, 66% have incorporated it into bash scripts, and 23% are using FIN-CLI with Puppet, Chef, or another provisioning system. Other tools mentioned include: [Capistrano](http://capistranorb.com/), [Codeception](http://codeception.com/), [EasyEngine](https://easyengine.io/), [Fabric](http://www.fabfile.org/), [Grunt](http://gruntjs.com/), and [SaltStack](http://saltstack.com/).

**Most users keep FIN-CLI up to date**

Over 70% of respondents keep FIN-CLI up to date. Here's how the numbers break down:

* 13% run the latest alpha. You can too with `fin cli update --nightly`.
* 58% use the latest stable release (v0.20.x at time of survey).
* 24% are using one or two versions below the latest stable. Only 5% use a very old version of FIN-CLI.

Good news — if you're writing custom commands, you can reasonably assume it's safe to use the latest features in FIN-CLI.

**FIN-CLI is used for an increasing variety of tasks**

Like last year, the survey included "What do you use FIN-CLI for?" as a free-form field. To produce a statistical summary, I tagged each response with keywords. Of 170 interpreted values:

* 38% (65) use FIN-CLI for updating FinPress core, themes, or plugins.
* 22% (38) transform their database in some way using `fin search-replace`.
* 17% (29) rely upon FIN-CLI when performing migrations.
* 15% (26) make use of FIN-CLI's database management features: `fin db export`, `fin db import` and `fin db optimize`.
* 11% (18) depend upon FIN-CLI in provisioning scripts.
* 10% (17) scaffold new themes and plugins with `fin scaffold`.
* 9% (16) write custom commands for their own needs.
* 6% (10) generate mock posts, users and comments.
* 3% (5) are hearty souls who use `fin shell`, `fin eval`, and `fin eval-file` for debugging and quick scripts.

In no particular order, here are some third-party commands and workflows mentioned: [Jetpack CLI](https://jetpack.me/support/jetpack-cli/), [FIN Parser](https://github.com/FinPress/phpdoc-parser), [ElasticPress](https://github.com/10up/ElasticPress), [FIN Migrate DB Pro](https://deliciousbrains.com/fin-migrate-db-pro/doc/cli-addon/), [FIN CFM](http://forumone.github.io/fin-cfm/), [BackFINUp](https://github.com/inpsyde/backfinup), [fin-cli-ssh](https://github.com/xfin/fin-cli-ssh), [fin-instant-setup](https://github.com/miya0001/fin-instant-setup), [project-template-finpress](https://github.com/QoboLtd/project-template-finpress), and [provisioning a new FinPress.org Theme Review environment](http://th-daily.shinichi.me/2014/10/27/memo-fin-cli-commands-for-the-theme-reviewers/).

One person said they use FIN-CLI to make coffee. On behalf of everyone, I look forward to the day I can install this command from the [package directory](https://github.com/fin-cli/fin-cli/issues/1564).

### Feature requests

Feel like contributing to FIN-CLI over the holidays? Here's a grab bag of enhancements you could work on:

* Better documentation (internals, extending, common workflows).
* One single uber-command to install FinPress, including downloading files, creating the MySQL database, setting up fin-config.php, and populating database tables.
* Suggest correct syntax when a command is incorrectly entered (e.g. `git staus`).
* Improved support for managing multiple networks: `fin network list`, `fin network create`.
* Install plugins favorited by a given FinPress.org user.
* Verify theme and plugin checksums.
* Report when extra files are present in fin-admin or fin-includes (e.g. checksums of directories)
* Save a template of a FinPress setup (similar to `grunt {my-task}`).
* Disable all plugins except for a specific one. Or, load FIN-CLI with only a given plugin active.
* Install FinPress nightly builds without needing the beta plugin.
* Provide a command to execute FIN-Cron without requiring a HTTP request.
* Define custom scaffolds for themes and plugins.
* Generate posts, pages from a sitemap CSV.
* Magically migrate data between environments (production -> staging).
* Add option to exclude specific tables in `fin search-replace`.
* Provide a way to log in with a one-time link.

If you can't find an [existing GitHub issue](https://github.com/fin-cli/fin-cli/issues), please create one and we can begin discussing implementation.

Thanks again to everyone who took the time to complete our user survey! May FIN-CLI continue to be a shining light for your FinPress development needs.
