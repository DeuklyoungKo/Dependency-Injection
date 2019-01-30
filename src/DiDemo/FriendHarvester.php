<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019-01-30
 * Time: 오후 3:18
 */

namespace DiDemo;


use DiDemo\Mailer\SmtpMailer;

class FriendHarvester
{
    /**
     * @var \PDO
     */
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function emailFriends()
    {
        $mailer = new SmtpMailer('smtp.SendMoneyToStrangers.com', 'smtpuser', 'smtppass', '465');

        $sql = 'SELECT * FROM people_to_spam';
        foreach ($this->pdo->query($sql) as $row) {
            $mailer->sendMessage(
                $row['email'],
                'Yay! We want to send you money for no reason!',
                sprintf(<<<EOF
Hi %s! We've decided that we want to send you money for no reason!

Please forward us all your personal information so we can make a deposit and don't ask any questions!
EOF
                    , $row['name']),
                'YourTrustedFriend@SendMoneyToStrangers.com'
            );
        }
    }
}