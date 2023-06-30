<?php

namespace Laravel\Databases\Database;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;

class MysqlUsers extends Model
{
    protected $primaryKey = "username";
    protected $keyType = "string";

    public function __construct(array $attributes = [])
    {
        $this->fill($attributes);
    }

    protected $fillable = ["database", "username", "password"];

    public function get()
    {
        try {
            if (isset($this->attributes["database"])) {
                $users = \DB::connection("central")->select("SELECT * from mysql.db where db='" . $this->attributes["database"] . "';");
            } else {
                $users = \DB::connection("central")->select("SELECT * FROM mysql.user;");
            }
            return collect($users)
                ->filter(function ($user) {
                    return !in_array($user->User, ["mysql.session", "mysql.sys", ""]);
                })
                ->map(function ($user) {
                    $instance = new static();
                    $model = $instance->fill([
                        "username" => $user->User,
                    ]);
                    return $model;
                });
        } catch (QueryException $ex) {
            dd($ex->getMessage());
        }
    }

    public function find($id)
    {
        $instance = new static();
        $model = $instance->fill([$instance->primaryKey => $id]);
        return $model;
    }

    public function save($options = [])
    {
        try {
            $result = \DB::connection("central")->statement("CREATE USER '" . $this->attributes["username"] . "'@'%' IDENTIFIED BY '" . $this->attributes["password"] . "';");
            $revoke = \DB::connection("central")->statement("REVOKE ALL PRIVILEGES ON *.* FROM '" . $this->attributes["username"] . "'@'%';");
            if (isset($this->attributes["database"])) {
                $grant = \DB::connection("central")->statement("GRANT ALL ON " . $this->attributes["database"] . ".* TO '" . $this->attributes["username"] . "'@'%';");
                return !empty($result) && !empty($grant);
            }
            return !empty($result);
        } catch (QueryException $ex) {
            dd($ex->getMessage());
        }
    }

    static function create($attributes = [])
    {
        $instance = new static();
        $model = $instance->fill($attributes);
        $model->save();
        return $model;
    }

    public function delete($attributes = [])
    {
        try {
            return !empty(\DB::connection("central")->statement("DROP USER '" . $this->attributes["username"] . "'@'%';"));
        } catch (QueryException $ex) {
            dd($ex->getMessage());
        }
    }
}
