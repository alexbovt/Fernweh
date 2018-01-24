<?php

namespace App\Http\Controllers;

use App\Report;

class AdminController extends Controller
{
    public function getAdmin()
    {
        $user = session()->get('user');
        if ($user->profile_status !== 'admin') return redirect()->back();
        else {
            $reports = Report::getReports();
            return view('admin')->with(compact('reports'));
        }
    }

    public function acceptReport($id)
    {
        Report::acceptReport($id);
        return redirect()->back()->with('status', 'Report has been accepted!!');
    }

    public function deleteReport($id)
    {
        Report::deleteReport($id);
        return redirect()->back()->with('status', 'Report has been deleted!!');
    }
}