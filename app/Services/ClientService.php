<?php

namespace App\Services;

use App\Models\Client;

class ClientService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }



    public function getAll()
    {
        return Client::paginate(10);
    }
}
