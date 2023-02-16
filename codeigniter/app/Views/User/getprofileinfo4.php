<?=$this->extend("User/mainhead")?>

<?=$this->section("content")?>

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
                <?php

                    $validation = \Config\Services::validation();

                    if (isset($validation)) {

                        $validation->listErrors();
                    }

                    $session = \Config\Services::session();
                ?>

                <?=form_open_multipart('peinfo4/'.$session->get('user_id').'')?>

                    <h4 class="heading mb">Last one... Add your profile photo</h4>

                    <div id="preview" class="mb photo-set">
                        <!-- images will be drawn here -->
                    </div>

                    <div class="input-pic mb">
                        <label for="myfile">Select your photos, atleast one is compulsory</label>
                        <input type="file" id="files" name="myfile[]" multiple="multiple">
                        <span class="error"><?=display_error($validation, 'myfile')?></span>
                    </div>
                   
                  
  
               
                    <div class="submit">
                        <input type="submit" value="Finish">
                    </div>
                <?=form_close()?>

                <div class="otplink">

                    <a href="#">Go back </a>
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