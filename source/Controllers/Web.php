<?php

namespace Source\Controllers;

use Source\Core\Controller;

class Web extends Controller
{
    public function __construct()
    {
        parent::__construct(__DIR__."/../../themes/" . CONF_VIEW_THEME . "/");
    }
    

    public function home()
    {
       echo $this->view->render('theme',[
           'titulo' => 'Home',
           'teste' => 'Eu sou o mais bonito'
       ]);
    }

    public function blog()
    {
        echo 'Eu sou o blog';
    }

    public function error(){
        echo 'Eu sou um erro!';
    }
}