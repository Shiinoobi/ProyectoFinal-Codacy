<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class AdministracionTest extends TestCase
{
    private $administracionFilePath;

    protected function setUp(): void
    {
        $this->administracionFilePath = __DIR__ . '/../views/administracion.php';
    }

    /**
     * Test that administracion.php file exists
     */
    public function testAdministracionFileExists(): void
    {
        $this->assertFileExists($this->administracionFilePath);
    }

    /**
     * Test that administracion.php contains PHP code
     */
    public function testAdministracionFileContainsPhp(): void
    {
        $content = file_get_contents($this->administracionFilePath);
        $this->assertStringContainsString('<?php', $content);
    }

    /**
     * Test that administracion.php contains database connection code
     */
    public function testAdministracionHasDatabaseConnection(): void
    {
        $content = file_get_contents($this->administracionFilePath);
        $this->assertStringContainsString('mysqli', $content);
    }

    /**
     * Test that administracion.php handles edit action
     */
    public function testAdministracionHandlesEditAction(): void
    {
        $content = file_get_contents($this->administracionFilePath);
        $this->assertStringContainsString("'edit'", $content);
    }

    /**
     * Test that administracion.php handles delete action
     */
    public function testAdministracionHandlesDeleteAction(): void
    {
        $content = file_get_contents($this->administracionFilePath);
        $this->assertStringContainsString("'delete'", $content);
    }

    /**
     * Test that administracion.php contains SQL UPDATE query
     */
    public function testAdministracionContainsUpdateQuery(): void
    {
        $content = file_get_contents($this->administracionFilePath);
        $this->assertStringContainsString('UPDATE', $content);
    }

    /**
     * Test that administracion.php contains SQL DELETE query
     */
    public function testAdministracionContainsDeleteQuery(): void
    {
        $content = file_get_contents($this->administracionFilePath);
        $this->assertStringContainsString('DELETE', $content);
    }

    /**
     * Test that administracion.php contains SQL SELECT query
     */
    public function testAdministracionContainsSelectQuery(): void
    {
        $content = file_get_contents($this->administracionFilePath);
        $this->assertStringContainsString('SELECT', $content);
    }

    /**
     * Test that administracion.php validates POST request method
     */
    public function testAdministracionValidatesPostMethod(): void
    {
        $content = file_get_contents($this->administracionFilePath);
        $this->assertStringContainsString('REQUEST_METHOD', $content);
    }
}
