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

	public function hasValidFileType() : bool {
		$fileParts = explode('.', $this->xmlExportPath);

		if (!isset($fileParts[1])) {
			return false;
		}

		return (
			'opml' === strtolower($fileParts[1])
		);
	}
}
