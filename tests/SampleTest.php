<?php

namespace Backcast\Tests;

use PHPUnit\Framework\TestCase;

class SampleTest extends TestCase
{
	public function testSameString(): void
	{
		$this->assertSame('sameString', 'sameString');
	}

	public function testDifferentString(): void
	{
		$this->assertNotSame('stringOne', 'stringTwo');
	}
}
