<?php
namespace FIN_CLI_Org;

use FIN_CLI;
use Mustache_Engine;

/**
 * FIN-CLI commands for generating the docs
 */

/**
 * Run all generation commands to generate full website.
 *
 * @when before_fin_load
 */
function generate() {
	generate_homepage();
}
FIN_CLI::add_command( 'website generate', 'FIN_CLI_Org\generate' );

/**
 * Generate the homepage from FIN-CLI's README.md
 *
 * @when before_fin_load
 */
function generate_homepage() {

	$ret = trim( shell_exec( 'which fin' ) );
	if ( empty( $ret ) ) {
		FIN_CLI::error( 'Could not find path to fin executable.' );
	}
	if ( 'link' === filetype( $ret ) ) {
		$ret = readlink( $ret );
	}

	$readme_path = dirname( dirname( $ret ) ) . '/README.md';
	if ( ! is_file( $readme_path ) ) {
		FIN_CLI::error( 'Could not find README.md in fin executable PATH. Please make sure fin executable points to git clone.' );
	}

	$contents = file_get_contents( $readme_path );
	$search = <<<EOT
FIN-CLI
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
	FIN_CLI::success( 'Updated index.md from project README.md.' );
}
FIN_CLI::add_command( 'website generate-homepage', '\FIN_CLI_Org\generate_homepage' );

function invoke_fin_cli( $cmd ) {
	ob_start();
	system( "FIN_CLI_CONFIG_PATH=/dev/null $cmd", $return_code );
	$json = ob_get_clean();

	if ( $return_code ) {
		echo "FIN-CLI returned error code: $return_code\n";
		exit(1);
	}

	return json_decode( $json, true );
}
