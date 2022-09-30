<?php
class LSModel extends DB{
    
    public function LichSu(){
        $sql = "SELECT * FROM ls_cq as ls, nguoi_quan_ly as nql WHERE ls.IDNQL = nql.IDNQL";

        return mysqli_query($this->con, $sql);
    }

    public function InsertLS($optradio, $maso, $soluong, $password, $idnql){

        //chen du lieu vao bang LS_CQ
        
        $sql = "INSERT INTO LS_CQ (LOAI_TK, MA_BD, SO_LUONG, MK, IDNQL)
        VALUES('$optradio+MS$optradio', '$maso', $soluong, '$password', '$idnql')";

        $result = false;
        if( mysqli_query($this->con, $sql)) {
            $result = true;
        }
    }

}
?>