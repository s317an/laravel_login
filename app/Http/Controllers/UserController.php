<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginFormRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * ログイン画面表示
     */
    public function index()
    {
        return view('login.login_form');
    }

    /**
     * ログイン確認/ホーム画面表示
     * @param App\Http\Requests\LoginFormRequest
     * request
     */
    public function login(LoginFormRequest $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            //成功した場合ホーム画面表示
            return redirect()->route('home')->with('success','ログインが成功しました。');
        }

        return back()->withErrors([
            'danger' => 'メールアドレスかパスワードに誤りがあります。',
        ]);
    }

    /**
     * ユーザーをアプリケーションからログアウトさせる
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('index')->with('danger','ログアウトしました。');
    }

}
