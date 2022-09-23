<?php
class QLMON extends Controller{

    public function __construct(){

        $this->MHModel = $this->model("LOPModel");
        $this->KHOIModel = $this->model("KHOIModel");
        $this->TRUONGModel = $this->model("TRUONGModel");
    }

    public function SayHi(){

        $this->view("GV", [
            "GV"=>"read",
        ]);
    }

    public function fetchmon($idtruong){

        $result = $this->MHModel->read($idtruong);
        $rowcount=mysqli_num_rows($result);

        //View

        $this->view("fetchmon", [
            "idtruong" => $idtruong,
            "rowcount" => $rowcount,
            "readmon" => $result,
        ]);
    }

}
?>
