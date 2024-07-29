<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $admins = User::all();
        // $currentUser = auth()->user();
        return view('dashboard.admins', compact('admins'));
    }

    public function create()
    {
        return view('dashboard.addAdmin');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);


        $admin = new User();

        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->extension();
            $filePath = $request->file('image')->storeAs('images', $fileName, 'public');
        } else {
            $filePath = 'images/default-user.jpg';
        }
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = $request->password;
        $admin->image = $filePath;
        $admin->created_at = now();
        $admin->updated_at = now();
        $admin->save();
        return redirect()->route('admins')->with('success', 'Admin created successfully');
    }

    public function edit(string $id)
    {
        $admin = User::find($id);
        return view('dashboard.editAdmin', compact('admin'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
            'image' => 'max:5000'
        ], [
            [
                'password.min' => 'Password Should Be At Least 8 Characters',
                'image.max' => 'The image size must not exceed 5MB.',
            ]
        ]);

        $admin = User::find($id);

        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->extension();
            $filePath = $request->file('image')->storeAs('images', $fileName, 'public');
        } else {
            $filePath = $admin->image;
        }

        if ($admin) {
            $admin->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'image' => $filePath,
                'updated_at' => now(),
            ]);
            return redirect()->route('admins')->with('success', 'Admin updated seccessfully');
        } else {
            return redirect()->route('admins')->with('error', 'Admin did not updated');
        }
    }

    public function destroy(string $id)
    {
        User::find($id)->delete();
        return redirect()->route('admins')->with('success', 'Admin Deleted');
    }
}
