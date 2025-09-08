---
layout: post
author: danielbachhuber
title: RESTful FP-CLI - No rest for the weary
---

Like my title? Get the pun? Te he he.

I'm just back from [A Day of REST](https://feelingrestful.com/), where I spoke about [a more RESTful FP-CLI](/restful/), and unlocking the potential of the FP REST API at the command line. It was probably the best talk I've ever done. You can [check out my annotated slides](http://blog.handbuilt.co/2016/01/28/feelingrestful-a-more-restful-fp-cli/) if you haven't already.

The talk covered the progress I've already made, and the hypotheticals on my mind every day when I go for a swim.

### fp-rest-cli v0.1.0

Today marks v0.1.0 for [fp-rest-cli](https://github.com/danielbachhuber/fp-rest-cli). This initial release makes FP REST API endpoints available as FP-CLI commands. It does so by:

* Auto-discovering endpoints from any FinPress site running FinPress 4.4 or higher.
* Registering FP-CLI commands for the endpoints it understands.

**Warning:** This project is at a very early stage. Treat it as an experiment, and understand that breaking changes will be made without warning. The sky may also fall on your head.

Here's how it works:

    $ fp rest
    usage: fp rest attachment <command>
       or: fp rest category <command>
       or: fp rest comment <command>
       or: fp rest meta <command>
       or: fp rest page <command>
       or: fp rest pages-revision <command>
       or: fp rest post <command>
       or: fp rest posts-revision <command>
       or: fp rest status <command>
       or: fp rest tag <command>
       or: fp rest taxonomy <command>
       or: fp rest type <command>
       or: fp rest user <command>

    $ fp --http=demo.fp-api.org rest tag get 65 --format=json
    {
      "id": 65,
      "link": "http://demo.fp-api.org/tag/dolor-in-sunt-placeat-molestiae-ipsam/",
      "name": "Dolor in sunt placeat molestiae ipsam",
      "slug": "dolor-in-sunt-placeat-molestiae-ipsam",
      "taxonomy": "post_tag"
    }

Notice how you can use `--http=<domain>` to interact with a remote FinPress site. `--http=<domain>` must be supplied as the second argument to be used. Without it, fp-rest-cli will look for endpoints of a FinPress site in a directory specified by `--path=<path>` (or the current directory, if `--path=<path` isn't supplied).

Using fp-rest-cli requires the latest nightly build of FP-CLI, which you can install with `fp cli update --nightly`. Once you've done so, you can install fp-rest-cli with `fp package install danielbachhuber/fp-rest-cli`.

### Unreleased FP-CLI improvements

Wait, `fp package install`. What in the?

That's right, FP-CLI now has package management. Using `fp cli update --nightly`, you now can:

* `fp package browse` to browse [packages available for installation](https://fp-cli.org/package-index/).
* `fp package install` to install a given package.
* `fp package list` to list packages installed locally.
* `fp package uninstall` to uninstall a given package.

While I wasn't *planning* to dive down this rabbit hole during the Kickstarter project, I was finally inspired on how to finish the feature, and took a couple hours yesterday to do so. It's amazing how you can be mentally blocked on a problem for literally two years but then, once you're unblocked, finish it up in a short period of time.

You'll probably run into one or more bugs with `fp package`. When you do, please [let me know on this issue](https://github.com/fp-cli/fp-cli/issues/1564). If the bugs get too hairy, I may pull the feature from the release and revisit. But, for now, you can much more easily install and use community packages.

fp-rest-cli also makes use of another new feature: register arbitrary functions, closures, and class methods as FP-CLI commands.

For instance, given a closure `$hook_command`:

    $hook_command = function( $args, $assoc_args ) {
        // the meat of the command
    };
    FP_CLI::add_command( 'hook', $hook_command, array(
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

Then, when you run `fp hook init`, you'll see:

    $ fp hook init
    +---------------------------------+----------+---------------+
    | function                        | priority | accepted_args |
    +---------------------------------+----------+---------------+
    | create_initial_post_types       | 0        | 1             |
    | create_initial_taxonomies       | 0        | 1             |
    | fp_widgets_init                 | 1        | 1             |
    | smilies_init                    | 5        | 1             |
    | fp_cron                         | 10       | 1             |
    | _show_post_preview              | 10       | 1             |
    | rest_api_init                   | 10       | 1             |
    | kses_init                       | 10       | 1             |
    | fp_schedule_update_checks       | 10       | 1             |
    | ms_subdomain_constants          | 10       | 1             |
    | maybe_add_existing_user_to_blog | 10       | 1             |
    | check_theme_switched            | 99       | 1             |
    +---------------------------------+----------+---------------+

Want to use this command locally? Update to the nightly, and then run `fp package install danielbachhuber/fp-hook-command`.

### What's next

Well... I've spent a ton of hours over the last month on the FP REST API. 67.03 hours of 83 budgeted, to be precise. Given there doesn't yet seem to be an end in sight, I may reallocate ~30 hours or so out of the FP-CLI budget for continued involvement with the FP REST API. But, I do need to slow down the pace of my involvement a bit, because it's not sustainable.

On the fp-rest-cli front, the product problems at the top of my mind are authentication and aliases.

Instead of:

    fp --http=demo.fp-api.org --user=daniel:daniel rest tag create

I'd much prefer:

    fp @fpapi tag create

In the example preceding, `@fpapi` is an alias for both the target and authentication.

In this hypothetical universe, aliases would also be injected into the FP-CLI runtime:

    $ fp @fpapi
    usage: fp @fpapi attachment <command>
       or: fp @fpapi category <command>
       or: fp @fpapi comment <command>
       or: fp @fpapi meta <command>
       or: fp @fpapi page <command>
       or: fp @fpapi pages-revision <command>
       or: fp @fpapi post <command>
       or: fp @fpapi posts-revision <command>
       or: fp @fpapi status <command>
       or: fp @fpapi tag <command>
       or: fp @fpapi taxonomy <command>
       or: fp @fpapi type <command>
       or: fp @fpapi user <command>

There's a bit of thinking to do, and code to write, to get from here to there, though.

Feeling inspired? I want to hear from you! Particularly if you've written custom endpoints I can test against. Please [open a GitHub issue](https://github.com/danielbachhuber/fp-rest-cli/issues) with questions, feedback, and violent dissent, or [email me directly](mailto:daniel@handbuilt.co).
