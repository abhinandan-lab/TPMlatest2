<?php

function randomNumber($digits = 6)
{

    return rand(pow(10, $digits - 1), pow(10, $digits) - 1);

}

function display_error($validation, $name)
{

    if (isset($validation)) {
        if ($validation->hasError($name)) {
            return $validation->getError($name);
        } else {
            return false;
        }
    }
}

function remove_user_data($modelsArr, $id)
{
    // first main table then other primary ke tables

    if (isset($modelsArr)) {

        $mainTable = $modelsArr[0];

        for ($i = 1; $i < count($modelsArr); $i++) {

            $temp = $modelsArr[$i];

            $temp->where('user_id', $id)->delete();
        }

        $mainTable->delete($id);

    }

}

// userLoggedin adminLoggedin
function if_has_session_then_redirect($checkValue, $redirecturl, $failedRedirect = null)
{
    if (session()->has($checkValue)) {
        echo session()->has($checkValue);
        return redirect()->to(site_url($redirecturl));
    } else {

        if ($failedRedirect != null) {
            return redirect()->to(site_url($failedRedirect));
        }

    }
}

//  ['errormsg', 'successmsg', 'infomsg', 'warningmsg']
function display_flash_msg($timer = 4000, $animation = "true", $progress = "true")
{

    // $msgType ='test'; $message; $bgcolor;

    $timer = (string) $timer;

    if (session()->has('successmsg')) {
        $msgType = "success";
        $message = session()->get('successmsg');
        $bgcolor = '#01B940';

        echo "<script>  Noti({
            status: '$msgType',
            content: '$message',
            timer: '$timer',
            animation: '$animation',
            progress: '$progress',
            bgcolor: '$bgcolor',
            icon: 'show'
        });</script>";

        // echo 'praise the LORD';
    }

    if (session()->has('errormsg')) {
        $msgType = "error";
        $message = session()->get('errormsg');
        $bgcolor = '#F91E00';

        echo "<script>  Noti({
            status: '$msgType',
            content: '$message',
            timer: '$timer',
            animation: '$animation',
            progress: '$progress',
            bgcolor: '$bgcolor',
            icon: 'show'
        });</script>";
    }

    if (session()->has('infomsg')) {
        $msgType = "info";
        $message = session()->get('infomsg');
        $bgcolor = '#4f70ff';

        echo "<script>  Noti({
            status: '$msgType',
            content: '$message',
            timer: '$timer',
            animation: '$animation',
            progress: '$progress',
            bgcolor: '$bgcolor',
            icon: 'show'
        });</script>";
    }

    if (session()->has('warningmsg')) {
        $msgType = "warning";
        $message = session()->get('warningmsg');
        $bgcolor = '#ffc400';

        echo "<script>  Noti({
            status: '$msgType',
            content: '$message',
            timer: '$timer',
            animation: '$animation',
            progress: '$progress',
            bgcolor: '$bgcolor',
            icon: 'show'
        });</script>";
    }

}

function checkEmailverified($model, $userid)
{
    // only called in this controller not through route
    $userModel = $model;
    $tocheck = $userModel->find($userid);
    if ($tocheck['email_verified'] != 1) {
        // send back to verify email
        $data = [
            'email' => $tocheck['email'],
            'userid' => $userid,
        ];
        $session->setFlashdata('infomsg', 'You need to verify your email first!');
        return view('User/verifyemail', ['data' => $data]);
        exit;
    }
}

// this function includes running year too
function get_age($dobYMD)
{
    $diff = (date('Y') - date('Y', strtotime($dobYMD)));
    return $diff;
}

function cm_to_feet_converter($cmValue, $formated = true)
{

    if ($formated) {
        $val = (string) ((float) $cmValue) * 0.0328;
        return substr($val, 0, 3);
    }
    return ((float) $cmValue) * 0.0328;
}

function get_country_name($countryid)
{
    if (isset($countryid)) {
        $db = \Config\Database::connect();
        $db = db_connect();
        $query = $db->query('select name from countries where id=' . $countryid . '; ');
        $query = $query->getResultArray();
        return $query[0]['name'];
    }

    return 'Unknown';
}

function get_state_name($stateid)
{
    if (isset($stateid)) {
        $db = \Config\Database::connect();
        $db = db_connect();
        $query = $db->query('select name from states where id=' . $stateid . '; ');
        $query = $query->getResultArray();
        return $query[0]['name'];
    }

    return 'Unknown';
}

function get_city_name($cityid)
{
    $db = \Config\Database::connect();
    $db = db_connect();
    if (isset($cityid)) {
        $query = $db->query('select name from cities where id=' . $cityid . '; ');
        $query = $query->getResultArray();
        if (isset($query[0])) {
            return $query[0]['name'];
        }
    }
    return 'Unknown';
}

function formated_date($date_Y_m_d)
{
    $date_Y_m_d = date('Y-m-d');
    $old_date_timestamp = strtotime($date_Y_m_d);
    $new_date = date('d M, Y', $old_date_timestamp);
    return $new_date;
}

function get_occupation($dbvalue)
{
    $myarr = explode("|", $dbvalue);
    $getparticular = occupation();

    if (isset($myarr[1])) {
        return $getparticular[$myarr[0]][$myarr[1]];
    }

    return 'occupation Unknown';
}

function get_education($dbvalue)
{
    $myarr = explode("|", $dbvalue);
    $getparticular = qualifications();

    if (isset($myarr[1])) {
        return $getparticular[$myarr[0]][$myarr[1]];
    }

    return 'education Unknown';
}

function get_whatsapNumber($accountType, $number, $spareCharacters = 3)
{

    if ($accountType > 0) {
        // premium member
        return $number;
    }

    return preg_replace('/(?<=\S{' . $spareCharacters . '})\S/', '*', $number);
}

function get_emailaddress($accountType, $email, $spareCharacters = 3)
{

    if ($accountType > 0) {
        // premium member
        return $email;
    }
    return preg_replace('/(?<=\S{' . $spareCharacters . '})\S/', '*', $email);
}

function get_weight($index)
{
    if (isset($index)) {
        $arrayWeight = weight();
        $count = count($arrayWeight);
        return $arrayWeight[$index];

        if ($index >= $count) {
            return 'error';
        }
    }
}

function get_images_with_path($picsArr, $returnSingleImg = true)
{
    if (isset($picsArr)) {
        if ($returnSingleImg) {
            if (isset($picsArr[0])) {

                return '/imagerender/'.$picsArr[0]['img_name'];
            }
        } else {
            $temp = [];
            foreach ($picsArr as $key => $value) {
                array_push($temp, ['id' => $value['id'], 'img' => $value = '/imagerender/' . $value['img_name'] ]);
            }
            return $temp;
        }
    }
}

function get_accountType($index) {
    if(isset($index)) {
        $myarr = accountTypes();
        return $myarr[$index];
    }
}
