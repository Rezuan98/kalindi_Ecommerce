<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

  
    public function index()
    {
        return view('back-end.home.home');
    }

    public function allUsers(){

        $item = User::all();

       

        return view('back-end.users.users',compact('item'));
    }

    





    public function changeUserRole(Request $request)
{
    try {
        \Log::info('Role Update Request:', $request->all());
        
        $user = User::findOrFail($request->user_id);
        $user->role = $request->role;
        
        \Log::info('User Before Save:', [
            'user_id' => $user->id,
            'old_role' => $user->getOriginal('role'),
            'new_role' => $user->role
        ]);
        
        $saved = $user->save();
        
        \Log::info('Save Result:', ['saved' => $saved]);

        if($saved) {
            return response()->json([
                'success' => true,
                'message' => 'User role updated successfully',
                'new_role' => $user->role
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Failed to save user role'
        ]);

    } catch (\Exception $e) {
        \Log::error('Role Update Error:', [
            'message' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ]);
        
        return response()->json([
            'success' => false,
            'message' => 'Failed to update user role: ' . $e->getMessage()
        ]);
    }
}
}
