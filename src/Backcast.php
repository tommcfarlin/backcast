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

	public function containsOpmlTag() : bool {
		return (
			false !==
			strpos(
				file_get_contents( $this->xmlExportPath ),
				'<opml'
			)
			);
	}

	public function isValidOpml() : bool {
		libxml_use_internal_errors(true);

		$domDoc = new \DOMDocument();
		$domDoc->load($this->xmlExportPath);

		return 0 === count( libxml_get_errors() );
	}

	public function hasProperOutlineTags() : bool {
		$xmlDoc = $this->loadXmlExport();

		if ( 0 === count($xmlDoc->body->outline) ) {
			return false;
		}

		foreach ( $xmlDoc->body->outline as $outline ) {
			if ( ! isset( $outline['type'] ) || 'rss' !== strtolower( $outline['type'] ) ) {
				return false;
			}
		}

		return true;
	}

	public function hasProperXmlUrls() : bool {
		$xmlDoc = $this->loadXmlExport();

		if ( 0 === count($xmlDoc->body->outline) ) {
			return false;
		}

		foreach ( $xmlDoc->body->outline as $outline ) {
			if ( ! isset( $outline['xmlUrl'] ) || ! filter_var( $outline['xmlUrl'], FILTER_VALIDATE_URL) ) {
				return false;
			}
		}

		return true;
	}

	private function loadXmlExport() : \SimpleXmlElement {
		return simplexml_load_file( $this->xmlExportPath );
	}
}
