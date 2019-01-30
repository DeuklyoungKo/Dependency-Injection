<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019-01-30
 * Time: 오후 3:59
 */

namespace DiDemo\Mailer;


interface MailerInterface
{
    public function sendMessage($recipientEmail, $subject, $message, $from);
}