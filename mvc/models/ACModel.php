<?php
class ACModel extends DB{

    public function DeleteAC($idac){
        $sql = "DELETE FROM ACCOUNT WHERE IDAC = '$idac'";

        $result = false;
        if( mysqli_query($this->con, $sql)) {
            $result = true;
        }
        return json_encode($result);
    }
    
    public function InsertAC($optradio, $maso, $soluong, $password){

        //lay gia tri IDAC cua bang ACOUNT

        $sql = "SELECT * FROM ACCOUNT";
        $r = mysqli_query($this->con, $sql);
        $row = mysqli_num_rows($r);
        $ro = 1;
        $idac = $row + $ro;

        //lay mang gia tri TK da co cua bang ACCOUNT
        $sql = 'SELECT * FROM ACCOUNT';
        $resultset = mysqli_query($this->con, $sql);
        $tklist = [];
        while($row = mysqli_fetch_array($resultset, 1)) {
            $tklist[] = $row;
        }
        $tk=[];
        $idmon=1;
        $idlop=1;

    foreach ($tklist as $std) {
    array_push($tk, $std['TK']);
   }

        for($i=1;$i<=$soluong;$i++){
            $ma=$maso++;
            $idtk=$idac++;
            $ss= $optradio.$ma;
            $chucvu = "GIÁO VIÊN";
            $fullnamegv = "Giáo Viên A";
            $birthdaygv = "1975/01/01";
            $emailgv = "GV@gmail.com";
            $fullnamehs = "Học Sinh A";
            $birthdayhs = "2022/01/01";
            $emailhs = "HS@gmail.com";

            if(in_array($ss, $tk)){
                $i--;
                $idac--;
            }else{
                //chen du lieu vao bang ACCOUNT  
                $sql = "INSERT INTO ACCOUNT (IDAC, TK, MK)
                        VALUES('$idtk', '$optradio$ma', '$password') ";

                $result = false;
                if( mysqli_query($this->con, $sql)) {
                    $result = true;
                }

                if($optradio=="GV"){
                    //chen du lieu vao bang GIAO_VIEN
                    $sql = "INSERT INTO GIAO_VIEN (MA_GV, IDAC, IDMON, CHUC_VU, FULL_NAME, BIRTHDAY, EMAIL)
                            VALUES('$idgv', '$ma', '$idtk', '$idmon', '$chucvu', '$fullnamegv', '$birthdaygv', '$emailgv')";
        
                    $result = false;
                    if( mysqli_query($this->con, $sql)) {
                    $result = true;
                    }
                }else{
                    //chen du lieu vao bang HOC_SINH
                    $sql = "INSERT INTO HOC_SINH (MA_HS, IDAC, IDLOP, FULL_NAME, BIRTHDAY, EMAIL)
                            VALUES('$ma', '$idtk', '$idlop', '$fullnamehs', '$birthdayhs', '$emailhs')";
    
                    $result = false;
                    if( mysqli_query($this->con, $sql)) {
                        $result = true;
                    }
                }
            }
        }
        return json_encode($result);
    }

    public function KiemTra($TK, $MK){
        $sql = "SELECT * FROM account WHERE TK='$TK'AND MK='$MK'";

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