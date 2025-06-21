<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\InternEvaluation;
use App\Models\Internship;
use App\Models\InternTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class MentorController extends Controller
{
      public function dashboard() {
        $employee = Employee::where('user_id' , Auth::id())->first();
        
        $internships = Internship::where('primary_mentor_id', $employee->id)->get();
        return view('mentor.dashboard', compact('internships'));
    }
    public function taskList() {
         $employee = Employee::where('user_id' , Auth::id())->first();
        
        $internships = Internship::where('primary_mentor_id', $employee->id)->pluck('id');
        
        $tasks = InternTask::whereIn('internship_id' ,$internships )->get();
        return view('mentor.mentor-asign-task', compact('tasks'));
    }
    public function viewTask($id) {
         $id = Crypt::decrypt($id);
       
        $task = InternTask::find($id);
        return view('mentor.show-task', compact('task'));
    }
    public function intern() {
        $employee = Employee::where('user_id' , Auth::id())->first();
        
        $internships = Internship::where('primary_mentor_id', $employee->id)->get();
        return view('mentor.intern-list', compact('internships'));
    }

    public function evaluations() {
        $internships = Internship::where('primary_mentor_id', Auth::id())->get();
        return view('mentor.evaluations', compact('internships'));
    }

    public function submitEvaluation(Request $request) {
        $request->validate([
            'internship_id' => 'required|exists:internships,id',
            'score' => 'required|integer|min:0|max:100',
            'feedback' => 'required|string'
        ]);

        InternEvaluation::create([
            'internship_id' => $request->internship_id,
            'evaluator_id' => Auth::id(),
            'score' => $request->score,
            'feedback' => $request->feedback,
        ]);

        return back()->with('success', 'Evaluation submitted successfully.');
    }

    public function pendingEvaluations() {
        $pending = InternEvaluation::with(['internship.intern', 'task'])
            ->where('evaluator_id', Auth::id())
            ->where('status', 'Pending')
            ->get();
        return view('mentor.pending-evaluations', compact('pending'));
    }

    public function showEvaluationForm($id) {
        $evaluation = InternEvaluation::with(['internship.intern', 'task'])
            ->where('id', $id)
            ->where('evaluator_id', Auth::id())
            ->firstOrFail();
        return view('mentor.evaluations', compact('evaluation'));
    }

    public function submitEvaluationFeedback(Request $request, $id) {
        $evaluation = InternEvaluation::where('id', $id)
            ->where('evaluator_id', Auth::id())
            ->firstOrFail();

        $request->validate([
            'score' => 'required|integer|min:0|max:100',
            'feedback' => 'required|string|max:1000'
        ]);

        $evaluation->update([
            'score' => $request->score,
            'feedback' => $request->feedback,
            'status' => 'Submitted'
        ]);

        return redirect()->route('mentor.evaluations.pending')->with('success', 'Evaluation submitted successfully.');
    }
    public function submittedEvaluations() {
        $submitted = InternEvaluation::with(['internship.intern', 'task'])
            ->where('evaluator_id', Auth::id())
            ->where('status', 'Submitted')
            ->get();
        return view('mentor.submitted-evaluations', compact('submitted'));
    }
    public function assignTask(Request $request) {
        $request->validate([
            'internship_id' => 'required|exists:internships,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'deadline' => 'nullable|date',
            'attachment' => 'required',
            'priority' => 'required|unique:intern_tasks'
        ]);
        $file_path = '';
          if ($request->hasFile('attachment')) {
                $file_path = $request->file('attachment')->store('attachment', 'public');
          }

       $task = InternTask::create([
            'internship_id' => $request->internship_id,
            'title' => $request->title,
            'priority' => $request->priority,
            'description' => $request->description,
            'deadline' => $request->deadline,
            'url' => $request->url,
            'attachment' => $file_path
        ]);
        // Auto-insert new pending evaluation
        InternEvaluation::create([
            'internship_id' => $request->internship_id,
            'evaluator_id' => Auth::id(),
            'task_id' => $task->id,
            'status' => 'Pending'
        ]);

        return back()->with('success', 'Task assigned successfully.');
    }
}
