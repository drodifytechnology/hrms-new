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
    @if(session('status'))
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

                    <h2>Evaluate Task: {{ $evaluation->task->title ?? 'N/A' }}</h2>
                    @if($evaluation->status === 'Submitted')
                        <div class="alert alert-info">Evaluation already submitted.</div>
                    @else
                        <form method="POST"
                            action="{{ route('mentor.evaluations.submit', $evaluation->id) }}">
                            @csrf
                            <p><strong>Intern:</strong> {{ $evaluation->internship->intern->name }}</p>
                            <label>Score (0-100):</label>
                            <input type="number" name="score" class="form-control" value="{{ $evaluation->score }}"
                                required>
                            <label>Feedback:</label>
                            <textarea name="feedback" class="form-control" required>{{ $evaluation->feedback }}</textarea>
                            <button class="btn btn-success mt-2">Submit Evaluation</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
