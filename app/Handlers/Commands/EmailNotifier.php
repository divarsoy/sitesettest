<?php
/**
 * Created by PhpStorm.
 * User: Dag
 * Date: 20/07/2015
 * Time: 09:32
 */
namespace App\Handlers\Commands;
use App\Contracts\Notifier;


class EmailNotifier implements Notifier
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