<?php
class SchoolModel extends DB
{
    public function add($name, $date, $address, $kind)
    {
        $sqlCommand = "INSERT INTO truong_hoc(TEN_TRUONG, NGAY_THANH_LAP, DIA_CHI, LOAI) VALUES('$name', '$date', '$address', '$kind')";
        return mysqli_query($this->con, $sqlCommand);
    }

    public function get($id)
    {
        $sqlCommand = "SELECT * FROM truong_hoc WHERE IDTRUONG = " . $id;
        return mysqli_query($this->con, $sqlCommand);
    }

    public function update($id, $name, $date, $address, $kind)
    {
        $sqlCommand = "UPDATE truong_hoc SET TEN_TRUONG = '$name', NGAY_THANH_LAP = '$date', DIA_CHI = '$address', LOAI = '$kind' WHERE IDTRUONG = $id";
        return mysqli_query($this->con, $sqlCommand);
    }

    public function stat($address, $kind, $startTime, $endTime)
    {
        $startVal = date('Y-m-d', $startTime);
        $endVal = date('Y-m-d', $endTime);
        $address_condition = (strcmp($address, "Tất Cả") == 0) ? true : "DIA_CHI = '$address'";
        $kind_condition = (strcmp($kind, "Tất Cả") == 0) ? true : "LOAI = '$kind'";
        $start_time_condition = (!$startTime) ? true : "NGAY_THANH_LAP > '$startVal'";
        $end_time_condition = (!$endTime) ? true : "NGAY_THANH_LAP < '$endVal'";

        $sqlCommand = "SELECT * FROM truong_hoc WHERE " . $address_condition . " AND " . $kind_condition  . " AND " . $start_time_condition  . " AND " . $end_time_condition;
        return mysqli_query($this->con, $sqlCommand);
    }

    public function getAll()
    {
        $sqlCommand = "SELECT * FROM truong_hoc";
        return mysqli_query($this->con, $sqlCommand);
    }
}
