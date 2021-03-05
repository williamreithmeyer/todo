<?php
/**
 * Users
 *
 * Very basic user class for login.
 * Would use MySQL, but JSON file for users has to do for the time constraint.
 *
 * Password is still hashed though
 *
 *
 * @author William Reithmeyer <hello@williamreithmeyer.com>
 */
class _User {

    public $name;

    public $status;

    public function is_logged_in()
    {
        if (!empty($_POST['login_submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $this->check_login($username, $password);
        }

        if (empty($_SESSION['logintoken'])) {
            return false;
        }

        if ($this->check_token($_SESSION['logintoken'])){
            $this->setUser($_SESSION['logintoken']);

            unset($_POST);
            return true;
        }
        return false;
    }

    private function setUser($sessionId)
    {
        $users = json_decode(file_get_contents(PRIVATE_FOLDER . "users.json"), true);

        foreach ($users as $user => $creds)
        {
            if ($creds["sessionid"] === $sessionId) {
                $this->name = $user;
                $this->status = $creds["status"];
            }
        }
    }

    private function check_login($username, $password)
    {
        $users = json_decode(file_get_contents(PRIVATE_FOLDER . "users.json"), true);

        try {
            if (password_verify($password, $users[$username]["pw"])) {
                $uuid = new _UUID();
                $sessionId = $uuid->v4();
                $_SESSION["logintoken"] = $sessionId;
                $users[$username]["sessionid"] = $sessionId;

                file_put_contents(PRIVATE_FOLDER . "users.json", json_encode($users));
            }
        } catch(Exception $e) {
            return false;
        }
        return false;
    }

    private function check_token($token)
    {
        $uuid = new _UUID();
        return $uuid->is_valid($token);
    }


}