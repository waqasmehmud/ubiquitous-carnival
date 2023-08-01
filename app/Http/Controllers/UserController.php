<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->role->name === 'regular') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $users = User::all();
        return response()->json($users);
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();

        if ($user->role->name === 'admin' || ($user->role->name === 'manager' && $user->id === $id)) {
            $user = User::findOrFail($id);
            $user->update($request->all());
            return response()->json(['message' => 'User updated successfully']);
        }

        return response()->json(['message' => 'Unauthorized'], 403);
    }

    public function destroy($id)
    {
        $user = Auth::user();

        if ($user->role->name === 'admin' || ($user->role->name === 'manager' && $user->id !== $id)) {
            $user = User::findOrFail($id);
            $user->delete();
            return response()->json(['message' => 'User deleted successfully']);
        }

        return response()->json(['message' => 'Unauthorized'], 403);
    }
}
