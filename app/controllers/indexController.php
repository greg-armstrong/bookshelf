<?php

class indexController extends controller
{
    public function index()
    {
        // No processing to be done here. Just output the home view.
        $this->view->render('indexView.php');
    }

}