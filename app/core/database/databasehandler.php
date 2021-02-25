<?php
namespace PROJECT\CORE\DATABASE;

abstract class databasehandler {
     const DATABASE_DRIVER_POD = 1;
    const DATABASE_DRIVER_NOSQL = 2;

    abstract protected function init();

    abstract protected static function getInstance();

    public static function factory()
    {
        $driver = DATABASE_CONN_DRIVER;
        if ($driver == self::DATABASE_DRIVER_POD) {
            return pdodatabasehandler::getInstance();
        } elseif ($driver == self::DATABASE_DRIVER_NOSQL) {
            /*
             * will be implemented when i learn it :) 
             */
        }
    }
}
