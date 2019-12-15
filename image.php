<?php
require_once "lib/autoload.php";
BasicHead();
HomePage2();

$afb_id = $_GET[id];

//haal de nodige data van de database
$sql = "select afb_naam, afb_user_id, afb_date, afb_omschr, afb_bestand, user_username, tag_omschr
from afbeelding
inner join user on afbeelding.afb_user_id = user.user_id
inner join afb_tag on afbeelding.afb_id = afb_tag.afb_tag_afb_id
inner join tag on afb_tag.afb_tag_tag_id = tag.tag_id
where afb_id = '$afb_id'";

$data = GetData($sql);

//steek de data in variabelen om ze makkelijker te kunnen oproepen
$afb_naam = $data[0]['afb_naam'];
$afb_user_id = $data[0]['afb_user_id'];
$afb_date = $data[0]['afb_date'];
$afb_omschr = $data[0]['afb_omschr'];
$afb_bestand = $data[0]['afb_bestand'];
$user_username =  $data[0]['user_username'];
$tag_omschr =  $data[0]['tag_omschr'];

//cats
$cat = '<p><a href="category/' . strtolower($tag_omschr) . '" title="category is ' . $tag_omschr . '">#' . $tag_omschr . '</a></p>';
if (count($data) > 1) {
    $tag_omschr1 = $data[0]['tag_omschr'];
    $tag_omschr2 = $data[1]['tag_omschr'];
    $cat = '<p><a href="category/' . strtolower($tag_omschr1) . '" title="category is ' . $tag_omschr1 . '">#' . $tag_omschr1 . '</a>
                        <a href="category/' . strtolower($tag_omschr2) . '" title="category is ' . $tag_omschr2 . '">#' . $tag_omschr2 . '</a></p>';
}

?>

    <input type="button" value="Back" onClick="javascript:history.back(-1);">  <!-- moet nog een pijltje voor  -------------------------------------------------------------------------------------------->
    <img src="images/<?php echo $afb_bestand ?>" alt="image with caption: <?php echo $afb_naam ?>">

    <h1><?php echo $afb_naam ?></h1>
    <p class="info">Uploaded by: <a href="user/<?php echo $user_username ?>/" title="link to userpage of <?php echo $user_username ?>" ><?php echo $user_username ?></a></p>
    <p class="info">Upload date: <?php echo date("d/m/Y", $afb_date) ?></p>
<?php echo afbOmschrExplode($afb_omschr) ?>
<?php echo $cat ?>


    <form method="post" action="image.php"><input type="button" value="&#xf004 Like" class="far fa-heart" name="likebutton"></p></form>
    <form method="post" action="collection.php"><p><input type="button" value="&#xf65e Add to collection" class="fas fa-folder-plus" name="collectionbutton"></p></form>
    <p><input type="button" href="images/<?php echo $afb_bestand ?>" value="&#xf019 Download" class="fas fa-download" download></p>


<?php BasicFooter();