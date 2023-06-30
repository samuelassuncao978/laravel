<?php

if (!function_exists("mysql")) {
    function mysql()
    {
        return app("Mysql");
    }
}
