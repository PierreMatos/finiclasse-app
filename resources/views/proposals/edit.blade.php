@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <!-- <h1>Edit Proposal</h1> -->
                    <h1>{{ isset($proposal->vendor->name) ? $proposal->vendor->name : '' }}</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <!-- Nav tabs -->
        <ul class="nav nav-tabs bg-nav" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="client-tab" data-toggle="tab" href="#clients" role="tab" aria-controls="client"
                    aria-selected="false">Cliente</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="cars-tab" data-toggle="tab" href="#cars" role="tab" aria-controls="cars"
                    aria-selected="false">Viatura</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="tradein-tab" data-toggle="tab" href="#tradeins" role="tab"
                    aria-controls="tradein" aria-selected="false">Retoma</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="financings-tab" data-toggle="tab" href="#financings" role="tab"
                    aria-controls="financings" aria-selected="false">Financiamento</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="proposals-tab" data-toggle="tab" href="#proposals" role="tab"
                    aria-controls="proposals" aria-selected="false">Proposta</a>
            </li>
        </ul>

        <div class="card">

            {!! Form::model($proposal, ['route' => ['proposals.update', $proposal->id], 'method' => 'patch', 'files' => true]) !!}

            <div class="card-body">
                <div class="row">
                    @include('proposals.fields')
                </div>
            </div>

            <!-- <div class="card-footer">
                {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('proposals.index') }}" class="btn btn-default">{{ __('Cancel') }}</a>
            </div> -->

            {!! Form::close() !!}

        </div>
    </div>
@endsection

@push('page_scripts')

    <script>

        // $('.trade').on('click', function() {
        //     let price = document.getElementById("tradein_purchase").value;
        //     var url = "{{route('carstate', ['','',''])}}"+"/"+this.id+"/"+this.value+"/"+price;
        //     console.log(url);
        //     window.location.href=url;
        // });
        

   
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
   
    $(".trade").click(function(e){
  
        e.preventDefault();
   
        var price = $("input[name=tradein_purchase]").val();
        // var password = $("input[name=password]").val();
        // var email = $("input[name=email]").val();
   
        $.ajax({
            type: "post",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'), '_method': 'patch'},
           url:"{{ route('carstate') }}",
           data:{car:this.id, state:this.value, price:price},
           success:function(data){
              alert(data.success);
           }
        });
  
    });
    </script>

@endpush

