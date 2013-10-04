---
layout: default
title: 'wp scaffold plugin-tests'
---

`wp scaffold plugin-tests` - Generate files needed for running PHPUnit tests.

### DESCRIPTION

These are the files that are generated:

* `phpunit.xml` is the configuration file for PHPUnit
* `.travis.yml` is the configuration file for Travis CI
* `tests/bootstrap.php` is the file that makes the current plugin active when running the test suite
* `tests/test-sample.php` is a sample file containing the actual tests

### ENVIRONMENT

The `tests/bootstrap.php` file looks for the WP_TESTS_DIR environment
variable.

### OPTIONS

&lt;plugin&gt;
: The name of the plugin to generate test files for.

### EXAMPLE

    wp scaffold plugin-tests hello

