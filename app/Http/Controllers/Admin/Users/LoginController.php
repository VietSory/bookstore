<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\User\UserService;

class LoginController extends Controller
{

    protected $userService;

    public function __construct(UserService $userService) 
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return view('admin.users.login', [
            'title' => 'BookStoreVN - Đăng Nhập'
        ]);
    }

    public function handle_login(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required'
        ],[
            'email.required'=>'Bạn chưa nhập email.',
            'password.required'=>'Bạn chưa nhập mật khẩu.'
        ]);

        // Kiểm tra thông tin nhập vào có đúng với giá trị có trong csdl
        if (Auth::attempt([
            'email' => $request->input('email'), 
            'password' => $request->input('password')
            ])) {     
                return redirect()->route('admin');              
        }

        session()->flash('error', 'Email hoặc mật khẩu không chính xác!');
        return redirect()->back();
    }

    public function signup()
    {
        return view('admin.users.signup', [
            'title' => 'BookStoreVN - Đăng Ký'
        ]);
    }

    public function addUserByAdmin()
    {
        return view('admin.users.add-user', [
            'title' => 'Thêm Người Dùng',
            'activeDash' => '',
            'activeUser' => 'active active-menu',
            'activeCgr' => '',
            'activePrd' => '',
            'activeOrder' => ''
        ]);   
    }

    public function handle_signup(UserRequest $request)
    {
        $this->userService->create($request);
        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
