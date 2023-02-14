<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class UserHome extends BaseController
{

    protected $helpers = ['form', 'StaticData', 'SupportFunct', 'session'];

    public function index()
    {
        return view('User/profilesetting');
    }

    public function editProfile() {
        return view('User/profilesetting2');
        
    }
    
    public function editPartnerPreference() {
        return view('User/profilesetting3');
    }
}

