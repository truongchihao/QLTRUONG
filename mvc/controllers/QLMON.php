<?php
class QLMON extends Controller{

    public function __construct(){

        $this->MHModel = $this->model("MHModel");
    }

    public function SayHi(){

        $this->view("GV", [
            "GV"=>"read",
        ]);
    }

    public function fetchmon(){

        $result = $this->MHModel->MH();
        $rowcount=mysqli_num_rows($result);

        //View

        $this->view("fetchmon", [
            "rowcount" => $rowcount
        ]);
    }

}
?>
