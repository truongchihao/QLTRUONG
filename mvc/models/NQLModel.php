<?php

class NQLModel extends DB{

    public function TTNQL($idac){
        $sql = "SELECT * FROM NGUOI_QUAN_LY WHERE IDAC ='$idac' ";

        if($stmt = mysqli_prepare($this->con, $sql)) {

            if(mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);

                if(mysqli_num_rows($result) == 1) {

                    return mysqli_fetch_array($result, MYSQLI_ASSOC);

                }else{
                    return 'khongco';
                }
            }else{
                return 'loi';
            }
        }
    }
}
?>