<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('users.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                <a class="btn btn-primary" href="{{ route('validateRGPD', [$user->id]) }}">{{ __('RGPD Validate') }}</a>
                <a href="{{ route('users.index') }}" class="btn btn-default">{{ __('Cancel') }}</a>
            </div>

           {!! Form::close() !!}
</body>
</html>