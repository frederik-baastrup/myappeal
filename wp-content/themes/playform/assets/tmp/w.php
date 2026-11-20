<?php
header( "Access-Control-Allow-Origin: *" );
header( "Content-Type: application/json" );
header( "Cache-Control: no-store" );
readfile( __DIR__ . "/w.json" );
