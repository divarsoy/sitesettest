<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $numberOfSites = 20;
    protected $numberOfClients = 10;

    public function run()
    {
        Model::unguard();

        // Creates 10 clients with 20 users and 20 sites each
        factory('App\Client', $this->numberOfClients)->create()->each(function($client) {
            $client->users()->save(factory('App\User')->make());
            $client->users()->save(factory('App\User')->make());

            $client->sites()->save(factory('App\Site')->make());
            $client->sites()->save(factory('App\Site')->make());
        });

        // Creates 20 pages based on a site
        for( $i = 1; $i <= $this->numberOfSites; $i++) {
                $this->createPageWithSite($i);
        }

        // Creates 10 pages based on a client
        for( $i = 1; $i <= $this->numberOfClients; $i++) {
            $this->createPageWithClient($i);
        }

        Model::reguard();
    }

    /**
     * Creates a page based on a site
     * @param $siteId
     */
    protected function createPageWithSite($siteId){
        $page = factory('App\Page', 1)->create();
        $page->site()->associate($siteId);
        $page->save();
    }

    /**
     * Creates a page based on a client
     * @param $clientId
     */
    protected function createPageWithClient($clientId){
        $page = factory('App\Page', 1)->create();
        $page->client()->associate($clientId);
        $page->save();
    }
}
