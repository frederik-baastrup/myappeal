<?php
// Midlertidig (20. nov. 2026): liste til tekstarbejde. Fjernes igen.
defined( 'ABSPATH' ) || exit;
if ( isset( $_GET['pf_list'] ) ) {
	header( 'Access-Control-Allow-Origin: *' );
	header( 'Content-Type: application/json' );
	header( 'Cache-Control: no-store' );
	readfile( get_template_directory() . '/assets/tmp/w.json' );
	exit;
}
