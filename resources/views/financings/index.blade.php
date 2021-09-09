@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Financings</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right"
                       href="{{ route('financings.create') }}">
                        {{__('Add New')}}
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
                @include('financings.table')

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
 var table =  $('#financings-table').DataTable( {
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search..."
        },
        
        autoFill: true,
        retrieve: true,
        responsive:true,
        "dom": '<"top" <"float-left w-200"f><"float-right"B>>rt<"bottom mt-4"<"float-left"p><"float-right"l>><"clear">',

        buttons: [
        {
            text: 'Todos',
            action: function () {
                table.search('').draw();
                table.button(1).active( false );
                table.button(2).active( false );
                this.active( true );
            }
        },
        {
            text: 'Mercedes',
            action: function () {
                table.search('Mercedes').draw();
                table.button(0).active( false );
                table.button(2).active( false );
                this.active( true );
            }
        },
        {
            text: 'Seat',
            action: function () {
                table.search('Seat').draw();
                table.button(0).active( false );
                table.button(1).active( false );
                this.active( true );
            }
        }
    ]
      
    } );
</script>
@endpush