<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssignmentController extends Controller
{
    public function index()
    {
        $assignments = Assignment::orderBy('due_date', 'asc')->get();
        return view('assignments.index', compact('assignments'));
    }

    public function create()
    {
        // Admin only usually
        return view('assignments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'required|date',
        ]);

        Assignment::create($request->all());

        return redirect()->route('assignments.index')->with('success', 'Assignment created successfully.');
    }

    public function show(Assignment $assignment)
    {
        $submission = Submission::where('assignment_id', $assignment->id)
            ->where('user_id', Auth::id())
            ->first();
        return view('assignments.show', compact('assignment', 'submission'));
    }

    public function submit(Request $request, Assignment $assignment)
    {
        $request->validate([
            'file' => 'required|file|max:10240', // 10MB
        ]);

        $path = $request->file('file')->store('submissions', 'public');

        Submission::updateOrCreate(
            ['assignment_id' => $assignment->id, 'user_id' => Auth::id()],
            [
                'file_path' => $path,
                'submitted_at' => now(),
            ]
        );

        return redirect()->route('assignments.show', $assignment)->with('success', 'Assignment submitted successfully.');
    }
}
