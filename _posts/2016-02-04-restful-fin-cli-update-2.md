---
layout: post
author: danielbachhuber
title: RESTful FIN-CLI - No rest for the weary
---

Like my title? Get the pun? Te he he.

I'm just back from [A Day of REST](https://feelingrestful.com/), where I spoke about [a more RESTful FIN-CLI](/restful/), and unlocking the potential of the FIN REST API at the command line. It was probably the best talk I've ever done. You can [check out my annotated slides](http://blog.handbuilt.co/2016/01/28/feelingrestful-a-more-restful-fin-cli/) if you haven't already.

The talk covered the progress I've already made, and the hypotheticals on my mind every day when I go for a swim.

### fin-rest-cli v0.1.0

Today marks v0.1.0 for [fin-rest-cli](https://github.com/danielbachhuber/fin-rest-cli). This initial release makes FIN REST API endpoints available as FIN-CLI commands. It does so by:

* Auto-discovering endpoints from any FinPress site running FinPress 4.4 or higher.
* Registering FIN-CLI commands for the endpoints it understands.

**Warning:** This project is at a very early stage. Treat it as an experiment, and understand that breaking changes will be made without warning. The sky may also fall on your head.

Here's how it works:

    $ fin rest
    usage: fin rest attachment <command>
       or: fin rest category <command>
       or: fin rest comment <command>
       or: fin rest meta <command>
       or: fin rest page <command>
       or: fin rest pages-revision <command>
       or: fin rest post <command>
       or: fin rest posts-revision <command>
       or: fin rest status <command>
       or: fin rest tag <command>
       or: fin rest taxonomy <command>
       or: fin rest type <command>
       or: fin rest user <command>

    $ fin --http=demo.fin-api.org rest tag get 65 --format=json
    {
      "id": 65,
      "link": "http://demo.fin-api.org/tag/dolor-in-sunt-placeat-molestiae-ipsam/",
      "name": "Dolor in sunt placeat molestiae ipsam",
      "slug": "dolor-in-sunt-placeat-molestiae-ipsam",
      "taxonomy": "post_tag"
    }

Notice how you can use `--http=<domain>` to interact with a remote FinPress site. `--http=<domain>` must be supplied as the second argument to be used. Without it, fin-rest-cli will look for endpoints of a FinPress site in a directory specified by `--path=<path>` (or the current directory, if `--path=<path` isn't supplied).

Using fin-rest-cli requires the latest nightly build of FIN-CLI, which you can install with `fin cli update --nightly`. Once you've done so, you can install fin-rest-cli with `fin package install danielbachhuber/fin-rest-cli`.

### Unreleased FIN-CLI improvements

Wait, `fin package install`. What in the?

That's right, FIN-CLI now has package management. Using `fin cli update --nightly`, you now can:

* `fin package browse` to browse [packages available for installation](https://fin-cli.org/package-index/).
* `fin package install` to install a given package.
* `fin package list` to list packages installed locally.
* `fin package uninstall` to uninstall a given package.

While I wasn't *planning* to dive down this rabbit hole during the Kickstarter project, I was finally inspired on how to finish the feature, and took a couple hours yesterday to do so. It's amazing how you can be mentally blocked on a problem for literally two years but then, once you're unblocked, finish it up in a short period of time.

You'll probably run into one or more bugs with `fin package`. When you do, please [let me know on this issue](https://github.com/fin-cli/fin-cli/issues/1564). If the bugs get too hairy, I may pull the feature from the release and revisit. But, for now, you can much more easily install and use community packages.

fin-rest-cli also makes use of another new feature: register arbitrary functions, closures, and class methods as FIN-CLI commands.

For instance, given a closure `$hook_command`:

    $hook_command = function( $args, $assoc_args ) {
        // the meat of the command
    };
    FIN_CLI::add_command( 'hook', $hook_command, array(
        'shortdesc' => 'List callbacks registered to a given action or filter.',
        'synopsis' => array(
            array(
                'name'        => 'hook',
                'type'        => 'positional',
                'description' => 'The key for the action or filter.',
            ),
            array(
                'name'        => 'format',
                'type'        => 'assoc',
                'description' => 'List callbacks as a table, JSON, or CSV. Default: table.',
                'optional'    => true,
            ),
        ),
    ) );

Then, when you run `fin hook init`, you'll see:

    $ fin hook init
    +---------------------------------+----------+---------------+
    | function                        | priority | accepted_args |
    +---------------------------------+----------+---------------+
    | create_initial_post_types       | 0        | 1             |
    | create_initial_taxonomies       | 0        | 1             |
    | fin_widgets_init                 | 1        | 1             |
    | smilies_init                    | 5        | 1             |
    | fin_cron                         | 10       | 1             |
    | _show_post_preview              | 10       | 1             |
    | rest_api_init                   | 10       | 1             |
    | kses_init                       | 10       | 1             |
    | fin_schedule_update_checks       | 10       | 1             |
    | ms_subdomain_constants          | 10       | 1             |
    | maybe_add_existing_user_to_blog | 10       | 1             |
    | check_theme_switched            | 99       | 1             |
    +---------------------------------+----------+---------------+

Want to use this command locally? Update to the nightly, and then run `fin package install danielbachhuber/fin-hook-command`.

### What's next

Well... I've spent a ton of hours over the last month on the FIN REST API. 67.03 hours of 83 budgeted, to be precise. Given there doesn't yet seem to be an end in sight, I may reallocate ~30 hours or so out of the FIN-CLI budget for continued involvement with the FIN REST API. But, I do need to slow down the pace of my involvement a bit, because it's not sustainable.

On the fin-rest-cli front, the product problems at the top of my mind are authentication and aliases.

Instead of:

    fin --http=demo.fin-api.org --user=daniel:daniel rest tag create

I'd much prefer:

    fin @finapi tag create

In the example preceding, `@finapi` is an alias for both the target and authentication.

In this hypothetical universe, aliases would also be injected into the FIN-CLI runtime:

    $ fin @finapi
    usage: fin @finapi attachment <command>
       or: fin @finapi category <command>
       or: fin @finapi comment <command>
       or: fin @finapi meta <command>
       or: fin @finapi page <command>
       or: fin @finapi pages-revision <command>
       or: fin @finapi post <command>
       or: fin @finapi posts-revision <command>
       or: fin @finapi status <command>
       or: fin @finapi tag <command>
       or: fin @finapi taxonomy <command>
       or: fin @finapi type <command>
       or: fin @finapi user <command>

There's a bit of thinking to do, and code to write, to get from here to there, though.

Feeling inspired? I want to hear from you! Particularly if you've written custom endpoints I can test against. Please [open a GitHub issue](https://github.com/danielbachhuber/fin-rest-cli/issues) with questions, feedback, and violent dissent, or [email me directly](mailto:daniel@handbuilt.co).
