<?php

require __DIR__.'/vendor/autoload.php';

use DiDemo\Mailer\SmtpMailer;

$dsn = 'sqlite:'.__DIR__.'/data/database.sqlite';
$pdo = new PDO($dsn);

$mailer = new SmtpMailer('server','user','password','port');

$friendHarvester = new \DiDemo\FriendHarvester( $pdo,$mailer);

$friendHarvester->emailFriends();