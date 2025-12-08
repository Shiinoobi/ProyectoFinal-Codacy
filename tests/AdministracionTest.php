<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class AdministracionTest extends TestCase
{
    private $appRoot;

    protected function setUp(): void
    {
        $this->appRoot = dirname(__DIR__);
    }

    public function testAdministracionFileExists(): void
    {
        $this->assertFileExists($this->appRoot . '/views/administracion.php');
    }

    public function testAdministracionFileIsReadable(): void
    {
        $this->assertIsReadable($this->appRoot . '/views/administracion.php');
    }

    public function testAdministracionFileContainsExpectedPhp(): void
    {
        $content = file_get_contents($this->appRoot . '/views/administracion.php');
        $this->assertStringContainsString('$conn', $content);
        $this->assertStringContainsString('query', $content);
    }

    public function testAdministracionHandlesEditAction(): void
    {
        $content = file_get_contents($this->appRoot . '/views/administracion.php');
        $this->assertStringContainsString("'edit'", $content);
        $this->assertStringContainsString("UPDATE", $content);
    }

    public function testAdministracionHandlesDeleteAction(): void
    {
        $content = file_get_contents($this->appRoot . '/views/administracion.php');
        $this->assertStringContainsString("'delete'", $content);
        $this->assertStringContainsString("DELETE", $content);
    }

    public function testAdministracionPerformsDatabaseSelect(): void
    {
        $content = file_get_contents($this->appRoot . '/views/administracion.php');
        $this->assertStringContainsString("SELECT", $content);
        $this->assertStringContainsString("FROM", $content);
    }

    public function testAdministracionFileSyntax(): void
    {
        $file = $this->appRoot . '/views/administracion.php';
        $output = shell_exec("php -l " . escapeshellarg($file) . " 2>&1");
        $this->assertStringContainsString("No syntax errors", $output);
    }
}
