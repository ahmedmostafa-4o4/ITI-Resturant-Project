<?php

namespace App\Http\Controllers;

use App\Models\Table;
use App\Models\User;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function index()
    {
        $tables = Table::all();
        return view('dashboard.tables', ['tables' => $tables]);
    }
    function create()
    {
        return view("restaurant.book");
    }

    function store(Request $request)
    {
        $request->validate([
            "name" => "required|string",
            "phoneNumber" => "required|numeric|digits_between:10,15",
            "email" => "required|email",
            "persons" => "required|numeric|min:1",
            "tableDate" => "required|date"
        ]);

        $users = new User();
        $usersEmails = $users->all('email');
        $isValid = 0;
        foreach ($usersEmails as $email) {
            if ($email->email === $request->email) {
                $isValid++;
                break;
            }
        }

        if ($isValid) {
            $table = new Table();
            $table->name = $request->name;
            $table->email = $request->email;
            $table->date = $request->tableDate;
            $table->phone_number = $request->phoneNumber;
            $table->persons = $request->persons;
            $table->save();

            return redirect("/book")->with("success", "Table Created Successfully");
        } else {
            return redirect("/book")->with("error", "Sorry, Only Valid Users Can Book A Table");
        }
    }

    public function edit(string $id)
    {
        $table = Table::find($id);
        return view('dashboard.editTable', ['table' => $table]);
    }

    public function update(Request $request, string $id)
    {

        $request->validate([
            "name" => "required|string",
            "phoneNumber" => "required|numeric|digits_between:10,15",
            "email" => "required|email",
            "persons" => "required|numeric|min:1",
            "tableDate" => "required|date"
        ]);

        $tables = Table::find($id);



        if ($tables) {
            $tables->update([
                'name' => $request->name,
                'email' => $request->email,
                'persons' => $request->persons,
                'phone_number' => $request->phoneNumber,
                'date' => $request->tableDate,
                'updated_at' => now(),
            ]);
            return redirect()->route('tables')->with('success', 'Table updated seccessfully');
        } else {
            return redirect()->route('tables')->with('error', 'Table did not updated');
        }
    }

    public function destroy(string $id)
    {
        Table::find($id)->delete();
        return redirect()->route('tables')->with('success', 'Table Deleted Seccessfully');
    }
}
