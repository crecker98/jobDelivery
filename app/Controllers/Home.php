<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $content = (new Header())->index();
        $content .= view('home');
        $content .= view('footer');
        return $content;
    }
}
