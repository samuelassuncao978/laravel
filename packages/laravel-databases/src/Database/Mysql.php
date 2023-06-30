<?php

namespace Laravel\Databases\Database;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;

use Laravel\Databases\Database\MysqlDatabases;
use Laravel\Databases\Database\MysqlUsers;

class Mysql
{
    public static function databases()
    {
        return new MysqlDatabases();
    }

    public static function users()
    {
        return new MysqlUsers();
    }
}
