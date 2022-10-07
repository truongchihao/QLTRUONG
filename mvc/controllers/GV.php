<?php
class GV extends Controller{

    function Home(){

        //View

        $this->view("GV", [
            "Page"=>"rong",
        ]);
    }
}
?>