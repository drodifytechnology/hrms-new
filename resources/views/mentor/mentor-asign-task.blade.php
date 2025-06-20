
@extends('layouts.admin')

@section('page-title')
    {{ __('My Tasks') }}
@endsection
@php
    $setting = App\Models\Utility::settings();
    $icons = \App\Models\Utility::get_file('uploads/job/icons/');
@endphp
@section('content')
 <div class="row">
        <div class="col-xl-12">
            
                <div class="col-sm-12 col-md-12">
                    <div class="card ">
                        <div class="card-body employee-detail-body fulls-card">
                  
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                @if(count($tasks))
                                <div class="table-responsive">
                                            <table class="table" id="pc-dt-simple">
                                                <thead>
                                                    <tr>
                                                        <th>Task Title</th>
                                                        <th>Asign To</th>
                                                        <th>Deadline</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>    
                                                <tbody>
                                                @foreach($tasks as $task)
                                                    <tr>
                                                        <td>{{ $task->title }}</td>
                                                        <td>{{ $task->internship->intern->name }}</td>
                                                        <td>{{ $task->deadline ?? 'N/A' }}</td>
                                                        <td>@include('components.status-badge', ['status' => $task->status])</td>
                                                        <td>
                                                        <div class="action-btn me-2">
                                                                <a href="{{ route('task.view', \Illuminate\Support\Facades\Crypt::encrypt($task->id)) }}"
                                                                    class="mx-3 btn btn-sm bg-info align-items-center"
                                                                    data-bs-toggle="tooltip" title=""
                                                                    data-bs-original-title="{{ __('show') }}">
                                                                View Task
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                    @else
                                    <p>No tasks assigned yet.</p>
                                    @endif
                            </div></div></div></div>
        
@endsection