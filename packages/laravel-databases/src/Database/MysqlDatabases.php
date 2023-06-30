<?php

namespace Laravel\Databases\Database;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;

use Laravel\Databases\Database\MysqlUsers;

class MysqlDatabases extends Model
{
    protected $primaryKey = "database";
    protected $keyType = "string";
    protected $fillable = ["database"];

    public function users()
    {
        return new MysqlUsers(["database" => $this->attributes["database"]]);
    }

    public function find($id)
    {
        $instance = new static();
        $model = $instance->fill([$instance->primaryKey => $id]);
        return $model;
    }

    public function get()
    {
        try {
            $databases = \DB::connection("central")->select("SHOW DATABASES");
            return collect($databases)
                ->filter(function ($database) {
                    return !in_array($database->Database, ["information_schema", "mysql", "performance_schema", "sys"]);
                })
                ->map(function ($database) {
                    $instance = new static();
                    $model = $instance->fill([
                        "database" => $database->Database,
                    ]);
                    return $model;
                });
        } catch (QueryException $ex) {
            dd($ex->getMessage());
        }
    }

    public function save($options = [])
    {
        try {
            return !empty(\DB::connection("central")->statement("CREATE DATABASE IF NOT EXISTS " . $this->attributes["database"] . ""));
        } catch (QueryException $ex) {
            dd($ex->getMessage());
        }
    }

    public function create($attributes = [])
    {
        $instance = new static();
        $model = $instance->fill($attributes);
        $model->save();
        return $model;
    }

    public function firstOrCreate($attributes = [])
    {
        $instance = new static();
        $model = $instance->fill($attributes);
        if (!$model->exists()) {
            $model->save();
        }
        return $model;
    }

    public function exists()
    {
        try {
            return !empty(\DB::connection("central")->select("SHOW DATABASES LIKE '" . $this->attributes["database"] . "'"));
        } catch (QueryException $ex) {
            dd($ex->getMessage());
        }
    }

    public function delete($attributes = [])
    {
        try {
            return !empty(\DB::connection("central")->statement("DROP DATABASE " . $this->attributes["database"] . ";"));
        } catch (QueryException $ex) {
            dd($ex->getMessage());
        }
    }
}
