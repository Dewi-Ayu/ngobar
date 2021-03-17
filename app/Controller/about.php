<?php
class About extends controller {
    public function index(){
        $this->view("header");
        $this->view("about");
        $this->view("footer");

        echo "Hallo!!!! ini adalah halaman about ku";


        
    }
}