<?php
class GVModel extends DB{
    public function GetGV(){
        return "Truong Chi Hao";
    }

    public function GV(){
        $sql = "SELECT * FROM GIAO_VIEN";
        return mysqli_query($this->con, $sql);
    }

    public function GVIDMON($idmon){
        $sql = "SELECT * FROM GIAO_VIEN WHERE IDMON='$idmon'";
        return mysqli_query($this->con, $sql);
    }

    public function CheckIDGV($idgv){
        $sql = "SELECT * FROM GIAO_VIEN WHERE IDGV = '$idgv'";

        $row = mysqli_query($this->con, $sql);
        $result = false;
        if( mysqli_num_rows($row)>0) {
            $result = true;
        }
        return json_encode($result);
    }

    public function ReadGV($idgv){
        $sql = "SELECT gv.IDGV, gv.MA_GV, gv.FULL_NAME, mh.IDMON, mh.TEN_MON, gv.CHUC_VU, gv.BIRTHDAY, gv.EMAIL
        FROM giao_vien As gv, mon_hoc AS mh
        WHERE gv.IDMON = mh.IDMON AND IDGV = '$idgv'";

        if($stmt = mysqli_prepare($this->con, $sql)) {

            if(mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);

                if(mysqli_num_rows($result) == 1) {
                    return mysqli_fetch_array($result, MYSQLI_ASSOC);
        
                }else{
                    return 'loi1';
                }
            }else{
                return 'loi2';
            }
        }
    }

    public function UpdateGV($fullname, $birthday, $email, $idmon, $chucvu, $idgv){
        $sql = "UPDATE GIAO_VIEN SET FULL_NAME='$fullname', BIRTHDAY='$birthday', EMAIL='$email', IDMON='$idmon', CHUC_VU='$chucvu' WHERE IDGV = '$idgv'";

        $result = false;
        if( mysqli_query($this->con, $sql)) {
            $result = true;
        }
        return json_encode($result);
    }

    public function TTGV($idgv){
        $sql = "SELECT * FROM GIAO_VIEN WHERE IDGV='$idgv'";

        return mysqli_query($this->con, $sql);
    }

    public function DeleteGV($idgv){
        $sql = "DELETE FROM GIAO_VIEN WHERE IDGV = '$idgv'";

        $result = false;
        if( mysqli_query($this->con, $sql)) {
            $result = true;
        }
        return json_encode($result);
    }

    public function GVTT($idac){
        $sql = "SELECT * FROM GIAO_VIEN WHERE IDAC ='$idac' ";

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