<!-- Tab panes -->
<div class="tab-content mt-2 container">

    <div class="tab-pane active" id="geral" role="tabpanel" aria-labelledby="geral-tab">
        <div class="row">
            <!-- Make Id Field -->
            <div class="form-group col-md-3">
                {!! Form::label('make_id', 'Marca') !!}
                {!! Form::text('make_id', isset($car->model->make->name) ? $car->model->make->name : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Model Id Field -->
            <div class="form-group col-sm-3">
                {!! Form::label('model_id', 'Modelo') !!}
                {!! Form::text('model_id', isset($car->model->name) ? $car->model->name : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Variant Field -->
            <div class="form-group col-sm-3">
                {!! Form::label('variant', 'Variante') !!}
                {!! Form::text('variant', isset($car->variant) ? $car->variant : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Motorization Field -->
            <div class="form-group col-sm-3">
                {!! Form::label('motorization', 'Motorização') !!}
                {!! Form::number('motorization', isset($car->motorization) ? $car->motorization : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Category Id Field -->
            <div class="form-group col-sm-3">
                {!! Form::label('category_id', 'Categoria') !!}
                {!! Form::text('category_id', isset($car->category->name) ? $car->category->name : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Ano Field -->
            <div class="form-group col-sm-3">
                {!! Form::label('registration', 'Ano') !!}
                {!! Form::text('registration', isset($car->registration) ? $car->registration : '', ['class' => 'form-control', 'id' => 'registration', 'disabled']) !!}
            </div>

            <!-- Condition Id Field -->
            <div class="form-group col-sm-3">
                {!! Form::label('condition_id', 'Condição') !!}
                {!! Form::text('condition_id', isset($car->condition->name) ? $car->condition->name : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- State Id Field -->
            <div class="form-group col-sm-3">
                {!! Form::label('state_id', 'Estado') !!}
                {!! Form::text('state_id', isset($car->state->name) ? $car->state->name : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Komm Field -->
            <div class="form-group col-sm-3">
                {!! Form::label('komm', 'Komm') !!}
                {!! Form::text('komm', isset($car->komm) ? $car->komm : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Warranty Stand Field -->
            <div class="form-group col-sm-3">
                {!! Form::label('warranty_stand', 'Garantia stand (meses)') !!}
                {!! Form::text('warranty_stand', isset($car->warranty_stand) ? $car->warranty_stand : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Warranty Make Field -->
            <div class="form-group col-sm-3">
                {!! Form::label('warranty_make', 'Garantia fabricante (meses)') !!}
                {!! Form::text('warranty_make', isset($car->warranty_make) ? $car->warranty_make : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Plate Field -->
            <div class="form-group col-sm-3">
                {!! Form::label('plate', 'Matrícula') !!}
                {!! Form::text('plate', isset($car->plate) ? $car->plate : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Stand Id Field -->
            <div class="form-group col-sm-3">
                {!! Form::label('stand_id', 'Stand') !!}
                {!! Form::text('stand_id', isset($car->stand->name) ? $car->stand->name : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Price Field -->
            <div class="form-group col-sm-3">
                {!! Form::label('price', 'Preço') !!}
                {!! Form::number('price', isset($car->price) ? $car->price : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Price Base Field -->
            <div class="form-group col-sm-3">
                {!! Form::label('price_base', 'Preço base') !!}
                {!! Form::number('price_base', isset($car->price_base) ? $car->price_base : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Price Campaign Field -->
            <div class="form-group col-sm-3">
                {!! Form::label('order_date', 'Preço de campanha') !!}
                {!! Form::number('order_date', isset($car->price_campaign) ? $car->price_campaign : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- IVA -->
            <div class="form-group col-sm-3">
                {!! Form::label('iva', 'IVA') !!}
                {!! Form::number('iva', isset($car->iva) ? $car->iva : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- ISV -->
            <div class="form-group col-sm-3">
                {!! Form::label('isv', 'ISV') !!}
                {!! Form::number('isv', isset($car->isv) ? number_format($car->isv,2).' €' : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Total Extras -->
            <div class="form-group col-sm-3">
                {!! Form::label('total_extras', 'Total extras') !!}
                {!! Form::number('total_extras', isset($car->total_extras) ? $car->total_extras : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Sub total -->
            <div class="form-group col-sm-3">
                {!! Form::label('sub_total', 'Sub total') !!}
                {!! Form::number('sub_total', isset($car->sub_total) ? $car->sub_total : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Order Date Field -->
            <div class="form-group col-sm-3">
                {!! Form::label('order_date', 'Data de encomenda') !!}
                {!! Form::text('order_date', isset($car->order_date) ? $car->order_date : '', ['class' => 'form-control', 'id' => 'order_date', 'disabled']) !!}
            </div>

            <!-- PTL -->
            <div class="form-group col-sm-3">
                {!! Form::label('ptl', 'PTL') !!}
                {!! Form::text('ptl', isset($car->ptl) ? $car->ptl : '', ['class' => 'form-control', 'id' => 'ptl', 'disabled']) !!}
            </div>

            <!-- SIGPU -->
            <div class="form-group col-sm-3">
                {!! Form::label('sigpu', 'SIGPU') !!}
                {!! Form::text('sigpu', isset($car->sigpu) ? $car->sigpu : '', ['class' => 'form-control', 'id' => 'sigpu   ', 'disabled']) !!}
            </div>

            <!-- Arrival Date Field -->
            <div class="form-group col-md-3">
                {!! Form::label('arrival_date', 'Data de chegada') !!}
                {!! Form::text('arrival_date', isset($car->arrival_date) ? $car->arrival_date : '', ['class' => 'form-control', 'id' => 'arrival_date', 'disabled']) !!}
            </div>

            <!-- Delivery Date Field -->
            <div class="form-group col-md-3">
                {!! Form::label('delivery_date', 'Data de entrega') !!}
                {!! Form::text('delivery_date', isset($car->delivery_date) ? $car->delivery_date : '', ['class' => 'form-control', 'id' => 'delivery_date', 'disabled']) !!}
            </div>

            <!-- Tradein Purchase Field -->
            <div class="form-group col-sm-3">
                {!! Form::label('tradein_purchase', 'Preço compra de retoma') !!}
                {!! Form::number('tradein_purchase', isset($car->tradein_purchase) ? $car->tradein_purchase : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Tradein Sale Field -->
            <div class="form-group col-md-3">
                {!! Form::label('tradein_sale', 'Preço venda de retoma') !!}
                {!! Form::number('tradein_sale', isset($car->tradein_sale) ? $car->tradein_sale : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Price New Field -->
            <div class="form-group col-md-3">
                {!! Form::label('price_new', 'Preço em novo') !!}
                {!! Form::number('price_new', isset($car->price_new) ? $car->price_new : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <div class="col-md-3">
                <!-- Tradein Field -->
                <div class="form-group">
                    <div class="form-check">
                        {!! Form::hidden('tradein', 0, ['class' => 'form-check-input']) !!}
                        {!! Form::checkbox('tradein', '1', isset($car->tradein) ? $car->tradein : '', ['class' => 'form-check-input', 'disabled']) !!}
                        {!! Form::label('tradein', 'Retoma', ['class' => 'form-check-label']) !!}
                    </div>
                </div>

                 <!-- Felxible Field -->
                 <div class="form-group">
                    <div class="form-check">
                        {!! Form::hidden('felxible', 0, ['class' => 'form-check-input']) !!}
                        {!! Form::checkbox('felxible', '1', isset($car->felxible) ? $car->felxible : '', ['class' => 'form-check-input', 'disabled']) !!}
                        {!! Form::label('felxible', 'Preço flexível', ['class' => 'form-check-label']) !!}
                    </div>
                </div>

                <!-- Deductible Field -->
                <div class="form-group">
                    <div class="form-check">
                        {!! Form::hidden('deductible', 0, ['class' => 'form-check-input']) !!}
                        {!! Form::checkbox('deductible', '1', isset($car->deductible) ? $car->deductible : '', ['class' => 'form-check-input', 'disabled']) !!}
                        {!! Form::label('deductible', 'IVA dedutível', ['class' => 'form-check-label']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tab-pane" id="caracteristicas" role="tabpanel" aria-labelledby="caracteristicas-tab">
        <div class="row">

            <!-- Fuel Id Field -->
            <div class="form-group col-sm-3">
                {!! Form::label('fuel_id', 'Combustível') !!}
                {!! Form::text('fuel_id', isset($car->fuel->name) ? $car->fuel->name : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Power Field -->
            <div class="form-group col-sm-3">
                {!! Form::label('power', 'Potência') !!}
                {!! Form::text('power', isset($car->power) ? $car->power : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Km Field -->
            <div class="form-group col-sm-3">
                {!! Form::label('km', 'Quilômetros') !!}
                {!! Form::text('km', isset($car->km) ? $car->km : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Transmission Id Field -->
            <div class="form-group col-sm-3">
                {!! Form::label('transmission_id', 'Transmissão') !!}
                {!! Form::text('fuel_id', isset($car->transmission->name) ? $car->transmission->name : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Color Interior Field -->
            <div class="form-group col-sm-3">
                {!! Form::label('color_interior', 'Cor interior') !!}
                {!! Form::text('color_interior', isset($car->color_interior) ? $car->color_interior : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Color Exterior Field -->
            <div class="form-group col-sm-3">
                {!! Form::label('color_exterior', 'Cor exterior') !!}
                {!! Form::text('color_exterior', isset($car->color_exterior) ? $car->color_exterior : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Metallic Color Field -->
            <div class="form-group col-md-3">
                <div class="form-check" style="margin-top: 37px;">
                    <input type="hidden" name="metallic_color" value="0" disabled>
                    <input type="checkbox" name="metallic_color" value="1"
                        {{ $car->metallic_color == '1' ? ' checked' : '' }} disabled>
                    <label>Pintura metalizada</label>
                </div>
            </div>

            <!-- Drive Id Field -->
            <div class="form-group col-sm-3">
                {!! Form::label('drive_id', 'Tração') !!}
                {!! Form::text('drive_id', isset($car->drive->name) ? $car->drive->name : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Door Field -->
            <div class="form-group col-sm-3">
                {!! Form::label('door', 'Portas') !!}
                {!! Form::text('door', isset($car->door) ? $car->door : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Seats Field -->
            <div class="form-group col-sm-3">
                {!! Form::label('seats', 'Lotação') !!}
                {!! Form::text('seats', isset($car->seats) ? $car->seats : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Class Id Field -->
            <div class="form-group col-sm-3">
                {!! Form::label('class_id', 'Classe') !!}
                {!! Form::text('drive_id', isset($car->class->name) ? $car->class->name : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Autonomy Field -->
            <div class="form-group col-sm-3">
                {!! Form::label('autonomy', 'Autonomia máxima') !!}
                {!! Form::number('autonomy', isset($car->autonomy) ? $car->autonomy : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Emissions Field -->
            <div class="form-group col-sm-3">
                {!! Form::label('emissions', 'Emissões CO2') !!}
                {!! Form::number('emissions', isset($car->emissions) ? $car->emissions : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Iuc Field -->
            <div class="form-group col-sm-3">
                {!! Form::label('iuc', 'IUC') !!}
                {!! Form::number('iuc', isset($car->iuc) ? number_format($car->iuc,2) : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Registration Count Field -->
            <div class="form-group col-sm-3">
                {!! Form::label('registration_count', 'Nº de registos') !!}
                {!! Form::number('registration_count', isset($car->registration_count) ? $car->registration_count : '', ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Consumption Field -->
            <div class="form-group col-sm-3">
                {!! Form::label('consumption', 'Consumo combinado') !!}
                {!! Form::number('consumption', isset($car->consumption) ? $car->consumption : '', ['class' => 'form-control', 'disabled']) !!}
            </div>
        </div>
    </div>

    <div class="tab-pane" id="equipamento" role="tabpanel" aria-labelledby="equipamento-tab">
        <div class="row">
            <!-- Equipment Field -->
            <div class="form-group col-12">
                {!! Form::label('equipment', 'Equipamento extra') !!}
                {!! Form::textarea('equipment', isset($car->equipment) ? $car->equipment : '', ['class' => 'form-control', 'disabled']) !!}
            </div>
        </div>
    </div>

    <div class="tab-pane" id="fotos" role="tabpanel" aria-labelledby="fotos-tab">
        <div class="row">
            <!-- Fotos Field -->
            <div class="form-group col-sm-12">
                {!! Form::label('image', 'Fotos') !!}
                @foreach ($car->getMedia('cars') as $media)
                    <p><img width="100%" src="{{ $media->getUrl() }}"></p>
                @endforeach
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
