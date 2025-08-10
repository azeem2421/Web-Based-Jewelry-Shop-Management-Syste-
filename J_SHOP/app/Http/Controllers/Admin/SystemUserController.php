<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SystemUserController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'admin')->with('modules')->get();
        return view('admin.system_users.index', compact('users'));
    }

    public function create()
    {
        $modules = Module::all();
        return view('admin.system_users.create', compact('modules'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'modules' => 'array'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin',
        ]);

        $user->modules()->sync($request->modules);

        return redirect()->route('admin.system_users.index')->with('success', 'System user created.');
    }

    public function edit($id)
    {
        $user = User::with('modules')->findOrFail($id);
        $modules = Module::all();

        return view('admin.system_users.edit', compact('user', 'modules'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'modules' => 'array'
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // If password is provided, update it
        if ($request->filled('password')) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        $user->modules()->sync($request->modules);

        return redirect()->route('admin.system_users.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->modules()->detach(); // Optional: remove module associations
        $user->delete();

        return redirect()->route('admin.system_users.index')->with('success', 'User deleted successfully.');
    }

    public function report()
{
    $users = User::where('role', 'admin')->with('modules')->get();

    return view('admin.system_users.report', compact('users'));
}
}
