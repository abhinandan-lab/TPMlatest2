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

        $db = \Config\Database::connect();
        $db = db_connect();
        $query = $db->query('SELECT * FROM user INNER JOIN user_info ON user.id = user_info.user_id LIMIT 1;');
        $newProfile = $query->getResultArray();
        $newProfile =$newProfile[0];

       $pics = $db->query('SELECT img_path FROM user_photo where user_id=1');
       $pics =$pics->getResultArray();
       $newProfile['pics'] = $pics;

        return view('User/profiles', ['newprofile' => $newProfile]);
    }
}
