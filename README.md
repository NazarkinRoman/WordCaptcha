# WordCaptcha PHP Class #

This PHP class is designed to combat spam. It is a new kind of protection your site / blog from spam attacks.

[English demo](http://demo.nazarkin.su/WordCaptcha/english.php) -
[Russian demo](http://demo.nazarkin.su/WordCaptcha/russian.php)

## Requirements ##

* PHP >= 4

## Usage ##

Generate captcha pharse:

```php
<?php
require_once ('WordCaptcha.class.php');
$captcha = new WordCaptcha();

echo($captcha->gen_question());
?>
```

Validating user input:

```php
<?php
require_once ('WordCaptcha.class.php');
$captcha = new WordCaptcha();

if ( $captcha->validate($_POST['user_answer']))
    echo ('Success!');
  else
    echo ('Error!');

  $captcha->unset_session();
?>
```

# PHP класс WordCaptcha (Russian) #

Этот PHP создан для борьбы со спамом на ваших сайтах/блогах. Он представляет собой новую ступень в технологиях защиты от спама.

[Демо на Английском](http://demo.nazarkin.su/WordCaptcha/english.php) -
[Демо на Русском](http://demo.nazarkin.su/WordCaptcha/russian.php)

## Требования ##

* PHP >= 4

## Использование ##

Генерация защитной фразы:

```php
<?php
require_once ('WordCaptcha.class.php');
$captcha = new WordCaptcha();

echo($captcha->gen_question(true));
?>
```

Проверка правильности введения ответа:

```php
<?php
require_once ('WordCaptcha.class.php');
$captcha = new WordCaptcha();

if ( $captcha->validate($_POST['user_answer']))
    echo ('Успешно!');
  else
    echo ('Ошибка!');

  $captcha->unset_session();
?>
```