<?php

namespace App\Http\Controllers;

use App\Model\Supply;
use App\Model\Demand;
use App\Model\User;

class UserController extends Controller
{
    public function getLogin()
    {
        if (User::check()) {
            return redirect('/');
        }
        return view('user.login');
    }

    public function postLogin()
    {
        $this->validate(request(), [
            'username'  => 'required',
            'password'  => 'required',
        ]);

        if (User::login(request())) {
            return redirect()->intended('/');
        } else {
            return back()->withErrors('用户名或密码错误');
        }
    }

    public function getRegister()
    {
        return view('user.register_step_one');
    }

    public function postRegister()
    {

    }

    public function getFindpassword()
    {
        return view('user.findpassword');
    }

    public function postFindpassword()
    {

    }

    public function logout()
    {
        User::logout();
        return redirect('/');
    }

    public function getInfo()
    {
        return view('user.info')->withUser(User::user());
    }

    public function postInfo()
    {
        $user = User::user();
        $user->info->update(request()->only('company', 'main_business', 'company_size', 'comopany_code', 'other'));

        return back()->withErrors('修改成功');
    }


    public function getPassword()
    {
        return view('user.password');
    }

    public function postPassword()
    {
        $this->validate(request(), [
            'old_password'  => 'required',
            'password'      => 'required|min:6|max:20',
            're_password'   => 'same:password',
        ], [
            'old_password.required' => '请填写原密码',
            'password.*'            => '密码长度应为为6-20位',
            're_password.same'      => '两次输入新密码应该相同',
        ]);

        $user = User::user();

        if (! password_verify(request('old_password'), $user->password)) {
            return back()->withErrors('原密码错误');
        }

        $user->password = password_hash(request('password'), PASSWORD_DEFAULT);
        $user->save();

        return back()->withErrors('密码修改成功');
    }

    public function supply()
    {
        $supplies = Supply::where('user_id', User::user()->id)->orderBy('created_at', 'desc')->paginate();
        return view('user.supply')->withSupplies($supplies);
    }

    public function demand()
    {
        $demands = Demand::where('user_id', User::user()->id)->orderBy('created_at', 'desc')->paginate();
        return view('user.demand')->withDemands($demands);
    }
}
