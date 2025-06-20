<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\InternDocument;
use App\Models\Internship;
use App\Models\InternTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InternController extends Controller
{
     public function dashboard() {
        $tasks = InternTask::whereHas('internship', function ($q) {
            $q->where('intern_id', Auth::id());
        })->get();
        return view('intern.dashboard', compact('tasks'));
    }

    public function tasks() {
        $employee = Employee::where('user_id' , Auth::id())->first();
            $tasks = InternTask::whereHas('internship', function ($q) use ($employee) {
                $q->where('intern_id',$employee->id);
            })->get();
        return view('intern.tasks', compact('tasks'));
    }

    public function documents() {
        $documents = InternDocument::whereHas('internship', function ($q) {
            $q->where('intern_id', Auth::id());
        })->get();
        return view('intern.documents', compact('documents'));
    }
      public function downloadCertificate() {
          $internship = Internship::where('id', Auth::id())
                                  ->where('status', 'Completed')
                                  ->firstOrFail();
  
          $pdf = Pdf::loadView('certificates.completion', compact('internship'));
          return $pdf->download('internship_certificate.pdf');
      }
}
