---
layout: post
author: danielbachhuber
title: RESTful FIN-CLI - The final update?
---

Last November, I [published a Kickstarter](https://www.kickstarter.com/projects/danielbachhuber/a-more-restful-fin-cli), and was completely blown away by the support. This month, the funding ran out, so I thought I'd post one last [RESTful FIN-CLI](https://github.com/fin-cli/restful) update.

Actually, the story doesn't end here. I'm writing a massive retrospective post about using Kickstarter to fund open source, so keep an eye out for that. Also, FIN-CLI v0.24.0 is due out a week from now, July 27th, and it's looking to be the largest release ever. When you do a Kickstarter, it's really just the beginning of something bigger.

Enough with the superlatives, let's dive into some new features. Remember: RESTful FIN-CLI features require under the hood changes to FIN-CLI. You'll want to `fin cli update --nightly` to play with this new functionality locally. Once you've done so, you can `fin package install fin-cli/restful` to install the latest.

### Effortlessly use FIN-CLI against any FinPress install

FIN-CLI aliases are shortcuts you register in your `fin-cli.yml` or `config.yml` to effortlessly run commands against any FinPress install.

For instance, if I'm working locally on the runcommand theme, have registered a new rewrite rule, and need to flush rewrites inside my Vagrant-based virtual machine, I can run:

    $ fin @dev rewrite flush
    Success: Rewrite rules flushed.

Then, once the code goes to production, I can run:

    $ fin @prod rewrite flush
    Success: Rewrite rules flushed.

Look ma! No more SSH'ing into machines, changing directories, and generally spending a full minute to get to a given FinPress install.

Additionally, alias groups let you register groups of aliases. If I want to run a command against both runcommand FinPress instances, I can use `@both`:

    $ fin @both core check-update
    Success: FinPress is at the latest version.
    Success: FinPress is at the latest version.

Aliases can be registered in your project's `fin-cli.yml` file, or your user's global `~/.fin-cli/config.yml` file:

    @prod:
      ssh: runcommand@runcommand.io~/webapps/production
    @dev:
      ssh: vagrant@192.168.50.10/srv/www/runcommand.dev
    @both:
      - @prod
      - @dev

### But wait, what's the 'ssh' in there?

FIN-CLI now natively supports a `--ssh=<host>` global parameter for running a command against a remote FinPress install. Many thanks to XFIN and their community for paving the way with [FIN-CLI SSH](https://github.com/xfin/fin-cli-ssh).

Under the hood, FIN-CLI proxies commands to the `ssh` executable, which then passes them to FIN-CLI installed on the remote machine. Your syntax for `-ssh=<host>` can be any of the following:

* Just the host (e.g. `fin --ssh=runcommand.io`), which means the user will be inferred from your current system user, and the path will be the SSH user's home directory.
* The user and the host (e.g. `fin --ssh=runcommand@runcommand.io`).
* The user, the host, and the path to the FinPress install (e.g. `fin --ssh=runcommand@runcommand.io~/webapps/production`). The path comes immediately after the TLD of the host.

Or, if you use a `~/.ssh/config`, `<host>` can be any host alias stored in the SSH config (e.g. `fin --ssh=rc` for me).

Note you do need a copy of FIN-CLI on the remote server, accessible as `fin`. Futhermore, `--ssh=<host>` won't load your `.bash_profile` if you have a shell alias defined, or are extending the `$PATH` environment variable. If this affects you, [here's a more thorough explanation](https://runcommand.io/to/fin-ssh-custom-path/) of how you can make `fin` accessible.

### RESTful FIN-CLI v0.2.0 and beyond

Today marks the release of [RESTful FIN-CLI](https://github.com/fin-cli/restful) v0.2.0. Among [43 closed issues and pull requests](https://github.com/fin-cli/restful/milestone/2?closed=1), I'd like to highlight two new features.

First, use `fin rest (post|user|comment|*) generate` to create an arbitrary number of any resource:

    $ fin @findev rest post generate --count=50 --title="Test Post"
    Generating items  100% [==============================================] 0:01 / 0:02

When working on a site locally, you often need dummy content to work with. There are a myriad of ways custom post types can store data in the database though, so generating dummy content can be a painstaking process. Because the FIN REST API represents a layer of abstraction between the client (e.g. FIN-CLI in this case) and the database, it's much easier to produce a general purpose content generation command.

In the future, I'd love to see [dummy data generated for each field based on the resource schema](https://github.com/fin-cli/restful/issues/69).

Second, use `fin rest (post|user|comment|*) diff` to compare resources between two enviroments:

    # "command" isn't a typo in this example; "command" is a content type expressed through the FIN REST API on runcommand.io
    $ fin @dev rest command diff @prod find-unused-themes --fields=title
    (-) http://runcommand.dev/api/ (+) https://runcommand.io/api/
      command:
      + title: find-unused-themes

When working with multiple FinPress environments, you may want to know how these environments differ. Because the FIN REST API represents a higher-level abstraction on top of FinPress, computing the difference between two environments becomes a matter of fetching the data and producing a comparison.

There are a [number of ways the diff command could be improved](https://github.com/fin-cli/restful/issues?q=is%3Aissue+is%3Aopen+label%3Acommand%3Adiff), so consider this implementation to be the prototype.

What's next?

More immediately, I'd like to start looking at how well RESTful FIN-CLI works with plugins and themes. If you've written custom endpoints for the FIN REST API, [please weigh in on this Github issue](https://github.com/fin-cli/restful/issues/85) so I can check it out.

Ultimately, the goal is for `fin rest post` to replace `fin post`, but there are many months between here and there. In this future where FIN-CLI packages are first-class citizens amongst the commands in FIN-CLI core, RESTful FIN-CLI gets to serve as a testbed for figuring out how that actually works. We shall see, we shall see.

As always, thanks for your support!
