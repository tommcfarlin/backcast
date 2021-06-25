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

        $path = __DIR__ . '/exports/pocketcasts.opml';
        $backcast = new Backcast($path);
        $this->assertTrue($backcast->exportFileExists());
    }

    public function testIsValidFileType(): void
    {
        $path = __DIR__ . '/exports/overcast.opml';
        $backcast = new Backcast($path);
        $this->assertTrue($backcast->hasValidFileType());

        $path = __DIR__ . '/exports/pocketcasts.opml';
        $backcast = new Backcast($path);
        $this->assertTrue($backcast->hasValidFileType());
    }

    public function testContainsOpmlTag() : void
    {
        $path = __DIR__ . '/exports/overcast.opml';
        $backcast = new Backcast($path);
        $this->assertTrue($backcast->containsOpmlTag());

        $path = __DIR__ . '/exports/pocketcasts.opml';
        $backcast = new Backcast($path);
        $this->assertTrue($backcast->containsOpmlTag());
    }

    public function testIsValidOpml() : void
    {
        $path = __DIR__ . '/exports/overcast.opml';
        $backcast = new Backcast($path);
        $this->assertTrue($backcast->isValidOpml());

        $path = __DIR__ . '/exports/pocketcasts.opml';
        $backcast = new Backcast($path);
        $this->assertTrue($backcast->isValidOpml());
    }

    public function testHasProperOutlineTags()
    {
        $path = __DIR__ . '/exports/overcast.opml';
        $backcast = new Backcast($path);
        $this->assertTrue($backcast->hasProperOutlineTags());

        $path = __DIR__ . '/exports/pocketcasts.opml';
        $backcast = new Backcast($path);
        $this->assertTrue($backcast->hasProperOutlineTags());
    }

    public function testHasProperXmlUrls()
    {
        $path = __DIR__ . '/exports/overcast.opml';
        $backcast = new Backcast($path);
        $this->assertTrue($backcast->hasProperXmlUrls());

        $path = __DIR__ . '/exports/pocketcasts.opml';
        $backcast = new Backcast($path);
        $this->assertTrue($backcast->hasProperXmlUrls());
    }
}
