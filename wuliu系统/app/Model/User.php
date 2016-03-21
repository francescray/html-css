<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class User extends Model
{
    protected $table = 'user';

    protected $guarded = ['id'];

    static public $login_user = null;

    public function info()
    {
        return $this->hasOne(UserInfo::class, 'user_id');
    }

    public static function register($data)
    {
        $username = $data['username'];
        $password = password_hash($data['password'], PASSWORD_DEFAULT);
        $email = $data['email'];
        $nickname = isset($data['nickname']) ? $data['nickname'] : '';

        $num = self::where('username', $username)->count();
        if ($num > 0) {
            return false;
        }

        return self::create([
            'username'      => $username,
            'password'      => $password,
            'email'         => $email,
            'nickname'      => $nickname,
        ]);
    }

    public static function login($data)
    {
        $username = $data['username'];
        $password = $data['password'];

        $user = self::where('username', $username)->first();
        if ($user == null) {
            return false;
        }

        if (password_verify($password, $user->password) == false) {
            return false;
        }

        Session::set('user_login_id', $user->id);

        return true;
    }

    public static function logout()
    {
        Session::forget('user_login_id');
        self::$login_user = null;
    }

    public static function check()
    {
        $id = Session::get('user_login_id');
        if ($id == null) {
            return false;
        }

        $user = self::find($id);
        if ($user == null) {
            return false;
        }

        self::$login_user = $user;
        return true;
    }

    public static function user()
    {
        if (self::$login_user instanceof User) {
            return self::$login_user;
        }

        if (self::check()) {
            return self::$login_user;
        }

        return null;
    }
}
