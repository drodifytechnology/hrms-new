@extends('layouts.admin')

@section('page-title')
    {{ __('Task') }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('intern-asign-task') }}">{{ __('Recent Task') }}</a></li>
    <li class="breadcrumb-item">{{ __('task') }}</li>
@endsection


@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="card ">
                        <div class="card-body employee-detail-body fulls-card">
                            <h5>{{$task->title}}</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="info text-sm">
                                        <strong class="font-bold">{{ __('description') }} : </strong>
                                        <span>{{ $task->description }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info text-sm font-style">
                                        <strong class="font-bold">{{ __('deadline') }} :</strong>
                                        <span>{{ $task->deadline }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>

          
        </div>
    </div>
@endsection
