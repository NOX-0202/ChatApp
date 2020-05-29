<?php

namespace Source\Models;
use CoffeeCode\DataLayer\DataLayer;

class Username extends DataLayer
{

    public function __construct()
    {
        // string $entity, array $required, string $primary = 'id', bool $timestamps = true
        parent::__construct('usernames', [
            'username',   
            'socket'
        ], 'id' , false);
    }

}