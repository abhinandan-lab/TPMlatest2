    <?php
$session = \Config\Services::session();
$request = \Config\Services::request();

// echo '<pre>';
// print_r($pics);
// echo get_images_with_path($pics);
// exit;
// echo $pics[0]['img_path'];

//  print_r(get_images_with_path($userinfo['pics'], false));

$mypics = get_images_with_path($userinfo['pics'], false);

var_dump($userinfo['about_me']);

?>

<?php display_flash_msg();?>
<div class="foot">

<div class="container">
    <div class="top">
        <img src="<?= get_images_with_path($userinfo['pics']) ?>" alt="profile pic">
    </div>

    <div class="nameinfo">
        <h2><?= ucfirst($userinfo['fname']) ?> &nbsp;<?= ucfirst($userinfo['lname']) ?> </h2>
        <p>Edit profile</p>
        <div class="mb2"></div>
    </div>

    <form>

        <div class="pictures">
            <p>Pictures</p>
            <div class="imglist">

                <?php foreach ($mypics as $key => $value): ?>
                    <div>
                        <img src="<?=$value['img']?>" id="<?=$value['id']?>">
                        <a href="#"> <i class="fa-solid fa-xmark"></i></a>
                    </div>
                <?php endforeach;?>
        
            </div>

            <div id="preview">

            </div>
            <div class="input">

                <label for="myfile">Choose pictures</label>
                <input type="file" id="files" accept="image/*" name="myfile" multiple>
            </div>
        </div>
    </form>

    <div class="aboutme">
        <div>
            <label>About me / Spiritual life</label>
            <textarea name="aboutme" rows="5" > <?= $userinfo['about_me'] ?> </textarea>

        </div>
    </div>

    <form action="">
    <div class="aboutme">
        <div>
            <label>Personal Information</label>

            <div class="det-info-inp mb">
                <label for="">First Name</label>
                <input type="text" value="abcd phalana " placeholder="your name">
                <span>sdfa</span>
            </div>

            <div class="det-info-inp mb">
                <label for="">Last Name</label>
                <input type="text" value="abcd phalana " placeholder="your name">
                <span>sdfa</span>
            </div>

            <div class="det-info-inp mb">
                <label for="">Highest Qualification</label>
                <input type="text" value="abcd phalana " placeholder="your name">
                <span>sdfa</span>
            </div>

            <div class="det-info-inp mb">
                <label for="">Your Height</label>
                <input type="text" value="abcd phalana " placeholder="your name">
                <span>sdfa</span>
            </div>

            <div class="det-info-inp mb">
                <label for="">Your Weight</label>
                <input type="text" value="abcd phalana " placeholder="your name">
                <span>sdfa</span>
            </div>

            <div class="det-info-inp mb">
                <label for="">Your Country</label>
                <input type="text" value="abcd phalana " placeholder="your name">
                <span>sdfa</span>
            </div>

            <div class="det-info-inp mb">
                <label for="">Your State</label>
                <input type="text" value="abcd phalana " placeholder="your name">
                <span>sdfa</span>
            </div>

            <div class="det-info-inp mb">
                <label for="">Your City</label>
                <input type="text" value="abcd phalana " placeholder="your name">
                <span>sdfa</span>
            </div>

            <div class="det-info-inp mb">
                <label for="">Your Occupation</label>
                <input type="text" value="abcd phalana " placeholder="your name">
                <span>sdfa</span>
            </div>

            <div class="det-info-inp mb">
                <label for="">Your Hobbies</label>
                <input type="text" value="abcd phalana " placeholder="your name">
                <span>sdfa</span>
            </div>

            <div class="det-info-inp mb">
                <label for="">You Baptized</label>
                <input type="text" value="abcd phalana " placeholder="your name">
                <span>sdfa</span>
            </div>

            <div class="det-info-inp mb">
                <label for="">Your name</label>
                <input type="text" value="abcd phalana " placeholder="your name">
                <span>sdfa</span>
            </div>

            <div class="det-info-inp mb">
                <label for="">Your name</label>
                <input type="text" value="abcd phalana " placeholder="your name">
                <span>sdfa</span>
            </div>

            <div class="det-info-inp mb">
                <label for="">Your name</label>
                <input type="text" value="abcd phalana " placeholder="your name">
                <span>sdfa</span>
            </div>

            <div class="det-info-inp mb">
                <label for="">Your name</label>
                <input type="text" value="abcd phalana " placeholder="your name">
                <span>sdfa</span>
            </div>

            <div class="det-info-inp mb">
                <label for="">Your name</label>
                <input type="text" value="abcd phalana " placeholder="your name">
                <span>sdfa</span>
            </div>
        </div>
    </div>

    <div class="aboutme">
        <div>
            <label>Contact Details</label>

            <div class="det-info-inp mb">
                <label for="">Your name</label>
                <input type="text" value="abcd phalana " placeholder="your name">
                <span>sdfa</span>
            </div>

            <div class="det-info-inp mb">
                <label for="">Your name</label>
                <input type="text" value="abcd phalana " placeholder="your name">
                <span>sdfa</span>
            </div>

            <div class="det-info-inp submit mb">
               <input type="submit" value="Save" >
            </div>

        </div>
    </div>
</form>


</div>




</div>
</section>



<script>

const preview = (file) => {
const fr = new FileReader();
fr.onload = () => {
    const img = document.createElement("img");
    img.src = fr.result;  // String Base64
    img.alt = file.name;
    document.querySelector('#preview').append(img);
};
fr.readAsDataURL(file);
};

document.querySelector("#files").addEventListener("change", (ev) => {
if (!ev.target.files) return; // Do nothing.
[...ev.target.files].forEach(preview);
});

</script>



</body>

</html>