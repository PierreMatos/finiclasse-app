<div class="table-responsive container" id="clients-div">
    <table class="table" id="clients-table">
        <thead>
            <tr>
                <th>{{__('Name')}}</th>
                <th>{{__('Email')}}</th>
                <th>{{__('City')}}</th>
                <th>{{__('Stand')}}</th>
                <th>{{__('Client')}}</th>
                <th>{{__('Action')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr @if($user->gdpr_confirmation == null) class="notValidated" @else class="validated" @endif>
                    <td>{{ isset($user->name) ? $user->name : '' }}</td>
                    <td>{{ isset($user->email) ? $user->email : '' }}</td>
                    <td>{{ isset($user->city) ? $user->city : '' }}</td>
                    <td>{{ isset($user->stand->name) ? $user->stand->name : '' }}</td>
                    <td>{{ isset($user->clientType->name) ? $user->clientType->name : '' }}</td>
                    <td width="120">
                        {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('users.show', [$user->id]) }}" class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('users.edit', [$user->id]) }}" class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Tem a certeza?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>