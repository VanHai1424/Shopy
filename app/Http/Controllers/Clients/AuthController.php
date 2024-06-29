<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $req) {
        $title = 'Đăng nhập';
        return view('clients.login', compact('title'));
    }

    public function handleLogin(Request $req) {
        $validator = Validator::make($req->all(), [
            'email' => 'required|email',
            'pass' => 'required'
        ], [
            'email.required' => 'Email là bắt buộc',
            'email.email' => 'Email không đúng định dạng',
            'pass.required' => 'Password là bắt buộc'
        ]);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'msg' => 'Có lỗi xảy ra',
                'alert-type' => 'danger'
            ]);
        } else {
            if(Auth::attempt(['email' => $req->email, 'password' => $req->pass])) {
                if(Auth::user()->role === 0) {
                    return redirect()->route('dashboard');
                } else {
                    return redirect()->route('home');
                }
            } else {
                return redirect()->back()->withInput()->with([
                    'msg' => 'Tài khoản hoặc mật khẩu không đúng',
                    'alert-type' => 'danger'
                ]);
            }
        }
    }

    public function handleSignUp(Request $req) {
        $validator = Validator::make($req->all(), [
            'nameS' => 'required',
            'emailS' => 'required|email',
            'passS' => 'required'
        ], [
            'nameS.required' => 'Name là bắt buộc',
            'emailS.required' => 'Email là bắt buộc',
            'emailS.email' => 'Email không đúng định dạng',
            'passS.required' => 'Password là bắt buộc'
        ]);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'msgS' => 'Có lỗi xảy ra',
                'alert-typeS' => 'danger'
            ]);
        } else {
            User::create([
                'name' => $req->nameS,
                'email' => $req->emailS,
                'password' => Hash::make($req->passS)
            ]);
            return redirect()->route('dang-nhap')->with([
                'msg' => 'Đăng ký thành công',
                'alert-type' => 'success'
            ]);
        }
    }

    public function logout(Request $req) {
        Auth::logout();
        return redirect()->route('dang-nhap');
    }
}
