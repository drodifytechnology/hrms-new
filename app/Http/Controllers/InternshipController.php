<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Department;
use App\Models\Employee;
use App\Models\InternDocument;
use App\Models\Internship;
use App\Models\User;
use App\Models\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class InternshipController extends Controller
{
        public function index()
    {
        $internships = Internship::with(['intern', 'primaryMentor'])->get();
        // dd($internships) ;die;
        return view('internships.index', compact('internships'));
    }

    public function create()
    {
        $branches         = Branch::where('created_by', Auth::user()->creatorId())->get()->pluck('name', 'id');
        $departments      = Department::where('created_by', Auth::user()->creatorId())->get()->pluck('name', 'id');
        $interns = Employee::all();
        
        return view('internships.create', compact('interns' ,'branches' ,'departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'intern_id' => 'required|exists:users,id',
            'primary_mentor_id' => 'required|exists:employees,id',
            'internship_type' => 'required|in:3-months,6-months,1-year',
            'stipend_type' => 'required|in:Paid,Unpaid,Performance-based',
            'stipend_amount' => 'nullable|numeric',
            'payment_frequency' => 'nullable|in:Monthly,Bi-weekly',
            'branch' => 'required',
            'department' => 'required',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date',
            
        ]);
        

        $latestId = Internship::max('id') + 1;
        $internshipId = '#INT' . str_pad($latestId, 5, '0', STR_PAD_LEFT);

        $internship = Internship::create([
            'internship_id' => $internshipId,
            'intern_id' => $request->intern_id,
            'primary_mentor_id' => $request->primary_mentor_id,
            'secondary_mentor_id' => $request->secondary_mentor_id,
            'internship_type' => $request->internship_type,
            'stipend_type' => $request->stipend_type,
            'stipend_amount' => $request->stipend_amount,
            'payment_frequency' => $request->payment_frequency,
            'bank_account_no' => $request->bank_account_no,
            'bank_ifsc' => $request->bank_ifsc,
            'branch' => $request->branch,
            'department' => $request->department,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'flexible_duration' => $request->has('flexible_duration'),
            'status' => 'Active',
        ]);
            //  Employee::find($request->intern_id)->update(['position' , 'intern']);
            //  Employee::find( $request->primary_mentor_id  )->update(['position' , 'primary_mentor']);
            // if($request->secondary_mentor_id){
            //     Employee::find( $request->secondary_mentor_id  )->update(['position' , 'secondary_mentor']);
            // }
            if ($request->hasFile('document') && $request->file('document')->isValid()) {
                        $file_path = $request->file('document')->store('intern_document', 'public');
                    $employee_document = InternDocument::create(
                        [
                            'internship_id' => $internship['id'],
                            'type' => $request->type,   
                            'file_path' => $file_path,
                        ]
                    );
                    $employee_document->save();

            }
            //give permission to intern
            $role = DB::table('roles')->where('name', 'intern')->first();
            $intern_user_id = DB::table('employees')->where('id', $request->intern_id)->first();
            
            
            DB::insert('INSERT INTO model_has_roles (role_id , model_type , model_id ) VALUES (?, ?, ?)', [
                 $role->id,
                'App\Models\User',
                 $intern_user_id->user_id
            ]);      
            //give permission to mentor
            $role = DB::table('roles')->where('name', 'mentor')->first();
            $mentor = DB::table('employees')->where('id', $request->primary_mentor_id)->first();
            
            DB::insert('INSERT INTO model_has_roles (role_id , model_type , model_id ) VALUES (?, ?, ?)', [
                 $role->id,
                'App\Models\User',
                 $mentor->user_id
            ]);     
            User::find($intern_user_id->user_id)->update(['type' => 'intern']);
            User::find($mentor->user_id)->update(['type' => 'mentor']);

          
         return redirect()->route('internships.index')->with('success', 'Internship created successfully.');
    }
  public function update(Request $request, $id)
    {
        if (\Auth::user()->can('Edit Employee')) {

                $internship = Internship::findOrFail($id);

                $rules = [
                    'intern_id' => 'required|exists:users,id',
                    'primary_mentor_id' => 'required|exists:employees,id',
                    'internship_type' => 'required|in:3-months,6-months,1-year',
                    'stipend_type' => 'required|in:Paid,Unpaid,Performance-based',
                    'stipend_amount' => 'nullable|numeric',
                    'payment_frequency' => 'nullable|in:Monthly,Bi-weekly',
                    'branch' => 'required',
                    'department' => 'required',
                    'start_date' => 'required|date|after_or_equal:today',
                    'end_date' => 'required|date',
                ];

            
                $validator = \Validator::make(
                    $request->all(),
                    $rules
                );

                if ($validator->fails()) {
                    $messages = $validator->getMessageBag();

                    return redirect()->back()->with('error', $messages->first());
                }


                if ($request->document) {

                    $intern_document = InternDocument::where('internship_id', $internship->id)->first();

                    if ($request->hasFile('document') && $request->file('document')->isValid()) {
                                $file_path = $request->file('document')->store('intern_document', 'public');
                            }
                            
                             if (!empty($intern_document)) {
                                  if ($intern_document->file_path) {
                                        \File::delete(storage_path('uploads/intern_document/' . $intern_document->file_path));
                                    }
                                    $intern_document->file_path = $file_path;
                                    $intern_document->save();
                            
                                
                            } else{
                                $intern_document                 = new InternDocument();
                                $intern_document->internship_id    = $internship->id;
                                $intern_document->type    = $request->type;
                                $intern_document->document_value = $file_path;
                                $intern_document->save();
                            }
                    
                }

                $input    = $request->all();
                $internship->fill($input)->save();

                if (\Auth::user()->type != 'employee') {
                    // return redirect()->route('employee.index')->with('success', 'Employee successfully updated.');
                    return redirect()->route('internships.index')->with('success', __('Internship successfully updated.') );
                } else {
                    return redirect()->route('internships.show', \Illuminate\Support\Facades\Crypt::encrypt($internship->id))->with('success', __('Internship successfully updated.'));
                }
            
        } else {
           return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

        public function destroy($id)
        {
            if (Auth::user()->can('Delete Employee')) {
                $internship      = Internship::findOrFail($id);
                $document          = InternDocument::where('internship_id', $internship->id)->first();
                $dir = storage_path('uploads/intern_document/');
                   
                if($document){
                    $file_path = 'uploads/intern_document/' . $document->file_path;
                    $result = Utility::changeStorageLimit(\Auth::user()->creatorId(), $file_path);

                    unlink($dir . $document->file_path);
                    $document->delete();
                }
                $internship->delete();
            
                return redirect()->route('internships.index')->with('success', 'Internship successfully deleted.');
            } else {
                return redirect()->back()->with('error', __('Permission denied.'));
            }
            

        }
        public function edit($id)
        {
         
            $id = Crypt::decrypt($id);
          
            if (\Auth::user()->can('Edit Employee')) {
                $branches         = Branch::where('created_by', Auth::user()->creatorId())->get()->pluck('name', 'id');
                $departments      = Department::where('created_by', Auth::user()->creatorId())->get()->pluck('name', 'id');
                $interns = Employee::all();
                $internship     = Internship::find($id);
                

                return view('internships.edit', compact('internship', 'branches', 'departments' ,'interns'));
            } else {
                return redirect()->back()->with('error', __('Permission denied.'));
            }
        }
        
        public function show($id)
        {
            if (\Auth::user()->can('Show Employee')) {
                try {
                    $empId        = \Illuminate\Support\Facades\Crypt::decrypt($id);
                } catch (\RuntimeException $e) {
                    return redirect()->back()->with('error', __('Internship not avaliable'));
                }
                $documents    = InternDocument::where('internship_id', $id)->get();
                $branches     = Branch::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
               
                $departments  = Department::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
                
                $internship     = Internship::with('branch' , 'department')->where('id' , $empId)->first();
                
                
                return view('internships.show', compact('internship',  'branches', 'departments',  'documents' ));
            } else {
                return redirect()->back()->with('error', __('Permission denied.'));
            }
        }
        // MentorController@assignTask
        public function assignTask(Request $request, Internship $internship)
        {
            $request->validate([
                'title' => 'required',
                'deadline' => 'nullable|date'
            ]);

            $internship->tasks()->create([
                'title' => $request->title,
                'description' => $request->description,
                'deadline' => $request->deadline
            ]);

            return back()->with('success', 'Task assigned.');
        }

        // InternController@downloadCertificate
        public function downloadCertificate()
        {
            $internship = Internship::where('intern_id', auth()->id())->where('status', 'Completed')->firstOrFail();
            $pdf = PDF::loadView('certificates.completion', compact('internship'));
            return $pdf->download('completion_certificate.pdf');
        }

}
