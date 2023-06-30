<?php

namespace Laravel\Tenant\Database;

use Laravel\Tenant\Contracts\Model;
use Illuminate\Database\QueryException;

class User extends Model
{
    protected $primaryKey = "username";

    public function save()
    {
        return parent::save(function ($user) {
            if ($this->exists()) {
                $this->delete();
            }
            [
                "database" => $database,
                "username" => $username,
                "password" => $password,
            ] = $user;
            try {
                $result = \DB::connection("central")->statement("CREATE USER '{$username}'@'%' IDENTIFIED BY '{$password}';");
                $revoke = \DB::connection("central")->statement("REVOKE ALL PRIVILEGES ON *.* FROM '{$username}'@'%';");
                $grant = \DB::connection("central")->statement("GRANT ALL ON {$database}.* TO '{$username}'@'%';");
                return !empty($result) && !empty($grant);
            } catch (QueryException $ex) {
                // return false;
                dd($ex->getMessage());
            }
        });
    }

    public function exists()
    {
        return parent::exists(function ($user) {
            try {
                return !empty(\DB::connection("central")->select("SELECT User FROM mysql.user WHERE User = '{$user}';"));
            } catch (QueryException $ex) {
                // return false;
                dd($ex->getMessage());
            }
        });
    }

    public function delete()
    {
        return parent::delete(function ($user) {
            try {
                return !empty(\DB::connection("central")->statement("DROP USER '{$user}'@'%';"));
            } catch (QueryException $ex) {
                // return false;
                dd($ex->getMessage());
            }
        });
    }

    public function user_grant()
    {
        try {
            $grants = [];
            $g = \DB::connection("central")->select("SHOW GRANTS FOR CURRENT_USER;");
            return collect($g)->map(function ($grant) {
                return optional(array_values(get_object_vars($grant)))[0];
            });
        } catch (QueryException $ex) {
            // return false;
            dd($ex->getMessage());
        }
    }
}
