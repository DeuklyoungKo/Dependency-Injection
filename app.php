<?php

require __DIR__.'/vendor/autoload.php';

use DiDemo\Mailer\SmtpMailer;
use \Pimple\Container;
use \DiDemo\FriendHarvester;

/* START BUILDING CONTAINER */
$container = new Container();

$container['database.dsn'] =  'sqlite:'.__DIR__.'/data/database.sqlite';
$container['smpt.server'] = 'server';
$container['smpt.user'] = 'user';
$container['smpt.password'] = 'password';
$container['smpt.port'] = 'port';

$container['mailer'] = function (Container $container) {
    return new SmtpMailer(
        $container['smpt.server'],
        $container['smpt.user'],
        $container['smpt.password'],
        $container['smpt.port']
    );
};

$container['friend_harvester'] = function (Container $container) {
    return new FriendHarvester( $container['pdo'],$container['mailer']);
};

$container['pdo'] = function (Container $container) {
    return new PDO($container['database.dsn'] );
};


//$dsn = 'sqlite:'.__DIR__.'/data/database.sqlite';
//$pdo = new PDO($dsn);
/* END CONTAINER BUILDING */
//$mailer = new SmtpMailer('server','user','password','port');
//$friendHarvester = new \DiDemo\FriendHarvester( $pdo,$container['mailer']);

$friendHarvester = $container['friend_harvester'];

$friendHarvester->emailFriends();


