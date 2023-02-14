<?=$this->extend("User/userSettinghead")?>

<?=$this->section("content")?>


    <?php
        $session = \Config\Services::session();
        $request = \Config\Services::request();

        
        // echo '<pre>';
        // print_r($pics);
        // echo get_images_with_path($pics);
        // exit;
        // echo $pics[0]['img_path'];

    ?>

<?php display_flash_msg(); ?>
<div class="foot">

<div class="container">
    <div class="top">
        <img src="/images/download.jpeg" alt="">
    </div>

    <div class="nameinfo">
        <h2>Ranjan kumari </h2>
        <p>Edit profile</p>
        <div class="mb2"></div>
    </div>

    <form>

        <div class="pictures">
            <p>Pictures</p>
            <div class="imglist">
                <div>
                    <img src="/images/download.jpeg">
                    <a href="#"> <i class="fa-solid fa-xmark"></i></a>
                </div>

                <div>
                    <img src="/images/download.jpeg">
                    <a href="#"> <i class="fa-solid fa-xmark"></i></a>
                </div>

                <div>
                    <img src="/images/download.jpeg">
                    <a href="#"> <i class="fa-solid fa-xmark"></i></a>
                </div>

                <div>
                    <img src="/images/download.jpeg">
                    <a href="#"> <i class="fa-solid fa-xmark"></i></a>
                </div>

                <div>
                    <img src="/images/download.jpeg">
                    <a href="#"> <i class="fa-solid fa-xmark"></i></a>
                </div>

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
            <textarea name=""
                rows="5">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed officiis reiciendis quae libero repellat eum!</textarea>

        </div>
    </div>

    <form action="">
    <div class="aboutme">
        <div>
            <label>Personal Information</label>

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
<?=$this->endSection()?>