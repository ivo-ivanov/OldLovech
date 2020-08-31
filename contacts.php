<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="bg-BG">
<head>
<title>Къща за гости - Старият Ловеч | Резервации</title>
<!-- Meta Tags -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<!-- Stylesheets -->
<link rel="stylesheet" href="style.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="js/zoombox/zoombox.css" type="text/css" media="screen"/>
<!-- JS Scripts -->
<script type='text/javascript' src='js/jquery.js?ver=1.4.4'></script>
<script type="text/javascript" src="js/scripts.js"></script>
<script type="text/javascript">
            jQuery(document).ready(function() {
                ddSliderSetUp();
            });
            jQuery(window).load(function() {
                ddSliderSetUp();
                ddSlider();
 dropDown();
            });
        </script>
</head>
<body class="page contacts">
<div id="header-top">
	<div class="wrapper">
		<span style="float: left;">Къща за гости <b>Старият Ловеч</b></span>
		<ul class="top_social">
			<li><a href="http://www.facebook.com/OldLovech" id="facebook">Facebook</a></li>
		</ul>
	</div>
</div>
<div id="header">
	<div class="wrapper">
		<div id="logo">
			<a href="index.php"><img src="img/logo.png" alt="Къща за гости Старият Ловеч"/></a>
		</div>
		<ul id="nav" class="menu">
			<li><a href="index.php" id="current">За Къщата</a></li>
			<li><a href="gallery.php">Галерия</a></li>
			<li><a href="prices.php">Цени</a></li>
			<li><a href="lovech.php">За Ловеч</a></li>
			<li><a href="landmarks.php">Забележителности</a></li>
			<li><a href="contacts.php">Резервации</a></li>
		</ul>
	</div>
</div>
<div id="banner">
	<div class="wrapper">
		<div id="banner-content">
			<h1>Резервации и контакти</h1>
		</div>
	</div>
</div>
<div id="content">
	<div class="wrapper">
		<div class="full">

			 <div id="contact">

<?
		// Внимание! Please read the following.
		// It is important you do not edit pieces of code that aren't tagged as a configurable options identified by the following:

        // Configuration option.

		// Each option that is easily editable has a modified example given.


		$error    = '';
        $name     = '';
        $email    = '';
        $phone    = '';
        $subject  = '';
        $comments = '';
        $verify   = '';

        if(isset($_POST['contactus'])) {

		$name     = $_POST['name'];
        $email    = $_POST['email'];
        $phone   = $_POST['phone'];
        $subject  = $_POST['subject'];
        $comments = $_POST['comments'];
        $verify   = $_POST['verify'];


        // Configuration option.
		// You may change the error messages below.
		// e.g. $error = 'Внимание! This is a customised error message!';

        if(trim($name) == '') {
        	$error = '<div class="error_message">Внимание! Не сте въвели името си.</div>';
        } else if(trim($email) == '') {
        	$error = '<div class="error_message">Внимание! Моля, въведете коректен e-mail.</div>';

       // Configuration option.
	   } else if(!is_numeric($phone)) {
         $error = '<div class="error_message">Внимание! Моля, въведете коректен тел. номер</div>';

        } else if(!isEmail($email)) {
        	$error = '<div class="error_message">Внимание! Моля, въведете коректен e-mail.</div>';
        }

        if(trim($subject) == '') {
        	$error = '<div class="error_message">Внимание! Please enter a subject.</div>';
        } else if(trim($comments) == '') {
        	$error = '<div class="error_message">Внимание! Моля, оставете съобщение.</div>';
        } else if(trim($verify) == '') {
	    	$error = '<div class="error_message">Внимание! Моля, въведете спам защита.</div>';
	    } else if(trim($verify) != '4') {
	    	$error = '<div class="error_message">Спам защита! Колко е 3+1?.</div>';
	    }

        if($error == '') {

			if(get_magic_quotes_gpc()) {
            	$comments = stripslashes($comments);
            }


         // Configuration option.
		 // Enter the email address that you want to emails to be sent to.
		 // Example $address = "joe.doe@yourdomain.com";

         $address = "dmtrlalev@gmail.com";


         // Configuration option.
         // i.e. The standard subject will appear as, "You've been contacted by John Doe."

         // Example, $e_subject = '$name . ' has contacted you via Your Website.';

         $e_subject = 'OldLovech.com - ' . $name . '.';


         // Configuration option.
		 // You can change this if you feel that you need to.
		 // Developers, you may wish to add more fields to the form, in which case you must be sure to add them here.

		 $e_body = "С вас се свърза $name относно $subject.\r\n\n";
		 $e_content = "\"$comments\"\r\n\n";

		 // Configuration option.
       	 // RIf you active phone number, swap the tags of $e-reply below to include phone number.
			 $e_reply = "Име: $name email: $email | тел. $phone";

         $msg = $e_body . $e_content . $e_reply;

         mail($address, $e_subject, $msg, "From: $email\r\nReply-To: $email\r\nReturn-Path: $email\r\n");


		 // Email has sent successfully, echo a success page.

		 echo "<div id='succsess_page'>";
		 echo "<p>Благодарим Ви <strong>$name</strong>, Вашето съобщение бе изпратено успешно.</p>";
		 echo "</div>";

		}
	}

         if(!isset($_POST['contactus']) || $error != '') // Do not edit.
         {
?>

            <? echo $error; ?>

            <fieldset>

            <legend>Форма за контакт</legend>

            <form  method="post" action="">

			<label for=name accesskey=U><span class="required">*</span> Вашето име</label>
            <input name="name" type="text" id="name" size="30" value="<?=$name;?>" />

			<br />
            <label for=email accesskey=E><span class="required">*</span> Email</label>
            <input name="email" type="text" id="email" size="30" value="<?=$email;?>" />

			<br />
            <label for=phone accesskey=P><span class="required">*</span> Телефон</label>
            <input name="phone" type="text" id="phone" size="30" value="<?=$phone;?>" />

			<br />
            <label for=subject accesskey=S><span class="required">*</span> Относно</label>
            <select name="subject" type="text" id="subject">
              <option value="Резервация">Резервация</option>
              <option value="Въпрос">Въпрос</option>
            </select>

			<br />
            <label for=comments accesskey=C><span class="required">*</span> Съобщение</label>
            <textarea name="comments" cols="30" rows="9"  id="comments"><?=$comments;?></textarea>

            <hr />

            <p><span class="required">*</span> Спам защита</p>

            <label for=verify accesskey=V>&nbsp;&nbsp;&nbsp;3 + 1 =</label>
			<input name="verify" type="text" id="verify" size="1" value="<?=$verify;?>" /><br /><br />

            <input name="contactus" type="submit" class="submit" id="contactus" value="Изпрати" />

            </form>

            </fieldset>

<? }

function isEmail($email) { // Email address verification, do not edit.
return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i",$email));
}

?>


     </div>
     <div id="adress">
     <h2 style="color:#D35300;">За Контакти</h2>
	гр. Ловеч<br/>
	кв. Вароша<br/>
	ул. "Феликс Каниц" 2<br/><br/>
	e-mail: dmtrlalev{at}gmail.com<br/><br/>
	тел. 0885 875689<br/>
	тел. 0887 357595<br>
    <p><br>&nbsp;<br></p>

<div id="TA_virtualsticker686" class="TA_virtualsticker">
    <ul id="7JASsd4hcls" class="TA_links DJETzesuP">
        <li id="HAhGLgCOD" class="OKI1ebm">
            <a target="_blank" href="http://www.tripadvisor.co.uk/"><img src="http://www.tripadvisor.co.uk/img/cdsi/img2/branding/tripadvisor_sticker_logo_88x55-18961-2.png" alt="TripAdvisor"/></a>
        </li>
    </ul>
</div>

<script src="http://www.jscache.com/wejs?wtype=virtualsticker&amp;uniq=686&amp;lang=en_UK&amp;locationId=2216264&amp;display_version=2"></script>


<div id="TA_excellent687" class="TA_excellent">
<ul id="FlYjBU7TOv" class="TA_links UMtMyvHdb">
<li id="bH2NB0" class="pWQlr7jiqQrl">
<a target="_blank" href="http://www.tripadvisor.co.uk/"><img src="http://e2.tacdn.com/img2/widget/tripadvisor_logo_115x18.gif" alt="TripAdvisor" class="widEXCIMG" id="CDSWIDEXCLOGO"/></a>
</li>
</ul>
</div>
<script src="http://www.jscache.com/wejs?wtype=excellent&amp;uniq=687&amp;locationId=2216264&amp;lang=en_UK&amp;display_version=2"></script>
<style>#CDSWIDEXC {margin-left:0!important;}</style>
    </div>




         <div id="map"><iframe width="870" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.bg/maps?f=q&amp;source=s_q&amp;hl=bg&amp;geocode=&amp;q=43.129491,+24.716792&amp;aq=&amp;sll=43.129341,24.717558&amp;sspn=0.006953,0.015374&amp;ie=UTF8&amp;ll=43.129694,24.71632&amp;spn=0.005481,0.018668&amp;z=16&amp;output=embed"></iframe><br /><small><a href="http://maps.google.bg/maps?f=q&amp;source=embed&amp;hl=bg&amp;geocode=&amp;q=43.129491,+24.716792&amp;aq=&amp;sll=43.129341,24.717558&amp;sspn=0.006953,0.015374&amp;ie=UTF8&amp;ll=43.129694,24.71632&amp;spn=0.005481,0.018668&amp;z=16" style="color:#0000FF;text-align:left">Вижте по-голяма карта</a></small>
		</div>

		</div>


	</div>
</div>
<div id="small_footer">
	<div class="wrapper">
		<span style="float: left;">&#169; Старият Ловеч <?php echo date("Y") ?>
		. Всички права запазени.</span>
		<span style="float: right;"><a href="http://www.ivoivanov.net">уеб дизайн</a> от Иво Иванов</span>
	</div>
</div>
</body>
</html>