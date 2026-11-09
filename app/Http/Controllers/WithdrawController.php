<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class WithdrawController extends controller
{
   public function show()
   {
       return view('withdraw');
   }
   public function destroy(Request $request)
    {
        Auth::user()->withdraw();
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}

