<?php
class GV extends Controller{

    public function __construct(){

        $this->PCModel = $this->model("PCModel");
    }


    function Home(){

        //View

        $this->view("GV", [
            "Page"=>"rong",
        ]);
    }

    function LOP($idgv){

        //View

        $this->view("GV", [
            "Page"=>"TABLEGVLOP",
            "GVLOP" => $this->PCModel->dslop($idgv),
        ]);
    }

    function LOPDAY($idgv, $idlop){

        //View
        $result = $this->PCModel->LOPDAY($idgv, $idlop);
        $row = mysqli_fetch_array($result);

        $this->view("GV", [
            "Page"=>"LOPDAY",
            "LOPDAY"=>$row,
        ]);
    }
}
?>