<?php
declare(strict_types=1);

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        return '<h1>Hello!</h1>';
    }
    public function documentationApiAction()
    {
        return '<h1>Documentation</h1>';
    }
   
}

