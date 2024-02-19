<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Helpers\FileHelpers;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('dashboard.user.profile.index', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'avatar' => 'nullable|image',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'age' => 'nullable|numeric',
            'year_of_expirience' => 'nullable|numeric',
            'bio' => 'nullable|string',
            'phone_number' => 'nullable|string',
            'street_address' => 'nullable|string',
            'city' => 'nullable|string',
            'zip_code' => 'nullable',
            'state' => 'nullable|string',
            'country' => 'nullable|string',
            'social_links' => 'nullable|url',
            'website' => 'nullable|url',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $avatarFileName = null;
        // Handle file upload
        if ($request->hasFile('avatar')) {
            $oldAvatar =  $user->avatar;

            if (file_exists($oldAvatar)) {
                try {
                    unlink($oldAvatar);
                } catch (Exception $e) {
                    return redirect()->back()->with('error_message', 'An error occurred while deleting the old avatar. Please try again later.');
                }
            }

            $avatarDirectory = 'users/avatar';
            Storage::disk('public')->makeDirectory($avatarDirectory);
            $avatarPath = FileHelpers::saveImageRequest($request->file('avatar'), $avatarDirectory);
            $avatarFileName = basename($avatarPath);
            $user->avatar = $avatarFileName;
        }

        $user->update([
            'avatar' => $avatarFileName,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'age' => $request->age,
            'year_of_experience' => $request->year_of_experience,
            'bio' => $request->bio,
            'website' => $request->website,
            'social_links' => $request->social_links,
            'phone_number' => $request->phone_number,
            'street_address' => $request->street_address,
            'city' => $request->city,
            'state' => $request->state,
            'zip_code' => $request->zip_code,
            'country' => $request->country,
        ]);


        return back()->with('success_message', 'Profile Updated successfully');
    }
}
