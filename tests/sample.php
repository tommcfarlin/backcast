<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

/**
 * This class is used to demonstrate how to set up a basic test using PHPUnit.
 *
 * @author Tom McFarlin <tom@tommcfarlin.com>
 * @since  02-09-2021
 */
class Sample extends TestCase
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
