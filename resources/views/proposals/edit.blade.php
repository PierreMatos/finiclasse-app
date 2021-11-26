@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <!-- <h1>{{__('Edit proposal')}}</h1> -->
                    <h1>{{__('Edit Proposal Vendor')}} {{ isset($proposal->vendor->name) ? $proposal->vendor->name : '' }}</h1>
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
                    aria-selected="false">{{__('Client')}}</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="cars-tab" data-toggle="tab" href="#cars" role="tab" aria-controls="cars"
                
                    aria-selected="false">{{__('Car')}}</a>

            </li> 
            <li class="nav-item" role="presentation"> 

                @if (isset($proposal->tradein) && $proposal->tradein->state_id == 7)

                    <a class="nav-link badge-warning" id="tradein-tab" data-toggle="tab" href="#tradeins" role="tab"
                    aria-controls="tradein" aria-selected="false">{{__('Tradein')}}</a>
                
                @else 

                <a class="nav-link" id="tradein-tab" data-toggle="tab" href="#tradeins" role="tab"
                    aria-controls="tradein" aria-selected="false">{{__('Tradein')}}</a>

                @endif
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="financings-tab" data-toggle="tab" href="#financings" role="tab"
                    aria-controls="financings" aria-selected="false">{{__('Financing')}}</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="proposals-tab" data-toggle="tab" href="#proposals" role="tab"
                    aria-controls="proposals" aria-selected="false">{{__('Proposal')}}</a>
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


        

   
 
   
    $(".trade").click(function(e){
  
        // e.preventDefault();
   
        var price = $("input[name=tradein_purchase]").val();
        // var password = $("input[name=password]").val();
        // var email = $("input[name=email]").val();
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        $.ajax({
            url: "{{ route('tradeinaction') }}",
            type: "POST",
            data: {
                car: this.id,
                state: this.value,
                price: price
            },
            dataType: 'json',
            success: function(result) {
                // alert('Retoma editada com sucesso');
                alert(result.success);
                location.reload(true);
            },
            error: function(error) {
                alert('Ação sobre a retoma falhou');

                console.log(error);
        }
        });
        
        console.log(this.value);

  
    });

    </script>

@endpush

