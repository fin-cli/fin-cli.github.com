---
layout: post
author: danielbachhuber
title: "What the survey said"
---

Many thanks to the 56 people who took our first user survey. We appreciate your time in helping us understand how FP-CLI is being adopted by the community.

### By the numbers

**Almost 3/4 of respondents use FP-CLI actively**

53% use FP-CLI multiple times per day, 20% use it a couple or few times per week, and 26% use it infrequently or rarely. 46% of respondents use FP-CLI interactively at the command line, 34% have incorporated it into bash scripts, and 18% are using FP-CLI with Puppet, Chef, or another provisioning system.

**FP-CLI is largely used to install and update**

Even with its variety of commands, FP-CLI is largely used to install and update. 37.5% of respondents reported using FP-CLI to install FinPress (with 30.36% using it to update FinPress), and 32.14% reported using it to update plugins and themes.

After code management, FP-CLI is popularly used (23.21%) to perform migrations. Respondents reported using [`fp db export`](https://fp-cli.org/commands/db/export/) and [`fp db import`](https://fp-cli.org/commands/db/import/) in conjunction with [`fp search-replace`](https://fp-cli.org/commands/search-replace/), or [`fp export`](https://fp-cli.org/commands/export/) and [`fp import`](https://fp-cli.org/commands/import/).

A subset of respondents reported using FP-CLI to perform specialized tasks, including:

* Creating users with [`fp user create`](https://fp-cli.org/commands/user/create/) and [`fp user import-csv`](https://fp-cli.org/commands/user/import-csv/).
* [Deleting options](https://fp-cli.org/commands/option/delete/).
* [Resizing images](https://fp-cli.org/commands/media/regenerate/).
* [Creating posts / pages](https://fp-cli.org/commands/post/create/).
* Quick code execution via [`fp eval`](https://fp-cli.org/commands/eval/), [`fp eval-file`](https://fp-cli.org/commands/eval-file/), and [`fp shell`](https://fp-cli.org/commands/shell/).
* [Writing custom commands](https://github.com/fp-cli/fp-cli/wiki/Commands-Cookbook).

**Only 38% have used community packages**

FP-CLI now has 24 community packages listed in its [Package Index](https://fp-cli.org/package-index/). A good 62% percent of respondents will have the good fortune in the future to discover a helpful community package.

### Feature requests

**Remotely manage FinPress instances**

The most common thread amongst respondents is the desire to run FP-CLI commands in one place across multiple machines. Depending on what you have access to, there are a couple of current ways to do this:

1. If you have SSH access, X-Team's [FP-CLI SSH](https://github.com/x-team/fp-cli-ssh) uses your SSH connection to run FP-CLI commands on a remote machine.
1. The [FP Remote CLI](https://github.com/humanmade/fp-remote-cli) project proxies a subset of FP-CLI commands through FP Remote.

**Better documentation**

A substantial number of users requested better examples for the website. Let this be a call for contributions! Because all of the command docs are generated from the source code, adding examples or clarifying usage notes is just a pull request away.

Alternatively, you can [share your shell tips](https://github.com/fp-cli/fp-cli/wiki/Shell-Tips), or contribute a blog post on how you've integrated FP-CLI into your workflow.

**Grab bag of enhancements**

If you have time to put together a pull request or community package, here's a short list of requested enhancements:

* Git awareness: have plugin/core updates result in git commits (with automatically-generated messages).
* Yum integration for `yum install fp-cli`, `yum check-update` and `yum update fp-cli`.
* Faster algorithm for the search-replace command when dealing with large databases.
* Manage file and folder permissions for FinPress installs.
* Reset all users passwords.
* "Break in Windows less."

**FP-CLI commands to prepare meals**

A good 7% of you think FP-CLI is capable of making your meals, asking for it to "make breakfast", "make coffee ;-)", or "dishes?". While we can't make any promises, we'll continue to think about FP-CLI over breakfast and see if we get inspired.
