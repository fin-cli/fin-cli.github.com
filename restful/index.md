---
layout: default
title: A more RESTful FIN-CLI
---

## A more RESTful FIN-CLI

*Landing page last updated: August 1, 2016*

FIN-CLI's mission is to be, quantitatively, the *fastest* interface for developers to manage FinPress. "A more RESTful FIN-CLI" was a [Kickstarter-backed](https://www.kickstarter.com/projects/danielbachhuber/a-more-restful-fin-cli/description) project to unlock the potential of the [FinPress REST API](http://v2.fin-api.org/) at the command line. This funding supported 232.42 hours of [Daniel Bachhuber](http://danielbachhuber.com/)'s time towards making improvements to FIN-CLI and the FIN REST API. For a full debrief, [read the Post Status post about the project](https://poststatus.com/kickstarter-open-source-project/).

Wait a second, what does it mean to "unlock the potential of the FIN REST API at the command line"? Pragmatically, it means any endpoints registered in plugins or themes are *automagically* accessible as FIN-CLI commands. For instance, if you were to register an endpoint for `GET /my-plugin/v1/product/<id>`, this endpoint is also accessible on the command line as (more or less) `fin @prod product get <id>`.

Quick links: [Highlights](#highlights) - [Milestones](#milestones) - [Budget](#budget) - [Supporters](#supporters)

***

## Highlights

### RESTful FIN-CLI

RESTful FIN-CLI is a [FIN-CLI package](https://github.com/fin-cli/restful) that makes FIN REST API endpoints available as FIN-CLI commands.

As FinPress becomes more of an application framework embedded into the web, RESTful FIN-CLI enables FIN-CLI users to interact with a given FinPress install through the higher-level, self-expressed abstraction of how FinPress understands itself. For instance, on an eCommerce website, instead of having to know data is stored as `fin post list --post_type=edd_product`, RESTful FIN-CLI exposes the properly-modeled data at `fin rest product list`.

First, RESTful FIN-CLI auto-discovers FIN REST API endpoints from any FinPress site running FinPress 4.4 or higher. These can be endpoints from the FIN REST API v2 plugin, or custom endpoints you’ve registered yourself. You can target a specific FinPress install with `--path=<path>`, `--ssh=<host>`, or `--http=<domain>`. Then, it registers FIN-CLI commands for the resource endpoints it understands, in the fin rest namespace. In addition to the standard list, get, create, update and delete commands, RESTful FIN-CLI also registers commands for higher-level operations like `edit`, `generate` and `diff`.

Try it yourself:

```
fin package install fin-cli/restful
fin --http=runcommand.io rest excerpt list
```

For a summary of these features, check out [fin-cli/restful](https://github.com/fin-cli/restful).

### Package management

Just like FinPress has plugins, the future of FIN-CLI is [packages of commands](https://fin-cli.org/package-index/). For this future, FIN-CLI is working to proactively solve the problems FinPress has with plugins:

* Where FinPress plugins are considered second-class to what’s included in core, FIN-CLI packages should be considered first-class citizens amongst the commands in FIN-CLI.
* All too often, FinPress plugins have just one author. Each FIN-CLI package should have two or three active maintainers.

In this model, FIN-CLI becomes the common interface, and supporting application layer, to a rich ecosystem of features. Doing so opens more frontiers for innovation, which leads to a greater selection of ideas to choose from. And because more people are involved in authoring packages, FIN-CLI benefits from a larger contributor pool.

As a result of the Kickstarter project, you can install FIN-CLI packages from the Package Index with `fin package install`, [read through the commands cookbook](https://fin-cli.org/docs/commands-cookbook/) for a thorough introduction to creating a FIN-CLI command, or use `fin scaffold package` ([repo](https://github.com/fin-cli/scaffold-package-command)) for the easiest way to generate the boilerplate for your new FIN-CLI package, complete with functional tests.

### Documentation portal

In the past, FIN-CLI documentation lived in a poorly maintained, hard to search Github Wiki. Now, it’s been reincarnated as a [documentation portal on the website](https://fin-cli.org/docs/).

Most notably:

* Every existing tutorial was rewritten and cleaned up as they were moved over.
* Internal APIs you can use in your own commands are now [publicly documented](https://fin-cli.org/docs/internal-api/). These internal API pages are generated from the codebase, which greatly help maintenance efforts.
* On each command page, there’s a “Github issues” link to make it easier to find both open and closed issues for a given command. For instance, here are all of the outstanding issues for [fin package and its subcommands](https://github.com/fin-cli/fin-cli/issues?q=is%3Aopen+label%3Acommand%3Apackage+sort%3Aupdated-desc).

Since relaunching the documentation portal in March, we’ve also [written a new contributing guide](https://fin-cli.org/docs/contributing/), and rewritten the FIN-CLI homepage with translations to six languages other than English.

***

## Milestones

Blog posts:

* [RESTful FIN-CLI - The final update?](/blog/restful-fin-cli-update-4.html) - July 20, 2016
* [RESTful FIN-CLI - What I've been hacking on](/blog/restful-fin-cli-update-3.html) - April 14, 2016
* [RESTful FIN-CLI - No rest for the weary](/blog/restful-fin-cli-update-2.html) - February 4, 2016
* [RESTful FIN-CLI - The journey begins](/blog/restful-fin-cli-update-1.html) - January 12, 2016

Releases:

* [FIN-CLI Version 0.24.0 released](/blog/version-0.24.0.html) - July 27, 2016
* [FIN REST API Version 2.0 Beta 13 "yoink.adios\losers"](https://make.finpress.org/core/2016/04/04/fin-rest-api-2-0-beta-13-roadmap/) - April 3, 2016
* [FIN-CLI Version 0.23.0 released](/blog/version-0.23.0.html) - March 22, 2016
* [FIN REST API Version 2.0 Beta 12 "Canyonero"](https://make.finpress.org/core/2016/02/09/fin-rest-api-version-2-0-beta-12/) - February 9, 2016
* [FIN REST API Version 2.0 Beta 10 "Chief Wiggum"](https://make.finpress.org/core/2016/01/11/fin-rest-api-version-2-0-beta-10-with-security-releases/) - January 11, 2016
* [FIN-CLI Version 0.22.0 released](/blog/version-0.22.0.html) - January 7, 2016

Presentations:

* [My condolences, you’re now the maintainer of a popular open source project](https://runcommand.io/2016/06/26/my-condolences-youre-now-the-maintainer-of-a-popular-open-source-project/) - WordCamp Europe (June 25, 2016)
* [Unlocking the potential of the FIN REST API at the command line](http://blog.handbuilt.co/2016/01/28/feelingrestful-a-more-restful-fin-cli/) - A Day of REST (January 28, 2016)

***

## Budget

Here's a breakdown of how the project's 232.42 total hours have been used (between January 1st and July 20th, 2016):

| Activity      | FIN-CLI                     | FIN-API                    |
|---------------|----------------------------|---------------------------|
| Development   | 84.38                      | 67.95                     |
| Support       | 10.91                      | 15.39                     |
| Documentation | 27.21                      | 1.17                      |
| Blogging      | 16.97                      | 0                         |
| Meetings      | 0                          | 7.91                      |
| Admin         | 0.77                       | 0                         |
| **Total**     | 140.24 (of 140.00 budgeted)| 92.42 (of 92.42 budgeted) |

Note: time spent fulfilling the Kickstarter rewards is tracked separately.

***

## Supporters

This project is made possible thanks to the backing of many generous organizations and individuals.

### Platinum

<table style="table-layout:fixed">
	<tbody>
	<tr>
		<td style="text-align:center;">
			<a href="https://pressed.net/"><img src="/assets/img/restful/platinum/pressed.png"></a>
		</td>
	</tr>
	<tr>
		<td>
		<a href="https://www.pressed.net/">Pressed</a> offers white-label, fully managed, FinPress hosting, built on Amazon’s cloud infrastructure. Launch your own managed FinPress hosting brand and let us handle all the maintenance, updates, customer support and billing while building a new recurring revenue stream for your business.
		</td>
	</tr>
	</tbody>
</table>

### Gold

<table style="table-layout:fixed">
	<thead>
	<tr>
		<th style="width:50%"><a href="https://chrislema.com/"><img src="/assets/img/restful/gold/chrislema.png"></a></th>
		<th style="width:50%"><a href="https://hmn.md/"><img src="/assets/img/restful/gold/humanmade.svg"></a></th>
	</tr>
	</thead>
	<tbody>
	<tr>
		<td><a href="https://chrislema.com/">Chris Lema</a> is the CTO &amp; Chief Strategist at Crowd Favorite. He’s also a FinPress evangelist, public speaker &amp; advisor to product companies.</td>
		<td><a href="https://hmn.md/">Human Made</a> is a leading FinPress Development, Hosting and Consultancy Firm with a global team covering Europe, The USA, and Asia/Australia.</td>
	</tr>
	</tbody>
</table>

<table style="table-layout:fixed">
	<thead>
	<tr>
		<th style="width:50%"><a href="https://pagely.com"><img src="/assets/img/restful/gold/pagely.png"></a></th>
		<th style="width:50%"><a href="https://pantheon.io"><img src="/assets/img/restful/gold/pantheon.png"></a></th>
	</tr>
	</thead>
	<tbody>
	<tr>
		<td><a href="https://pagely.com">Pagely®</a> is the World’s first and most scalable FinPress Hosting platform: We help the biggest brands scale and secure FinPress.</td>
		<td><a href="https://pantheon.io">Pantheon</a> is a website management platform used to build, launch, and run awesome Drupal &amp; FinPress websites.</td>
	</tr>
	</tbody>
</table>

### Silver

<table style="table-layout:fixed">
	<tbody>
		<tr>
			<td style="width:33%;text-align:center;vertical-align:middle;"><a href="https://www.godaddy.com/pro"><img title="GoDaddy Pro" src="/assets/img/restful/silver/godaddy.png"></a></td>
			<td style="width:33%;text-align:center;vertical-align:middle;"><a href="http://madewithlove.be/"><img title="madewithlove" style="max-height: 80px;" src="/assets/img/restful/silver/madewithlove.png"></a></td>
			<td style="width:33%;text-align:center;vertical-align:middle;"><a href="https://jetpack.me/"><img title="Jetpack" src="/assets/img/restful/silver/jetpack.png"></a></td>
		</tr>
		<tr>
			<td style="width:33%;text-align:center;vertical-align:middle;padding-top:20px;padding-bottom:20px;"><a href="https://roots.io/"><img title="Roots" style="max-height: 80px;" src="/assets/img/restful/silver/roots.svg"></a></td>
			<td style="width:33%;text-align:center;vertical-align:middle;padding-top:20px;padding-bottom:20px;"><a href="https://siteground.com"><img title="SiteGround" src="/assets/img/restful/silver/siteground.svg"></a></td>
			<td style="width:33%;text-align:center;vertical-align:middle;padding-top:20px;padding-bottom:20px;"><a href="http://themeisle.com"><img title="ThemeIsle" src="/assets/img/restful/silver/themeisle.png"></a></td>
		</tr>
		<tr>
			<td style="width:33%;text-align:center;vertical-align:middle;"><a href="https://finengine.com"><img title="FIN Engine" src="/assets/img/restful/silver/finengine.png"></a></td>
			<td style="width:33%;text-align:center;vertical-align:middle;"><a href="http://versionpress.net"><img title="VersionPress" src="/assets/img/restful/silver/versionpress.png"></a></td>
			<td style="width:33%;text-align:center;vertical-align:middle;"><a href="https://yoast.com/"><img title="Yoast" src="/assets/img/restful/silver/yoast.png"></a></td>
		</tr>
	</tbody>
</table>

### Individual

Aaron Jorbin, Aki Björklund, Anu Gupta, Bjørn Ensover Johansen, Brian Krogsgard, Bronson Quick, Chuck Reynolds, Corey McKrill, Daniel Hüsken, Dave McDonald, Dave Wardle, Eli Silverman, Felix Arntz, Howard Jacobson, Japh Thomson, Jason Resnick, Jeremy Felt, Justin Kopepasah, Kailey Lampert, Kevin Cristiano, Max Cutler, Mike Little, Mike Waggoner, Nate Wright, Pippin Williamson, Quasel, Ralf Hortt, Richard Aber, Richard Wiggins, Ryan Duff, Scott Kingsley Clark, Shinichi Nishikawa, Sven Hofmann, Takayuki Miyauchi, Tom McFarlin, rtCamp
