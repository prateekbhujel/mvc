<?php

/**
 * Home Class
 */

class Home
{
    use controller;

    public function index()
    {
        show("from the index function");
        $this->view('home');
    }

}
