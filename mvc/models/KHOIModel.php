<?php

class KHOIModel extends DB{

    public function KHOI($idtruong){
        $sql = "SELECT * FROM KHOI WHERE IDTRUONG='$idtruong'";
        
        return mysqli_query($this->con, $sql);
    }

}
?>