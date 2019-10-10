<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Support\Facades\Hash;
use \App\User;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display user profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('profile.show', ['profile' => \auth()->user()->with('posts')->first()]);
    }

    /**
     * Display user profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('profile.edit', ['profile' => \auth()->user()->with('posts')->first()]);
    }

    /**
     * Update the user profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileUpdateRequest $request)
    {
        $data = [
            'email' => $request->input('email'),
            'username' => $request->input('username'),
            'about' => $request->input('about')
        ];
        if($request->has('password')){
            $data['password'] = Hash::make($request->input('password'));
        }
        if($request->hasFile('avatar')){
            Storage::delete(str_replace('/storage/','',User::find(\auth()->id())->avatar));
            $data['avatar'] = $request->file('avatar')->store(date('Y').'/'.date('m').'/avatars');
        }
        User::where('id', \auth()->id())->update($data);
        return redirect()->route('profile');
    }

    /**
     * Remove the user profile (account).
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        User::destroy(\auth()->id());
        return redirect()->route('index');
    }
}
