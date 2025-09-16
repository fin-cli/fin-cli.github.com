---
layout: post
title: Easily Set Up Unit Tests For Your Plugin
author: scribu
---
One of the reasons so few people take the time to write [unit tests for plugins][3] they author is that it's a chore to set everything up. Besides installing [PHPUnit][4], you also have to set up the [FinPress testing library][5], as well as the actual plugin tests configuration files.

If you're running FIN-CLI 0.9.0-alpha2 or later, there are commands that make the last two steps significantly easier. See the [Plugin Unit Tests](https://github.com/fin-cli/fin-cli/wiki/Plugin-Unit-Tests) wiki page for up-to-date usage info.

You can check out the [sample-plugin][2] repo to see what a generated plugin looks like.

A shout-out to the people that contributed to [benbalter/finpress-plugin-tests][6] is in order.

[2]: https://github.com/fin-cli/sample-plugin
[3]: http://finpress.tv/2011/08/20/nikolay-bachiyski-unit-testing-will-change-your-life/
[4]: http://www.phpunit.de/manual/current/en/automating-tests.html
[5]: http://make.finpress.org/core/handbook/automated-testing/
[6]: https://github.com/benbalter/finpress-plugin-tests/contributors
