<?php
require_once "lib/autoload.php";

//redirect naar NO ACCESS pagina als de gebruiker niet ingelogd is en niet naar
//de loginpagina gaat
if ( ! isset($_SESSION['user']) AND ! $login_form AND ! $register_form AND ! $no_access)
{
    header("Location: /groepswerk1/no_access.php");
}
require_once "lib/upload.php";
BasicHead();
HomePage2();
?>

<main class="container">
    <div class="uploadform">
        <form id="uploadform" name="uploadform" method="post" action="upload.php" enctype="multipart/form-data">    <!-- action nakijken ---------------------------------->
            <fieldset>
                <legend>Upload a new image!</legend>
                <ul>
                    <li>
                        <input type="file" id="bestand" name="bestand" tabindex="1">
                        <p class="errors"> <?php echo $errors['bestand_afb']; ?></p></li>
                    </li>

                    <li>
                        <label for="afb_naam">Caption:</label>
                        <input type="text" id="afb_naam" name="afb_naam" placeholder="Choose a catching caption!" tabindex="2" value="<?php echo htmlspecialchars($afb_naam) ?>">
                        <p class="errors"> <?php echo $errors['afb_naam']; ?></p>
                    </li>

                    <li>
                        <label for="afb_omschr">Description:</label>
                        <textarea id="afb_omschr" name="afb_omschr" placeholder="Tell a bit more about your captivating capture!" tabindex="3" value="<?php echo htmlspecialchars($afb_omschr) ?>"></textarea>
                        <p class="errors"> <?php echo $errors['afb_omschr']; ?></p>
                    </li>

                    <li>
                        <label for="afb_main_cat">Main Category:</label>
                        <select id="afb_main_cat" name="afb_main_cat"  tabindex="4" onchange="dropdownlist(this.options[this.selectedIndex].value);">
                            <option value="selectcat" disabled selected>Select Main Category</option>
                            <option value="catnat">Nature</option>
                            <option value="cathum">Human</option>
                            <option value="catobj">Objects</option>
                            <option value="cattech">Techniques</option>
                        </select>
                        <p class="errors"> <?php echo $errors['afb_main_cat']; ?></p>
                        <button name="second_cat" type="button" tabindex="5" onclick="showSecCat()">Add/remove a secondary category?</button>
                    </li>

                    <li id="addseccat">
                        <label for="afb_sec_cat">Secondary Category:</label>
                        <script type="text/javascript" language="JavaScript">
                            document.write('<select name="afb_sec_cat"><option value="" disabled selected>Select Secondary Category</option></select>')
                        </script>
                        <noscript>
                            <select name="afb_sec_cat" id="afb_sec_cat" >
                                <option value="" disabled selected>Select Secondary Category</option>
                            </select>
                        </noscript>
                    </li>
                </ul>
            </fieldset>

            <p>
                <input name="upload" type="submit" value="Upload" tabindex="7">
                <input type="reset" value="Start over?" tabindex="8">
            </p>

        </form>
    </div>
    <?php
BasicFooter();