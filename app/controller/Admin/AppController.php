<?php

namespace App\Controller\Admin;

use App\Controller\AppController as ControllerAppController;
use Core\Auth\DBauth;

class AppController extends ControllerAppController{

    protected $template = "Corps";

    /**
     * Verication authentification
     * 
     * @return exception
     * 
     */
    
    public function __construct()
    {
        parent::__construct();
        $auth = DBauth::getInstance();

        if (!$auth->logged()) 
        {
            $this->forbidden();
        }
    }
}
