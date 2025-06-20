
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
            <div class="col-md-12">
                <div class="card em-card">
                    <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                     <h2>Welcome, {{ Auth::user()->name }}</h2>
                    <a href="{{ route('intern.certificate') }}" class="btn btn-success mt-3">Download Certificate</a>
                </div>
            </div>
    </div>
</div>
@endsection