@extends('layouts.admin')

@section('page-title')
    {{ __('Manage Complaint') }}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item">{{ __('Complaint') }}</li>
@endsection

@section('action-button')
    @can('Create Complaint')
        <a href="#" data-url="{{ route('complaint.create') }}" data-ajax-popup="true"
            data-title="{{ __('Create New Complaint') }}" data-size="lg" data-bs-toggle="tooltip" title=""
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
                                    <th>{{ __('Complaint From') }}</th>
                                    <th>{{ __('Complaint Against') }}</th>
                                    <th>{{ __('Title') }}</th>
                                    <th>{{ __('Complaint Date') }}</th>
                                    <th>{{ __('Description') }}</th>
                                    @if (Gate::check('Edit Complaint') || Gate::check('Delete Complaint'))
                                        <th width="200px">{{ __('Action') }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($complaints as $complaint)
                                    <tr>
                                        <td>{{ !empty($complaint->complaintFrom($complaint->complaint_from)) ? $complaint->complaintFrom($complaint->complaint_from)->name : '' }}
                                        </td>
                                        <td>{{ !empty($complaint->complaintAgainst($complaint->complaint_against)) ? $complaint->complaintAgainst($complaint->complaint_against)->name : '' }}
                                        </td>
                                        <td>{{ $complaint->title }}</td>
                                        <td>{{ \Auth::user()->dateFormat($complaint->complaint_date) }}</td>
                                        <td>{{ $complaint->description }}</td>
                                        <td class="Action">
                                            @if (Gate::check('Edit Complaint') || Gate::check('Delete Complaint'))
                                                        @can('Edit Complaint')
                                                            <div class="action-btn me-2">
                                                                <a href="#" class="mx-3 btn btn-sm bg-info align-items-center"
                                                                    data-size="lg"
                                                                    data-url="{{ URL::to('complaint/' . $complaint->id . '/edit') }}"
                                                                    data-ajax-popup="true" data-size="md"
                                                                    data-bs-toggle="tooltip" title=""
                                                                    data-title="{{ __('Edit Complaint') }}"
                                                                    data-bs-original-title="{{ __('Edit') }}">
                                                                    <span class="text-white"><i class="ti ti-pencil"></i></span>
                                                                </a>
                                                            </div>
                                                        @endcan

                                                        @can('Delete Complaint')
                                                            <div class="action-btn">
                                                                {!! Form::open([
                                                                    'method' => 'DELETE',
                                                                    'route' => ['complaint.destroy', $complaint->id],
                                                                    'id' => 'delete-form-' . $complaint->id,
                                                                ]) !!}
                                                                <a href="#"
                                                                data-bs-trigger="hover"
                                                                    class="btn btn-sm bg-danger align-items-center bs-pass-para"
                                                                    data-bs-toggle="tooltip" title=""
                                                                    data-bs-original-title="Delete" aria-label="Delete"><span class="text-white"><i
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
    $(document).on('change', '#complaint_from', function() {
        var employee_id = $(this).val();
        getAccounts(employee_id);
    });
    function getAccounts(employee_id) {
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
                $('#complaint_against').empty();
                $('#complaint_against').append(
                    '<option value="" disabled>{{ __('Choose Employee') }}</option>');
                $.each(data, function(key, value) {
                    $('#complaint_against').append('<option value="' + key + '">' + value +
                        '</option>');
                });
                $('#complaint_against').val('');
            }
        });
    }
</script>
@endpush
