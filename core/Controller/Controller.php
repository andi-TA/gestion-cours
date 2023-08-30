<?php 

namespace Core\Controller;

class Controller{

    protected $viewPatch;
    protected $template;

    public function render($views,$options = [])
    {
        ob_start();
            extract($options);
            require $this->viewPatch.str_replace('.','/',$views).'.php';
        $content = ob_get_clean();
        require $this->viewPatch.'templates'.'/'.$this->template.'.php';

    }
    public function notFound()
    {
        header('HTTP/1.0 404 Not Found');
        die('404: PAGE NOT FOUND');
    }
    public function forbidden()
    {
        header('HTTP/1.0 403 FORBIDDEN');
        die('Caution: Not Acces Root');
    }
    
}