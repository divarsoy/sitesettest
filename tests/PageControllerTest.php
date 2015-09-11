<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use app\Client;

class PageControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function testIndexReturnsOK()
    {
        $this->call('GET', '/page');
        $this->assertResponseOk();
        // $this->assertEquals(200, $response->status()); // For specifying error code
        // $this->assertResponseStatus(403);
    }

    public function testIndexReturnsCorrectView()
    {
        $this->call('GET', '/page');
        $this->assertViewIs('page.index'); //Uses helper defined in TestCase.php
    }

    public function testIndexHasPages()
    {
        $this->call('GET', '/page');
        $this->assertViewHas('pages');
    }

    public function testIndexLists50Pages()
    {
        $client = factory(App\Client::class)
            ->create(
                [
                    'name' => 'TestClient'
                ]
            );
        $site = factory(App\Site::class)
            ->create(
                [
                    'name' => 'TestSite',
                    'client_id' => $client->id
                ]
            );
        $pages = factory(App\Page::class, 50)
            ->create(
                [
                    'site_id' => $site->id
                ]
            );

        $this->visit('/page')
            ->see($pages[0]['title']) // Check for first page
            ->see($pages[49]['title']) // Check for last page
            ->see($site->name);
    }

    public function testIndexLinkToShowWorks()
    {
        $page = factory(App\Page::class)->create();

        $this->visit('/page')
            ->see('List over all pages')
            ->click($page->title)
            ->onPage('/page/'.$page->id)
        ;
    }


    public function testIndexCallsSearch(){
        $response = $this->call('GET', '/page');

    }
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

    public function testShowWithId()
    {
        $response = $this->action('GET', 'PageController@show', ['page' => 1]);
        $view = $response->original;
    }

    public function testCreateShowsTitle()
    {
        $this->visit('/page/create')
            ->see('Create a page')
            ->see('Luke');

    }

    public function testCreateHasClientList()
    {
        //$crawler = $this->client->request('GET', '/');
        $response = $this->action('GET', 'PageController@create');
        //$this->assertCount(1, $crawler->filter('h1:contains("Hello")'));
        $this->assertViewHas('clients'); // Checking for array with clients
        //$this->assertViewHas('age', $value);
    }


}
