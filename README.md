# WordCaptcha PHP Class #

This PHP class is designed to combat spam. Just another spam-protection PHP script. **Do not use it in real projects since as of 2019 it is outdated!**

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

Этот PHP создан для борьбы со спамом на ваших сайтах/блогах. **Не используйте его в реальных проектах, так как по состоянию на 2019 год данный скрипт сильно устарел!**

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
