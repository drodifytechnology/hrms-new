
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
                                        <th>Intern</th>
                                        <th>Score</th>
                                        <th>Feedback</th>
                                        <th>Submitted On</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($submitted as $eval)
                                    <tr>
                                        <td>{{ $eval->task->title ?? '-' }}</td>
                                        <td>{{ $eval->internship->intern->name }}</td>
                                        <td>{{ $eval->score }}</td>
                                        <td>{{ $eval->feedback }}</td>
                                        <td>{{ $eval->updated_at->format('d-m-Y') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                      
                </div>
            </div>
        </div>
     
        
@endsection
    