<?php
require_once '../views/UserAddView.php';
require_once '../views/UserLoginView.php';
require_once '../views/RedirectView.php';
require_once '../models/User.php';


class UserController {

    public function nowy(){
        return new UserAddView();
    }

    public function add(){
        $valid = true;
        $email = $_POST['email'];
        if(!isset($email) || $email == ""){
            $valid = false;
            $_SESSION ['registererror'] = "prosze podac email";
            Flash::error("Email nie może byc pusty.");;
        }
        $login = $_POST['login'];
        if(!isset($login) || $login == ""){
            $valid = false;
            Flash::error("Login nie moze być pusty.");
        }
        $password = $_POST['password'];
        if(!isset($password) || $password == ""){
            $valid = false;
            Flash::error("Hasło nie może być puste.");
        }
        $rep_password = $_POST['rep_password'];

        if($password != $rep_password){
            $valid = false;
            Flash::error("Hasła muszą się zgadzać");
        }

        $user = User::get(['login' => $login]);
        if ($user) {
            $valid = false;
            Flash::error("Nazwa użytkownika jest już zajęta.");
        }

        if ($valid) {
            $user = new User($login, $email, password_hash($password, PASSWORD_DEFAULT));
            $user->save();
            Flash::info("Możesz się zalogować");
            return new RedirectView('/login', 303);
        } else {
            return new RedirectView('/register', 303);
        }
    }

    public function login_view(){
        return new UserLoginView();
    }

    public function authentication(){
        $login = $_POST['login'];
        $password = $_POST['password'];

        $user = User::getOne(['login' => $login]);

        if(isset($user) == true && password_verify($password, $user['password'])){
            $_SESSION['user'] = $login;
            Flash::info("Zostałeś zalogowany.");
            return new RedirectView('/login', 303);
        }else {
            Flash::error("Złe dane logowania");
            return new RedirectView('/login', 303);
        }


    }

    public function logout(){
        $_SESSION['user'] = 0;
        Flash::info("Pomyślnie wylogowano.");
        return new RedirectView('/login', 303);
    }
}
