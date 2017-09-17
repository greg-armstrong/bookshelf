<?php

class database
{

    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $dbh;
    private $error;

    private $stmt;

    /**
     * Set up a database connection
     */
    public function __construct(){

        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;

        $options = array(
            PDO::ATTR_PERSISTENT    => true,
            PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION
        );
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        }catch(PDOException $e){
            $this->error = $e->getMessage();
        }
    }

    /**
     * Sets up a query for use with PDO
     */
    public function query($query){
        $this->stmt = $this->dbh->prepare($query);
    }

    /**
     * Gets the ID of the last inserted row
     */
    public function lastInsertedId(){
        return $this->dbh->lastInsertId();
    }

    /**
     * Swaps out PDO style parameters for the defined values
     */
    public function bind($param, $value, $type = null){
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    /**
     * Executes the statement
     */
    public function execute(){
        return $this->stmt->execute();
    }

    /**
     * Returns the rows returned by the PDO query
     */
    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}