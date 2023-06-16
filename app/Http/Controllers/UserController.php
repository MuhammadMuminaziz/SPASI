<?php

namespace App\Http\Controllers;

use App\Models\Kesatuan;
use App\Models\Role;
use App\Models\User;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::whereIn('role_id', array(2, 3))->orderBy('id', 'desc')->get();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::whereNotNull('kesatuan_id')->pluck('kesatuan_id');
        $roles = Role::get()->skip(1);
        $kesatuan = Kesatuan::whereNotIn('id', $users)->orderBy('name', 'asc')->get();
        return view('user.create', compact('roles', 'kesatuan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only(['name', 'username', 'role_id', 'kesatuan_id', 'password', 'password_confirmation']);
        $validator = Validator::make($data, [
            'name' => 'required',
            'username' => ['required', 'string', 'max:255', 'unique:users', 'alpha_dash'],
            'kesatuan_id' => $request->role_id == 3 ? 'required' : '',
            'password' => 'required|min:5|confirmed',
        ], $this->message());

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        unset($data['password_confirmation']);
        if ($request->role_id != 3) {
            $kesatuan = null;
        } else {
            $kesatuan = $request->kesatuan_id;
        }
        $data['kesatuan_id'] = $kesatuan;
        $data['password'] = Hash::make($request->password);
        $data['username'] = $this->username($request->username);

        User::create($data);
        return redirect(route('users.index'))->with('message', 'User berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $users = User::whereNotNull('kesatuan_id')->pluck('kesatuan_id');
        $roles = Role::get()->skip(1);
        $kesatuan = Kesatuan::whereNotIn('id', $users)->orderBy('name', 'asc')->get();
        return view('user.edit', compact('user', 'roles', 'kesatuan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $data = $request->only(['name', 'username', 'role_id', 'kesatuan_id', 'password', 'password_confirmation']);
        $validator = Validator::make($data, [
            'name' => 'required',
            'username' => ['required', 'string', 'max:255', 'unique:users,username,' . $user->id, 'alpha_dash'],
            'kesatuan_id' => $request->role_id == 3 ? 'required' : '',
            'password' => $request->password ? 'min:5|confirmed' : '',
        ], $this->message());

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->role_id != 3) {
            $kesatuan = null;
        } else {
            $kesatuan = $request->kesatuan_id;
        }

        if ($request->username == $user->username) {
            $username = $user->username;
        } else {
            $username = $this->username($request->username);
        }

        if ($request->password) {
            $password = Hash::make($request->password);
        } else {
            $password = $user->password;
        }

        $data['kesatuan_id'] = $kesatuan;
        $data['username'] = $username;
        $data['password'] = $password;
        $data['is_active'] = $request->status == 'Aktif' ? true : false;
        unset($data['password_confirmation']);
        $user->update($data);
        return redirect(route('users.index'))->with('message', 'User berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect(route('users.index'))->with('message', 'User berhasil dihapus');
    }

    public function changePassAdmin(Request $request)
    {
        $data = $request->only(['username', 'password', 'password_confirmation']);
        $validator = Validator::make($data, [
            'password' => 'required|min:5|confirmed',
        ], $this->message());

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }
        User::whereUsername($request->username)->update(['password' => Hash::make($request->password)]);
        return response()->json([
            'success' => true,
            'message' => 'Password berhasil diubah'
        ]);
    }

    public function username($name)
    {
        $username = SlugService::createSlug(User::class, 'username', $name);
        return $username;
    }

    public function message(): array
    {
        return [
            'name.required' => 'Nama user harus diisi',
            'kesatuan_id.required' => 'Kesatuan harus diisi',
            'username.required' => 'Username harus diisi',
            'username.string' => 'Username harus berbentuk string',
            'username.max' => 'Username tidak boleh lebih dari 255 huruf',
            'username.unique' => 'Username sudah tersedia',
            'username.alpha_dash' => 'Username tidak boleh mengandung spasi atau karakter husus lainya',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 5 karakter',
            'password.confirmed' => 'Password tidak sama',
        ];
    }
}
