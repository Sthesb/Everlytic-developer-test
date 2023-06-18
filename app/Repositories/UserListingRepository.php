<?php

namespace App\Repositories;

use App\UserListing;

class UserListingRepository 
{   
    public function getAll() {
        return UserListing::all();
    }

    public function create($request){
        // dd($request);

        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'position' => 'required'
            // Add more validation rules for other fields
        ]);

        UserListing::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'position' => $request->position
        ]);
    }

    public function delete($id) {
        $user = UserListing::findOrFail($id);
        $user->delete();
    }
}

