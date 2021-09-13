@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Clients') }}</h1>
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
                @include('users.table')

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
        var table = $('#clients-table').DataTable({
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
            "dom": '<"top" <"float-left"f><"float-right"B>>rt<"bottom mt-4"<"float-left"p><"float-right"l>><"clear">',

            buttons: [{
                    text: 'Todos',
                    action: function() {
                        table.search('').draw();
                        table.button(1).active(false);
                        table.button(2).active(false);
                        table.button(3).active(false);
                        table.button(4).active(false);
                        table.button(5).active(false);
                        this.active(true);
                    }
                },
                {
                    text: 'Particular',
                    action: function() {
                        table.search('particular').draw();
                        table.button(0).active(false);
                        table.button(2).active(false);
                        table.button(3).active(false);
                        table.button(4).active(false);
                        table.button(5).active(false);
                        this.active(true);
                    }
                },
                {
                    text: 'Empresa',
                    action: function() {
                        table.search('Empresa').draw();
                        table.button(0).active(false);
                        table.button(1).active(false);
                        table.button(3).active(false);
                        table.button(4).active(false);
                        table.button(5).active(false);
                        this.active(true);
                    }
                },
                {
                    text: 'Frotista',
                    action: function() {
                        table.search('Frotista').draw();
                        table.button(0).active(false);
                        table.button(1).active(false);
                        table.button(2).active(false);
                        table.button(4).active(false);
                        table.button(5).active(false);
                        this.active(true);
                    }
                },
                {
                    text: 'Grande Frotista',
                    action: function() {
                        table.search('Grande Frotista').draw();
                        table.button(0).active(false);
                        table.button(1).active(false);
                        table.button(2).active(false);
                        table.button(3).active(false);
                        table.button(5).active(false);
                        this.active(true);
                    }
                },
                {
                    text: 'ENI',
                    action: function() {
                        table.search('ENI').draw();
                        table.button(0).active(false);
                        table.button(1).active(false);
                        table.button(2).active(false);
                        table.button(3).active(false);
                        table.button(4).active(false);
                        this.active(true);
                    }
                }
            ]
        });
    </script>
@endpush
