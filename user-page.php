<?php
require_once "lib/autoload.php";

$sql = 'select user.user_id, user.user_voornaam, user.user_naam, user.user_email, user.user_username, user.user_date, user.user_join_date
            from user
            where user_id = 7;';                             //7 moet aangepast worden naar de user id die doorgegeven word------------------------------------------------------------------------------

$data = GetData($sql);

//steek de data in variabelen om ze makkelijker te kunnen oproepen
$user_voornaam = $data[0]['user_voornaam'];
$user_naam = $data[0]['user_naam'];
$user_email = $data[0]['user_email'];
$user_username = $data[0]['user_username'];
$user_date = $data[0]['user_date'];
$user_join_date = $data[0]['user_join_date'];
$user_voornaam = $data[0]['user_voornaam'];

$user_date_daymonth =  date("l d F", $user_date);
$user_date_full =  date("l d F Y", $user_date);
?>

<h1>Imagine with <?php echo $user_username ?></h1>
<p class="info">Member since: <?php echo date("d/m/Y", $user_join_date) ?></p>
<h2>More about <?php echo $user_username ?></h2>
<p class="naam"><span class="voornaam"><?php echo $user_voornaam ?></span> <?php echo $user_naam?></p>
<p class="bday_dayandmonth">Born: <?php echo $user_date_daymonth ?> </p>
<p class="bday_full">Born: <?php echo $user_date_full ?> </p>
<p class="email">Surprise them in their inbox!: <a href="mailto:<?php echo encodeEmail($user_email) ?>"><?php echo $user_email ?></a></p>


<?php
$sql = 'select afbeelding.afb_id, afbeelding.afb_naam, afbeelding.afb_date, afbeelding.afb_omschr, afbeelding.afb_bestand
            from afbeelding
            where afb_user_id = 7;';                             //7 moet aangepast worden naar de user id die doorgegeven word------------------------------------------------------------------------------
$data = GetData($sql);
$template = LoadTemplate('user-page-uploads');
print ReplaceContent($data, $template);
?>