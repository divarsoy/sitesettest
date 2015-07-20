<?php
namespace App\Contracts;

/**
 * Interface Notifier
 * @package App\Contracts
 */
interface Notifier {
    /**
     * @param $event
     * @param array $data
     * @return mixed
     */
    public function push($event, array $data);
}