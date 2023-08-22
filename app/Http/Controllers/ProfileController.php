<?php

namespace App\Http\Controllers;

use App\Models\EventRole;
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
        $user = auth()->user();
        $userId = $user->id;
        // $eventAttendees = EventAttendee::with(['user'])->where('user_id', $userId)->get();

        $profile = Profile::with('user')->where('user_id', $userId)->first();
        // dd($profile);

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
        // $profile_name = $request->get('full_name'); 
        // if ($profile_name == null) {
        //     return redirect()->back();
        // }          

        // $profile->save();
        return redirect()->route('profile.index');
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
        $eventRoles = EventRole::get();
        return view('profile.editProfile', ['profile' => $profile, 'eventRoles' => $eventRoles]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $profile)
    {
        // if($request->file('image')){
        //     $file= $request->file('image');
        //     $filename= date('YmdHi').$file->getClientOriginalName();
        //     $file-> move(public_path('public/images'), $filename);
        //     $data['image']= $filename;
        // }

        // if ($request->get('full_name')) {
        //     $profile->full_name = $request->get('full_name');
        // }
        // if ($request->get('gender')) {
        //     $profile->gender = $request->get('gender');
        // }
        // if ($request->get('address')) {
        //     $profile->address = $request->get('address');
        // }
        // if ($request->get('phone_number')) {
        //     $profile->phone_number = $request->get('phone_number');
        // }
        // if ($request->get('profile_picture')) {
        //     $profile->profile_picture = $request->get('profile_picture');
        // }
        // if ($request->get('data_of_birth')) {
        //     $profile->data_of_birth = $request->get('data_of_birth');
        // }            

        // $profile->save();

        // // return redirect()->route('profile.index', ['profile' => $profile]);
        // return redirect()->route('/');
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

        // $file-> move(public_path('public/Image'), $filename);
        if($request->file('image')){
            $profile->profile_picture= $request->file('image');
            $filename= date('YmdHi').$profile->profile_picture->getClientOriginalName();
            $profile->profile_picture-> move(public_path('public/image'), $filename);
            $data['image']= $filename;
        }

        // $profile->profile_picture = $request-> move(public_path('public/Image'), $profile_picture);;
        $profile->save();

        // return redirect()->route('profile', ['artist' => $artist]);
    }

    public function editProfile(Profile $profile)
    {
        // dd($profile);
        return view('profile.editProfile', ['profile' => $profile]);
    }

    public function updateProfile(Request $request, Profile $profile)
    {
        $user = auth()->user();

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/images'), $filename);
            $data['image']= $filename;
        }
        
        if ($request->input('fullName')) {
            $profile->full_name = $request->input('fullName');
            $user->name = $request->input('fullName');
        }
        if ($request->input('gender')) {
            $profile->gender = $request->input('gender');
        }
        if ($request->input('address')) {
            $profile->address = $request->input('address');
        }
        if ($request->input('phone_number')) {
            $profile->phone_number = $request->input('phone_number');
        }
        // if ($request->input('profile_picture')) {
        //     if ($request->hasFile('image')) {
        //         $image = $request->file('image');
        //         $destinationPath = public_path('images');
        //         $image->move($destinationPath, $filename);
        //         // public/public/images
        //         $profilePicture = "public/public/images/$filename";
        //         $profile->profile_picture = $profilePicture;
        //     }
        // }
        if ($request->input('data_of_birth')) {
            $profile->date_of_birth = $request->input('data_of_birth');
        }            
        
        $profile->save();
        // dd($profile->profile_picture);
        $user->save();

        return redirect()->route('profile.index', ['profile' => $profile]);
        // return redirect()->route('welcome');
    }
}
