@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Proposals') }}</h1>
                </div>
                <!--
                    <div class="col-sm-6">
                        <a class="btn btn-primary float-right" href="{{ route('proposals.create') }}">
                            {{ __('Add New') }}
                        </a>
                    </div>
                    -->
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('proposals.table')

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
        //tabela todos -pode ficar em função
        var table =
            $('#proposals-table').DataTable({
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
                columnDefs: [{
                    targets: 0,
                    searchable: true,
                    visible: false
                }],
                buttons: [{
                        text: 'Todos',
                        className: 'active',
                        action: function() {
                            table.search('').draw();
                            table.button(1).active(false);
                            table.button(2).active(false);
                            table.button(3).active(false);
                            table.button(4).active(false);
                            this.active(true);
                        }
                    },
                    {
                        text: 'Aberto',
                        className: 'btn-approved',
                        action: function() {
                            table.search('Aberto').draw();
                            table.button(0).active(false);
                            table.button(2).active(false);
                            table.button(3).active(false);
                            table.button(4).active(false);
                            this.active(true);
                        }
                    },
                    {
                        text: 'Pendente',
                        className: 'btn-pending',
                        action: function() {
                            table.search('Pendente').draw();
                            table.button(0).active(false);
                            table.button(1).active(false);
                            table.button(3).active(false);
                            table.button(4).active(false);
                            this.active(true);
                        }
                    },
                    {
                        text: 'Perdido',
                        className: 'btn-lost',
                        action: function() {
                            table.search('Perdido').draw();
                            table.button(0).active(false);
                            table.button(1).active(false);
                            table.button(2).active(false);
                            table.button(4).active(false);
                            this.active(true);
                        }
                    },
                    {
                        text: 'Fechado',
                        className: 'btn-close',
                        action: function() {
                            table.search('Fechado').draw();
                            table.button(0).active(false);
                            table.button(1).active(false);
                            table.button(2).active(false);
                            table.button(3).active(false);
                            this.active(true);
                        }
                    }
                ]
            });

    </script>
@endpush
