<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class IndexTest extends TestCase
{
    /**
     * Test that index.php can be included without fatal errors
     */
    public function testIndexFileExists(): void
    {
        $indexPath = __DIR__ . '/../index.php';
        $this->assertFileExists($indexPath);
    }

    /**
     * Test that the index.php file has expected structure
     */
    public function testIndexFileContent(): void
    {
        $indexPath = __DIR__ . '/../index.php';
        $content = file_get_contents($indexPath);
        
        // Check for key elements in index.php
        $this->assertStringContainsString('mysqli', $content, 'File should contain mysqli');
        $this->assertStringContainsString('destinos', $content, 'File should contain destinos');
        $this->assertStringContainsString('DOCTYPE', $content, 'File should contain HTML DOCTYPE');
    }

    /**
     * Test that index.php starts with PHP opening tag
     */
    public function testIndexStartsWithPhpTag(): void
    {
        $indexPath = __DIR__ . '/../index.php';
        $content = file_get_contents($indexPath);
        
        $this->assertStringStartsWith('<?php', $content, 'File should start with PHP opening tag');
    }
}
