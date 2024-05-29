<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Str;

class AccountController extends Controller
{
    public function account()
    {
        $user = Auth::user();
        return view('admin.content.account', compact('user'));
    }

    public function updatePhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = auth()->user();

        // Remove the old photo if exists
        if ($user->foto && file_exists(public_path('images/profile/' . $user->foto))) {
            unlink(public_path('images/profile/' . $user->foto));
        }

        // Store the new photo
        $file = $request->file('photo');
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images/profile'), $filename);

        // Update the user photo path
        $user->foto = $filename;
        $user->save();

        return redirect()->back()->with('success', 'Photo updated successfully.');
    }

    public function updateName(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $user = auth()->user();
        $user->name = $request->name;
        $user->save();

        return redirect()->back()->with('success', 'Name updated successfully.');
    }

    public function updateEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
        ]);

        $user = auth()->user();
        $user->email = $request->email;
        $user->save();

        return redirect()->back()->with('success', 'Email updated successfully.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Password updated successfully.');
    }

    public function deletePhoto(Request $request)
    {
        $user = auth()->user();

        // Remove the old photo if exists
        if ($user->foto && file_exists(public_path('images/profile/' . $user->foto))) {
            unlink(public_path('images/profile/' . $user->foto));
        }

        // Update the user photo path
        $user->foto = null;
        $user->save();

        return redirect()->back()->with('success', 'Photo deleted successfully.');
    }
}
