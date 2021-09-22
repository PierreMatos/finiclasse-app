<!-- Tab panes -->
<div class="tab-content mt-2 container">

    <div class="tab-pane active" id="geral" role="tabpanel" aria-labelledby="geral-tab">
        <div class="row">

            <!-- Make Name Field -->
            <div class="form-group col-md-3">
                {!! Form::label('make_id', 'Marca') !!}
                <select name="make_id" class="input-group form-control custom-select selectedPost" id="make_id">
                    <option selected value="">--</option>
                    @foreach ($carData['makes'] as $make)
                        @if ($make->id == (isset($car->model->make->id) ? $car->model->make->id : ''))
                            <option selected value="{{ $car->model->make->id }}">{{ $car->model->make->name }}
                            </option>
                        @else
                            <option value="{{ $make->id }}">{{ $make->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <!-- Model Id Field -->
            @if (Route::is('cars.create'))
                <div class="form-group col-md-3">
                    {!! Form::label('model_id', 'Modelo') !!}
                    <select name="model_id" class="input-group form-control custom-select selectedPost" id="model_id"
                        disabled>
                    </select>
                </div>
            @else
                <div class="form-group col-md-3">
                    {!! Form::label('model_id', 'Modelo') !!}
                    <select name="model_id" class="input-group form-control custom-select selectedPost" id="model_id">
                        <option selected value="">--</option>
                        @foreach ($carData['models'] as $model)

                            @if ($model->make->id == $car->model->make->id)
                                
                                @if ($model->id == (isset($car->model->id) ? $car->model->id : ''))
                                <option selected value="{{ $car->model->id }}">{{ $car->model->name }}
                                    </option>
                                    @else
                                    <option value="{{ $model->id }}">{{ $model->name }}</option>
                                @endif
                                
                            @endif
                                
                        @endforeach
                    </select>
                </div>
            @endif

            <!-- Variant Field -->
            <div class="form-group col-md-3">
                {!! Form::label('variant', 'Variante') !!}
                {!! Form::text('variant', isset($car->variant) ? $car->variant : '', ['class' => 'form-control']) !!}
            </div>

            <!-- Motorization Field -->
            <div class="form-group col-md-3">
                {!! Form::label('motorization', 'Motorização') !!}
                {!! Form::number('motorization', isset($car->motorization) ? $car->motorization : '', ['class' => 'form-control']) !!}
            </div>

            <!-- Category Id Field -->
            <div class="form-group col-md-3">
                {!! Form::label('category_id', 'Categoria') !!}
                <select name="category_id" class="input-group form-control custom-select selectedPost">
                    @foreach ($carData['categories'] as $category)
                        @if ($category->id == isset($car->category->id) ? $car->category->id : ''))
                            <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <!-- Ano Field -->
            <div class="form-group col-md-3">
                {!! Form::label('registration', 'Ano') !!}
                {!! Form::text('registration', isset($car->registration) ? $car->registration : '', ['class' => 'form-control', 'id' => 'registration']) !!}
            </div>

            @push('page_scripts')
                <script type="text/javascript">
                    $('#registration').datetimepicker({
                        format: 'YYYY-MM-DD',
                        useCurrent: true,
                        sideBySide: true
                    })
                </script>
            @endpush

            <!-- Condition Id Field -->
            <div class="form-group col-md-3">
                {!! Form::label('condition_id', 'Condição') !!}
                <select name="condition_id" class="input-group form-control custom-select selectedPost">
                    @foreach ($carData['conditions'] as $condition)
                        @if ($condition->id == isset($car->condition->id))
                            <option selected value="{{ $condition->id }}">{{ $condition->name }}
                            </option>
                        @else
                            <option value="{{ $condition->id }}">{{ $condition->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <!-- State Id Field -->
            <div class="form-group col-md-3">
                {!! Form::label('state_id', 'Estado') !!}
                <select name="state_id" class="input-group form-control custom-select selectedPost">
                    @foreach ($carData['states'] as $state)
                        @if ($state->id == isset($car->state->id))
                            <option selected value="{{ $state->id }}">{{ $state->name }}</option>
                        @else
                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <!-- Komm Field -->
            <div class="form-group col-md-3">
                {!! Form::label('komm', 'Komm') !!}
                {!! Form::number('komm', isset($car->komm) ? $car->komm : '', ['class' => 'form-control']) !!}
            </div>

            <!-- Warranty Stand Field -->
            <div class="form-group col-md-3">
                {!! Form::label('warranty_stand', 'Garantia stand (meses)') !!}
                {!! Form::number('warranty_stand', isset($car->warranty_stand) ? $car->warranty_stand : '', ['class' => 'form-control']) !!}
            </div>

            <!-- Warranty Make Field -->
            <div class="form-group col-md-3">
                {!! Form::label('warranty_make', 'Garantia fabricante (meses)') !!}
                {!! Form::number('warranty_make', isset($car->warranty_make) ? $car->warranty_make : '', ['class' => 'form-control']) !!}
            </div>

            <!-- Plate Field -->
            <div class="form-group col-md-3">
                {!! Form::label('plate', 'Matrícula') !!}
                {!! Form::text('plate', isset($car->plate) ? $car->plate : '', ['class' => 'form-control']) !!}
            </div>

            <!-- Stand Id Field -->
            <div class="form-group col-md-3">
                {!! Form::label('stand_id', 'Stand') !!}
                <select name="stand_id" class="input-group form-control custom-select selectedPost">
                    @foreach ($carData['stands'] as $stand)
                        @if ($stand->id == isset($car->stand->id))
                            <option selected value="{{ $stand->id }}">{{ $stand->name }}</option>
                        @else
                            <option value="{{ $stand->id }}">{{ $stand->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <!-- Price Field -->
            <div class="form-group col-md-3">
                {!! Form::label('price', 'Preço') !!}
                {!! Form::number('price', isset($car->price) ? $car->price : '', ['class' => 'form-control']) !!}
            </div>

            <!-- Price Base Field -->
            <div class="form-group col-md-3">
                {!! Form::label('price_base', 'Preço base') !!}
                {!! Form::number('price_base', isset($car->price_base) ? $car->price_base : '', ['class' => 'form-control']) !!}
            </div>

            <!-- Price Campaign Field -->
            <div class="form-group col-md-3">
                {!! Form::label('price_campaign', 'Preço de campanha') !!}
                {!! Form::number('price_campaign', isset($car->price_campaign) ? $car->price_campaign : '', ['class' => 'form-control']) !!}
            </div>

            <!-- Order Date Field -->
            <div class="form-group col-md-3">
                {!! Form::label('order_date', 'Data de encomenda') !!}
                {!! Form::text('order_date', isset($car->order_date) ? $car->order_date : '', ['class' => 'form-control', 'id' => 'order_date']) !!}
            </div>

            @push('page_scripts')
                <script type="text/javascript">
                    $('#order_date').datetimepicker({
                        format: 'YYYY-MM-DD',
                        useCurrent: true,
                        sideBySide: true
                    })
                </script>
            @endpush

            <!-- Arrival Date Field -->
            <div class="form-group col-md-3">
                {!! Form::label('arrival_date', 'Data de chegada') !!}
                {!! Form::text('arrival_date', isset($car->arrival_date) ? $car->arrival_date : '', ['class' => 'form-control', 'id' => 'arrival_date']) !!}
            </div>

            @push('page_scripts')
                <script type="text/javascript">
                    $('#arrival_date').datetimepicker({
                        format: 'YYYY-MM-DD',
                        useCurrent: true,
                        sideBySide: true
                    })
                </script>
            @endpush

            <!-- Delivery Date Field -->
            <div class="form-group col-md-3">
                {!! Form::label('delivery_date', 'Data de entrega') !!}
                {!! Form::text('delivery_date', isset($car->delivery_date) ? $car->delivery_date : '', ['class' => 'form-control', 'id' => 'delivery_date']) !!}
            </div>

            @push('page_scripts')
                <script type="text/javascript">
                    $('#delivery_date').datetimepicker({
                        format: 'YYYY-MM-DD',
                        useCurrent: true,
                        sideBySide: true
                    })
                </script>
            @endpush

            <!-- Tradein Purchase Field -->
            <div class="form-group col-md-3">
                {!! Form::label('tradein_purchase', 'Preço compra de retoma') !!}
                {!! Form::number('tradein_purchase', isset($car->tradein_purchase) ? $car->tradein_purchase : '', ['class' => 'form-control']) !!}
            </div>

            <!-- Tradein Sale Field -->
            <div class="form-group col-md-3">
                {!! Form::label('tradein_sale', 'Preço venda de retoma') !!}
                {!! Form::number('tradein_sale', isset($car->tradein_sale) ? $car->tradein_sale : '', ['class' => 'form-control']) !!}
            </div>

            <!-- Price New Field -->
            <div class="form-group col-md-3">
                {!! Form::label('price_new', 'Preço em novo') !!}
                {!! Form::number('price_new', isset($car->price_new) ? $car->price_new : '', ['class' => 'form-control']) !!}
            </div>

            <div class="col-md-3">
                <!-- Tradein Field -->
                <div class="form-group">
                    <div class="form-check">
                        {!! Form::hidden('tradein', 0, ['class' => 'form-check-input']) !!}
                        {!! Form::checkbox('tradein', '1', isset($car->tradein) ? $car->tradein : '', ['class' => 'form-check-input']) !!}
                        {!! Form::label('tradein', 'Retoma', ['class' => 'form-check-label']) !!}
                    </div>
                </div>

                <!-- Felxible Field -->
                <div class="form-group">
                    <div class="form-check">
                        {!! Form::hidden('felxible', 0, ['class' => 'form-check-input']) !!}
                        {!! Form::checkbox('felxible', '1', isset($car->felxible) ? $car->felxible : '', ['class' => 'form-check-input']) !!}
                        {!! Form::label('felxible', 'Preço flexível', ['class' => 'form-check-label']) !!}
                    </div>
                </div>

                <!-- Deductible Field -->
                <div class="form-group">
                    <div class="form-check">
                        {!! Form::hidden('deductible', 0, ['class' => 'form-check-input']) !!}
                        {!! Form::checkbox('deductible', '1', isset($car->deductible) ? $car->deductible : '', ['class' => 'form-check-input']) !!}
                        {!! Form::label('deductible', 'IVA dedutível', ['class' => 'form-check-label']) !!}
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="tab-pane" id="caracteristicas" role="tabpanel" aria-labelledby="caracteristicas-tab">
        <div class="row">
            <!-- Fuel Id Field -->
            <div class="form-group col-md-3">
                {!! Form::label('fuel_id', 'Combustível') !!}
                <select name="fuel_id" class="input-group form-control custom-select selectedPost">
                    @foreach ($carData['fuels'] as $fuel)
                        @if ($fuel->id == isset($car->fuel->id))
                            <option selected value="{{ $fuel->id }}">{{ $fuel->name }}</option>
                        @else
                            <option value="{{ $fuel->id }}">{{ $fuel->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <!-- Power Field -->
            <div class="form-group col-md-3">
                {!! Form::label('power', 'Potência') !!}
                {!! Form::number('power', isset($car->power) ? $car->power : '', ['class' => 'form-control']) !!}
            </div>

            <!-- Km Field -->
            <div class="form-group col-md-3">
                {!! Form::label('km', 'Quilômetros') !!}
                {!! Form::number('km', isset($car->km) ? $car->km : '', ['class' => 'form-control']) !!}
            </div>

            <!-- Transmission Id Field -->
            <div class="form-group col-md-3">
                {!! Form::label('transmission_id', 'Transmissão') !!}
                <select name="transmission_id" class="input-group form-control custom-select selectedPost">
                    @foreach ($carData['transmissions'] as $transmission)
                        @if ($transmission->id == isset($car->transmission->id))
                            <option selected value="{{ $transmission->id }}">{{ $transmission->name }}
                            </option>
                        @else
                            <option value="{{ $transmission->id }}">{{ $transmission->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <!-- Color Interior Field -->
            <div class="form-group col-md-3">
                {!! Form::label('color_interior', 'Cor interior') !!}
                {!! Form::text('color_interior', isset($car->color_interior) ? $car->color_interior : '', ['class' => 'form-control']) !!}
            </div>

            <!-- Color Exterior Field -->
            <div class="form-group col-md-3">
                {!! Form::label('color_exterior', 'Cor exterior') !!}
                {!! Form::text('color_exterior', isset($car->color_exterior) ? $car->color_exterior : '', ['class' => 'form-control']) !!}
            </div>

            <!-- Metallic Color Field -->
            <div class="form-group col-md-3">
                <div class="form-check" style="margin-top: 37px;">
                    {!! Form::hidden('metallic_color', 0, ['class' => 'form-check-input']) !!}
                    {!! Form::checkbox('metallic_color', '1', isset($car->metallic_color) ? $car->metallic_color : '', ['class' => 'form-check-input']) !!}
                    {!! Form::label('metallic_color', 'Pintura metalizada', ['class' => 'form-check-label']) !!}
                </div>
            </div>

            <!-- Drive Id Field -->
            <div class="form-group col-md-3">
                {!! Form::label('drive_id', 'Tração') !!}
                <select name="drive_id" class="input-group form-control custom-select selectedPost">
                    @foreach ($carData['drives'] as $drive)
                        @if ($drive->id == isset($car->drive->id))
                            <option selected value="{{ $drive->id }}">{{ $drive->name }}</option>
                        @else
                            <option value="{{ $drive->id }}">{{ $drive->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <!-- Door Field -->
            <div class="form-group col-md-3">
                {!! Form::label('door', 'Portas') !!}
                {!! Form::number('door', isset($car->door) ? $car->door : '', ['class' => 'form-control']) !!}
            </div>

            <!-- Seats Field -->
            <div class="form-group col-md-3">
                {!! Form::label('seats', 'Lotação') !!}
                {!! Form::number('seats', isset($car->seats) ? $car->seats : '', ['class' => 'form-control']) !!}
            </div>

            <!-- Class Id Field -->
            <div class="form-group col-md-3">
                {!! Form::label('class_id', 'Classe') !!}
                <select name="class_id" class="input-group form-control custom-select selectedPost">
                    @foreach ($carData['classes'] as $class)
                        @if ($class->id == isset($car->class->id))
                            <option selected value="{{ $class->id }}">{{ $class->name }}</option>
                        @else
                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <!-- Autonomy Field -->
            <div class="form-group col-md-3">
                {!! Form::label('autonomy', 'Autonomia máxima') !!}
                {!! Form::number('autonomy', isset($car->autonomy) ? $car->autonomy : '', ['class' => 'form-control']) !!}
            </div>

            <!-- Emissions Field -->
            <div class="form-group col-md-3">
                {!! Form::label('emissions', 'Emissões CO2') !!}
                {!! Form::number('emissions', isset($car->emissions) ? $car->emissions : '', ['class' => 'form-control']) !!}
            </div>

            <!-- Iuc Field -->
            <div class="form-group col-md-3">
                {!! Form::label('iuc', 'IUC') !!}
                {!! Form::number('iuc', isset($car->iuc) ? $car->iuc : '', ['class' => 'form-control']) !!}
            </div>

            <!-- Registration Count Field -->
            <div class="form-group col-md-3">
                {!! Form::label('registration_count', 'Nº de registos') !!}
                {!! Form::number('registration_count', isset($car->registration_count) ? $car->registration_count : '', ['class' => 'form-control']) !!}
            </div>

            <!-- Consumption Field -->
            <div class="form-group col-md-3">
                {!! Form::label('consumption', 'Consumo combinado') !!}
                {!! Form::number('consumption', isset($car->consumption) ? $car->consumption : '', ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>

    <div class="tab-pane" id="equipamento" role="tabpanel" aria-labelledby="equipamento-tab">
        <div class="row">
            <!-- Equipment Field -->
            <div class="form-group col-12">
                {!! Form::label('equipment', 'Equipamento extra') !!}
                {!! Form::textarea('equipment', isset($car->equipment) ? $car->equipment : '', ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>

    <div class="tab-pane" id="fotos" role="tabpanel" aria-labelledby="fotos-tab">
        <div class="row">
            <!-- Fotos Field -->
            <div class="form-group col-sm-12">
                {!! Form::label('image', 'Fotos') !!}
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" id="image[]" name="image[]" multiple class="custom-file-input">
                        <label for="image[]" class="custom-file-label">Adicione uma ou mais fotos</label>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#make_id').on('change', function() {
            var idMake = this.value;
            $("#model_id").html('');
            $.ajax({
                url: "{{ url('fetch-models') }}",
                type: "POST",
                data: {
                    make_id: idMake,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#model_id').html('<option value="">--</option>');
                    $.each(result.models, function(key, value) {
                        $("#model_id").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                    $("#model_id").prop("disabled", false);
                }
            });
        });
    </script>
@endpush
