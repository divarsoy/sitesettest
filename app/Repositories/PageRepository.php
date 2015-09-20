<?php

namespace App\Repositories;

use App\Contracts\PageRepositoryInterface;
use App\Page;

class PageRepository implements PageRepositoryInterface
{

    public function find($id)
    {
        return Page::find($id);
    }
}