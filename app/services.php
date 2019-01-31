<?php

use \Pimple\Container;
use \DiDemo\Mailer\SmtpMailer;
use \DiDemo\FriendHarvester;

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
