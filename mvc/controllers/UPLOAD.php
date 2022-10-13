<?php
class UPLOAD extends Controller{

    public function __construct(){

        $this->TLModel = $this->model("TLModel");
    }

    function tailieu(){

        //View

        $this->view("GV", [
            "UPLOAD"=>"upload"
        ]);
    }

    function uploadtailieu(){

        //View

        $this->view("GV", [
            "Page"=>"TABLEGVLOP",
            "GVLOP" => $pc->dslop($idgv),
        ]);
    }

}
?>