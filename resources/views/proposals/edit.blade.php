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
        <div style="display: flex;">
            <ul class="nav nav-tabs bg-nav col-sm-10" id="myTab" role="tablist">
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
                    @if ($proposal->campaigns->isNotEmpty())
                        <a class="nav-link" id="campaigns-tab" data-toggle="tab" href="#campaigns" role="tab"
                            aria-controls="campaigns" aria-selected="false">{{ __('Campaigns') }}</a>
                    @else
                        <a class="nav-link disabled" id="campaigns-tab" data-toggle="tab" href="#campaigns" role="tab"
                            aria-controls="campaigns" aria-selected="false">{{ __('Campaigns') }}</a>
                    @endif
                </li>
                <li class="nav-item" role="presentation">
                    @if ($proposal->benefits->isNotEmpty())
                        <a class="nav-link" id="benefits-tab" data-toggle="tab" href="#benefits" role="tab"
                            aria-controls="benefits" aria-selected="false">{{ __('Supports') }}</a>
                    @else
                        <a class="nav-link disabled" id="benefits-tab" data-toggle="tab" href="#benefits" role="tab"
                            aria-controls="benefits" aria-selected="false">{{ __('Supports') }}</a>
                    @endif
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="financings-tab" data-toggle="tab" href="#financings" role="tab"
                        aria-controls="financings" aria-selected="false">{{ __('Financing') }}</a>
                </li>
                @if (isset($proposal->initialBusinessStudy->business_study_authorization_id) && $proposal->state_id === 3)
                    <li class="nav-item" role="presentation">
                        <a class="nav-link badge-warning" id="proposals-tab" data-toggle="tab" href="#proposals" role="tab"
                            aria-controls="proposals" aria-selected="false">{{ __('Proposal') }}</a>
                    </li>
                @else
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="proposals-tab" data-toggle="tab" href="#proposals" role="tab"
                            aria-controls="proposals" aria-selected="false">{{ __('Proposal') }}</a>
                    </li>
                @endif
            </ul>

        <div class="col-sm-2">
            @if ($proposal->state_id == 2)
                    <button type="submit"
                        id="{{ isset($proposal->id) ? $proposal->id : '' }}"
                        value="6" class="btn btn-success closeProposal" style="float: right;">Finalizar Proposta</button>
            @endif
        </div>
    </div>

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
                    alert('Ação sobre a estúdio de negócio falhou');
                }
            });
        });

        $(".closeProposal").click(function(e) {
            var closeValue = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('/') }}/closeProposal/" + this.id,
                type: "PATCH",
                data: {
                    value: closeValue,
                },
                dataType: 'json',
                success: function(result) {
                    alert(result.success);
                    window.location.href = "{{ route('proposals.index')}}";
                },
                error: function(error) {
                    console.log("{{ url('/') }}/closeProposal/" + this.id);
                    alert('A finalização da proposta falhou');
                }
            });
        });
    </script>
@endpush
