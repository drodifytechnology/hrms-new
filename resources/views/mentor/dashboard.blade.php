
@extends('layouts.admin')

@section('page-title')
    {{ __('Dashboard') }}
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
                        <h5>Progress Overview</h5>
                        <div class="float-end">
                            <a href="{{ route('intern') }}" data-title="{{ __('Asign Ttask') }}" data-bs-toggle="tooltip"
                                title="" class="btn btn-sm btn-primary" data-bs-original-title="{{ __('Asign Ttask') }}">
                               {{ __('Asign Task') }}
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('components.progress-overview', ['internships' => $internships])
                        
                    </div>
                </div>
            </div>
        </div>
        
        
        @endsection