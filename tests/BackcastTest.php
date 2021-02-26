<?php

namespace Backcast\Tests;

use Backcast\Backcast;
use PHPUnit\Framework\TestCase;

class BackcastTest extends TestCase
{
	public function testNoArgumentsException(): void
	{
		$this->expectException(\ArgumentCountError::class);
		$backcast = new Backcast();
	}

	public function testFileDoesNotExist() : void
	{
		$backcast = new Backcast('');
		$this->assertFalse($backcast->exportFileExists());
	}

	public function testFileExists(): void
	{
		$path = __DIR__ . '/exports/overcast.opml';
		$backcast = new Backcast($path);
		$this->assertTrue($backcast->exportFileExists());
	}
}
