<div class="table-responsive container" id="vendors-div">
    <table class="table" id="vendors-table">
        <thead>
            <tr>
                <th>{{__('Name')}}</th>
                <th>{{__('Email')}}</th>
                <th>{{__('Mobile Phone')}}</th>
                <th>{{__('Stand')}}</th>
                <th>{{__('Action')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ isset($user->name) ? $user->name : '' }}</td>
                    <td>{{ isset($user->email) ? $user->email : '' }}</td>
                    <td>{{ isset($user->mobile_phone) ? $user->mobile_phone : '' }}</td>
                    <td>{{ isset($user->stand->name) ? $user->stand->name : '' }}</td>
                    <td width="120">
                        {!! Form::open(['route' => ['vendors.destroy', $user->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('vendors.show', [$user->id]) }}" class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('vendors.edit', [$user->id]) }}" class='btn btn-default btn-xs'>
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
