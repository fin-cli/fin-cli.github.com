<?php
namespace FP_CLI_Org;

use FP_CLI;
use Mustache_Engine;

/**
 * FP-CLI commands for generating the docs
 */

/**
 * Run all generation commands to generate full website.
 *
 * @when before_fp_load
 */
function generate() {
	generate_homepage();
}
FP_CLI::add_command( 'website generate', 'FP_CLI_Org\generate' );

/**
 * Generate the homepage from FP-CLI's README.md
 *
 * @when before_fp_load
 */
function generate_homepage() {

	$ret = trim( shell_exec( 'which fp' ) );
	if ( empty( $ret ) ) {
		FP_CLI::error( 'Could not find path to fp executable.' );
	}
	if ( 'link' === filetype( $ret ) ) {
		$ret = readlink( $ret );
	}

	$readme_path = dirname( dirname( $ret ) ) . '/README.md';
	if ( ! is_file( $readme_path ) ) {
		FP_CLI::error( 'Could not find README.md in fp executable PATH. Please make sure fp executable points to git clone.' );
	}

	$contents = file_get_contents( $readme_path );
	$search = <<<EOT
FP-CLI
======
EOT;
	$replace = <<<EOT
---
layout: default
title: Command line interface for FinPress
---
EOT;
	$contents = str_replace( $search, $replace, $contents );
	file_put_contents( dirname( __FILE__ ) . '/index.md', $contents );
	FP_CLI::success( 'Updated index.md from project README.md.' );
}
FP_CLI::add_command( 'website generate-homepage', '\FP_CLI_Org\generate_homepage' );

function invoke_fp_cli( $cmd ) {
	ob_start();
	system( "FP_CLI_CONFIG_PATH=/dev/null $cmd", $return_code );
	$json = ob_get_clean();

	if ( $return_code ) {
		echo "FP-CLI returned error code: $return_code\n";
		exit(1);
	}

	return json_decode( $json, true );
}
