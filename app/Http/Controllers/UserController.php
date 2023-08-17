<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::get();
        return view('user.index', [
            'artists' => $user
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
        // $artists_name = $request->get('name');
        // if ($artists_name == null) {
        //     return redirect()->back();
        // }
        // $artist = new Artist();
        // $artist->name = $artists_name;
        // $artist->save();
        // return redirect()->route('artists.index');
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
}
