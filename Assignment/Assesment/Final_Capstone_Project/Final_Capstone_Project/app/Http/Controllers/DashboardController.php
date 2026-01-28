<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\Assignment;

class DashboardController extends Controller
{
    public function index()
    {
        $now = now();
        $upcomingExams = Exam::where('start_time', '>', $now)->orderBy('start_time')->get();
        $pastExams = Exam::where('start_time', '<=', $now)->orderBy('start_time', 'desc')->get();
        
        $pendingAssignments = Assignment::where('due_date', '>', $now)->get();

        return view('dashboard', compact('upcomingExams', 'pastExams', 'pendingAssignments'));
    }
}
