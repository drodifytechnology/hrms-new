@extends('layouts.admin')

@section('page-title')
    {{ __('Manage Internship') }}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item">{{ __('Internship') }}</li>
@endsection

@section('action-button')
    <!-- <a href="#" data-url="{{ route('employee.file.import') }}" data-ajax-popup="true"
        data-title="{{ __('Import  Employee CSV File') }}" data-bs-toggle="tooltip" title=""
        class="btn btn-sm btn-primary me-1" data-bs-original-title="{{ __('Import') }}">
        <i class="ti ti-file"></i>
    </a>

    <a href="{{ route('employee.export') }}" data-bs-toggle="tooltip" data-bs-placement="top"
        data-bs-original-title="{{ __('Export') }}" class="btn btn-sm btn-primary me-1">
        <i class="ti ti-file-export"></i>
    </a> -->

    @can('Create Employee')
        <a href="{{ route('internships.create') }}" data-title="{{ __('Create New Employee') }}" data-bs-toggle="tooltip"
            title="" class="btn btn-sm btn-primary" data-bs-original-title="{{ __('Create') }}">
            <i class="ti ti-plus"></i>
        </a>
    @endcan
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header card-body table-border-style">
                    {{-- <h5></h5> --}}
                    <div class="table-responsive">
                        <table class="table" id="pc-dt-simple">
                            <thead>
                                <tr>
                                      
                                        <th>Intern ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Start</th>
                                        <th>Mentor</th>
                                       @if (Gate::check('Edit Employee') || Gate::check('Delete Employee'))
                                        <th width="200px">{{ __('Action') }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                   @foreach($internships as $internship)
                                    <tr>
                                        <td>
                                            @can('Show Employee')
                                                <a class="btn btn-outline-primary"
                                                    href="{{ route('internships.show', \Illuminate\Support\Facades\Crypt::encrypt($internship->id)) }}">{{ $internship->internship_id }}</a>
                                            @else
                                                <a href="#"
                                                    class="btn btn-outline-primary">{{ $employee->internship_id }}</a>
                                            @endcan
                                        </td>
                                    
                                        <td>{{ $internship->intern->name }}</td>
                                        <td>{{ $internship->intern->email }}</td>
                                        <td>@include('components.status-badge', ['status' => $internship->status])</td>
                                        <td>{{ $internship->start_date }}</td>
                                        <td>{{ $internship->primaryMentor->name }}</td>
                                       
                                        @if (Gate::check('Edit Employee') || Gate::check('Delete Employee'))
                                            <td class="Action">
                                                
                                                    @can('Edit Employee')
                                                        <div class="action-btn me-2">
                                                            <a href="{{ route('internships.edit', \Illuminate\Support\Facades\Crypt::encrypt($internship->id)) }}"
                                                                class="mx-3 btn btn-sm bg-info align-items-center"
                                                                data-bs-toggle="tooltip" title=""
                                                                data-bs-original-title="{{ __('Edit') }}">
                                                                <i class="ti ti-pencil text-white"></i>
                                                            </a>
                                                        </div>
                                                    @endcan

                                                    @can('Delete Employee')
                                                        <div class="action-btn meff-2">
                                                            {!! Form::open([
                                                                'method' => 'DELETE',
                                                                'route' => ['internships.destroy', $internship->id],
                                                                'id' => 'delete-form-' . $internship->id,
                                                            ]) !!}
                                                            <a href="#"
                                                            data-bs-trigger="hover"
                                                                class=" btn btn-sm bg-danger align-items-center bs-pass-para"
                                                                data-bs-toggle="tooltip" title=""
                                                                data-bs-original-title="Delete" aria-label="Delete"><span
                                                                    class="text-white"><i class="ti ti-trash"></i></span></a>
                                                            </form>
                                                        </div>
                                                    @endcan
                                               
                                              </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
