<?php 

class Database {

    private $username = 'root';
    private $password = 'uzumaki';
    private $host = 'localhost';
    private $database = 'framework';
    private $port = '3306';
    private $dbh;
    private $stmt;

    public function __construct(){
        $dsn = 'mysql:host='.$this->host.';port='.$this->port.';dbname='.$this->database;
        $opcoes = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try{

            $this->dbh = new PDO($dsn, $this->username, $this->password, $opcoes);

        }catch(PDOException $e){
            print 'Error: '.$e->getMessage();
            die();
        }
    }

    public function query($sql){
        $this->stmt = $this->dbh->prepare($sql);
    }

    public function bind($parameter, $value, $type = null){
        if(is_null($type)){
            switch(true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_STR;
                    break;
                default:
                    $type = PDO::PARAM_STR;
                    break;
            }
        }

        $this->stmt->bindValue($parameter, $value, $type);
    }

    public function execute(){
        return $this->stmt->execute();
    }

    public function result(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function results(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function totalResults(){
        return $this->stmt->rowCount();
    }

    public function lastInsertId(){
        return $this->dbh->lastInsertId();
    }

}

?>