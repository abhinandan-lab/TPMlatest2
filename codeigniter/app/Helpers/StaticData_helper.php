<?php

//  bdwrrjmpndmjuyno   tpmMatrimony  ==> ar253336 email smtp password...
// userLoggedin adminLoggedin

// email verification => genuine email used geniune person
// personal info filled(fname, lname, dob, profile_for, language, gender, whatsapp_number, highest_quailification) => yes interested
//  person | no connection will be made untill you give peInfo

// after verifying email acount_status and email_verified will be 1

// account status: 1=active, 0=inactive, 2=terminated|banned
// when created it will be 0 after email verification it will become 1

// account types: 0=free, 1=bronze, 2=silver, 3=gold {
function accountTypes()
{
    $data = ['free', 'bronze', 'silver', 'gold'];
    return $data;
}

function messageTypes()
{
    $data = ['errormsg', 'successmsg', 'infomsg', 'warningmsg'];
    return $data;
}

// return create profile for
function profileFor()
{
    $data = ['self', 'son', 'brother', 'sister', 'daughter', 'friend', 'relative'];
    return $data;
}

// returns languages
function language()
{

    $data = [["hindi", "marathi", "punjabi", "bengali", "gujarati",
        "urdu", "telegu", "kannada", "english", "tamil", "oriya", "marwari"],

        ["aka", "arabic", "arunachali", "assamese", "awadhi", "baluchi", "bengali", "bhojpuri",
            "brahui", "brij", "burmese", "chattisgarhi", "chinese", "coorgi", "dogri", "english",
            "french", "garhwali", "garo", "gujarati", "havyanavi", "himachali/pahari", "hindi",
            "hinko", "kakbarak", "kanauji", "kannada", "kashmiri", "khandesi", "khusi", "konkani",
            "koshali", "kumaoni", "kutchi", "ladakhi", "lepcha", "magahi", "maithili", "malay",
            "malayalam", "manipuri", "marathi", "marwari", "miji", "mizo", "monpa", "nepali",
            "odia", "pashto", "persian", "punjabi", "rajashtani", "russian", "sanskrit", "santhali",
            "seraiki", "sindhu", "sinhala", "sourashtra", "spanish", "swedish", "tagalog", "tamil",
            "telegu", "tulu", "urdu", "other"]];

    return $data;
}

function occupation()
{
    $data = [
        'ACCOUNTING, BANKING & FINANCE' => ['Banking Professional', 'Chartered Accountant',
            'Company Secretary', 'Finance Professional', 'Accounting Professional(Others)'],

        'ADMINISTRATION & HR' => ['Admin Professional', 'Human Resources Professional'],

        'ADVERTISING, MEDIA & ENTERTAINMENT' => ['Actor', 'Advertising Professional', 'Entertainment Professional',
            'Event Manager', 'Journalist', 'Media Professional', 'Public Relations Professional'],

        'AGRICULTURE' => ['Farming', 'Horticulturist', 'Agricultural Professional(others)', 'Event Manager'],

        'AIRLINE & AVIATION' => ['Air Hosters/Flight Attendant', 'Pilot/Co-pilot', 'Other Airline Professional'],

        'ARCHITECTURE & DESIGN' => ['Architect', 'Interior Designer', 'Landscape Archtitect'],

        'ARTIST, ANIMATIONS & WEB DESIGNERS' => ['Animator', 'Commercial Artist', 'Web/ UX Designer', 'Artist(Others)'],

        'BEAUTY, FASHION & JEWELLERY DESIGNERS' => ['Beautication', 'Fashion Designer', 'Hairstylist', 'Jwellery(Others)'],

        'BPO, KPO & CUSTOMER SUPPORT' => ['Customer Support/BPO,KPO Professional'],

        'CIVIL SERVICES/LAW ENFORCEMENT' => ['IAS/IRS/IES/IFS', 'Indian Police Services(IPS)', 'Law Enforcement Employee(others)'],

        'DEFENSE' => ['Airforce', 'Army', 'Navy', 'Defense Services(others)'],

        'EDUCATION & TRAINING' => ['Lecturer', 'Professor', 'Research Assistant', 'Research Scholar', 'Teacher',
            'Training Professional(othes)'],

        'ENGINEERING' => ['Civil Services', 'Electornics/Telecom Engineer', 'Mechanical/Production Engineer',
            'Non IT Engineer(others)'],

        'HOTEL & HOSPITALITY' => ['Chef/Sommelier/Food Critc', 'Catering Professional',
            'Hotel & Hospitality Professional(others)'],

        'IT & SOFTWARE ENGINEERING' => ['Software Developer/Programmer', 'Software Consultant', 'Hardware & Networking Professional',
            'Software Professional(others)'],

        'LEGAL' => ['Lawyer', 'Legal Assistant', 'Legal Professional(others)'],

        'MEDICAL & HEALTHCARE' => ['Dentist', 'Doctor', 'Medical Transcriptionist', 'Nurse', 'Pharmacist', 'Physical Assistant',
            'Physiotherapist/Occupational Therapist', 'Psycologist', 'Surgeon', 'Veterinary Doctor', 'Therapist(others)',
            'Medical/Health care Professional(others)'],

        'MERCHANT NAVY' => ['Merchant Naval Officer', 'Marines'],

        'SALES & MARKETING' => ['Marketing Professional', 'Sales Professional'],

        'SCIENCE' => ['Biologist/Botanist', 'Physicist', 'Science Professional(others)'],

        'CORPORATE PROFESSIONALS' => ['CXO/Chairman/Director/President', 'VP/AVP/GM/DGM', 'Sr. Manager/Manager',
            'Consultant/Supervisor/Team Leads', 'Team Member/Staff'],

        'OTHERS' => ['Agent/Broker/Trader/Contractor', 'Business Owner/Enterpreneur', 'Politician',
            'Social Worker/Vounteer/NGO', 'Sportsman', 'Travel & Transport Professional', 'Writer'],
    ];

    return $data;
}

function qualifications()
{
    $data = [
        'ENGINEERING' => ['B.E/B.Tech', 'M.E/M.Tech', 'M.S/Engineering', 'B.Eng(Hons)', 'M.Eng(Hons)', 'Engineering Diploma', 'AE', 'AET'],

        'ARTS/DESIGN' => ['B.A', 'M.Eed', 'BJMC', 'BFA', 'B.Arch', 'B.Des', 'BMM', 'MFA', 'M.Ed', 'M.A', 'MSW', 'MJMC', 'M.Arch',
            'M.Des', 'BA(Hons)', 'B.Arch(Hons)', 'DFA', 'D.Ed', 'D.Arch', 'AA', 'AFA'],

        'FINANCE/COMMER' => ['B.Com', 'CA/CPA', 'CFA', 'CS', 'BSc/BFin', 'M.Com', 'Msc/MFin/MS'],

        'COMPUTERS/IT' => ['BCA', 'B.IT', 'BCS', 'BA Computer Science', 'MCA', 'PGDCA', 'IT Diploma', 'ADIT'],

        'SCIENCE' => ['B.Sc', 'M.Sc', 'B.Sc(Hons)', 'Dip Sc', 'AS', 'PGDCA', 'IT Diploma', 'ADIT'],

        'MEDICINE' => ['MBBS', 'BPS', 'BPT', 'BAMS', 'BHMS', 'B.Pharma', 'BVSC', 'BSN/BScN', 'MDS', 'Mch', 'M.D', 'M.S Medicine',
            'MPT', 'DM', 'M.Pharma', 'MVSc', 'MMed', 'PGD Medcine', 'ADN'],

        'MANAGEMENT' => ['BBA', 'BHM', 'BBM', 'PGDM', 'ABA', 'ADBus'],

        'LAW' => ['BL/LLB', 'ML/LLM', 'LLB/(Hons)', 'ALA'],

        'DOCTORATE' => ['Ph.D', 'M.Phil'],

        'OTHERS' => ['Bachelor', 'Maaster', 'Diploma', 'Honours', 'Doctorate', 'Associate'],

        'NON-GRADUATE' => ['High School', 'Less than High School'],

    ];

    return $data;
}

// height = 134cm - 213cm | 4.5 - 7
// weight  = 40kg 200kg
function height()
{
    $data = [];

    $heightInfeet = 4.39633;

    for ($i = 134; $i < 214; $i++) {
        $data[$i] = substr((string) $heightInfeet, 0, 4);
        $heightInfeet += 0.0328084;
    }

    return $data;
}

function weight()
{
    $data = ['40 - 45', '46 - 50', '51 - 55', '56 - 60', '61 - 65', '66 - 70', '71 - 75',
        '76 - 80', '81 - 85', '86 - 90', '91 - 95', '96 - 100', '101 - 105', '106 - 110',
        '111 - 115', '116 - 120', '121 - 125', '126 - 130', '131 - 135', '136 - 140', '141 - 145',
        '146 - 150', '151 - 155', '156 - 160', '161 - 165', '166 - 170', '171 - 175', '176 - 180',
        '181 - 185', '186 - 190', '191 - 195', '196 - 200'];

    return $data;
}

function getCountries()
{
    $db = \Config\Database::connect();

    $db = db_connect();
    $query = $db->query('select id, name from countries');

    return $query->getResultArray();
}

function getStates($country_id)
{

    $db = \Config\Database::connect();

    $db = db_connect();
    $query = $db->query('select id, name from states where country_id=' . $country_id . '; ');
    $query = $query->getResultArray();
    $jsondata = json_encode($query);

    return $jsondata;
}

function getCities($stateid)
{

    $db = \Config\Database::connect();

    $db = db_connect();
    $query = $db->query('select id, name from cities where state_id=' . $stateid . '; ');
    $query = $query->getResultArray();
    $jsondata = json_encode($query);
    return $jsondata;
}


function get_mime_type($filename) {
    $idx = explode( '.', $filename );
    $count_explode = count($idx);
    $idx = strtolower($idx[$count_explode-1]);

    $mimet = array( 
        'txt' => 'text/plain',
        'htm' => 'text/html',
        'html' => 'text/html',
        'php' => 'text/html',
        'css' => 'text/css',
        'js' => 'application/javascript',
        'json' => 'application/json',
        'xml' => 'application/xml',
        'swf' => 'application/x-shockwave-flash',
        'flv' => 'video/x-flv',

        // images
        'png' => 'image/png',
        'jpe' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'jpg' => 'image/jpeg',
        'gif' => 'image/gif',
        'bmp' => 'image/bmp',
        'ico' => 'image/vnd.microsoft.icon',
        'tiff' => 'image/tiff',
        'tif' => 'image/tiff',
        'svg' => 'image/svg+xml',
        'svgz' => 'image/svg+xml',

        // archives
        'zip' => 'application/zip',
        'rar' => 'application/x-rar-compressed',
        'exe' => 'application/x-msdownload',
        'msi' => 'application/x-msdownload',
        'cab' => 'application/vnd.ms-cab-compressed',

        // audio/video
        'mp3' => 'audio/mpeg',
        'qt' => 'video/quicktime',
        'mov' => 'video/quicktime',

        // adobe
        'pdf' => 'application/pdf',
        'psd' => 'image/vnd.adobe.photoshop',
        'ai' => 'application/postscript',
        'eps' => 'application/postscript',
        'ps' => 'application/postscript',

        // ms office
        'doc' => 'application/msword',
        'rtf' => 'application/rtf',
        'xls' => 'application/vnd.ms-excel',
        'ppt' => 'application/vnd.ms-powerpoint',
        'docx' => 'application/msword',
        'xlsx' => 'application/vnd.ms-excel',
        'pptx' => 'application/vnd.ms-powerpoint',


        // open office
        'odt' => 'application/vnd.oasis.opendocument.text',
        'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
    );

    if (isset( $mimet[$idx] )) {
     return $mimet[$idx];
    } else {
     return 'application/octet-stream';
    }
 }
