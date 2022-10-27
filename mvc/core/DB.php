<?php
class DB{
    public $con;
    public $servername = "localhost";
    public $username = "id17641207_admin";
    public $password = "f#G1[>g8T#x_K]<b";
    public $dbname = "id17641207_db_qltruong";

    function __construct(){
        $this->con = mysqli_connect($this->servername, $this->username, $this->password);
        mysqli_select_db($this->con, $this->dbname);
        mysqli_query($this->con, "SET NAMES 'utf8'");
    }
}
?>