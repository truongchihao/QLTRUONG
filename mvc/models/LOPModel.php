<?php
class LOPModel extends DB{

    public function LOP($idtruong){
        $sql = "SELECT l.IDLOP, l.TEN_LOP FROM lop as l, khoi as k, truong_hoc as tr 
        WHERE l.IDKHOI= k.IDKHOI AND tr.IDTRUONG=k.IDTRUONG AND tr.IDTRUONG='$idtruong'";
        return mysqli_query($this->con, $sql);
    }

    function read($idtruong){
        $sql = "SELECT l.IDLOP, l.TEN_LOP, l.SO_LUONG, k.TEN_KHOI
        FROM lop as l, khoi as k, truong_hoc as tr WHERE l.IDKHOI = k.IDKHOI AND tr.IDTRUONG=k.IDTRUONG AND tr.IDTRUONG='$idtruong'";

        return mysqli_query($this->con, $sql);
       }

    public function InsertLOP($tenlop, $soluong, $idkhoi){
        $sql = "INSERT INTO LOP (TEN_LOP, SO_LUONG, IDKHOI)
        VALUES('$tenlop', '$soluong', '$idkhoi')";

        $result = false;
        if( mysqli_query($this->con, $sql)) {
            $result = true;
        }
        return json_encode($result);
    }

    public function CheckTENLOP($tenlop){
        $sql = "SELECT * FROM LOP WHERE TEN_LOP = '$tenlop'";

        $row = mysqli_query($this->con, $sql);
        $result = false;
        if( mysqli_num_rows($row)>0) {
            $result = true;
        }
        return json_encode($result);
    }

    public function ReadLOP($idlop){
        $sql = "SELECT l.IDLOP, l.TEN_LOP, l.SO_LUONG, k.TEN_KHOI
        FROM lop as l, khoi as k WHERE l.IDKHOI = k.IDKHOI AND IDLOP = '$idlop'";

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

    public function UpdateLOP($tenlop, $soluong, $idkhoi, $idlop){
        $sql = "UPDATE LOP SET TEN_LOP='$tenlop', SO_LUONG='$soluong', IDKHOI='$idkhoi' WHERE IDLOP = '$idlop'";

        $result = false;
        if( mysqli_query($this->con, $sql)) {
            $result = true;
        }
        return json_encode($result);
    }

    public function TTLOP($idlop){
        $sql = "SELECT * FROM LOP WHERE IDLOP='$idlop'";

        return mysqli_query($this->con, $sql);
    }

    public function DeleteLOP($idlop){
        $sql = "DELETE FROM LOP WHERE IDLOP = '$idlop'";

        $result = false;
        if( mysqli_query($this->con, $sql)) {
            $result = true;
        }
        return json_encode($result);
    }

}
?>