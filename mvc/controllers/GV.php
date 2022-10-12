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

        $pc = $this->model("PCModel");
        //View

        $this->view("GV", [
            "Page"=>"TABLEGVLOP",
            "GVLOP" => $pc->dslop($idgv),
        ]);
        }
}
?>