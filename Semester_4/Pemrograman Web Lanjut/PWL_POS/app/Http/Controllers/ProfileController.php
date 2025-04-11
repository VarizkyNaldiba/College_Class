<?php
 
 namespace App\Http\Controllers;
 
 use Illuminate\Http\Request;
 use Illuminate\Support\Facades\Storage;
 
 class ProfileController extends Controller
 {
     public function updateAvatar(Request $request)
     {
         $request->validate([
             'photo' => 'required|image|max:2048',
         ]);
 
         $user = auth()->user(); // Ensure $user is an instance of a model
         if (!$user instanceof \App\Models\UserModel) {
             return response()->json([
                 'success' => false,
                 'message' => 'Authenticated user is not a valid instance of the User model.',
             ], 400);
         }

 
         if ($user->photo && Storage::disk('public')->exists('profile/' . $user->photo)) {
             Storage::disk('public')->delete('profile/' . $user->photo);
         }
 
         $filename = uniqid() . '.' . $request->file('photo')->extension();
         $request->file('photo')->storeAs('profile', $filename, 'public');
 
         $user->foto_profil = $filename;
         $user->save();
 
         return response()->json([
             'success' => true,
             'message' => 'Foto berhasil diperbarui.',
             'photo_url' => asset('storage/profile/' . $filename),
         ]);
     }
 }