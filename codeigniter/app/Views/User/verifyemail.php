<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="<?=base_url();?>/public/asset/css/main.css">
</head>

<body>

<?php display_flash_msg(); ?>

    <!-- ======= header ========== -->
    <div class="container header ">
        <h1> <a href="<?=base_url();?>" class="logo">Hello</a></h1>
        <nav class="">
            <ul>
                <li><a href="#" class="active">Login</a></li>
            </ul>
        </nav>
    </div>

        <!-- ========== hero section ============== -->
        <section class="container hero ">
            <div class="left b">
                <!-- verse -->
                <h2>One page Bootstrap website Template</h2>
                <h6>One page Bootst</h2>
                <button class="readmore">Read More</button>
            </div>

            <div class="hero-form ">
                <!-- register form -->


                 <?= form_open('verifyemail') ?>
                    <?php
                        $validation = \Config\Services::validation();
                        if (isset($validation)) {

                            $validation->listErrors();
                        }
                ?>

                    <h4 class="heading mb">Verify your email</h4>

                    <div class="mb2">
                    </div>
                    <div class="input mb">
                        <h6>We have sent you an OTP on your email on <?= $data['email'] ?></h6>
                    </div>

                    <div class="input ">
                        <label for="cars">Enter OTP here</label>
                        <input type="text" name="otpvalue" placeholder="" value="">
                        <span class="error"> <?= display_error($validation, 'otpvalue') ?> </span>
                    </div>

                    <div class="otpflex mb">
                        <a href="<?= base_url() ?>/editemail/<?= $data['userid'] ?>" class="editemail">Edit email</a>
                        <a href="<?= base_url() ?>/sendotpagain/<?= $data['userid'] ?>" class="notrecieved">didn't recieved, send again</a>
                    </div>

                   
                    <div class="submit">
                        <input type="submit" value="Login">
                    </div>
                <?= form_open() ?>


                <div class="otplink">

                    <a href="#">or new Register </a>
                </div>
                

            </div>
        </section>

    </body>
</html>
