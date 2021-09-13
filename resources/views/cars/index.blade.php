@extends('layouts.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Cars') }}</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right" href="{{ route('cars.create') }}">
                        {{ __('Add New') }}
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card box-none">
            <div class="card-body p-0">
                @include('cars.table')
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
        // SET DEFUALT STATE OF TABLES IN THE PAGE
        $('.table-responsive').hide();
        $('#Todos-table-div').show();

        //tabela todos -pode ficar em função
        var table =
            $('#Todos-table').DataTable({
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
                            this.active(true);
                        }
                    },
                    {
                        text: 'Mercedes',
                        action: function() {
                            table.search('Mercedes').draw();
                            table.button(0).active(false);
                            table.button(2).active(false);
                            this.active(true);
                        }
                    },
                    {
                        text: 'Seat',
                        action: function() {
                            table.search('Seat').draw();
                            table.button(0).active(false);
                            table.button(1).active(false);
                            this.active(true);
                        }
                    }
                ]
            });

        table.button(0).active(true);

        // TOGGLES OF DATATABLES
        $('.tab_button').on('click', function() {
            var id = this.id
            if (id == 'Todos') {
                $('.table-responsive').hide();
                $('#Todos-table-div').show();

            } else {
                var idDiv = '#' + id + '-table-div';
                var idTable = '#' + id + '-table';

                $('.table-responsive').hide();
                $(idDiv).show();

                var tableCondition = $(idTable).DataTable({
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
                    "dom": '<"top" <"float-left w-200"f><"float-right"B>>rt<"bottom mt-4"<"float-left"p><"float-right"l>><"clear">',

                    buttons: [{
                            text: 'Todos',
                            active: true,
                            action: function() {
                                tableCondition.search('').draw();
                                tableCondition.button(1).active(false);
                                tableCondition.button(2).active(false);
                                this.active(true);
                            }
                        },
                        {
                            text: 'Mercedes',
                            action: function() {
                                tableCondition.search('Mercedes').draw();
                                tableCondition.button(0).active(false);
                                tableCondition.button(2).active(false);
                                this.active(true);
                            }
                        },
                        {
                            text: 'Seat',
                            action: function() {
                                tableCondition.search('Seat').draw();
                                tableCondition.button(0).active(false);
                                tableCondition.button(1).active(false);
                                this.active(true);
                            }
                        }
                    ]
                });

            }
            tableCondition.button(0).active(true)
            tableCondition.button(1).active(false)
            tableCondition.button(2).active(false)
        });
    </script>
@endpush
