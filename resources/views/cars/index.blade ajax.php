@extends('layouts.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Cars</h1>
            </div>
            <div class="col-sm-6">
                <a class="btn btn-primary float-right" href="{{ route('cars.create') }}">
                    Add New
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
            responsive: true,
            retrieve: true,
            order: [],
            processing: true,
            serverSide: true,
            ajax: "{{route('getcars')}}",
            columns: [{
                    data: 'id'
                },
                {
                    data: 'model'
                },
                {
                    data: 'variant'
                },
                {
                    data: 'state'
                },
                //  { data: 'condition' },
                //  { data: 'komm' },
                {
                    data: 'plate'
                },
                {
                    data: 'stand'
                },
                {
                    data: 'price'
                },
                {
                    data: 'action'
                },
            ],
            "dom": '<"top float-left"f><"float-right"B>rt<"bottom"<"float-left"p><"float-right"l>><"clear">',
            buttons: [{
                    text: 'Todos',
                    action: function() {
                        table.search('').draw();
                    }
                },
                {
                    text: 'Mercedes',
                    action: function() {
                        table.search('Mercedes').draw();
                    }
                },
                {
                    text: 'Seat',
                    action: function() {
                        table.search('Seat').draw();
                    }
                }
            ]
        });

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

            $(idTable).DataTable({
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search..."
                },
                autoFill: true,
                retrieve: true,
                order: [],
                "dom": '<"top float-left"f><"float-right"B>rt<"bottom"<"float-left"p><"float-right"l>><"clear">',
            });

        }
    })
</script>
@endpush