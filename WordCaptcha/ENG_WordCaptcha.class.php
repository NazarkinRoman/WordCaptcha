<?php

/* ===================================
 * Author: Nazarkin Roman
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

class WordCaptcha {
  public $session_name = 'captcha_pharse';
  public $limit = 100;
  private $numbers = array(1 => 'one', 2 => 'two', 3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six', 7 => 'seven', 8 => 'eight', 9 => 'nine');
  private $actions = array(0 => 'plus', 1 => 'minus', 2 => 'divided by', 3 => 'multiplied by');

  function __construct() {session_start();}

  public function gen_question() {
    while (1 > 0) {
      $data = $this->gen_number();
      if ( $data[3] > 0 and $data[3] < $this->limit and is_int($data[3]))
        break;
    }
    $pharse = $this->numbers[$data[0]] . ' ' . $this->actions[$data[1]] . ' ' . $this->numbers[$data[2]];

    $_SESSION[$this->session_name] = $data[3];
    return $pharse;
  }

  public function unset_session() {
    unset ($_SESSION[$this->session_name]);
  }

  public function validate($input) {
    if (isset($_SESSION[$this->session_name]) AND $_SESSION[$this->session_name] == $input)
      return true;
    else
      return false;
  }

  private function gen_number() {
    $first = array_rand($this->numbers);
    $second = array_rand($this->numbers);
    $action = array_rand($this->actions);

    if ($action == 0)
      $pharse_out = $first + $second;
    elseif ($action == 1)
      $pharse_out = $first - $second;
    elseif ($action == 2)
      $pharse_out = $first / $second;
    elseif ($action == 3)
      $pharse_out = $first * $second;

    return array($first, $action, $second, $pharse_out);
  }
}
?>