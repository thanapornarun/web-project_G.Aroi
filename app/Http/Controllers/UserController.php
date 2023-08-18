<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\EventListener\ProfilerListener;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::get();
        return view('user.index', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        // return view('artists.show', ['User' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    public function createProfile(User $user) {
        return view('users.create-profile', ['user' => $user]);
    }
    
    
    public function storeProfile(Request $request, User $user) {
        $profile = new Profile();
        $profile->full_name = $request->get('full_name');
        $profile->gender = $request->get('gender');
        $profile->address = $request->get('address');
        $profile->phone_number = $request->get('phone_number');
        $profile->profile_picture = 'images/user.png';
        $profile->data_of_birth = $request->get('data_of_birth');
        
        $user->profile()->save($user);

        return redirect()->route('login');
    }
}
