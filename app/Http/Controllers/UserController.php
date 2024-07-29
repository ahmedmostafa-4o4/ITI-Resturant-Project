<?php

namespace App\Http\Controllers;

use App\Models\MyUser;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = MyUser::all();
        // $currentUser = auth()->user();
        return view('dashboard.users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.addUser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'userName' => 'required|string|max:255|unique:my_users',
            'email' => 'required|email|unique:my_users',
            'password' => 'required|string|min:8',
            'name' => 'required|string',
        ]);

        $user = new MyUser();
        $user->name = $request->name;
        $user->userName = $request->userName;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->isActive = $request->isActive ?? "off";
        $user->save();
        return redirect()->route('users')->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = MyUser::find($id);
        return view('dashboard.editUser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'userName' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|string|min:8',
            'name' => 'required|string',
        ]);

        $user = MyUser::find($id);

        if ($user) {
            $user->update([
                'name' => $request->name,
                'userName' => $request->userName,
                'email' => $request->email,
                'password' => $request->password,
                'isActive' =>  $request->isActive ?? "off",
                'updated_at' => now(),
            ]);
            return redirect()->route('users')->with('success', 'User updated seccessfully');
        } else {
            return redirect()->route('users')->with('error', 'User did not updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        MyUser::find($id)->delete();
        return redirect()->route('users')->with('success', 'User Deleted');
    }
}
