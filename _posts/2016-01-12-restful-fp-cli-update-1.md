---
layout: post
author: danielbachhuber
title: RESTful FP-CLI - The journey begins
---

And so the journey begins. As with most journeys, I have a mixture of emotions: excitement, anticipation, trepidation, and eagerness. Although the destination may be far away, I know I can get there as long as I consistently take steps in the right direction.

Today marks the formal kickoff of my Kickstarter project, "[A more RESTFul FP-CLI](https://www.kickstarter.com/projects/danielbachhuber/a-more-restful-fp-cli/description)". To celebrate the occasion, I've [launched a project page](/restful/) to capture high-level goals and document my progress along the journey. I'll keep it updated as I write blog posts every couple or few weeks. Consider these blog posts both a development log and an invitation to participate — I look forward to your comments, issues and pull requests.

***

For the past month or so, the question at the top of my mind has been: what does it mean to "unlock the potential of the FP REST API at the command line"? Or, even more broadly, why do this project?

These are big questions, and I consider myself fortunate to be able to explore them over the next six months or so. Here's how I've unpacked them so far, in a series of loosely connected ideas:

* FP-CLI's goal is to be, quantitatively, the *fastest* interface for developers to manage FinPress. For anything you want to do with FinPress, using FP-CLI should save you multitudes of time over doing it some other way.
* FP-CLI and FP REST API both offer CRUD interfaces to FinPress resources. `fp post list` is more or less `GET /fp/v2/posts`. But, `fp widget list` doesn't yet have an equivalent in FP REST API. We still have a ton of work to do.
* Building the FP REST API has been, and will continue to be, an exercise of modeling how FinPress works to a consistent (RESTful) interface. Furthermore, this model is declared in a common language for clients to interpret.
* At some point in the future, FP-CLI will be able to ditch a substantial amount of its internals when it can use the FP REST API as its interface to FinPress. FP-CLI can continue to serve as the fastest way for developers to manage FinPress, offering higher-level meta operations like `generate`, `(push|pull)`, and `clone` in addition to being a seamless command line interface to FinPress internals.
* As FinPress developers write new endpoints for the FP REST API, it will be quite powerful to have those endpoints instantly accessible through the command line, and as accessible as core resources. For instance, where FP-CLI currently has the `fp post *` commands, FP-CLI requires Easy Digital Downloads to produce its own `fp edd *` commands.
* It appears to be supremely possible to deliver this project as a series of improvements to FP-CLI, shipped over one or more versions in the next couple of quarters.

Lots of threads to pull on.

***

I'm starting development by working towards making `fp tag list` work interchangably with local and remote sites. Doing so already raises a few issues:

* FP-CLI needs to be easier to register commands on the fly. In my prototype, I had to `eval()` a [dynamically generated class](https://github.com/danielbachhuber/fp-rest-cli/commit/f5ec393632fe841aaaecfc664c419ed1bdbcc566#diff-6bd9ca08588aaa4472208db14aae6750R112). It would be much nicer to be able to [register an arbitrary function, closure, or method](https://github.com/fp-cli/fp-cli/issues/2204) as a FP-CLI command.
* When we register REST endpoints to FP-CLI on the fly, there's the potential for them to conflict with existing commands. Furthermore, the endpoints will vary from site to site. Ideally, the commands you see should represent the commands available on the target site. I think [site aliases](https://github.com/fp-cli/fp-cli/issues/2039) may offer us a backwards-compatible implementation; for instance, specifying an alias like `fp @prod` would only expose commands available on production.
* Remote calls will need authentication. Ideally, it should be possible to authenticate once through a supported protocol (basic, oAuth1, API key, etc.), and store these authentication details somewhere on the file server. This is potential rationale for a [config management command](https://github.com/fp-cli/fp-cli/issues/515). If you aren't blocking web requests to `fp-cli.yml` and `fp-cli.local.yml` already, you should be.

***

This project is made possible thanks to the backing of many generous organizations and individuals. Thank you again for supporting me on this journey.

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
			<td style="width:33%;text-align:center;vertical-align:middle;"><a href="https://fpengine.com"><img title="FP Engine" src="/assets/img/restful/silver/fpengine.png"></a></td>
			<td style="width:33%;text-align:center;vertical-align:middle;"><a href="http://versionpress.net"><img title="VersionPress" src="/assets/img/restful/silver/versionpress.png"></a></td>
			<td style="width:33%;text-align:center;vertical-align:middle;"><a href="https://yoast.com/"><img title="Yoast" src="/assets/img/restful/silver/yoast.png"></a></td>
		</tr>
	</tbody>
</table>

### Individual

Aaron Jorbin, Aki Björklund, Anu Gupta, Bjørn Ensover Johansen, Brian Krogsgard, Bronson Quick, Chuck Reynolds, Corey McKrill, Daniel Hüsken, Dave McDonald, Dave Wardle, Eli Silverman, Felix Arntz, Howard Jacobson, Japh Thomson, Jason Resnick, Jeremy Felt, Justin Kopepasah, Kailey Lampert, Kevin Cristiano, Max Cutler, Mike Little, Mike Waggoner, Nate Wright, Pippin Williamson, Quasel, Ralf Hortt, Richard Aber, Richard Wiggins, Ryan Duff, Scott Kingsley Clark, Shinichi Nishikawa, Sven Hofmann, Takayuki Miyauchi, Tom McFarlin, rtCamp

***

Let's go!
