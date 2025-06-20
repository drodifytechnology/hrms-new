@extends('layouts.admin')

@section('page-title')
    {{ __('Internship') }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ url('employee') }}">{{ __('Internship') }}</a></li>
    <li class="breadcrumb-item">{{ __('Manage Internship') }}</li>
@endsection


@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="card ">
                        <div class="card-body employee-detail-body fulls-card">
                            <h5>{{ __('Intern Detail') }}</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="info text-sm">
                                        <strong class="font-bold">{{ __('Internship ID') }} : </strong>
                                        <span>{{ $internship->internship_id }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info text-sm font-style">
                                        <strong class="font-bold">{{ __('Name') }} :</strong>
                                        <span>{{ $internship->intern->name }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info text-sm font-style">
                                        <strong class="font-bold">{{ __('Email') }} :</strong>
                                        <span>{{ $internship->intern->email }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info text-sm font-style">
                                        <strong class="font-bold">{{ __('Mentor') }} :</strong>
                                        <span>{{ $internship->primaryMentor->name }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info text-sm font-style">
                                        <strong class="font-bold">{{ __('status') }} :</strong>
                                      @include('components.status-badge', ['status' => $internship->status])
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info text-sm font-style">
                                        <strong class="font-bold">{{ __('Internship Type') }} :</strong>
                                         <span>{{ $internship->internship_type }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info text-sm font-style">
                                        <strong class="font-bold">{{ __('Start Date') }} :</strong>
                                         <span>{{ $internship->start_date }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info text-sm font-style">
                                        <strong class="font-bold">{{ __('End Date') }} :</strong>
                                         <span>{{ $internship->end_date }}</span>
                                    </div>
                                </div>
                                  <div class="col-md-6">
                                    <div class="info text-sm">
                                        <strong class="font-bold">{{ __('flexible_duration') }} :</strong>
                                         <span>{{ ($internship->payment_frequency == 1) ?"true":"false" }}</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">

                    <div class="card ">
                        <div class="card-body employee-detail-body fulls-card emp-card">
                            <h5>{{ __('Bank Detail') }}</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="info text-sm">
                                        <strong class="font-bold">{{ __('Branch') }} : </strong>
                                        <span>{{ $internship->branch->name??'' }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info text-sm font-style">
                                        <strong class="font-bold">{{ __('Department') }} :</strong>
                                        <span>{{$internship->department->name??'' }}</span>
                                    </div>
                                </div>
                                 <div class="col-md-6">
                                    <div class="info text-sm font-style">
                                        <strong class="font-bold">{{ __('Account Number') }} :</strong>
                                        <span>{{ $internship->bank_account_no }}</span>
                                    </div>
                                </div>
                                 <div class="col-md-6">
                                    <div class="info text-sm">
                                        <strong class="font-bold">{{ __('Bank Identifier Code') }} :</strong>
                                        <span>{{ $internship->bank_ifsc }}</span>
                                    </div>
                                </div>

                                 <div class="col-md-6">
                                    <div class="info text-sm font-style">
                                        <strong class="font-bold">{{ __('Payment Type') }} :</strong>
                                        <span>{{ $internship->stipend_type }}</span>
                                    </div>
                                </div>
                                 <div class="col-md-6">
                                    <div class="info text-sm font-style">
                                        <strong class="font-bold">{{ __('payment frequency') }} :</strong>
                                        <span>{{$internship->payment_frequency}}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="info text-sm">
                                        <strong class="font-bold">{{ __('Amount') }} :</strong>
                                        <span>{{ $internship->stipend_amount }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-6">

                    <div class="card ">
                        <div class="card-body employee-detail-body fulls-card ">
                            <h5>{{ __('Document Detail') }}</h5>
                            <hr>
                            <div class="row">
                                @php
                                    $internshipdoc = $internship->documents;
                                    $logo = \App\Models\Utility::get_file('uploads/document');
                                @endphp
                                @if ($internshipdoc)
                                  
                                        <div class="col-md-6">
                                            <div class="info text-sm">
                                                <strong class="font-bold">{{ $internshipdoc->type }} : </strong>
                                                <span><a href="{{ !empty($internshipdoc->id) ? $logo . '/' . $internshipdoc->id : '' }}"
                                                        target="_blank">{{ !empty($internshipdoc->id) ? $internshipdoc->id : '' }}</a></span>
                                            </div>
                                        </div>
                                 
                                @else
                                    <div class="text-center">
                                        No Document Type Added.!
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection
