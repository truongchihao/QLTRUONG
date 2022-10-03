<?php

class KHOIModel extends DB{

    public function KHOI(){
        $sql = "SELECT * FROM KHOI";
        
        return mysqli_query($this->con, $sql);
    }

}
?>