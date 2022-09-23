<?php

namespace App\Http\Controllers\Auth;

use Mahmoud\Labels\Database;
use PDO;

class LoginController
{
    /**
     * @return [type]
     */
    public function showLogin()
    {
        mustNotAuth();

        return view('admin.auth.login');
    }

    /**
     * @return [type]
     */
    public function attemptLogin()
    {
        $username = request('username');
        $password = request('password');
        $remember = request('remember_me');

        // start validation
        $errors = [];

        if (!isset($username) || empty($username)) {
            $errors['username'] = 'قم بكتابة إسم المستخدم';
        }

        if (!isset($password) || empty($password)) {
            $errors['password'] = 'قم بكتابة كلمة المرور';
        }

        if (!empty($errors)) {
            flash('errors', $errors);

            return redirect('/login');
        } // end validation

        $checkQuery = db()->prepare('SELECT *
        FROM users
        WHERE username = ?');
        $checkQuery->execute([$username]);

        $userData = $checkQuery->fetch();

        if ($userData) { // user found
            if (password_verify($password, $userData->password)) {
                $token = session_create_id();

                $setUserToken = db()->prepare('UPDATE users
                SET remember_token = ?
                WHERE username = ?');
                $setUserToken->execute([
                    $token,
                    $username
                ]);

                if ($setUserToken->rowCount()) {
                    session('user', $token);

                    if ($remember) {
                        setcookie('user', $token, time() + 86400, '/');
                    }

                    redirect('index');
                }
            } else {
                $errors['password'] = 'كلمة المرور خاطئة';
            }
        } else {
            $errors['username'] = 'لم يتم العثور على المستخدم';
        }

        if (!empty($errors)) {
            flash('errors', $errors);

            return redirect('/login');
        }
    }

    /**
     * @return void
     */
    public function logout(): void
    {
        mustAuth();

        $user = db()->prepare('UPDATE users
        SET remember_token = NULL
        WHERE remember_token = ?');
        $user->execute([session('user')]);

        unset($_SESSION['user']);

        setcookie('user', null, time() - 86400, '');

        redirect('login');
    }
}
