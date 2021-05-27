<div class="table-responsive">
    <table class="table" id="businessStudies-table">
        <thead>
            <tr>
                <th>Client Id</th>
        <th>Car Id</th>
        <th>Extras Total</th>
        <th>Sub Total</th>
        <th>Total Benefits</th>
        <th>Selling Price</th>
        <th>Tradein Id</th>
        <th>Tradein Diff</th>
        <th>Settle Amount</th>
        <th>Total Diff Amount</th>
        <th>Total Discount Amount</th>
        <th>Total Discount Perc</th>
        <th>Iva</th>
        <th>Isv</th>
        <th>Business Study Authorization Id</th>
        <th>Tradein Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($businessStudies as $businessStudy)
            <tr>
                <td>{{ $businessStudy->client_id }}</td>
            <td>{{ $businessStudy->car_id }}</td>
            <td>{{ $businessStudy->extras_total }}</td>
            <td>{{ $businessStudy->sub_total }}</td>
            <td>{{ $businessStudy->total_benefits }}</td>
            <td>{{ $businessStudy->selling_price }}</td>
            <td>{{ $businessStudy->tradein_id }}</td>
            <td>{{ $businessStudy->tradein_diff }}</td>
            <td>{{ $businessStudy->settle_amount }}</td>
            <td>{{ $businessStudy->total_diff_amount }}</td>
            <td>{{ $businessStudy->total_discount_amount }}</td>
            <td>{{ $businessStudy->total_discount_perc }}</td>
            <td>{{ $businessStudy->iva }}</td>
            <td>{{ $businessStudy->isv }}</td>
            <td>{{ $businessStudy->business_study_authorization_id }}</td>
            <td>{{ $businessStudy->tradein_id }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['businessStudies.destroy', $businessStudy->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('businessStudies.show', [$businessStudy->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('businessStudies.edit', [$businessStudy->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
