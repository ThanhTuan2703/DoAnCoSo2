<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class dangnhapController extends Controller
{

    public function index()
    {
        return view('form.login');
    }


    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('trangchu')
                        ->with('message','Đăng nhập thành công');

        }

        return redirect()->back()->with('message','Tài khoản hoặc mật khẩu không hợp lệ, hãy nhập lại');
    }



    public function registration()
    {
        return view('chucnang.cnquanly.addquanly');
    }



    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect()->route('quanly.quanly')->withSuccess('have signed-in');
    }


    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }


    public function dashboard()
    {
        if(Auth::check()){
            return view('trangchu');
        }

        return redirect("login")->withSuccess('are not allowed to access');
    }


    public function signOut() {
        // Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
