<?php

namespace app\core;

use mysqli;

class DbConnection
{
    public function connect()
    {
        $mysqli = new mysqli("localhost", "root", "", "ccc");

        return $mysqli;
    }
}