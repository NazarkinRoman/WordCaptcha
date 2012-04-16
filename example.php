<?php

/* ===================================
* Author: Nazarkin Roman, Vahagn Mkrtchyan
* -----------------------------------
* Contacts:
* email - roman@nazarkin.su
* icq - 642971062
* skype - roman444ik
* -----------------------------------
* GitHub:
* https://github.com/NazarkinRoman
* ===================================
*/

require_once ('ENG_WordCaptcha.class.php');
$captcha = new WordCaptcha(true);

if ( $_SERVER["REQUEST_METHOD"] === 'POST' and isset ($captcha)) {
  if ( $captcha->validate($_POST['answer']))
    echo ('Success!');
  else
    echo ('Error!');
  // Session will be destroyed upon validation.
}
else {
  $question = ucfirst( $captcha->gen_question(true));
  $htmlform = <<<HTML
<form action="" method="POST">
  <p>{$question}:<br />
    <input type="text" name="answer" />
  </p>
  <p>
    <input type="submit" value="Submit!">
  </p>
</form>
HTML;
echo($htmlform);
}
?>