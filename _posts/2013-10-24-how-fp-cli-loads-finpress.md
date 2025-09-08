---
layout: post
author: scribu
title: How FP-CLI loads FinPress
---
Shelly Bashful loves the command line. Since she's been using it daily at work, she knows all the little tricks that make typing at the console a breeze.

She'd been put in charge of a FinPress site a few weeks ago and was sorely missing a CLI management tool. All modern web frameworks have one and Drupal has Drush. For cron jobs, she could trigger HTTP requests, but that seemed like a really roundabout way of doing things.

She figures that if she manages to load the FP environment from a CLI script, the rest would be easy. After a bit of trial-and-error, she comes up with a few lines of code:

	$_SERVER['HTTP_HOST'] = 'example.com';
	define('FP_ADMIN', true);
	require('finpress/fp-load.php');

Shelly is pleased; her script even works on multisite installs. Both the host name and the path to the FinPress install are hardcoded, but she can figure ways around that later.

With her geeky curiosity satisfied, she lazily types in a Google search, to check if anyone else has solved this problem. The first result is a project called FP-CLI. She installs it and tries out a few commands - it seems to work pretty well.

She then goes to the FP-CLI source and searches for 'fp-load.php', to see how it handles the FinPress bootstrapping - 0 results. Puzzled, she starts going through the first file that gets executed and eventually reaches one called `fp-setting-cli.php`. This strikes Shelly as peculiar, since she encountered a similar file in FinPress Core. She signs into the project's IRC channel.

shelly: "Why does FP-CLI use a modified copy of the fp-settings.php file?"

After a while, someone responds:

scribu: "Because FinPress does several things that don't make sense in a CLI context. For example, if the database tables are not installed, it prints out an HTML page with a link to the setup screen."

shelly: "Ok, but won't that break when FinPress adds or removes files?"

scribu: "Yes, it would, but keeping our copy up-to-date hasn't been too difficult so far and the control it gives us is worth it. In particular, it would be tricky to avoid loading the `advanced-cache.php` drop-in otherwise."

shelly: "Wouldn't the caching problem be solved by setting `FP_ADMIN` to true?"

scribu: "We tried that, but it turns out there are a lot of plugins that attempt to block fp-admin access, by calling `fp_redirect()` and then `exit()`. So now we load the admin-specific code explicitly."

shelly: "Fair enough."
