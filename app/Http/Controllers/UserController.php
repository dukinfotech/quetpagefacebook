<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('is_admin', false)->latest()->get();
        return view('users/index', compact('users'));
    }

    public function create()
    {
        return view('users/create');
    }

    public function store(UserFormRequest $userFormRequest)
    {
        $validatedData = $userFormRequest->validated();
        $password = Hash::make('12345678');
        $validatedData['password'] = $password;
        $user = new User($validatedData);
        $user->save();

        return redirect('/admin')->withSuccess('Tạo thành công.');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('users/edit', compact('user'));
    }

    public function update($id, UserFormRequest $userFormRequest)
    {
        $validatedData = $userFormRequest->validated();
        if ($validatedData['password'] == null) {
            unset($validatedData['password']);
        } else {
            $validatedData['password'] = Hash::make($validatedData['password']);
        }

        $user = User::find($id);
        $user->fill($validatedData);
        $user->save();

        return redirect('/admin')->withSuccess('Lưu thành công.');
    }

    public function destroy($id)
    {
        User::destroy($id);

        return redirect('/admin')->withSuccess('Xóa thành công.');
    }

    public function updateStatus($id)
    {
        $user = User::find($id);
        $user->is_active = !$user->is_active;
        $user->save();
    }

    public function authenticate(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        if (!$email || !$password) {
            abort(401);
        }

        $user = User::where([
            ['email', '=', $email],
            ['is_active', '=', true],
            ['is_admin', '=', false]
        ])->first();

        if (!$user) {
            abort(401);
        }

        if (! Hash::check($password, $user->password)) {
            abort(401);
        }

        return true;
    }

    public function changePassword()
    {
        return view('users/change_password');
    }

    public function updatePassword(Request $request)
    {
        $current_password = $request->current_password;
        $new_password = $request->new_password;
        
        if (! Hash::check($current_password, auth()->user()->password)) {
            return back()->withErrors(['msg' => 'Mật khẩu hiện tại không chính xác.']);
        }

        User::find(auth()->user()->id)->update(['password'=> Hash::make($new_password)]);
        return back()->withSuccess('Đổi mật khẩu thành công.');
    }
}
