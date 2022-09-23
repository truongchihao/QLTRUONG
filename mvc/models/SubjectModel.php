<?php
class SubjectModel extends DB
{
    function add($name, $periods, $test, $grade)
    {
        $sqlCommand = "INSERT INTO mon_hoc(TEN_MON, SO_TIET, SO_BAIKT, IDKHOI) VALUES('$name', $periods, $test, $grade)";
        return mysqli_query($this->con, $sqlCommand);
    }

    function delete($id)
    {
        $sqlCommand = "UPDATE giao_vien SET IDMON = null WHERE IDMON = " . $id;
        $result = mysqli_query($this->con, $sqlCommand);
        $sqlCommand = "DELETE FROM mon_hoc WHERE IDMON = " . $id;
        return $result && mysqli_query($this->con, $sqlCommand);
    }

    function get($id)
    {
        $sqlCommand = "SELECT * FROM mon_hoc WHERE IDMON = " . $id;
        return mysqli_query($this->con, $sqlCommand);
    }

    function getAll()
    {
        $sqlCommand = "SELECT * FROM mon_hoc";
        return mysqli_query($this->con, $sqlCommand);
    }

    function update($id, $name, $periods, $test, $grade)
    {
        $sqlCommand = "UPDATE mon_hoc SET TEN_MON = '$name', SO_TIET = $periods, SO_BAIKT = $test, IDKHOI = $grade WHERE IDMON = $id";
        return mysqli_query($this->con, $sqlCommand);
    }

    public function stat($grade, $periods, $test, $operator)
    {
        $gradeID = intval($grade);
        $opt = (strcmp($operator, "Bằng") == 0) ? "=" : ((strcmp($operator, "Lớn Hơn") == 0) ? ">" : "<");
        $grade_condition = ($grade == 0) ? true : "IDKHOI " . $opt . " $gradeID";
        $periods_condition = ($periods == 0) ? true : "SO_TIET " . $opt . " $periods";
        $test_condition = ($test == 0) ? true : "SO_BAIKT " . $opt . " $test";
        $sqlCommand = "SELECT * FROM mon_hoc WHERE " . $grade_condition . " AND " . $periods_condition  . " AND " . $test_condition;
        return mysqli_query($this->con, $sqlCommand);
    }
}
