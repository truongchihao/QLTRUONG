<?php
class HSModel extends DB{

    public function GV(){
        $sql = "SELECT * FROM HOC_SINH";
        return mysqli_query($this->con, $sql);
    }

    function read($idlop){
        $sql = "SELECT * FROM HOC_SINH WHERE IDLOP='$idlop'";

        return mysqli_query($this->con, $sql);
       }

    public function ReadHS($idhs){
        $sql = "SELECT hs.IDHS, hs.MA_HS, hs.FULL_NAME, l.TEN_LOP, hs.BIRTHDAY, hs.EMAIL, l.IDLOP
        FROM hoc_sinh As hs, lop AS l WHERE hs.IDLOP = l.IDLOP AND IDHS = '$idhs'";

        if($stmt = mysqli_prepare($this->con, $sql)) {

            if(mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);

                if(mysqli_num_rows($result) == 1) {
                    return mysqli_fetch_array($result, MYSQLI_ASSOC);
        
                }else{
                    return 'loi';
                }
            }else{
                return 'loi';
            }
        }
    }

    public function UpdateHS($fullname, $birthday, $email, $idhs, $idlop){
        $sql = "UPDATE HOC_SINH SET FULL_NAME='$fullname', BIRTHDAY='$birthday', EMAIL='$email', IDLOP='$idlop' WHERE IDHS = '$idhs'";

        $result = false;
        if( mysqli_query($this->con, $sql)) {
            $result = true;
        }
        return json_encode($result);
    }

    public function TTHS($idhs){
        $sql = "SELECT * FROM HOC_SINH WHERE IDHS='$idhs'";

        return mysqli_query($this->con, $sql);
    }

    public function DeleteHS($idhs){
        $sql = "DELETE FROM HOC_SINH WHERE IDHS = '$idhs'";

        $result = false;
        if( mysqli_query($this->con, $sql)) {
            $result = true;
        }
        return json_encode($result);
    }

    public function HSTT($idac){
        $sql = "SELECT * FROM HOC_SINH WHERE IDAC ='$idac' ";

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