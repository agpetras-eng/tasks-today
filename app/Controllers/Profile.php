<?php

namespace App\Controllers;

use App\Models\UserModel;

class Profile extends BaseController
{
    // Profile page (/profile) - shows the one demo user
    public function index()
    {
        $userModel = new UserModel();

        $data['title'] = 'Profile';
        $data['user']  = $userModel->getDemoUser();

        return view('profile', $data);
    }
}
