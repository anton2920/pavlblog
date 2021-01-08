<?php

namespace App\Models\admin;

/**
 * Class Admin
 * @package App\Models\admin
 */
class Admin
{
    /**
     * @return bool
     */
    public static function isAdmin(){
        return (isset($_SESSION['user']) && $_SESSION['role'] == 1);
    }

    public static function logoutAdmin(){
        unset($_SESSION['user']);
        unset($_SESSION['role']);
    }

    /**
     * @param $email
     * @return false|string|null
     */
    public static function getTokenPerEmail($email)
    {
        $user = \R::findOne('users', " WHERE email = ? ", [$email]);


        if(empty($user)){
            return false;
        }

        $token = password_hash($email . date('y-m-d h-m-s'), PASSWORD_DEFAULT);
        \R::exec('UPDATE users SET accessToken = ? WHERE email = ? ', [$token, $email]);

        return $token;
    }

    public static function restorePass($password, $token)
    {
        if(!isset($password) || !isset($token)){
            return false;
        }

        $user = \R::findOne('users', " WHERE accessToken = ? ", [$token]);
        if(empty($user)){
            return false;
        }

        $newpassword = password_hash($password, PASSWORD_DEFAULT);
        \R::exec('UPDATE users SET password = ? WHERE accessToken = ? ', [$newpassword, $token]);
        return true;
    }

    /**
     * @param $registration_data
     */
    public static function createAdminAccount($registration_data)
    {
        $password = password_hash($registration_data['password'], PASSWORD_DEFAULT);
        $token    = password_hash(date('Y-m-d h-m-s'), PASSWORD_DEFAULT);
        if(is_string($registration_data['fullname']) && is_string($registration_data['email']) && is_string($registration_data['username'])){
            \R::exec( "INSERT INTO users (username, password, role, accessToken, avatar, fullname, email)
                       VALUES (?,?,?,?,?,?,?)", [
                $registration_data['username'],
                $password,
                1,
                $token,
                '-',
                $registration_data['fullname'],
                $registration_data['email']]);
        }else{
            header("Location: /admin/main/menu?ct-account-success=0");
        }
    }

    /**
     * @param $username
     * @param $password
     * @return bool
     */
    public function loginAdmin($username, $password){
        $user = \R::findOne('users', "WHERE username = ? AND role= 1", [$username]);
        if($user) {
            if(password_verify($password, $user['password'])){
                $_SESSION['user'] = $user['username'];
                $_SESSION['role'] = 1;
                return true;
            }
        }
        return false;
    }

    /**
     * @param $password
     * @return bool
     */
    public function verifyNewPass($password)
    {
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);

        if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
            return false;
        }
        return true;
    }

    /**
     * @param $password
     */
    public function changePasswordInDataBase($password)
    {
        $newPassword = password_hash($password, PASSWORD_DEFAULT);
        \R::exec('UPDATE users SET password = ? WHERE username = ? ', [$newPassword, $_SESSION['user']]);
    }


    /**
     * @param $fullname
     */
    public function changeNameInDataBase($fullname)
    {
        \R::exec('UPDATE users SET fullname = ? WHERE username = ? ', [$fullname, $_SESSION['user']]);
    }

    /**
     * @param $email
     */
    public function changeEmailInDataBase($email)
    {
        \R::exec('UPDATE users SET email = ? WHERE username = ? ', [$email, $_SESSION['user']]);
    }

}