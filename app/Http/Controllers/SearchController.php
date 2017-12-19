<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $city = $request->input('search');
        return redirect()->to("/events/$city");
    }
}
