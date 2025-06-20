@extends('layouts.admin')

@section('page-title')
{{ __('Create Internship') }}
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a>
</li>
<li class="breadcrumb-item"><a href="{{ url('internships') }}">{{ __('Internship') }}</a>
</li>
<li class="breadcrumb-item">{{ __('Create Internship') }}</li>
@endsection

@push('css')
    <style>
        .cursor-pointer {
            cursor: pointer;
        }

    </style>
@endpush

@section('content')
<div class="row">
    <div class="">
        <div class="">
            
            {{ Form::open(['route' => ['internships.store'], 'method' => 'post', 'enctype' => 'multipart/form-data', 'class' => 'needs-validation', 'novalidate']) }}
                <div class="row">
                    <div class="col-md-6 ">
                        <div class="card em-card">
                            <div class="card-header">
                                <h5>{{ __('Intern Detail') }}</h5>
                            </div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="form-group col-md-6">
                                       <label for="intern_id">Intern</label>
                                        <select name="intern_id" class="form-control" required>
                                            @foreach($interns as $intern)
                                                <option value="{{ $intern->id }}">{{ $intern->name }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('intern_id'))
                                            <div class="error">{{ $errors->first('intern_id') }}</div>
                                        @endif
                                    </div>
                                   
                                    <div class="col-md-6">
                                        <div class="form-group">
                                             <label for="primary_mentor_id">Primary Mentor</label>
                                          <select name="primary_mentor_id" class="form-control" required>
                                                @foreach($interns as $intern)
                                                    <option value="{{ $intern->id }}">{{ $intern->name }}</option>
                                                @endforeach
                                            </select>
                                           @if($errors->has('primary_mentor_id'))
                                            <div class="error">{{ $errors->first('primary_mentor_id') }}</div>
                                        @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group ">
                                           <label for="secondary_mentor_id">Secondary Mentor (optional)</label>
                                            <select name="secondary_mentor_id" class="form-control">
                                                <option value="">-- None --</option>
                                                @foreach($interns as $intern)
                                                            <option value="{{ $intern->id }}">{{ $intern->name }}</option>
                                                    @endforeach
                                            </select>
                                            @if($errors->has('secondary_mentor_id'))
                                                    <div class="error">{{ $errors->first('secondary_mentor_id') }}</div>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Internship Type</label>
                                        <select name="internship_type" class="form-control" required>
                                            <option value="3-months">3-months</option>
                                            <option value="6-months">6-months</option>
                                            <option value="1-year">1-year</option>
                                        </select>
                                        @if($errors->has('internship_type'))
                                                <div class="error">{{ $errors->first('internship_type') }}</div>
                                            @endif
                                    </div>
                                </div>
                                <div class="mb-3 form-group col-md-6">
                                    <label>Start Date</label>
                                    <input type="date" name="start_date" class="form-control" min="{{ date('Y-m-d') }}" required>
                                      @if(@$errors->has('start_date'))
                                            <div class="error">{{ @$errors->first('start_date') }}</div>
                                    @endif
                                </div>
                                <div class="mb-3 form-group col-md-6">
                                    <label>End Date</label>
                                    <input type="date" name="end_date" class="form-control" min="{{ date('Y-m-d') }}" required>
                                      @if(@$errors->has('end_date'))
                                            <div class="error">{{ @$errors->first('end_date') }}</div>
                                    @endif
                                </div>

                                <div class="mb-3 form-group col-md-6">
                                    <label>Flexible Duration</label>
                                    <input type="checkbox" name="flexible_duration" value="1">
                                    
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    @if (\Auth::user()->type != 'employee')
                        <div class="col-md-6 ">
                            <div class="card em-card">
                                <div class="card-header">
                                    <h5>{{ __('Payment Detail') }}</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        @csrf
                                        <div class="form-group ">
                                            <label>Stipend Type</label><br>
                                            <input type="radio" name="stipend_type" value="Paid" required /> Paid
                                            <input type="radio" name="stipend_type" value="Unpaid" /> Unpaid
                                            <input type="radio" name="stipend_type" value="Performance-based" /> Performance-based
                                            @if($errors->has('stipend_type'))
                                                    <div class="error">{{ $errors->first('stipend_type') }}</div>
                                            @endif
                                        </div>
                                         
                                         <div class="form-group col-md-6">
                                            <label>Stipend Amount</label>
                                            <input type="number" name="stipend_amount" class="form-control" step="0.01" />
                                            @if($errors->has('stipend_amount'))
                                                    <div class="error">{{ $errors->first('stipend_amount') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Payment Frequency</label>
                                            <select name="payment_frequency" class="form-control">
                                                <option value="Monthly">Monthly</option>
                                                <option value="Bi-weekly">Bi-weekly</option>
                                            </select>
                                            @if($errors->has('payment_frequency'))
                                                    <div class="error">{{ $errors->first('payment_frequency') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Bank Details</label>
                                            <input type="text" name="bank_account_no" class="form-control" placeholder="Account Number">
                                            <input type="text" name="bank_ifsc" class="form-control mt-2" placeholder="IFSC Code">
                                            
                                        </div>
                                        <div class="form-group col-md-6">
                                            {{ Form::label('branch_id', __('Select Branch'), ['class' => 'form-label']) }}<x-required></x-required>
                                            {{ Form::select('branch', $branches, null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('select Branch')]) }}
                                        </div>
                                        <div class="form-group col-md-6">
                                            {{ Form::label('department_id', __('Select Department'), ['class' => 'form-label']) }}<x-required></x-required>
                                            {{ Form::select('department', $departments, null, ['class' => 'form-control', 'id' => 'department_id', 'required' => 'required', 'placeholder' => __('Select Department')]) }}
                                        </div>
                                       </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                @if (\Auth::user()->type != 'employee')
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="card em-card">
                                <div class="card-header">
                                    <h5>{{ __('Document') }}</h5>
                                </div>
                                <div class="card-body">
                                  
                                    
                                        <div class="row">
                                            <div class="form-group col-12 d-flex">
                                                <div class="mb-3 form-group col-md-6">
                                                        <label>Document Type</label>
                                                        <select name="type" required class="form-control" >
                                                            <option value="Aadhar">Aadhar</option>
                                                            <option value="Resume">Resume</option>
                                                            <option value="Certificate">Certificate</option>
                                                            <option value="Photo">Photo</option>
                                                            <option value="Bank Passbook">Bank Passbook</option>
                                                        </select>

                                                        <div class="choose-files ">
                                                            <label>Document</label>
                                                            
                                                            <label for="doc">
                                                            <div class=" bg-primary document cursor-pointer"> <i
                                                                    class="ti ti-upload "></i>{{ __('Choose file here') }}
                                                            </div>
                                                            <input type="file" name="document"
                                                                class="form-control file @error('document') is-invalid @enderror">
                                                        </label>
                                                        </div>
                                                        @if(@$errors->has('document'))
                                                                <div class="error">{{ @$errors->first('document  ') }}</div>
                                                        @endif
                                                    </div>
                                             
                                              </div>
                                        </div>
                              
                                </div>
                            </div>
                        </div>
                     
                    </div>
             
                @endif

                @if (\Auth::user()->type != 'employee')
                    <div class="float-end">
                        <a class="btn btn-secondary btn-submit"
                            href="{{ route('internships.index') }}">{{ __('Cancel') }}</a>
                        <button class="btn btn-primary btn-submit ms-1" type="submit"
                            id="submit">{{ __('Save') }}</button>
                    </div>
                @endif
                <div class="col-12">
                    {!! Form::close() !!}
                </div>
             </div>
        </div>
                    @endsection
                    @push('script-page')
                        <script>
                            $('input[type="file"]').change(function (e) {
                                var file = e.target.files[0].name;
                                var file_name = $(this).attr('data-filename');
                                $('.' + file_name).append(file);
                            });

                        </script>
                        <script type="text/javascript">
                            $(document).on('change', '#branch_id', function () {
                                var branch_id = $(this).val();
                                getDepartment(branch_id);
                            });

                            function getDepartment(branch_id) {
                                var data = {
                                    "branch_id": branch_id,
                                    "_token": "{{ csrf_token() }}",
                                }

                                $.ajax({
                                    url: '{{ route('monthly.getdepartment') }}',
                                    method: 'POST',
                                    data: data,
                                    success: function (data) {
                                        $('#department_id').empty();
                                        $('#department_id').append(
                                            '<option value="" disabled>{{ __('Select Department') }}</option>'
                                            );

                                        $.each(data, function (key, value) {
                                            $('#department_id').append('<option value="' + key +
                                                '">' + value +
                                                '</option>');
                                        });
                                        $('#department_id').val('');
                                    }
                                });
                            }

                        </script>
                    @endpush
