@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <!-- <h1>{{ __('Edit proposal') }}</h1> -->
                    <h1>{{ __('Edit Proposal Vendor') }} {{ isset($proposal->id) ? 'Nº: ' . $proposal->id : '' }}
                        {{ isset($proposal->vendor->name) ? 'de ' . $proposal->vendor->name : '' }}</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        @include('flash::message')

        <!-- Nav tabs -->
        <ul class="nav nav-tabs bg-nav" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="client-tab" data-toggle="tab" href="#clients" role="tab"
                    aria-controls="client" aria-selected="false">{{ __('Client') }}</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="cars-tab" data-toggle="tab" href="#cars" role="tab" aria-controls="cars"
                    aria-selected="false">{{ __('Car') }}</a>

            </li>
            <li class="nav-item" role="presentation">
                @if (isset($proposal->tradein))
                    @if ($proposal->tradein->state_id == 7)
                        <a class="nav-link badge-warning" id="tradein-tab" data-toggle="tab" href="#tradeins" role="tab"
                            aria-controls="tradein" aria-selected="false">{{ __('Tradein') }}</a>
                    @elseif($proposal->tradein->state_id == 8)
                        <a class="nav-link badge-success" id="tradein-tab" data-toggle="tab" href="#tradeins" role="tab"
                            aria-controls="tradein" aria-selected="false">{{ __('Tradein') }}</a>
                    @endif
                @else
                    <a class="nav-link disabled" id="tradein-tab" data-toggle="tab" href="#tradeins" role="tab"
                        aria-controls="tradein" aria-selected="false">{{ __('Tradein') }}</a>
                @endif
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="campaigns-tab" data-toggle="tab" href="#campaigns" role="tab"
                    aria-controls="campaigns" aria-selected="false">{{ __('Campaigns') }}</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="benefits-tab" data-toggle="tab" href="#benefits" role="tab"
                    aria-controls="benefits" aria-selected="false">{{ __('Benefits') }}</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="financings-tab" data-toggle="tab" href="#financings" role="tab"
                    aria-controls="financings" aria-selected="false">{{ __('Financing') }}</a>
            </li>
            @if (isset($proposal->initialBusinessStudy->business_study_authorization_id) && ($proposal->initialBusinessStudy->business_study_authorization_id == 2 || $proposal->initialBusinessStudy->business_study_authorization_id == 3))
                <li class="nav-item" role="presentation">
                    <a class="nav-link badge-warning" id="proposals-tab" data-toggle="tab" href="#proposals" role="tab"
                        aria-controls="proposals" aria-selected="false">{{ __('Proposal') }}</a>
                </li>
            @elseif (isset($proposal->initialBusinessStudy->business_study_authorization_id) && $proposal->initialBusinessStudy->business_study_authorization_id == 5)
                <li class="nav-item" role="presentation">
                    <a class="nav-link badge-danger" id="proposals-tab" data-toggle="tab" href="#proposals" role="tab"
                        aria-controls="proposals" aria-selected="false">{{ __('Proposal') }}</a>
                </li>
            @else
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="proposals-tab" data-toggle="tab" href="#proposals" role="tab"
                        aria-controls="proposals" aria-selected="false">{{ __('Proposal') }}</a>
                </li>
            @endif
        </ul>

        <div class="card">

            <!-- {!! Form::model($proposal, ['route' => ['proposals.update', $proposal->id], 'method' => 'patch', 'files' => true]) !!} -->

            <div class="card-body">
                <div class="row">
                    @include('proposals.fields')
                </div>
            </div>

            <!-- <div class="card-footer">
                                        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                                        <a href="{{ route('proposals.index') }}" class="btn btn-default">{{ __('Cancel') }}</a>
                                    </div>

                                     {!! Form::close() !!} -->

        </div>
    </div>
@endsection

@push('page_scripts')
    <script>
        $(".trade").click(function(e) {

            var price = $("input[name=tradein_purchase]").val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Access-Control-Allow-Origin': '*',
                    'Content-type': 'application/json',
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
                    // alert(result.success);
                    location.reload(true);
                },
                error: function(error) {
                    alert('Ação sobre a retoma falhou');
                }
            });

        });

        $(".businessAuth").click(function(e) {

            console.log(this.id);
            var auth = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('/') }}/businessAuthaction/" + this.id,
                type: "PATCH",
                data: {
                    value: auth,
                },
                dataType: 'json',
                success: function(result) {
                    // alert('Retoma editada com sucesso');
                    alert(result.success);
                    location.reload(true);
                },
                error: function(error) {
                    console.log("{{ url('/') }}/businessStudies/" + this.id);
                    alert('Ação sobre a retoma falhou');
                }
            });

        });
    </script>
@endpush