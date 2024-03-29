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
        // print_r($getUserInfo);
        // die();


        return view('User/Headers/userSettinghead', ['pageData'=> $pageData])
        .view('User/profilesetting', ['userinfo'=> $getUserInfo]);
    }

    public function editProfile() {

        $pageData = ['title' => 'Edit user settings'];

        $data['qualif'] = qualifications();
        $data['height'] = height();
        $data['occupation'] = occupation();
        $data['weight'] = weight();
        $data['country'] = getCountries();

        $useremail = $_SESSION['userEmail'];
        $user_model = new User();
        $userInfo_model = new UserInfo();
        $userphoto_model = new UserPhoto();

    
        $getUserRow = $user_model->where('email', $useremail)->first();
        $getUserphotos =  $userphoto_model->where('user_id', $getUserRow['id'])->findAll();
        $getUserInfo = $userInfo_model->where('user_id', $getUserRow['id'])->first();

        $getUserInfo = array_merge($getUserInfo, $getUserRow, ['pics' => $getUserphotos]);

        // echo '<pre>';
        // print_r($getUserInfo);
        // echo '</pre>';
        // die();
        
        return view('User/Headers/userSettinghead', ['pageData'=> $pageData])
        .view('User/profilesetting2', ['userinfo'=> $getUserInfo, 'data' => $data]);
        
    }
    
    public function editPartnerPreference() {
        $pageData = ['title' => 'Your Partner Preference'];
        $data['language'] = language();
        $data['countries'] = getCountries();


        $partnerPref = new PartnerPreference();
        $usermodel = new User();
        
        $userrow = $usermodel->where('email', $_SESSION['userEmail'])->first();
        
        $partnerprof = $partnerPref->where('user_id', $userrow['id'])->first();




        if (strtolower($this->request->getMethod()) !== 'post') {
            // get request
            return view('User/Headers/userSettinghead', ['pageData'=> $pageData])
            .view('User/profilesetting3', ['partnerprof' => $partnerprof, 'validation' => null, 'data' => $data]);
        }
        
        $rules = [
            // 'min-age' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required'=> 'Choose for whom account is created',
            //     ],
            // ],
            
            // 'max-age' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required'=> 'Choose your date of birth',
            //     ],
            // ],

            // 'min-height' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required'=> 'Choose for whom account is created',
            //     ],
            // ],
            
            // 'max-height' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required'=> 'Choose your date of birth',
            //     ],
            // ],
            
            // 'language' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required'=> 'Choose a language you speak',
            //     ],
            // ],
            
            // 'gender' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required'=> 'select your gender',
            //     ],
            // ],
        ];



        
        if (! $this->validate($rules)) {
            // post request
            // echo '<pre>';
            // print_r($_POST);
            // echo '</pre>';
            // die;
            return view('User/Headers/userSettinghead', ['pageData'=> $pageData])
            .view('User/profilesetting3', ['partnerprof' => $partnerprof, 'validation' => $this->validator, 'data' => $data]);
        }


        $newPartnerPref = [
            
        ];





        // echo '<pre>';
        // print_r($_SESSION);
        
        
       
        
        
        
        
        
        
        // die;
        return view('User/Headers/userSettinghead', ['pageData'=> $pageData])
        .view('User/profilesetting3', ['partnerprof' => $partnerprof]);
    }
}

