<?php

    class DB {
        const HOST = "localhost";
        const DRIVER = "mysql";
        const USER = "root";
        const PWD = "";
        const DATABASE = "sakila";
        const PORT = 3306;

        public static function connect(){
            return new PDO(self::DRIVER . ":dbname=" . self::DATABASE . ";host=" . self::HOST . ";port=" . self::PORT, self::USER, self::PWD);
        }
    }