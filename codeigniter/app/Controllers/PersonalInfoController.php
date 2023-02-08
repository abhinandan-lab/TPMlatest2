<?php

namespace App\Controllers;


use \App\Models\User;
use \App\Models\UserInfo;
use \App\Models\UserPhoto;

use App\Controllers\BaseController;

class PersonalInfoController extends BaseController
{
    protected $helpers = ['form', 'StaticData', 'SupportFunct', 'session'];

    public function peInfoOne($userid)
    {
        // echo $userid;
        $session = \Config\Services::session();

        // check if email is verified or not
        checkEmailverified(new User(), $userid);

        $data['qualifications'] = qualifications();
        $data['heights'] = height();
        $data['weights'] = weight();

        if (strtolower($this->request->getMethod()) !== 'post') {
            // get request
            return view('User/getprofileinfo1', [
                'validation' => null,
                'data' => $data]);
        }

        $rules = [
            'fname' => [
                'rules' => 'required|alpha',
                'errors' => [
                    'required' => 'please enter your first name',
                    'alpha' => 'Please enter alphabets only',
                ],
            ],

            'lname' => [
                'rules' => 'required|alpha',
                'errors' => [
                    'required' => 'please enter your last name',
                    'alpha' => 'Please enter alphabets only',
                ],
            ],

        ];

        if (!$this->validate($rules)) {
            return view('User/getprofileinfo1', [
                'validation' => $this->validator, 'data' => $data,
            ]);
        }

        $sessiondata = [
            'fname' => $_POST['fname'],
            'lname' => $_POST['lname'],
            'highest_qualification' => (isset($_POST['highestQuallification'])) ? $_POST['highestQuallification'] : '',
            'height' => (isset($_POST['height'])) ? $_POST['height'] : "",
            'weight' => (isset($_POST['weight'])) ? $_POST['weight'] : "",
        ];

        $session->set($sessiondata);

        // get the where to update

        $userInfomodel = new UserInfo();
        $userinfoRow = $userInfomodel->where('user_id', $userid)->first();

        $userInfomodel->update($userinfoRow['id'], $sessiondata);

        $data['countries'] = getCountries();
        $data['occupation'] = occupation();

        // echo '<pre>';
        // print_r($_SESSION);

        return view('User/getprofileinfo2', ['data' => $data]);

    }

    public function peInfoTwo($userid)
    {
        // echo $userid;
        // echo 'helo';
        $session = \Config\Services::session();

        // check if email is verified or not
        checkEmailverified(new User(), $userid);

        $data = null;

        if (strtolower($this->request->getMethod()) !== 'post') {
            // get request
            return view('User/getprofileinfo2', [
                'validation' => null,
                'data' => $data]);
        }

        $rules = [
            'country' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Choose country',
                ],
            ],

            'state' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Choose country and state',
                ],
            ],

        ];

        if (!$this->validate($rules)) {
            return view('User/getprofileinfo2', [
                'validation' => $this->validator, 'data' => $data,
            ]);
        }

        $sessiondata = [
            'location_country' => $_POST['country'],
            'location_state' => $_POST['state'],
            'location_city' => (isset($_POST['city'])) ? $_POST['city'] : '',
            'occupation' => (isset($_POST['occupation'])) ? $_POST['occupation'] : '',
            'hobbies' => (isset($_POST['hobbies'])) ? $_POST['hobbies'] : '',
        ];

        $session->set($sessiondata);

        $userInfomodel = new UserInfo();
        $userinfoRow = $userInfomodel->where('user_id', $userid)->first();

        // echo $userinfoRow['dob'];

        $userInfomodel->update($userinfoRow['id'], $sessiondata);

        // echo '<pre>';
        // print_r($_SESSION);
        // echo 'all set';
        // exit;

        return view('User/getprofileinfo3', ['data' => $data]);

    }

    public function peInfoThree($userid)
    {
        $session = \Config\Services::session();
        // check if email is verified or not
        checkEmailverified(new User(), $userid);

        $data = null;

        if (strtolower($this->request->getMethod()) !== 'post') {
            // get request
            return view('User/getprofileinfo3', [
                'validation' => null,
                'data' => $data]);
        }

        $rules = [
            'whatnumber' => [
                'rules' => 'required|numeric|max_length[10]|min_length[10]',
                'errors' => [
                    'required' => 'Choose country',
                    'numeric' => 'Please enter valid phone number',
                    'max_length' => 'Please enter 10 digit phone number',
                    'min_length' => 'Please enter 10 digit phone number',
                ],
            ],

        ];

        if (!$this->validate($rules)) {
            return view('User/getprofileinfo3', [
                'validation' => $this->validator, 'data' => $data,
            ]);
        }

        $sessiondata = [
            'about_me' => (isset($_POST['aboutme'])) ? $_POST['aboutme'] : '',
            'whatsapp_number' => $_POST['whatnumber'],
            'baptized' => (isset($_POST['baptized'])) ? $_POST['baptized'] : '',
        ];

        $session->set($sessiondata);

        $userInfomodel = new UserInfo();
        $userinfoRow = $userInfomodel->where('user_id', $userid)->first();

        // echo $userinfoRow['dob'];

        $userInfomodel->update($userinfoRow['id'], $sessiondata);

        // echo '<pre>';
        // print_r($_SESSION);
        // echo 'all set';
        // exit;

        return view('User/getprofileinfo4', ['data' => $data]);

    }

    public function peInfoFour($userid)
    {
        $session = \Config\Services::session();
        $request = \Config\Services::request();

        // check if email is verified or not
        checkEmailverified(new User(), $userid);

        $data = null;

        if (strtolower($this->request->getMethod()) !== 'post') {
            // get request
            return view('User/getprofileinfo4', [
                'validation' => null,
                'data' => $data]);
        }

        $rules = [
            'myfile' => [
                'rules' => 'uploaded[myfile.0]|is_image[myfile]',
                'errors' => [
                    'uploaded' => 'Choose your picture',
                    'is_image' => 'Only image files are allowed',
                ],
            ],

        ];

        if (!$this->validate($rules)) {
            return view('User/getprofileinfo4', [
                'validation' => $this->validator, 'data' => $data,
            ]);
        }
        // echo '<pre>';

        $imagefile = $this->request->getFiles();

        $userPhotomodel = new UserPhoto();
        $userInfomodel = new UserInfo();

        foreach ($imagefile['myfile'] as $img) {
            if ($img->isValid() && !$img->hasMoved()) {
                $newName = $img->getRandomName();
                $img->move(WRITEPATH . 'uploads', $newName);

                $currentImg = [
                    'user_id' => $session->get('user_id'),
                    // Note: WRITEPATH we can't use because its stores the localhost path
                    // but when we will fetch the images we will use WRITEPATH because images are store there...
                    'img_path' => 'uploads/' . $newName,
                ];

                $userPhotomodel->insert($currentImg);

            }
        }

        return redirect()->to('/profiles');

    }

    public function getStatesApi($country_id)
    {

        return getStates($country_id);
    }

    public function getCitiesApi($state_id)
    {

        return getCities($state_id);
    }

    public function test()
    {
        echo '<pre>';

        // print_r(get_country_name(15));
        // print_r(testy());
        // echo cm_to_feet_converter(182);
        print_r(get_weight(0));
        return get_weight(0);
    }
}
