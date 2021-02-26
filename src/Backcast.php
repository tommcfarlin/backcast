<?php

namespace Backcast;

class Backcast {

	private $xmlExportPath;

	public function __construct( string $xmlExportPath ) {
		$this->xmlExportPath = $xmlExportPath;
	}

	public function exportFileExists() : bool {
		return \file_exists( $this->xmlExportPath );
	}
}
