<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function selectCompany(Request $request)
    {
        $user = Auth::user();
        $user->setActiveCompany($request->company_id);

        return redirect()->route('dashboard')->with('success', 'Company selected successfully.');
    }
}

