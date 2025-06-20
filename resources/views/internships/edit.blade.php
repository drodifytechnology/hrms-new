@extends('layouts.admin')

@section('page-title')
    {{ __('Edit Internship') }}
@endsection

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a>
</li>
<li class="breadcrumb-item"><a href="{{ url('internships') }}">{{ __('Internship') }}</a>
</li>
    <li class="breadcrumb-item">{{ __('Edit Internship') }}</li>
@endsection

@section('content')
    <style>
        .cursor-pointer {
            cursor: pointer;
        }
    </style>

    <div class="row">
        <div class="">
            <div class="">

                    {{ Form::model($internship, ['route' => ['internships.update', $internship->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data', 'class' => 'needs-validation', 'novalidate']) }}
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
                                                    <option value="{{ $intern->id }}" @if($internship->intern->id == $intern->id) selected @endif>{{ $intern->name }}</option>
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
                                                        <option value="{{ $intern->id }}" @if($internship->primary_mentor_id == $intern->id) selected @endif>{{ $intern->name }}</option>
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
                                                                <option value="{{ $intern->id }}" @if($internship->secondary_mentor_id == $intern->id) selected @endif>{{ $intern->name }}</option>
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
                                                <option value="3-months" @if($internship->internship_type == '3-months') selected @endif >3-months</option>
                                                <option value="6-months" @if($internship->internship_type == '6-months') selected @endif >6-months</option>
                                                <option value="1-year" @if($internship->internship_type == '1-year') selected @endif >1-year</option>
                                            </select>
                                            @if($errors->has('internship_type'))
                                                    <div class="error">{{ $errors->first('internship_type') }}</div>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="mb-3 form-group col-md-6">
                                        <label>Start Date</label>
                                        <input type="date" value="{{$internship->start_date}}" name="start_date" class="form-control" min="{{ date('Y-m-d') }}" required>
                                        @if(@$errors->has('start_date'))
                                                <div class="error">{{ @$errors->first('start_date') }}</div>
                                        @endif
                                    </div>
                                      <div class="mb-3 form-group col-md-6">
                                            <label>End Date</label>
                                            <input type="date" name="end_date" value="{{$internship->end_date}}" class="form-control" min="{{ date('Y-m-d') }}" required>
                                            @if(@$errors->has('end_date'))
                                                    <div class="error">{{ @$errors->first('end_date') }}</div>
                                            @endif
                                        </div>

                                    <div class="mb-3 form-group col-md-6">
                                        <label>Flexible Duration</label>
                                        <input type="checkbox" @if($internship->flexible_duration) checked @endif name="flexible_duration" value="1">
                                        
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
                                                <input type="radio" name="stipend_type"  @if($internship->stipend_type == 'Paid') checked @endif value="Paid" required /> Paid
                                                <input type="radio" name="stipend_type" @if($internship->stipend_type == 'Unpaid') checked @endif  value="Unpaid" /> Unpaid
                                                <input type="radio" name="stipend_type" @if($internship->stipend_type == 'Performance-based') checked @endif  value="Performance-based" /> Performance-based
                                                @if($errors->has('stipend_type'))
                                                        <div class="error">{{ $errors->first('stipend_type') }}</div>
                                                @endif
                                            </div>
                                            
                                            <div class="form-group col-md-6">
                                                <label>Stipend Amount</label>
                                                <input type="number" name="stipend_amount" value="{{$internship->stipend_amount}}" class="form-control" step="0.01" />
                                                @if($errors->has('stipend_amount'))
                                                        <div class="error">{{ $errors->first('stipend_amount') }}</div>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Payment Frequency</label>
                                                <select name="payment_frequency" class="form-control">
                                                    <option value="Monthly" @if($internship->payment_frequency == "Monthly" ) selected @endif >Monthly</option>
                                                    <option value="Bi-weekly" @if($internship->payment_frequency == "Bi-weekly" ) selected @endif >Bi-weekly</option>
                                                </select>
                                                @if($errors->has('payment_frequency'))
                                                        <div class="error">{{ $errors->first('payment_frequency') }}</div>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Bank Details</label>
                                                <input type="text" name="bank_account_no"  value="{{$internship->bank_account_no }}" class="form-control" placeholder="Account Number">
                                                <input type="text" name="bank_ifsc" value="{{$internship->bank_ifsc }}"  class="form-control mt-2" placeholder="IFSC Code">
                                                
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
                                        @php
                                            $employeedoc = $internship
                                                ->documents()
                                                ->pluck('file_path', __('id'));
                                        @endphp

                                        
                                            <div class="row">
                                                <div class="form-group col-12 d-flex">
                                                    <div class="mb-1 form-group col-md-6">
                                                            <label>Document Type</label>
                                                            <select name="type" required class="form-control" >
                                                                <option @if($internship->documents->type??'' == 'Aadhar') selected @endif  value="Aadhar">Aadhar</option>
                                                                <option @if($internship->documents->type??'' == 'Resume') selected @endif  value="Resume">Resume</option>
                                                                <option @if($internship->documents->type??'' == 'Certificate') selected @endif  value="Certificate">Certificate</option>
                                                                <option @if($internship->documents->type??'' == 'Photo') selected @endif  value="Photo">Photo</option>
                                                                <option @if($internship->documents->type??'' == 'Bank Passbook') selected @endif  value="Bank Passbook">Bank Passbook</option>
                                                            </select>
                                                        <div class="choose-files ">
                                                            <label>Document</label>
                                                            
                                                            <label for="doc">
                                                                <div class=" bg-primary document cursor-pointer"> <i
                                                                        class="ti ti-upload "></i>{{ __('Choose file here') }}
                                                                </div>
                                                                <input type="file" id="doc" name="document"
                                                                    class="form-control file @error('document') is-invalid @enderror">
                                                            </label>
                                                        </div>
                                                            @if(@$errors->has('document'))
                                                                    <div class="error">{{ @$errors->first('document  ') }}</div>
                                                            @endif
                                                        </div>
                                                
                                                            <img id="blah"
                                                                src="{{ isset($employeedoc->id) && !empty($employeedoc->id) ? $logo . '/' . $employeedoc->id : '' }}"
                                                                width="50%" />


                                                        @if (!empty($employeedoc->id))
                                                            <span class="text-xs-1"><a
                                                                    href="{{ !empty($employeedoc->id) ? asset(Storage::url('uploads/document')) . '/' . $employeedoc->id : '' }}"
                                                                    target="_blank"></a>
                                                            </span>
                                                        @endif
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
                                id="submit">{{ __('Update') }}</button>
                        </div>
                    @endif
                    <div class="col-12">
                        {!! Form::close() !!}
                    </div>
            </div>
        </div>
    </div>
@endsection

@push('script-page')
    <script type="text/javascript">
        $(document).on('change', '#branch_id', function() {
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
                success: function(data) {
                    $('#department_id').empty();
                    $('#department_id').append(
                        '<option value="" disabled>{{ __('Select Department') }}</option>');

                    $.each(data, function(key, value) {
                        $('#department_id').append('<option value="' + key + '">' + value +
                            '</option>');
                    });
                    $('#department_id').val('');
                }
            });
        }

        $(document).on('change', 'select[name=department_id]', function() {
            var department_id = $(this).val();
            getDesignation(department_id);
        });

        function getDesignation(did) {
            $.ajax({
                url: '{{ route('employee.json') }}',
                type: 'POST',
                data: {
                    "department_id": did,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(data) {
                    $('#designation_id').empty();
                    $('#designation_id').append(
                        '<option value="">{{ __('Select Designation') }}</option>');
                    $.each(data, function(key, value) {
                        $('#designation_id').append('<option value="' + key + '">' + value +
                            '</option>');
                    });
                }
            });
        }
    </script>
@endpush
