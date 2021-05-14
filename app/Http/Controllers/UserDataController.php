<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserData;
use Illuminate\Http\Request;

class UserDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserData  $userData
     * @return \Illuminate\Http\Response
     */
    public function show(UserData $userData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserData  $userData
     * @return \Illuminate\Http\Response
     */
    public function edit(UserData $userData)
    {
        return view('pages.edit-profile', ['userData' => $userData]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserData  $userData
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserData $userData)
    {
        if (isset($request->photo)){
            $newImage = time() . '-' . $request->name . '.'.
                $request->photo->extension();

            $request->photo->storeAs('public/img/users', $newImage);
        }

        $userData = UserData::find($userData->user_id);

        $userData->name = $request->name;
        $userData->nif = $request->nif;
        $userData->phone = $request->phone;
        $userData->user->email = $request->email;
        $userData->address = $request->address;
        $userData->postal_code = $request->postal_code;
        $userData->city = $request->city;
        isset($request->photo)?$userData->photo = $newImage : null;

        $userData->save();
        $userData->user->save();

        return redirect('profile/'.$userData->user_id.'/edit')->with('status', 'Profile edited successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserData  $userData
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserData $userData)
    {
        //
    }
}
