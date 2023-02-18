<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$pageData['title']?> </title>


    <!-- font awe some -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
    integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- jquery latest -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <!-- jquery ui stuffs -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <!-- select 2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- my style -->
    <link rel="stylesheet" href="<?=base_url();?>/asset/css/setting.css">

    <style>
        * {
            box-sizing: border-box;
        }

        button {
            display: block;
            margin: 8px;
            padding: 5px 10px;
            border: 0em;
            border-radius: 3px;
        }

        button.s {
            background: #01B940;
            color: white;
        }

        button.w {
            background: #ffc400;
            color: #836400;
        }

        button.d {
            background: #F91E00;
            color: white;
        }

        button.cstm1 {
            background: #4f70ff;
            color: white;
        }

        button.cstm2 {
            background: #ff66b3;
            color: white;
        }

        button.cstm3 {
            background: linear-gradient(60deg, #3866ff, #38c0ff);
            color: white;
        }

        button.cstm4 {
            background: linear-gradient(60deg, #ff2c2c, #ff9564);
            color: white;
        }

        button.cstm5 {
            background: linear-gradient(60deg, #00ad34, #0ee4c7);
            color: white;
        }

        #Noti_container {
            width: 200px;
            position: fixed;
            top: 0;
            right: 0;
            z-index: 9999999999999999999999999999999999999999;
            margin: 10px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 13px;
            font-weight: 500;
        }

        #Noti_container ion-icon {
            font-size: large;
        }

        .Noti_success {
            padding: 10px 10px;
            background: #01B940;
            color: white;
            width: 100%;
            margin: 6px 0px;
            border-radius: 3px;

        }

        .Noti_warning {
            padding: 10px 10px;
            background: #ffc400;
            color: #836400;
            width: 100%;
            margin: 6px 0px;
            border-radius: 3px;
        }

        .Noti_danger {
            padding: 10px 10px;
            background: #F91E00;
            color: #ffffff;
            width: 100%;
            margin: 6px 0px;
            border-radius: 3px;
        }

        @keyframes Noti_animation {
            0% {
                transform: scale(0.5);
            }

            50% {
                transform: scale(1.07);
            }

            100% {
                transform: scale(1);
            }
        }

        @-webkit-keyframes Noti_animation {
            0% {
                transform: scale(0.5);
            }

            50% {
                transform: scale(1.07);
            }

            100% {
                transform: scale(1);
            }
        }

        .timer_progress {
            height: 2px;
            background-color: rgba(255, 245, 245, 0.7);
            position: absolute;
            margin-top: -8px;
        }

        @keyframes timer_progress_animation {
            from {
                width: 100%;
            }

            to {
                width: 0%;
                transform: rotate(0deg);
            }
        }

        @-webkit-keyframes timer_progress_animation {
            from {
                width: 100%;
            }

            to {
                width: 0%;
                transform: rotate(0deg);
            }
        }
</style>
</head>

<body>

<script>
        $(function () {
            if(document.querySelector('#slider-range-age') == null){
                return;
            }
            $("#slider-range-age").slider({
                range: true,
                min: 18,
                max: 70,
                values: [18, 70],
                slide: function (event, ui) {
                    $(".ageinfo:first-child").html(ui.values[0] + " - " + ui.values[1]);

                    $('#min-age-val').val($('#slider-range-age').slider("values")[0]);
                    $('#max-age-val').val($('#slider-range-age').slider("values")[1]);
                }
            });
            $('.ageinfo:first-child').html($('#slider-range-age').slider("values")[0] + " - " + $('#slider-range-age').slider("values")[1]);
        });


        // age
        $(function () {
            if(document.querySelector('#slider-range-age')== null) {
                return;
            }
            $("#slider-range-height").slider({
                range: true,
                min: 10,
                max: 50,
                values: [15, 45],
                slide: function (event, ui) {
                    $(".heightinfo:first-child").html(ui.values[0] + "cm - " + ui.values[1] + "cm");

                    $('#min-height-val').val($('#slider-range-height').slider("values")[0]);
                    $('#max-eight-val').val($('#slider-range-height').slider("values")[1]);
                }
            });
            $('.heightinfo:first-child').html($('#slider-range-height').slider("values")[0] + "cm - " + $('#slider-range-height').slider("values")[1] + "cm");
        });
    </script>

<script>
    function Noti({ content, status, animation = true, timer = 4000, progress = true, bgcolor, icon = 'show' }) {
            if (timer > 10000) {
                timer = 4000;
            }
            var status = status;
            var Noti_container = document.createElement('div');
            var Noti_alert = document.createElement('div');
            var timer_progress = document.createElement('div');
            Noti_container.setAttribute('id', 'Noti_container');
            document.body.appendChild(Noti_container);
            document.getElementById('Noti_container').appendChild(Noti_alert);
            timer_progress.setAttribute('class', 'timer_progress');
            if (progress != false) {
                document.querySelector('#Noti_container').appendChild(timer_progress);
            }
            if (animation == true) {
                Noti_alert.style = `
                -webkit-animation: 1s Noti_animation;
            animation: 1s Noti_animation;
            display: flex;
            flex-direction: row-reverse;
            align-items: center;
            justify-content: space-between;
            cursor: pointer;
            background: ${bgcolor}
            `;
            } else {
                Noti_alert.style = `
            display: flex;
            flex-direction: row-reverse;
            align-items: center;
            justify-content: space-between;
            cursor: pointer;
            background: ${bgcolor}
            `;
            }
            Noti_alert.addEventListener('click', function () {
                this.remove();
                timer_progress.remove();
            });
            const noti_destroy = function () {
                document.getElementById('Noti_container').removeChild(Noti_alert);
                timer_progress.remove();
            }
            var timeout = setTimeout(() => {
                noti_destroy();
            }, timer);
            Noti_alert.onmouseover = function () {
                clearTimeout(timeout);
                timer_progress.style.animationPlayState = 'paused';
                this.onmouseleave = function () {
                    setTimeout(noti_destroy, timer);
                    timer_progress.style.animationPlayState = 'running';
                }
            };
            switch (status) {
                case 'success':
                    Noti_alert.setAttribute('class', 'Noti_success');
                    icon == 'show' || icon == '' ?
                        Noti_alert.innerHTML = "<ion-icon name='checkmark-circle'></ion-icon>" + "<span>" + content + "</span>"
                        :
                        Noti_alert.innerHTML = content;
                    break;
                case 'warning':
                    Noti_alert.setAttribute('class', 'Noti_warning');
                    icon == 'show' || icon == '' ?
                        Noti_alert.innerHTML = "<ion-icon name='warning'></ion-icon>" + "<span>" + content + "</span>"
                        :
                        Noti_alert.innerHTML = content;
                    break;
                case 'danger':
                    Noti_alert.setAttribute('class', 'Noti_danger');
                    icon == 'show' || icon == '' ?
                        Noti_alert.innerHTML = "<ion-icon name='close-circle'></ion-icon>" + "<span>" + content + "</span>"
                        :
                        Noti_alert.innerHTML = content;
                    break;
                default:
                    Noti_alert.setAttribute('class', 'Noti_success');
                    Noti_alert.innerHTML = "<ion-icon name='checkmark-circle'></ion-icon>" + "<span>" + content + "</span>";
                    break;
            }
            var new_timer_mode = '';
            switch (timer) {
                case 1000:
                    new_timer_mode = '1s';
                    break;
                case 2000:
                    new_timer_mode = '2s';
                    break;
                case 3000:
                    new_timer_mode = '3s';
                    break;
                case 4000:
                    new_timer_mode = '4s';
                    break;
                case 5000:
                    new_timer_mode = '5s';
                    break;
                case 6000:
                    new_timer_mode = '6s';
                    break;
                case 7000:
                    new_timer_mode = '7s';
                    break;
                case 8000:
                    new_timer_mode = '8s';
                    break;
                case 9000:
                    new_timer_mode = '9s';
                    break;
                case 10000:
                    new_timer_mode = '10s';
                    break;
                default:
                    new_timer_mode = '4s';
            }
            timer_progress.style.animation = `${new_timer_mode} timer_progress_animation`;
            timer_progress.style.webkitAnimation = `${new_timer_mode} timer_progress_animation`;
        }

</script>

    <!-- ======= header ========== -->

    <!-- starting fornt end from now  -->



    <section class="profile">

        <div class="head">


        <?php

$request = \Config\Services::request();
$path = $request->getPath();

$temparr = explode("/",$path);
// print_r($temparr);

?>
            <div class="primary-nav">
                <a href="/premiums" class=" <?php if(in_array("premiums", $temparr)) {echo 'active';}?> ">
                    <i class="fa-solid fa-house"></i>
                    <p>Premium</p>
                </a>
                <a href="/profiles" class=" <?php if($path == 'profiles') {echo 'active';}?> ">
                    <i class="fa-solid fa-user-group"></i>
                    <p>Matches</p>
                </a>

                <a href="/inbox" class=" <?php if($path == 'inbox') {echo 'active';}?> ">
                    <i class="fa-solid fa-envelope"></i>
                    <p>Inbox</p>
                </a>

                <a href="/home" class=" <?php if(in_array("home", $temparr)) {echo 'active';}?> ">
                    <i class="fa-solid fa-house"></i>
                    <p>Home</p>
                </a>
            </div>
            <div class="secondary-nav">
                <ul>
                    <li class=" <?php if($path == 'home') {echo 'active';}?>">
                        <a href="/home">Settings</a>
                    </li>

                    <li class=" <?php if(in_array("edit-profile", $temparr)) {echo 'active';}?>">
                        <a href="/home/edit-profile">Edit Profile</a>
                    </li>

                    <li class=" <?php if(in_array("partner-preference", $temparr)) {echo 'active';}?>">
                        <a href="/home/partner-preference">Partner Preference</a>
                    </li>
   

                </ul>

            </div>
        </div>
