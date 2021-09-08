<!-- Nav tabs -->
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="geral-tab" data-toggle="tab" href="#geral" role="tab" aria-controls="geral" aria-selected="true">Geral</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="caracteristicas-tab" data-toggle="tab" href="#caracteristicas" role="tab" aria-controls="caracteristicas" aria-selected="false">Caracteristicas</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="equipamento-tab" data-toggle="tab" href="#equipamento" role="tab" aria-controls="equipamento" aria-selected="false">Equipamento</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="fotos-tab" data-toggle="tab" href="#fotos" role="tab" aria-controls="fotos" aria-selected="false">Fotos</a>
  </li>
</ul>

<!-- Tab panes -->
<div class="tab-content mt-2 container">

    <div class="tab-pane active" id="geral" role="tabpanel" aria-labelledby="geral-tab">
        <div class="row">
            
            <!-- Make Name Field -->
            <div class="form-group col-md-3">
                {!! Form::label('make_id', 'Marca:') !!}
                    <select name="make" class="input-group form-control custom-select selectedPost">
                    @empty($makes)
                            <option value="{{ $car->id }}">{{ $car->name }}</option>
                        @else
                            <option disabled selected value=""></option>
                            @foreach ($makes as $make)
                                <option value="{{ $make->id }}">{{ $make->name }}</option>
                            @endforeach
                        @endempty
                    </select>
                <!-- {!! Form::number('make_id', null, ['class' => 'form-control']) !!} -->
            </div>

            <!-- Model Id Field -->
            <div class="form-group col-md-3">
                {!! Form::label('model_id', 'Modelo:') !!}
                    <select name="model_id" class="input-group form-control custom-select selectedPost">
                            @foreach ($models as $model)
                                    <!--condition make selecionado anteriormente-->
                                @if($model->id == $carModel->id)
                                    <option selected value="{{ $model->id }}">{{ $model->name }}</option>
                                @else
                                    <option  value="{{ $car->model->id }}">{{ $model->name }}</option>
                                @endif
                            @endforeach
                    </select>
                <!-- {!! Form::number('model_id', null, ['class' => 'form-control']) !!} -->
            </div>

            <!-- Variant Field -->
            <div class="form-group col-md-3">
                {!! Form::label('variant', 'Variante:') !!}
                {!! Form::text('variant', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Motorization Field -->
            <div class="form-group col-md-3">
                {!! Form::label('motorization', 'Motorização:') !!}
                {!! Form::number('motorization', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Category Id Field -->
            <div class="form-group col-md-3">
                {!! Form::label('category_id', 'Categoria:') !!}
                <select name="category_id" class="input-group form-control custom-select selectedPost">
                            <option disabled selected value=""></option>
                            @foreach ($carCategories as $carCategory)
                                <option value="{{ $carCategory->id }}">{{ $carCategory->name }}</option>
                            @endforeach
                    </select>
            </div>

            <!-- Registration Field -->
            <div class="form-group col-md-3">
                {!! Form::label('registration', 'Registo:') !!}
                {!! Form::text('registration', null, ['class' => 'form-control','id'=>'registration']) !!}
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
                {!! Form::label('condition_id', 'Condição:') !!}
                <select name="condition_id" class="input-group form-control custom-select selectedPost">
                            <option disabled selected value=""></option>
                            @foreach ($carConditions as $carCondition)
                                <option value="{{ $carCondition->id }}">{{ $carCondition->name }}</option>
                            @endforeach
                    </select>
            </div>

            <!-- State Id Field -->
            <div class="form-group col-md-3">
                {!! Form::label('state_id', 'Estado:') !!}
                <select name="state_id" class="input-group form-control custom-select selectedPost">
                            <option disabled selected value=""></option>
                            @foreach ($carStates as $carState)
                                <option value="{{ $carState->id }}">{{ $carState->name }}</option>
                            @endforeach
                    </select>
            </div>

            <!-- Komm Field -->
            <div class="form-group col-md-3">
                {!! Form::label('komm', 'Komm:') !!}
                {!! Form::number('komm', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Warranty Stand Field -->
            <div class="form-group col-md-3">
                {!! Form::label('warranty_stand', 'Warranty Stand:') !!}
                {!! Form::number('warranty_stand', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Warranty Make Field -->
            <div class="form-group col-md-3">
                {!! Form::label('warranty_make', 'Warranty Make:') !!}
                {!! Form::number('warranty_make', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Plate Field -->
            <div class="form-group col-md-3">
                {!! Form::label('plate', 'Plate:') !!}
                {!! Form::text('plate', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Stand Id Field -->
            <div class="form-group col-md-3">
                {!! Form::label('stand_id', 'Stand:') !!}
                <select name="stand_id" class="input-group form-control custom-select selectedPost">
                            <option disabled selected value=""></option>
                            @foreach ($stands as $stand)
                                <option value="{{ $stand->id }}">{{ $stand->name }}</option>
                            @endforeach
                    </select>
            </div>

            <!-- Price Field -->
            <div class="form-group col-md-3">
                {!! Form::label('price', 'Price:') !!}
                {!! Form::number('price', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Price Base Field -->
            <div class="form-group col-md-3">
                {!! Form::label('price_base', 'Price Base:') !!}
                {!! Form::number('price_base', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Price New Field -->
            <div class="form-group col-md-3">
                {!! Form::label('price_new', 'Price New:') !!}
                {!! Form::number('price_new', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Price Campaign Field -->
            <div class="form-group col-md-3">
                {!! Form::label('price_campaign', 'Price Campaign:') !!}
                {!! Form::number('price_campaign', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Tradein Field -->
            <div class="form-group col-md-3">
                <div class="form-check">
                    {!! Form::hidden('tradein', 0, ['class' => 'form-check-input']) !!}
                    {!! Form::checkbox('tradein', '1', null, ['class' => 'form-check-input']) !!}
                    {!! Form::label('tradein', 'Tradein', ['class' => 'form-check-label']) !!}
                </div>
            </div>


            <!-- Tradein Purchase Field -->
            <div class="form-group col-md-3">
                {!! Form::label('tradein_purchase', 'Tradein Purchase:') !!}
                {!! Form::number('tradein_purchase', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Tradein Sale Field -->
            <div class="form-group col-md-3">
                {!! Form::label('tradein_sale', 'Tradein Sale:') !!}
                {!! Form::number('tradein_sale', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Felxible Field -->
            <div class="form-group col-md-3">
                <div class="form-check">
                    {!! Form::hidden('felxible', 0, ['class' => 'form-check-input']) !!}
                    {!! Form::checkbox('felxible', '1', null, ['class' => 'form-check-input']) !!}
                    {!! Form::label('felxible', 'Felxible', ['class' => 'form-check-label']) !!}
                </div>
            </div>


            <!-- Deductible Field -->
            <div class="form-group col-md-3">
                <div class="form-check">
                    {!! Form::hidden('deductible', 0, ['class' => 'form-check-input']) !!}
                    {!! Form::checkbox('deductible', '1', null, ['class' => 'form-check-input']) !!}
                    {!! Form::label('deductible', 'Deductible', ['class' => 'form-check-label']) !!}
                </div>
            </div>


        </div>
    </div>

    <div class="tab-pane" id="caracteristicas" role="tabpanel" aria-labelledby="caracteristicas-tab">
        <div class="row">    

            <!-- Power Field -->
            <div class="form-group col-md-3">
                {!! Form::label('power', 'Power:') !!}
                {!! Form::number('power', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Km Field -->
            <div class="form-group col-md-3">
                {!! Form::label('km', 'Km:') !!}
                {!! Form::number('km', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Transmission Id Field -->
            <div class="form-group col-md-3">
                {!! Form::label('transmission_id', 'Transmissão:') !!}
                <select name="album_id" class="input-group form-control custom-select selectedPost">
                            <option disabled selected value=""></option>
                            @foreach ($carTransmissions as $carTransmission)
                                <option value="{{ $carTransmission->id }}">{{ $carTransmission->name }}</option>
                            @endforeach
                    </select>
            </div>

            <!-- Color Interior Field -->
            <div class="form-group col-md-3">
                {!! Form::label('color_interior', 'Color Interior:') !!}
                {!! Form::text('color_interior', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Color Exterior Field -->
            <div class="form-group col-md-3">
                {!! Form::label('color_exterior', 'Color Exterior:') !!}
                {!! Form::text('color_exterior', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Metallic Color Field -->
            <div class="form-group col-md-3">
                <div class="form-check">
                    {!! Form::hidden('metallic_color', 0, ['class' => 'form-check-input']) !!}
                    {!! Form::checkbox('metallic_color', '1', null, ['class' => 'form-check-input']) !!}
                    {!! Form::label('metallic_color', 'Metallic Color', ['class' => 'form-check-label']) !!}
                </div>
            </div>


            <!-- Drive Id Field -->
            <div class="form-group col-md-3">
                {!! Form::label('drive_id', 'Tração:') !!}
                <select name="album_id" class="input-group form-control custom-select selectedPost">
                            <option disabled selected value=""></option>
                            @foreach ($carDrives as $carDrive)
                                <option value="{{ $carDrive->id }}">{{ $carDrive->name }}</option>
                            @endforeach
                    </select>
            </div>

            <!-- Fuel Id Field -->
            <div class="form-group col-md-3">
                {!! Form::label('fuel_id', 'Combustível:') !!}
                <select name="album_id" class="input-group form-control custom-select selectedPost">
                            <option disabled selected value=""></option>
                            @foreach ($carFuels as $carFuel)
                                <option value="{{ $carFuel->id }}">{{ $carFuel->name }}</option>
                            @endforeach
                    </select>
            </div>

            <!-- Door Field -->
            <div class="form-group col-md-3">
                {!! Form::label('door', 'Door:') !!}
                {!! Form::number('door', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Seats Field -->
            <div class="form-group col-md-3">
                {!! Form::label('seats', 'Seats:') !!}
                {!! Form::number('seats', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Class Id Field -->
            <div class="form-group col-md-3">
                {!! Form::label('class_id', 'Classe:') !!}
                <select name="album_id" class="input-group form-control custom-select selectedPost">
                            <option disabled selected value=""></option>
                            @foreach ($carClasses as $carClass)
                                <option value="{{ $carClass->id }}">{{ $carClass->name }}</option>
                            @endforeach
                    </select>
            </div>

            <!-- Autonomy Field -->
            <div class="form-group col-md-3">
                {!! Form::label('autonomy', 'Autonomy:') !!}
                {!! Form::number('autonomy', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Emissions Field -->
            <div class="form-group col-md-3">
                {!! Form::label('emissions', 'Emissions:') !!}
                {!! Form::number('emissions', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Iuc Field -->
            <div class="form-group col-md-3">
                {!! Form::label('iuc', 'Iuc:') !!}
                {!! Form::number('iuc', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Registration Count Field -->
            <div class="form-group col-md-3">
                {!! Form::label('registration_count', 'Registration Count:') !!}
                {!! Form::number('registration_count', null, ['class' => 'form-control']) !!}
            </div>
            <!-- </div> -->

        </div>
    </div>

    <div class="tab-pane" id="equipamento" role="tabpanel" aria-labelledby="equipamento-tab">
        <div class="row">    

            <!-- Power Field -->
            <div class="form-group col-12">
                {!! Form::label('power', 'Power:') !!}
                {!! Form::textarea('power', null, ['class' => 'form-control']) !!}
            </div>

        </div>
    </div>




</div>
<!-- </div> -->