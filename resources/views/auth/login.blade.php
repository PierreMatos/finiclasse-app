<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }}</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css"
        integrity="sha512-0S+nbAYis87iX26mmj/+fWt1MmaKCv80H+Mbo+Ne7ES4I6rxswpfnC6PxmLiw33Ywj2ghbtTw0FkLbMWqh4F7Q=="
        crossorigin="anonymous" />

    <!-- AdminLTE -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.5/css/adminlte.min.css"
        integrity="sha512-rVZC4rf0Piwtw/LsgwXxKXzWq3L0P6atiQKBNuXYRbg2FoRbSTIY0k2DxuJcs7dk4e/ShtMzglHKBOJxW8EQyQ=="
        crossorigin="anonymous" />

    <!-- iCheck -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css"
        integrity="sha512-8vq2g5nHE062j3xor4XxPeZiPjmRDh6wlufQlfC6pdQ/9urJkU07NM0tEREeymP++NczacJ/Q59ul+/K2eYvcg=="
        crossorigin="anonymous" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="hold-transition login-page" style="background: #fff;">

    <div class="containerLogin">
        <div class="login-logo">
            <h1>Finiclasse</h1>
        </div>
    </div>

    <div class="login-box">
        <!-- /.login-logo -->

        <!-- /.login-box-body -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Bem-vindo à sua área pessoal</p>

                <form method="post" action="{{ url('/login') }}">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email"
                            class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" name="password" placeholder="Password"
                            class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="row">
                        <!-- <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">{{ __('Remember Me') }}</label>
                        </div>
                    </div> -->

                        <div class="submit col-4">
                            <button type="submit"
                                class="btn btn-primary btn-block btnSubmit">{{ __('Sign In') }}</button>
                        </div>

                    </div>
                </form>

                <div class="forgot">
                    <a href="{{ route('password.request') }}">Esqueceu-se da password?</a>
                </div>
                <!-- <p class="mb-1">
            </p>
            <p class="mb-0">
                <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
            </p> -->
            </div>
            <!-- /.login-card-body -->
        </div>

    </div>
    <!-- /.login-box -->
</body>

</html>

<style>
    .containerLogin {
        background-color: #000;
        color: #fff;
        width: 100%;
        height: 100%;
        margin-bottom: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .card {
        box-shadow: inherit;
    }

    .login-box-msg {
        font-size: 20px;
        font-weight: bold;
        color: #000;
    }

    .submit {
        margin: 0 auto;
    }

    .btnSubmit {
        background-color: #000;
        border-color: #000;
    }

    .btnSubmit:hover {
        opacity: 0.7;
        background-color: #000;
        border-color: #000;
    }

    .btnSubmit:active {
        background-color: #000 !important;
        border-color: #000 !important;
    }

    .btnSubmit:focus {
        background-color: #000 !important;
        border-color: #000 !important;
    }

    .form-control {
        border-right: inherit !important;
        border: 1px solid #ced4da !important;
    }

    .form-control:focus {
        border-color: #000;
    }

    .login-box {
        padding-bottom: 100px;
    }

    .forgot {
        margin-top: 10px;
        text-align: center;
    }

</style>
