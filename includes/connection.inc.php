<?php


class connection{

    public static function connectToDatabase(){


        try {
            $server = "mysql:host=127.0.0.1";
            $dbusername = "root";
            $dbpassword = "dadadavidtofunmi";
            $dbName = "tasklist";


            return new PDO("$server;$dbName", $dbusername, $dbpassword);
        }
        catch (PDOException $exception){
            return "Connection Error". $exception->getmessage();
        }


    }

}