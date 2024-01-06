<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use App\Http\Services\User\UserService;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function listUser()
    {
        return view('admin.users.list-user', [
            'title' => 'Danh sách người dùng',
            'activeDash' => '',
            'activeUser' => 'active active-menu',
            'activeCgr' => '',
            'activePrd' => '',
            'activeOrder' => '',
            'users' => $this->userService->getUser() 
        ]);
    }

    public function editUser(User $user)
    {
        return view('admin.users.edit', [
            'title' => 'Chỉnh sửa thông tin người dùng - ' . $user->name,
            'activeDash' => '',
            'activeUser' => 'active active-menu',
            'activeCgr' => '',
            'activePrd' => '',
            'activeOrder' => '',
            'user' => $user
        ]);
    }

    public function updateUser(User $user, UserRequest $request)
    {
        $this->userService->updateUser($request, $user);            
        return redirect('/admin/users/list-user');          
    } 

    public function delUser(Request $request): JsonResponse 
    {
        $result = $this->userService->delUser($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Đã xoá người dùng.'
            ]);
        } 

        return response()->json([
            'error' => true
        ]);
    }

    // =========================== PROFILE ===========================
    public function profile(User $user)
    {
        return view('user.profile-edit', [
            'title' => 'Thông tin cá nhân - BookStoreVN',
            'activeHome' => '',
            'activeCgr' => '',
            'activePrd' => '',
            'name_page' => 'Thông tin cá nhân - ' . $user->name,
            'user' => $user
        ]);
    }

    public function update(User $user, Request $request)
    {
        $this->userService->updateUser($request, $user);
        return redirect()->back();
    }

    public function changePass(User $user, Request $request)
    {
        $this->userService->changePass($request, $user);
        return redirect()->back();
    }
}
