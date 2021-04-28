<?php

namespace Source\Core;


use Source\Support\Message;
use Source\Support\Seo;
use Source\Core\View;


/**
 * FSPHP | Class Controller
 *
 * @author Robson V. Leite <cursos@upinside.com.br>
 * @package Source\Core
 */
class Controller
{   
    /** @var View */
    protected $view;

    /** @var Seo */
    protected $seo;

    /** @var message */
    protected $message;


    public function __construct(string $pathToViews = null)//Escolha views para renderizar
    {
        $this->view = new View($pathToViews);
        $this->seo = new Seo();
        //$this->message = new Message();
    }

    


}