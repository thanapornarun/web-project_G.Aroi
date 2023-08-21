<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = Profile::with('user')->paginate(1);

        return view('profile.index', [
            'profile' => $profile
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profile.create-profile');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $profile_name = $request->get('full_name'); 
        if ($profile_name == null) {
            return redirect()->back();
        }

        $profile = new Profile();
        $profile->full_name = $request->get('full_name');
        $profile->gender = $request->get('gender');
        $profile->address = $request->get('address');
        $profile->phone_number = $request->get('phone_number');
        $profile->profile_picture = $request->get('profile_picture');
        $profile->data_of_birth = $request->get('data_of_birth');

        $profile->save();
        return redirect()->route('login');
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }

    public function uploadProfilePicture(Request $request, Profile $profile)
    {

        $request->validate([
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Add any relevant validation rules
        ]);

        $profile->profile_picture = $request->get('profile_picture');
        $profile->save();
    }
}
