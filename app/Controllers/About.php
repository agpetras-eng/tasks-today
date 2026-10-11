<?php

namespace App\Controllers;

class About extends BaseController
{
    // About page (/about) - static page
    public function index()
    {
        $data['title'] = 'About';

        return view('about', $data);
    }
}
