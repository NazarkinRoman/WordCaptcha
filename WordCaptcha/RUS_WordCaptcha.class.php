<?php

/* ===================================
* Автор: Назаркин Роман, Ваагн Мкртчян
* -----------------------------------
* Контакты:
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
  private $numbers = array(1 => 'один', 2 => 'два', 3 => 'три', 4 => 'четыре', 5 => 'пять', 6 => 'шесть', 7 => 'семь', 8 => 'восемь', 9 => 'девять');
  private $actions = array(0 => 'плюс', 1 => 'минус', 2 => 'разделить на', 3 => 'умножить на');
  private $replaces = array('о' => 'o', 'a' => 'а', 'p' => 'р', 'e' => 'е', 'с' => 'c');
  private $destroy_session = false; // Should session be destroyed after validation?

  function __construct($destroy = false) {
    $this->destroy_session = $destroy;
    session_start();
  }

  public function gen_question($obfuscate = true) {
    while (1 > 0) {
      $data = $this->gen_number();
      if ( $data[3] > 0 and $data[3] < $this->limit and is_int($data[3]))
        break;
    }
    if ($obfuscate)
      $pharse = $this->obfuscate($this->numbers[$data[0]]) . ' ' . $this->obfuscate($this->actions[$data[1]]) . ' ' . $this->obfuscate($this->numbers[$data[2]]);
    else
      $pharse = $this->numbers[$data[0]] . ' ' . $this->actions[$data[1]] . ' ' . $this->numbers[$data[2]];

    $_SESSION[$this->session_name] = $data[3];
    return $pharse;
  }

  public function unset_session() {
    if (isset($_SESSION[$this->session_name]))
      unset ($_SESSION[$this->session_name]);
  }

  public function validate($input) {
    if (isset($_SESSION[$this->session_name]) AND $_SESSION[$this->session_name] == $input) {
      if ($this->destroy_session) $this->unset_session();
      return true;
    } else {
      if ($this->destroy_session) $this->unset_session();
      return false;
    }
  }

  private function obfuscate($word) {
    $data = str_split($word);
    $word = '';
    for ( $i = 0; $i < sizeof($data); $i++ ) {
      if ( is_int( rand() / 2 ) and isset ($this->replaces[$data[$i]]))
        $word .= $this->replaces[$data[$i]];
      else
        $word .= $data[$i];
    }
    return $word;
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