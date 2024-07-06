<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

date_default_timezone_set('Asia/Kolkata');

require_once('connect.php');
require_once('session.php');
require_once('mail_function.php');

class Action
{
    public $database, $session, $mail_function;
    public function __construct()
    {
        $this->database = new Database;
        $this->mail_function = new Mailer;
        $this->session = new session;
    }
}
$action = new Action;
