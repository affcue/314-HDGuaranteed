<?php
class DBConnection
{
    private $servername = "127.0.0.1:3307";
    //private $servername = "localhost"; #for testing purposes
    private $username = "root";
    private $password = "";
    private $dbname = "314hdguaranteed";
    private $conn;

    

    // Constructor to initialize database connection
    public function __construct()
    {
        // Create connection
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // Method to get the database connection
    public function getConnection()
    {
        return $this->conn;
    }

    // Method to close the database connection
    public function closeConnection()
    {
        $this->conn->close();
    }
}
?>
