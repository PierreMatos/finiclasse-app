@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Vendors') }}</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right" href="{{ route('users.create') }}">
                        {{ __('Add New') }}
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('vendors.table')

                <div class="card-footer clearfix float-right">
                    <div class="float-right">

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@push('page_scripts')
    <script>
        var table = $('#vendors-table').DataTable({
            language: {
                search: "_INPUT_",
                searchPlaceholder: "{{ __('Search...') }}",
                paginate: {
                    "previous": "{{ __('Previous') }}",
                    "next": "{{ __('Next') }}"
                },
                lengthMenu: "{{ __('Show') }} _MENU_ {{ __('Entries') }}",
            },
            autoFill: true,
            retrieve: true,
            responsive: true,
            order: [],
            "dom": '<"top" <"float-left"f><"float-right"B>>rt<"bottom mt-4"<"float-left"p><"float-right"l>><"clear">',

            buttons: []
        });
    </script>
@endpush
