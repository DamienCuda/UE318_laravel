<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // des variables
    protected $les_membres;
    
    public function __construct( User $les_membres)
    {
    $this->les_membres = $les_membres;
    }


    public function verifyUser(Request $request)
    {
        $userId = $request->input('userId');
        $user = $this->les_membres->findOrFail($userId);
        $user->isVerified = true;
        $user->save();
        $unverifiedUsers = $this->les_membres->where('isVerified', false)->get();
        return view('pages_site/validation', compact('unverifiedUsers'));
    }
}
