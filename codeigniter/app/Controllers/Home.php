<?php

namespace App\Controllers;
use \Config\Services; 

use \App\Models\User;
use \App\Models\UserInfo;
use \App\Models\PartnerPreference;


class Home extends BaseController
{
    protected $helpers = ['form', 'StaticData', 'SupportFunct', 'session'];

    public function register()
    {

        $pageData = ['title' => 'Register new Account'];
        
        // if_has_session_then_redirect('userLoggedin', 'profiles');
        if(session()->has('userLoggedin')) { 
            // return redirect()->to('profiles'); 
        }
        
        $data['profileFor'] = profileFor();
        $data['language'] = language();

        if (strtolower($this->request->getMethod()) !== 'post') {
            // get request
            return view('User/Headers/mainhead', ['pageData'=> $pageData])
            .view('User/homeregister', ['validation' => null, 'data' => $data,]);
        }
        
        $rules = [
            'profilehtml' => [
                'rules' => 'required',
                'errors' => [
                    'required'=> 'Choose for whom account is created',
                ],
            ],
            
            'dob' => [
                'rules' => 'required',
                'errors' => [
                    'required'=> 'Choose your date of birth',
                ],
            ],
            
            'language' => [
                'rules' => 'required',
                'errors' => [
                    'required'=> 'Choose a language you speak',
                ],
            ],
            
            'gender' => [
                'rules' => 'required',
                'errors' => [
                    'required'=> 'select your gender',
                ],
            ],
        ];
        
        
        if (! $this->validate($rules)) {
            // post request
            return view('User/Headers/mainhead', ['pageData'=> $pageData]).view('User/homeregister', [
                'validation' => $this->validator,  'data' => $data,
            ]);
        }
        
        $session = \Config\Services::session();
        
        $ses_data = [
            'profile' => $_POST['profilehtml'],
            'dob' => $_POST['dob'],
            'language' => $_POST['language'],
            'gender' => $_POST['gender'],
        ];
        
        $session->set($ses_data);
        $pageData = ['title' => 'Setup a new email and password'];

       return view('User/Headers/mainhead', ['pageData'=> $pageData]).view('User/setemail');
    }

    public function loginUser()
    {
        $data = null;   
        $session = \Config\Services::session();
        $emailService = \Config\Services::email();

        $pageData = ['title' => 'Login'];



        if (strtolower($this->request->getMethod()) !== 'post') {
            return view('User/Headers/mainhead', ['pageData'=> $pageData]).view('User/login', [
                'validation' => null,
             'data' => $data,]);
        }

        $rules = [
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required'=> 'Email is required',
                    'valid_email'=> 'Please enter valid email',
                ],
            ],

            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required'=> 'Password is required',
                ],
            ],
        ];



        if (!$this->validate($rules)) {
            return view('User/Headers/mainhead', ['pageData'=> $pageData]).view('User/login', [
                'validation' => $this->validator,  'data' => $data,
            ]);
        }

        // just login properly
        $userModel = new User();
        $userInfoModel = new UserInfo();
        $pass = $_POST['password'];
        $email = $_POST['email'];

        $getUserRow = $userModel->where('email', $email)->first();

        if(isset($getUserRow)) {
            // user exists

            if(password_verify($pass, $getUserRow['password'])) {

                $loginuser = [
                    'user_id' => $getUserRow['id'], 
                    'userLoggedin' => true,
                    'userEmail' => $getUserRow['email'],
                ];

                $session->set($loginuser);
                $session->setFlashdata('infomsg', 'Welcome Back');
                return redirect()->to('/profiles'); 
            }
            else {
                // 'wrong pass';
                $session->setFlashdata('errormsg', 'You entered wrong password!');
                return redirect()->to('/login'); 
            }

        }
        else {
            // user not exists
            $session->setFlashdata('errormsg', 'User not exist! Create your new Account');
            return redirect()->to('/login'); 
        }
        
      
    }

    public function setEmail()
    {
        $data = null;   

        $pageData = ['title' => 'Create email and password'];


        if (strtolower($this->request->getMethod()) !== 'post') {
            return view('User/Headers/mainhead', ['pageData'=> $pageData]).view('User/setemail', [
                'validation' => null,
             'data' => $data,]);
        }

        $rules = [
            'email' => [
                'rules' => 'required|valid_email|is_unique[user.email]',
                'errors' => [
                    'required'=> 'Email is required',
                    'valid_email'=> 'Please enter valid email',
                    'is_unique' => 'Email is already taken. Use another email'
                ],
            ],

            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required'=> 'Password is required',
                ],
            ],
        ];



        if (!$this->validate($rules)) {
            return view('User/Headers/mainhead', ['pageData'=> $pageData]).view('User/setemail', [
                'validation' => $this->validator,  'data' => $data,
            ]);
        }

        $session = \Config\Services::session();
        $emailService = \Config\Services::email();

        // send otp mail | create row in user, userinfo | return view

        $userInfoModel = new UserInfo();
        $userModel = new User();

        $userPartnerPreference = new PartnerPreference();

        $email =  $_POST['email'];
        $hashPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $generatedOtp = randomNumber();

         $subject = 'OTP for email verification';
         $message = 'test message';

         $to = $email;
         $emailService->setFrom(ADMIN_EMAIL, 'email verify request');
         $emailService->setTo($to);

         $otpHash = password_hash($generatedOtp, PASSWORD_DEFAULT);

         $emailService->setSubject($subject);
         // Using a custom template
         $heading = 'OTP requested to verify email';
         $para = 'Use this otp to verify your email. !have a nice day :)';
         $template = view("EmailTemplates/verifyOtpEmailTemplate", ['email'=>$to, 'otp'=> $generatedOtp, 'heading'=> $heading, 'para'=>$para]);
         $emailService->setMessage($template);
         if ($emailService->send()) 
         {
            // echo $generatedOtp;
            
            $userData = [
                'email' => $email,
                'otpdata' => $otpHash,
                'password' => $hashPassword,
                'account_status' => 0,
                'email_verified' => 0,
                'account_type' => 0, // free
            ];
            
            $userModel->insert($userData);
            
            
            $userid = $userModel->where('email', $email)->first()['id'];
            // echo $userid;
            
            
            $userInfoData = [
                'dob' =>  $session->get('dob'),
                'profile_for' =>  $session->get('profile'),
                'language' => $session->get('language'),
                'gender' =>  $session->get('gender'),
                'user_id' => $userid,
            ];
            
            $userInfoModel->insert($userInfoData);


            // inserting default user_partnerPreference 

            $default_PartnerPreference = [
                'user_id' => $userid,
            ];

            $userPartnerPreference->insert($default_PartnerPreference);




            // $session->set('email', $email);
            $session->set(['user_id', $userid, 'userEmail'=> $email]);

            $data = [
                'email' => $email,
                'userid' =>$session->get('user_id'),
            ];
            return view('User/Headers/mainhead', ['pageData'=> $pageData]).view('User/verifyemail', ['data'=> $data]);

         } 
         else 
         {

             $session->setFlashdata('errormsg', 'something went wrong! Email not sent');
             return redirect()->to('/setemail'); 
         }
    }

    public function verifyEmail() {
        $session = \Config\Services::session();

        $pageData = ['title' => 'Verify email'];

        $userModel = new User();
        $user = $userModel->find($session->get('user_id'));
        $email = $user['email'];

        $data = [
            'email' => $email,
            'userid' => $session->get('user_id'),
        ];

        if (strtolower($this->request->getMethod()) !== 'post') {
            // get request
            return view('User/Headers/mainhead', ['pageData'=> $pageData]).view('User/homeregister', [
                'validation' => null,
             'data' => $data,]);
        }

        $rules = [
            'otpvalue' => [
                'rules' => 'required|numeric|max_length[6]|min_length[6]',
                'errors' => [
                    'required'=> 'OTP is required',
                    'numeric'=> 'Please enter numbers only',
                    'max_length' => 'enter 6 digits OTP',
                    'min_length' => 'enter 6 digits OTP',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            return view('User/Headers/mainhead', ['pageData'=> $pageData]).view('User/verifyemail', [
                'validation' => $this->validator,  'data' => $data,
            ]);
        }

        $userOTP = $_POST['otpvalue'];
        // echo $userOTP;

        if(password_verify($userOTP, $user['otpdata'])) {
            // echo 'correct otp';

            $session->remove(['dob', 'profile', 'gender', 'language']);

            $removeOTPdata = [
                'otpdata' => '',
                'email_verified' => 1,
            ];

            $userModel->update($user['id'], $removeOTPdata);

            return redirect()->to('/profiles');   

        }
        else {
            // echo 'worng otp';
            $session->setFlashdata('errormsg', 'you entered wrong OTP');
            return view('User/Headers/mainhead', ['pageData'=> $pageData]).
            view('User/verifyemail', [ 'validation' => $this->validator, 'data'=> $data ]);
        }
    }

    public function editEmail($user_id) {

        $pageData = ['title' => 'Edit email'];

        remove_user_data([new User(), new Userinfo()], $user_id);

        return view('User/Headers/mainhead', ['pageData'=> $pageData]).view('User/setemail');

    }

    public function sendOtpAgain($user_id) {

        $userinfo = new UserInfo();
        $user = new User();
        $emailService = \Config\Services::email();

        $pageData = ['title' => 'new OTP'];

        // send main and create new otp | remove previous otp and replace with new

        $userrow =  $user->find($user_id);
        $session = \Config\Services::session();

        $generatedOtp = randomNumber();
        // echo $generatedOtp;

        $email =  $userrow['email'];

         $subject = 'resend OTP for email verification';
         $message = 'test message';

         $to = $email;
         $emailService->setFrom(ADMIN_EMAIL, 'email verify request');
         $emailService->setTo($to);

         $otpHash = password_hash($generatedOtp, PASSWORD_DEFAULT);

         $emailService->setSubject($subject);
         // Using a custom template
         $heading = 'OTP requested to verify email';
         $para = 'Use this otp to verify your email. !have a nice day :)';
         $template = view("EmailTemplates/verifyOtpEmailTemplate", ['email'=>$to, 'otp'=> $generatedOtp,
          'heading'=> $heading, 'para'=>$para]);
         $emailService->setMessage($template);
         if ($emailService->send()) 
         {
            $newrow = [
                'otpdata' => $otpHash,

            ];

            $user->update($user_id, $newrow);

            $data = [
                'email' => $email,
                'userid' =>$user_id,
            ];

            $session->setFlashdata('successmsg', 'new OTP has been sent!');
            return view('User/Headers/mainhead', ['pageData'=> $pageData]).view('User/verifyemail', ['data'=> $data]);
         }

         else {
            $session->setFlashdata('errormsg', 'something went wrong! Email not sent');
             return redirect()->to('/setemail'); 
         }
    }


    public function otpLogin() {
        $data = null;   
        $session = \Config\Services::session();
        $emailService = \Config\Services::email();

        $pageData = ['title' => 'Login with OTP'];
        
        
        if (strtolower($this->request->getMethod()) !== 'post') {
            return view('User/Headers/mainhead', ['pageData'=> $pageData]).view('User/otplogin1', [
                'validation' => null,
                'data' => $data,]);
            }      
            $rules = [
                'email' => [
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required'=> 'Email is required',
                        'valid_email'=> 'Please enter valid email',
                    ],
            ],
        ];
        
        if (!$this->validate($rules)) {
            return view('User/Headers/mainhead', ['pageData'=> $pageData]).view('User/otplogin1', [
                'validation' => $this->validator,  'data' => $data,
            ]);
        }
        
        // post request
        $userModel = new User();
        
        $email =  $_POST['email'];
        $getUserRow = $userModel->where('email', $email)->first();
        
        if(isset($getUserRow)) {
            
            $generatedOtp = randomNumber();
            $subject = 'OTP for login ';
            $message = 'test message';
            
            $to = $email;
            $emailService->setFrom(ADMIN_EMAIL, 'login with OTP');
            $emailService->setTo($to);
            
            $otpHash = password_hash($generatedOtp, PASSWORD_DEFAULT);
            
            $emailService->setSubject($subject);
            // Using a custom template
            $heading = 'OTP requested to login';
            $para = 'Use this otp to login your account. !have a nice day :)';
            $template = view("EmailTemplates/verifyOtpEmailTemplate", ['email'=>$to, 'otp'=> $generatedOtp, 'heading'=> $heading, 'para'=>$para]);
            $emailService->setMessage($template);
            if ($emailService->send()) 
            {
                // echo $generatedOtp;
               
               $userData = [
                   
                   'otpdata' => $otpHash,
                ];
                
                $userModel->update($getUserRow['id'] ,$userData);
                $session->setFlashdata('successmsg', 'OTP has been sent ');
                return redirect()->to('/otplogin2'); 
                
            } 
            else 
            {
                
                $session->setFlashdata('errormsg', 'something went wrong! email not sent');
                return redirect()->to('/otplogin1'); 
            }
        }
        else {
            $session->setFlashdata('errormsg', 'Email not correct');
            return redirect()->to('/otplogin1'); 
        }
    }
    
    //##################################################################################
    public function otpLogin2() {
        $data = null;   
        $session = \Config\Services::session();
        // $emailService = \Config\Services::email();

        $pageData = ['title' => 'Login with OTP'];
        
        
        
        if (strtolower($this->request->getMethod()) !== 'post') {
            return view('User/Headers/mainhead', ['pageData'=> $pageData]).view('User/otplogin2', [
                'validation' => null,
             'data' => $data,]);
        }

        $rules = [
            'otpnumber' => [
                'rules' => 'required|numeric|max_length[6]|min_length[6]',
                'errors' => [
                    'required'=> 'Enter OTP number',
                    'numeric'=> 'Only numbers are allowed',
                    'max_length'=> 'Enter 6 character otp number',
                    'min_length'=> 'Enter 6 character otp number',
                ],
            ],
        ];



        if (!$this->validate($rules)) {
            return view('User/Headers/mainhead', ['pageData'=> $pageData]).view('User/otplogin2', [
                'validation' => $this->validator,  'data' => $data,
            ]);
        }

        // post request
        // echo 'eee0';
        $userModel = new User();

        $optnumber = $_POST['otpnumber'];

        $email =  $_POST['email'];
        $getUserRow = $userModel->where('email', $email)->first();

        if(isset($getUserRow)) {
            // user exists

            if(password_verify($pass, $getUserRow['password'])) {

                $loginuser = [
                    'user_id' => $getUserRow['id'],
                    'userLoggedin' => true,
                    'userEmail' => $getUserRow['email'],
                ];

                $session->set($loginuser);
                // $session->markAsTempdata(['user_id', 'userLoggedin'],  7,890,000);

                $session->setFlashdata('infomsg', 'Welcome Back');
                return redirect()->to('/profiles'); 
            }
            else {
                // 'wrong pass';
                $session->setFlashdata('errormsg', 'You entered wrong password!');
                return redirect()->to('/login'); 
            }

        }
        else {
            // user not exists
            $session->setFlashdata('errormsg', 'User not exist! Create your new Account');
            return redirect()->to('/login'); 
        }

    }


    public function logout() {

    }
}
