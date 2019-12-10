<?php
//redirect naar NO ACCESS pagina als de gebruiker niet ingelogd is en niet naar
//de loginpagina gaat
if ( ! isset($_SESSION['user']) AND ! $login_form AND ! $register_form AND ! $no_access)
{
    header("Location: /groepswerk1/no_access.php");
}
BasicHead();
?>

<main class="container">
    <div class="uploadform">
        <form id="uploadform" name="uploadform" method="post" action="lib/upload.php">    <!-- action nakijken ---------------------------------->
            <fieldset>
                <legend>Upload a new image!</legend>
                <ul>
                    <li>
                        <input type="file" id="chose-file" name="chose-file" tabindex="1" required>
                    </li>

                    <li>
                        <label for="file-caption">Caption:</label>
                        <input type="text" id="file-caption" name="file-caption" placeholder="Choose a catching caption!" tabindex="2" required>
                    </li>

                    <li>
                        <label for="file-desc">Description:</label>
                        <textarea id="file-desc" name="file-desc" placeholder="Tell a bit more about your captivating capture!" tabindex="3"></textarea>
                    </li>

                    <li>
                        <label for="file-main-cat">Main Category:</label>
                        <select id="file-main-cat" name="file-main-cat" placeholder="What is the picture's main category?" tabindex="4" required onchange="dropdownlist(this.options[this.selectedIndex].value);">
                            <option value="selectcat">Select Main Category</option>
                            <option value="catnat">Nature</option>
                            <option value="cathum">Human</option>
                            <option value="catobj">Inanimate objects</option>
                            <option value="cattech">Techniques</option>
                        </select>
                        <button onclick="showSecCat()">Add/remove a secondary category?</button>

                    </li>

                    <li id="addseccat">
                        <label for="file-sec-cat">Secondary Category:</label>
                        <script type="text/javascript" language="JavaScript">
                            document.write('<select name="secategory"><option value="">Select Secondary Category</option></select>')
                        </script>
                        <noscript>
                            <select name="secategory" id="secategory" >
                                <option value="">Select Secondary Category</option>
                            </select>
                        </noscript>
                    </li>
                </ul>


            </fieldset>
            <p>
                <input name="upload" type="submit" value="Upload">
                <input type="reset" value="Start over?" tabindex="13">
            </p>

        </form>
    </div>
    <?php
BasicFooter();