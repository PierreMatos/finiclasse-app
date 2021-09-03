@extends('layouts.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Cars</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right"
                       href="{{ route('cars.create') }}">
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
var table =
$('#cars-table').DataTable( {
    autoFill: true,
    dom: 'Bfrtip',
    buttons: [
        'copy', 'excel', 'pdf'
    ]
} );

$('.tab_button').on('click',function(){
    if(this.id == "all"){
        $('#cars-table').DataTable();
    }else{
        regExSearch = '^\\s' + this.id +'\\s*$';
        table.search(regExSearch, true, false).draw();
        // table.column(columnNo).search(regExSearch, true, false).draw();
    }
})


</script>
@endpush
