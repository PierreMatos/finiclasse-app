<!-- Make Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('make_id', 'Marca:') !!}
        <select name="album_id" class="input-group form-control custom-select selectedPost">
                <option disabled selected value=""></option>
                @foreach ($makes as $make)
                    <option value="{{ $make->id }}">{{ $make->name }}</option>
                @endforeach
        </select>
    <!-- {!! Form::number('make_id', null, ['class' => 'form-control']) !!} -->
</div>

<!-- Model Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('model_id', 'Modelo:') !!}
        <select name="album_id" class="input-group form-control custom-select selectedPost">
                <option disabled selected value=""></option>
                @foreach ($models as $model)
                    //condition make selecionado anteriormente
                    <option value="{{ $model->id }}">{{ $model->name }}</option>
                @endforeach
        </select>
    <!-- {!! Form::number('model_id', null, ['class' => 'form-control']) !!} -->
</div>

<!-- Variant Field -->
<div class="form-group col-sm-6">
    {!! Form::label('variant', 'Variant:') !!}
    {!! Form::text('variant', null, ['class' => 'form-control']) !!}
</div>

<!-- Motorization Field -->
<div class="form-group col-sm-6">
    {!! Form::label('motorization', 'Motorization:') !!}
    {!! Form::number('motorization', null, ['class' => 'form-control']) !!}
</div>

<!-- Category Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category_id', 'Category Id:') !!}
    {!! Form::number('category_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Registration Field -->
<div class="form-group col-sm-6">
    {!! Form::label('registration', 'Registration:') !!}
    {!! Form::text('registration', null, ['class' => 'form-control','id'=>'registration']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#registration').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Condition Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('condition_id', 'Condition Id:') !!}
    {!! Form::number('condition_id', null, ['class' => 'form-control']) !!}
</div>

<!-- State Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('state_id', 'State Id:') !!}
    {!! Form::number('state_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Komm Field -->
<div class="form-group col-sm-6">
    {!! Form::label('komm', 'Komm:') !!}
    {!! Form::number('komm', null, ['class' => 'form-control']) !!}
</div>

<!-- Warranty Stand Field -->
<div class="form-group col-sm-6">
    {!! Form::label('warranty_stand', 'Warranty Stand:') !!}
    {!! Form::number('warranty_stand', null, ['class' => 'form-control']) !!}
</div>

<!-- Warranty Make Field -->
<div class="form-group col-sm-6">
    {!! Form::label('warranty_make', 'Warranty Make:') !!}
    {!! Form::number('warranty_make', null, ['class' => 'form-control']) !!}
</div>

<!-- Plate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('plate', 'Plate:') !!}
    {!! Form::text('plate', null, ['class' => 'form-control']) !!}
</div>

<!-- Stand Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stand_id', 'Stand Id:') !!}
    {!! Form::text('stand_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::number('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Base Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price_base', 'Price Base:') !!}
    {!! Form::number('price_base', null, ['class' => 'form-control']) !!}
</div>

<!-- Price New Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price_new', 'Price New:') !!}
    {!! Form::number('price_new', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Campaign Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price_campaign', 'Price Campaign:') !!}
    {!! Form::number('price_campaign', null, ['class' => 'form-control']) !!}
</div>

<!-- Tradein Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('tradein', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('tradein', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('tradein', 'Tradein', ['class' => 'form-check-label']) !!}
    </div>
</div>


<!-- Tradein Purchase Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tradein_purchase', 'Tradein Purchase:') !!}
    {!! Form::number('tradein_purchase', null, ['class' => 'form-control']) !!}
</div>

<!-- Tradein Sale Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tradein_sale', 'Tradein Sale:') !!}
    {!! Form::number('tradein_sale', null, ['class' => 'form-control']) !!}
</div>

<!-- Felxible Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('felxible', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('felxible', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('felxible', 'Felxible', ['class' => 'form-check-label']) !!}
    </div>
</div>


<!-- Deductible Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('deductible', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('deductible', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('deductible', 'Deductible', ['class' => 'form-check-label']) !!}
    </div>
</div>


<!-- Power Field -->
<div class="form-group col-sm-6">
    {!! Form::label('power', 'Power:') !!}
    {!! Form::number('power', null, ['class' => 'form-control']) !!}
</div>

<!-- Km Field -->
<div class="form-group col-sm-6">
    {!! Form::label('km', 'Km:') !!}
    {!! Form::number('km', null, ['class' => 'form-control']) !!}
</div>

<!-- Transmission Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('transmission_id', 'Transmission Id:') !!}
    {!! Form::text('transmission_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Color Interior Field -->
<div class="form-group col-sm-6">
    {!! Form::label('color_interior', 'Color Interior:') !!}
    {!! Form::text('color_interior', null, ['class' => 'form-control']) !!}
</div>

<!-- Color Exterior Field -->
<div class="form-group col-sm-6">
    {!! Form::label('color_exterior', 'Color Exterior:') !!}
    {!! Form::text('color_exterior', null, ['class' => 'form-control']) !!}
</div>

<!-- Metallic Color Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('metallic_color', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('metallic_color', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('metallic_color', 'Metallic Color', ['class' => 'form-check-label']) !!}
    </div>
</div>


<!-- Drive Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('drive_id', 'Drive Id:') !!}
    {!! Form::text('drive_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Fuel Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fuel_id', 'Fuel Id:') !!}
    {!! Form::text('fuel_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Door Field -->
<div class="form-group col-sm-6">
    {!! Form::label('door', 'Door:') !!}
    {!! Form::number('door', null, ['class' => 'form-control']) !!}
</div>

<!-- Seats Field -->
<div class="form-group col-sm-6">
    {!! Form::label('seats', 'Seats:') !!}
    {!! Form::number('seats', null, ['class' => 'form-control']) !!}
</div>

<!-- Class Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('class_id', 'Class Id:') !!}
    {!! Form::text('class_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Autonomy Field -->
<div class="form-group col-sm-6">
    {!! Form::label('autonomy', 'Autonomy:') !!}
    {!! Form::number('autonomy', null, ['class' => 'form-control']) !!}
</div>

<!-- Emissions Field -->
<div class="form-group col-sm-6">
    {!! Form::label('emissions', 'Emissions:') !!}
    {!! Form::number('emissions', null, ['class' => 'form-control']) !!}
</div>

<!-- Iuc Field -->
<div class="form-group col-sm-6">
    {!! Form::label('iuc', 'Iuc:') !!}
    {!! Form::number('iuc', null, ['class' => 'form-control']) !!}
</div>

<!-- Registration Count Field -->
<div class="form-group col-sm-6">
    {!! Form::label('registration_count', 'Registration Count:') !!}
    {!! Form::number('registration_count', null, ['class' => 'form-control']) !!}
</div>

<!-- Order Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('order_date', 'Order Date:') !!}
    {!! Form::text('order_date', null, ['class' => 'form-control','id'=>'order_date']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#order_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        });
        
$('#table_id2').DataTable( {
} );
$('#cars-table').DataTable( {
} );

    </script>
@endpush

<!-- Arrival Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('arrival_date', 'Arrival Date:') !!}
    {!! Form::text('arrival_date', null, ['class' => 'form-control','id'=>'arrival_date']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#arrival_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Delivery Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('delivery_date', 'Delivery Date:') !!}
    {!! Form::text('delivery_date', null, ['class' => 'form-control','id'=>'delivery_date']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#delivery_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Chassi Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('chassi_number', 'Chassi Number:') !!}
    {!! Form::number('chassi_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Iuc Expiration Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('iuc_expiration_date', 'Iuc Expiration Date:') !!}
    {!! Form::text('iuc_expiration_date', null, ['class' => 'form-control','id'=>'iuc_expiration_date']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#iuc_expiration_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Inspection Expiration Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('inspection_expiration_date', 'Inspection Expiration Date:') !!}
    {!! Form::text('inspection_expiration_date', null, ['class' => 'form-control','id'=>'inspection_expiration_date']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#inspection_expiration_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Tradein Observations Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tradein_observations', 'Tradein Observations:') !!}
    {!! Form::text('tradein_observations', null, ['class' => 'form-control']) !!}
</div>

<!-- Consumption Field -->
<div class="form-group col-sm-6">
    {!! Form::label('consumption', 'Consumption:') !!}
    {!! Form::number('consumption', null, ['class' => 'form-control']) !!}
</div>