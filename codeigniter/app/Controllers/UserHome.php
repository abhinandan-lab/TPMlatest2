<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use \App\Models\User;
use \App\Models\UserInfo;
use \App\Models\PartnerPreference;
use \App\Models\UserPhoto;

class UserHome extends BaseController
{

    protected $helpers = ['form', 'StaticData', 'SupportFunct', 'session'];

    public function index()
    {
        $pageData = ['title' => 'User Dashboard'];

        $useremail = $_SESSION['userEmail'];
        $user_model = new User();
        $userInfo_model = new UserInfo();
        $userphoto_model = new UserPhoto();
    
        $getUserRow = $user_model->where('email', $useremail)->first();
        $getUserphotos =  $userphoto_model->where('user_id', $getUserRow['id'])->findAll();
        $getUserInfo = $userInfo_model->where('user_id', $getUserRow['id'])->first();

        $getUserInfo = array_merge($getUserInfo, $getUserRow, ['pics' => $getUserphotos]); // latest key overrites previous same key

        
        // echo '<pre>';
        print_r($getUserInfo);
        // die();


        return view('User/Headers/userSettinghead', ['pageData'=> $pageData])
        .view('User/profilesetting', ['userinfo'=> $getUserInfo]);
    }

    public function editProfile() {

        $pageData = ['title' => 'Edit user settings'];

        $useremail = $_SESSION['userEmail'];
        $user_model = new User();
        $userInfo_model = new UserInfo();
        $userphoto_model = new UserPhoto();
    
        $getUserRow = $user_model->where('email', $useremail)->first();
        $getUserphotos =  $userphoto_model->where('user_id', $getUserRow['id'])->findAll();
        $getUserInfo = $userInfo_model->where('user_id', $getUserRow['id'])->first();

        $getUserInfo = array_merge($getUserInfo, $getUserRow, ['pics' => $getUserphotos]);

        // echo '<pre>';
        print_r($getUserInfo);
        // die();
        
        return view('User/Headers/userSettinghead', ['pageData'=> $pageData])
        .view('User/profilesetting2', ['userinfo'=> $getUserInfo]);
        
    }
    
    public function editPartnerPreference() {
        $pageData = ['title' => 'Register new Account'];
        return view('User/Headers/userSettinghead', ['pageData'=> $pageData])
        .view('User/profilesetting3');
    }
}

