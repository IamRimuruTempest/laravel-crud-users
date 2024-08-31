<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $photo = null;
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $sanitizedTitle = preg_replace('/[^A-Za-z0-9\-]/', '_', $request->username);
            $photo = $sanitizedTitle . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images/users', $photo);
        }

        User::create([
            'prefixname' => $request->prefixname,
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'lastname' => $request->lastname,
            'suffixname' => $request->suffixname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'photo' => $photo
        ]);

        return redirect('/users');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {

        return view('users.show', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $user = User::findOrFail($user->id);
        return view("users.edit",  ["user" => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $photo = $request->old_photo;
        if ($request->hasFile('photo')) {

            if (Storage::exists('public/images/users/' . $user->photo)) {
                Storage::delete('public/images/users/' . $user->photo);
            }

            $file = $request->file('photo');
            $sanitizedTitle = preg_replace('/[^A-Za-z0-9\-]/', '_', $request->username);
            $photo = $sanitizedTitle . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images/users', $photo);
        } else {
            $photo = $request->old_photo;
        }

        $user->update([
            'prefixname' => $request->prefixname,
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'lastname' => $request->lastname,
            'suffixname' => $request->suffixname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'photo' => $photo
        ]);

        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/users');
    }


    public function trashed()
    {
        $users = User::onlyTrashed()->paginate(10);
        return view('users.trashed', [
            'users' => $users
        ]);
    }

    public function restore_user($id)
    {
        $user = User::withTrashed()->find($id);

        // dd("force restore");
        $user->restore();
        return redirect('/users');
    }


    public function destroy_user($id)
    {
        $user = User::withTrashed()->find($id);

        if (Storage::exists('public/images/users/' . $user->photo)) {
            Storage::delete('public/images/users/' . $user->photo);
        }

        $user->forceDelete();
        return redirect('/users');
    }
}
