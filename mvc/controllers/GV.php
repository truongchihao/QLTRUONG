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

    function LOPDAY($idlop){

        //View

        $this->view("GV", [
            "Page"=>"LOPDAY",
        ]);
    }
}
?>