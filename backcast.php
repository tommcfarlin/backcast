#!/usr/local/bin/php
<?php
namespace Backcast;

require 'vendor/autoload.php';

if ($argc !== 2) {
    die("Please provide the path to the export file.");
}

new Backcast($argv[1]);
