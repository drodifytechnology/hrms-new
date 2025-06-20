@extends('layouts.admin')

@section('page-title')
    {{ __('Manage Warning') }}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item">{{ __('Warning') }}</li>
@endsection

@section('action-button')
    @can('Create Warning')
        <a href="#" data-url="{{ route('warning.create') }}" data-ajax-popup="true"
            data-title="{{ __('Create New Warning') }}" data-size="lg" data-bs-toggle="tooltip" title=""
            class="btn btn-sm btn-primary" data-bs-original-title="{{ __('Create') }}">
            <i class="ti ti-plus"></i>
        </a>
    @endcan
@endsection

@section('content')
<div class="row">

    <div class="col-xl-12">
        <div class="card">
            <div class="card-header card-body table-border-style">
                {{-- <h5> </h5> --}}
                <div class="table-responsive">
                    <table class="table" id="pc-dt-simple">
                        <thead>
                            <tr>
                                <th>{{ __('Warning By') }}</th>
                                <th>{{ __('Warning To') }}</th>
                                <th>{{ __('Subject') }}</th>
                                <th>{{ __('Warning Date') }}</th>
                                <th>{{ __('Description') }}</th>
                                @if (Gate::check('Edit Warning') || Gate::check('Delete Warning'))
                                    <th width="200px">{{ __('Action') }}</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($warnings as $warning)
                                <tr>
                                    <td>{{ !empty($warning->WarningBy($warning->warning_by)) ? $warning->WarningBy($warning->warning_by)->name : '' }}
                                    </td>
                                    <td>{{ !empty($warning->warningTo($warning->warning_to)) ? $warning->warningTo($warning->warning_to)->name : '' }}
                                    </td>
                                    <td>{{ $warning->subject }}</td>
                                    <td>{{ \Auth::user()->dateFormat($warning->warning_date) }}</td>
                                    <td>{{ $warning->description }}</td>
                                    <td class="Action">
                                        @if (Gate::check('Edit Warning') || Gate::check('Delete Warning'))
                                                @can('Edit Warning')
                                                    <div class="action-btn me-2">
                                                        <a href="#" class="mx-3 btn btn-sm bg-info align-items-center" data-size="lg"
                                                            data-url="{{ URL::to('warning/' . $warning->id . '/edit') }}"
                                                            data-ajax-popup="true" data-size="md" data-bs-toggle="tooltip"
                                                            title="" data-title="{{ __('Edit Warning') }}"
                                                            data-bs-original-title="{{ __('Edit') }}">
                                                            <span class="text-white"><i class="ti ti-pencil"></i></span>
                                                        </a>
                                                    </div>
                                                @endcan

                                                @can('Delete Warning')
                                                    <div class="action-btn">
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['warning.destroy', $warning->id], 'id' => 'delete-form-' . $warning->id]) !!}
                                                        <a href="#"  data-bs-trigger="hover" class=" btn btn-sm bg-danger align-items-center bs-pass-para"
                                                            data-bs-toggle="tooltip" title="" data-bs-original-title="Delete"
                                                            aria-label="Delete"><span class="text-white"><i
                                                                class="ti ti-trash"></i></span></a>
                                                        </form>
                                                    </div>
                                                @endcan
                                        @endif
                                    </td>
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
@push('scripts')
<script>
    $(document).on('change', '#warning_by', function() {
        var employee_id = $(this).val();
        getEmployees(employee_id);
    });
    function getEmployees(employee_id) {
        var data = {
            "employee_id": employee_id,
            "_token": "{{ csrf_token() }}",
        }
        $.ajax({
            url: '{{ route('employee.getemployees') }}',
            method: 'POST',
            data: data,
            success: function(data) {
                 console.log(data);
                $('#warning_to').empty();
                $('#warning_to').append(
                    '<option value="" disabled>{{ __('Select Employee') }}</option>');
                $.each(data, function(key, value) {
                    $('#warning_to').append('<option value="' + key + '">' + value +
                        '</option>');
                });
                $('#warning_to').val('');
            }
        });
    }
</script>
@endpush
