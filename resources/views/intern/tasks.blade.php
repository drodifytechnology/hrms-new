
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
                        <h5>Assign task</h5>
                    </div>
                    <div class="card-body">
                         @include('components.task-list', ['tasks' => $tasks])
                    </div>
                </div>
            </div>
        </div>
        
@endsection