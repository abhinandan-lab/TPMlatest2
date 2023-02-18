<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class UserHome extends BaseController
{

    protected $helpers = ['form', 'StaticData', 'SupportFunct', 'session'];

    public function index()
    {
        $pageData = ['title' => 'Register new Account'];
        return view('User/Headers/userSettinghead', ['pageData'=> $pageData])
        .view('User/profilesetting');
    }

    public function editProfile() {

        $pageData = ['title' => 'Register new Account'];
        
        return view('User/Headers/userSettinghead', ['pageData'=> $pageData])
        .view('User/profilesetting2');
        
    }
    
    public function editPartnerPreference() {
        $pageData = ['title' => 'Register new Account'];
        return view('User/Headers/userSettinghead', ['pageData'=> $pageData])
        .view('User/profilesetting3');
    }
}

