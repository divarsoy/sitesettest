<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    /**
     * Tests to see whether the view template provided is the one
     * used in rendering the view.
     *
     * @param  string
     * @return void
     */
    protected function assertViewIs($templateName)
    {
        return $this->assertEquals($templateName, $this->response->original->getName());
    }
}
