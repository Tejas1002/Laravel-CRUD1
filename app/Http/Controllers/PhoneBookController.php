<?php

namespace App\Http\Controllers;

use App\Models\PhoneBook;
use Illuminate\Http\Request;

class PhoneBookController extends Controller
{
    public function index(){
        // Fetch data from the database
        $data = PhoneBook::all();
        return view('home', ["phonebooks" => $data]);
    }

    public function store(Request $request){

        
        // Validating data
        $request->validate([
            'username' => 'required',
            'phone_number' => 'required|numeric',
            'city' => 'required',
        ]);

        // Store data in database
        $data = [  
            'username' => $request->username,
            'phone_number' => $request->phone_number,
            'city' => $request->city,
        ];

        // Save to database
        PhoneBook::create($data);

        return redirect()->route('homepage');
    }

    // Delete the data
    public function destroy($id){
        PhoneBook::find($id)->delete();
        return redirect()->route('homepage');
    }

    public function edit($id){
        $phonebook = PhoneBook::find($id);
        return view('edit', ["phonebook" => $phonebook]);
    }

    public function update(Request $request, $id){
        $phonebook = PhoneBook::find($id);

        // Validating data
        $request->validate([
            'username' => 'required',
            'phone_number' => 'required|numeric',
            'city' => 'required',
        ]);

        // Update data in database
        $phonebook->update([
            'username' => $request->username,
            'phone_number' => $request->phone_number,
            'city' => $request->city,
        ]);

        return redirect()->route('homepage');
    }
}
