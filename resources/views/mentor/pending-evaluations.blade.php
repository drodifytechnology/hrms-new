
@extends('layouts.admin')

@section('page-title')
    {{ __('Interns') }}
@endsection
@php
    $setting = App\Models\Utility::settings();
    $icons = \App\Models\Utility::get_file('uploads/job/icons/');
@endphp
@section('content')
    <div class="row">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif


<!-- @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif -->

    
        <div class="row">
            <div class="col-md-12">
                <div class="card em-card">
                    <div class="card-header">
                        <h5>Pending Evaluations</h5>
                    </div>
                    <div class="card-body">
                       
                        <div class="table-responsive">
                            <table class="table" id="pc-dt-simple">
                                <thead>
                                    <tr>
                                        <th>Task Title</th>
                                        <th>Intern Name</th>
                                        <th>Submitted On</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pending as $eval)
                                    <tr>
                                        <td>{{ $eval->task->title ?? '-' }}</td>
                                        <td>{{ $eval->internship->intern->name }}</td>
                                        <td>{{ $eval->created_at->format('d-m-Y') }}</td>
                                        <td>@include('components.status-badge', ['status' => $eval->status])</td>
                                        <td><a href="{{ route('mentor.evaluations.edit', $eval->id) }}" class="btn btn-sm btn-primary">Evaluate</a></td>
                                    </tr>       
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                      
                </div>
            </div>
        </div>
     
        
@endsection
    