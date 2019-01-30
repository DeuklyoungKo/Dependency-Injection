<?php

require __DIR__.'/vendor/autoload.php';

use \Pimple\Container;

/* START BUILDING CONTAINER */
$container = new Container();

require __DIR__.'/app/config.php';
require __DIR__.'/app/services.php';

//$dsn = 'sqlite:'.__DIR__.'/data/database.sqlite';
//$pdo = new PDO($dsn);
/* END CONTAINER BUILDING */
//$mailer = new SmtpMailer('server','user','password','port');
//$friendHarvester = new \DiDemo\FriendHarvester( $pdo,$container['mailer']);
/** @var \DiDemo\FriendHarvester $friendHarvester */
$friendHarvester = $container['friend_harvester'];

$friendHarvester->emailFriends();


