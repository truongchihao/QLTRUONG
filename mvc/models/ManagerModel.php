<?php
class ManagerModel extends DB
{
    public function getTeacher($id)
    {
        $sqlCommand = "SELECT * FROM giao_vien AS GV JOIN truong_hoc AS TH ON GV.IDTRUONG = TH.IDTRUONG WHERE IDGV = $id";
        return mysqli_query($this->con, $sqlCommand);
    }

    public function isManager($teacherCode)
    {
        $sqlCommand = "SELECT COUNT(TK) FROM nguoi_quan_ly AS NQL WHERE IDGV = " . $teacherCode;
        return mysqli_query($this->con, $sqlCommand)->fetch_assoc()['COUNT(TK)'] ? true : false;
    }

    public function oldManager($schoolCode)
    {
        $sqlCommand = "SELECT TK FROM nguoi_quan_ly WHERE IDTRUONG = $schoolCode";
        return mysqli_query($this->con, $sqlCommand);
    }

    public function getMaxID()
    {
        $sqlCommand = "SELECT COUNT(TK) FROM account WHERE TK LIKE 'QL%'";
        $resultSet = mysqli_query($this->con, $sqlCommand);
        return $resultSet->fetch_assoc()["COUNT(TK)"];
    }

    public function add($username, $teacherCode, $schoolCode)
    {
        $sqlCommand = "INSERT INTO account(TK, MK) VALUES('$username', '111111')";
        mysqli_query($this->con, $sqlCommand);
        $sqlCommand = "INSERT INTO nguoi_quan_ly(TK, IDGV, IDTRUONG) VALUES('$username', $teacherCode, $schoolCode)";
        return mysqli_query($this->con, $sqlCommand);
    }
}
