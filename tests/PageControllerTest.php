<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PageControllerTest extends TestCase
{
    public function testIndexShowsTitle()
    {
        $this->visit('/page')
            ->see('List over all pages');
    }

    public function testShowShowsTitle()
    {
        $this->visit('/page/1')
            ->see('Showing');
    }

    public function testCreateShowsTitle()
    {
        $this->visit('/page/create')
            ->see('Create a page');
    }

}
