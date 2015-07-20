<?php
/**
 * Created by PhpStorm.
 * User: Dag
 * Date: 20/07/2015
 * Time: 09:38
 */

namespace App\Handlers\Commands;

use App\Contracts\Notifier;

class Invoice
{
    protected $notifer;
    public function __construct(Notifier $notifer)
    {
        $this->notifer = $notifer;
    }
    public function run($event, array $data)
    {
        $this->notifier->push($event, $data);
    }
}