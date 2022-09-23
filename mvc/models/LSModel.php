<?php
class LSModel extends DB{
    
    public function LichSu($idtruong){
        $sql = "SELECT * FROM LS_CQ WHERE IDTRUONG='$idtruong'";

        return mysqli_query($this->con, $sql);
    }

    public function InsertLS($optradio, $maso, $soluong, $password, $idtruong){

        //lay gia tri IDLS cua bang LS_CQ

        $sql = "SELECT * FROM LS_CQ WHERE IDTRUONG='$idtruong'";
        $r = mysqli_query($this->con, $sql);
        $row = mysqli_num_rows($r);
        $ro = 1;
        $idls = $row + $ro;

        //chen du lieu vao bang LS_CQ
        
        $sql = "INSERT INTO LS_CQ (IDLS, LOAI_TK, MA_BD, SO_LUONG, MK, IDTRUONG)
        VALUES('$idls', '$optradio+MS$optradio', '$maso', $soluong, '$password', '$idtruong')";

        $result = false;
        if( mysqli_query($this->con, $sql)) {
            $result = true;
        }

        return json_encode($idls);
    }

}
?>