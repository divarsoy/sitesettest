<?php

namespace App\Handlers\Commands;

use App\Contracts\Notifier;

class SMSNotifier implements Notifier
{

    /**
     * @param $event
     * @param array $data
     * @return mixed
     */
    public function push($event, array $data)
    {
        // TODO: Implement push() method.
    }
}