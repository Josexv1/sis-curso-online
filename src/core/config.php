<?php
if (!defined('SECURE')) {
    die("Logged Hacking attempt!");
}
class Database
{
    
    private $host     = "localhost";
    private $db_name  = "delitos";
    private $username = "root";
    private $password = "";
    public $conn;
    
    public function dbConnection()
    {
        
        $this->conn = null;
        $options    = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
        try
        {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password, $options);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo "<div class='panel-body'>
            <div class='alert alert-warning alert-dismissable'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            Tenemos problemas al ejecutar la consulta. El error es el siguiente: ";
            echo $ex->getMessage();
            echo "</div>
            </div>";
        }
        
        return $this->conn;
    }
}