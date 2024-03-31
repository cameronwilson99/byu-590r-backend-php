<?php

namespace App\Http\Controllers\API;

use App\Mail\VerifyEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class UserController extends BaseController
{
  public function getUser() {
    $authUser = Auth::user();
    $user = User::findOrFail($authUser->id);
    $user->avatar = $this->getS3Url($user->avatar);
    return $this->sendResponse($user, 'User');
  }

  public function uploadAvatar(Request $request) {
    $request->validate([
      'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
    ]);
    if ($request->hasFile('image')) {
      $authUser = Auth::user();
      $user = User::findOrFail($authUser->id);
      $extension = $request->file('image')->getClientOriginalExtension();
      $imageName = time() . '_' . $authUser->id . '.' . $extension;
      $path = $request->file('image')->storeAs('images', $imageName, 's3');
      Storage::disk('s3')->setVisibility($path, 'public');
      if (!$path) {
        return $this->sendError('Error uploading user avatar');
      }

      $user->avatar = $path;
      $user->save();
      $success['avatar'] = null;
      if(isset($user->avatar)) {
        $success['avatar'] = $this->getS3Url($path);
      }
      return $this->sendResponse($success, 'User avatar uploaded successfully');
    }
  }

  public function removeAvatar() {
    $authUser = Auth::user();
    $user = User::findOrFail($authUser->id);
    Storage::disk('s3')->delete($user->avatar);
    $user->avatar = null;
    $user->save();
    $success['avatar'] = null;
    return $this->sendResponse(null, 'User avatar removed successfully');
  }
}