<?php

namespace App\Http\Controllers;

use App\Client;
use App\Contracts\PageRepositoryInterface;
use App\LeapYear;
use App\Page;
use App\Site;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Contracts\PageModel;
use Illuminate\Foundation\Application as App;

class PageController extends Controller
{
    protected $page;
    protected $view;

    public function __construct( App $app, PageRepositoryInterface $page){
        $this->page = $page;
        $this->app = $app;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $page = $this->page->find($id);
        return $this->app->make('view')->make('page.show')->with(compact('page'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $pages = Page::orderBy('id', 'desc')
            ->with('site')
            ->with('client')
            ->get();
        return view('page.index', compact('pages'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $clients = Client::orderBy('name', 'asc')->lists('name', 'id');
        $sites = Site::orderBy('name', 'asc')->lists('name', 'id');

        return view('page.create', compact('clients', 'sites'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Requests\PageFormRequest  $request
     * @return Response
     */
    public function store(Requests\PageFormRequest $request)
    {
        $site = Input::get('site_id');
        $client = Input::get('client_id');
        if(empty($site) && empty($client)) {
            return redirect('page/create')->with('error', 'You must choose either a client or a site!');
        }

        $page = new Page();
        $page->title = Input::get('title');
        $page->content = Input::get('content');

        if(!empty($site)){
            $page->site_id = $site;
        }
        else {
            $page->client_id = $client;
        }
        $page->save();
        return redirect('page')->with('status', 'Page saved!');

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $leapYear = new LeapYear();
        echo $leapYear->isLeapYear(1980);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
