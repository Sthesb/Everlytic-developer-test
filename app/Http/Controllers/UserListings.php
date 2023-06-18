<?php

namespace App\Http\Controllers;

use App\UserListing;
use Illuminate\Http\Request;
use App\Repositories\UserListingRepositoryInterface;
use App\Repositories\UserListingRepository;

class UserListings extends Controller
{
    private $userRepository;
    public function __construct(UserListingRepository $userListingRepository)
    {
        $this->userRepository = $userListingRepository;
    }

    public function index()
    {
        $users = $this->userRepository->getAll();
        
        return view('welcome', compact('users'));
    }

    public function store(Request $request) {

        $this->userRepository->create($request);
    
        return redirect('/');
    }

    public function destroy($id) {
        $this->userRepository->delete($id);
        return back();
    }
}
