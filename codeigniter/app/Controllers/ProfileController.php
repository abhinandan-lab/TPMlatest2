<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\UserInfo;
use App\Models\UserPhoto;
use App\Controllers\BaseController;
 
class ProfileController extends BaseController
{
    protected $helpers = ['form', 'StaticData', 'SupportFunct', 'session'];

    public function index()
    {
        $pageData = ['title' => 'Profiles'];

        $db = \Config\Database::connect();
        $db = db_connect();
        // $builder = $db->table('user');
        $query = $db->query('SELECT * FROM user INNER JOIN user_info ON user.id = user_info.user_id LIMIT 1;');
        $newProfile = $query->getResultArray();
        $newProfile =$newProfile[0];

       $pics = $db->query('SELECT img_name FROM user_photo where user_id=1');
       $pics =$pics->getResultArray();
       $newProfile['pics'] = $pics;

        return view('User/Headers/profilehead', ['pageData'=> $pageData]).view('User/profiles', ['newprofile' => $newProfile]);
        // return view('User/profiles');
    }


    public function premiums() {
        $pageData = ['title' => 'Upgrade to Premium account'];

        return view('User/Headers/premiumhead', ['pageData'=> $pageData]).view('User/premiums');
    }
}
