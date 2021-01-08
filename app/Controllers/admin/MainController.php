<?php

namespace App\Controllers\admin;

use App\Models\admin\Admin;
use App\Models\Comment;

/**
 * Class MainController
 * @package App\Controllers\admin
 */
class MainController extends AdminController
{
    public function indexAction()
    {
        header("Location: /");
        exit();
    }

    public function loginAction()
    {
        if(Admin::isAdmin()){
            header("Location: /");
            exit();
        }

        $username = $_POST['username'] ?? null;
        $password = $_POST['password'] ?? null;

        if($username && $password){
            $adminObject = new Admin();
            if($adminObject->loginAdmin($username, $password)){
                header("Location: /");
                unset($_SESSION['error']);
            }else{
                $_SESSION['error'] = 'failed';
            }
        }
    }

    public function menuAction()
    {
        $logout = $_GET['logout'] ?? -1;
        if($logout == 1){
            Admin::logoutAdmin();
            $this->layout = 'blog';
            header("Location: /");
            exit;
        }elseif($logout == 0){
            header("Location: /");
            exit;
        }
        $_SESSION['token'] = $_SESSION['user'] . rand();
    }

    public function createAction()
    {
        if(isset($_POST['username']) && isset($_POST['fullname']) && isset($_POST['email']) && isset($_POST['password'])){
            $adminObject = new Admin();
            if($adminObject->verifyNewPass($_POST['password'])){
                Admin::createAdminAccount($_POST);
                header("Location: /admin/main/menu?ct-account-success=1");
            }else{
                header("Location: /admin/main/create/?pass_verify=0");
            }

        }
    }

    public function changepassAction()
    {
        $adminObject = new Admin();
        if($this->compareToken($_POST['token']) && $adminObject->verifyNewPass($_POST['password'])){
            $adminObject->changePasswordInDataBase($_POST['password']);
            header("Location: /admin/main/menu/?ch-pas-success=1");
            exit();
        }
        header("Location: /admin/main/menu/?ch-pas-success=0");
        exit();
    }

    public function changenameAction()
    {
        $adminObject = new Admin();
        if($this->compareToken($_POST['token']) && isset($_POST['fullname'])){
            $adminObject->changeNameInDataBase($_POST['fullname']);
            header("Location: /admin/main/menu/?ch-name-success=1");
            exit;
        }
        header("Location: /admin/main/menu/?ch-name-success=0");
        exit();
    }

    public function changeemailAction()
    {
        $adminObject = new Admin();
        if($this->compareToken($_POST['token']) && isset($_POST['email'])){
            $adminObject->changeEmailInDataBase($_POST['email']);
            header("Location: /admin/main/menu/?ch-email-success=1");
            exit();
        }
        header("Location: /admin/main/menu/?ch-email-success=0");
        exit();
    }


    public function approveAction()
    {
        if(isINT($_GET['id']))
        {
            $commentID = $_GET['id'];
            $commentObject = new Comment();
            $commentObject->approveComment($commentID);
        }
        header("Location: /admin/article/confirmcomments");
        exit();
    }

    public function restoreAction()
    {
        if(!empty($_POST)){
            $token = Admin::getTokenPerEmail($_POST['email']);
            if($token != false){
                $this->set(compact('token'));
            }

        }
    }

    public function newpassAction()
    {
        $adminObject = new Admin();
        if(!empty($_POST) && $adminObject->verifyNewPass($_POST['password']) && isset($_POST['token'])){
            if(Admin::restorePass($_POST['password'], $_POST['token'])){
                header("Location: /admin/main/login/?ch-pas-success=1");
            }else{
                header("Location: /admin/main/login/?ch-pas-success=0");
            }
            exit;
        }

    }
}