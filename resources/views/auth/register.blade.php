<!DOCTYPE html>
<html lang="en" class="h-100">


<!-- Mirrored from omah.dexignzone.com/laravel/demo/page-register by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Jan 2024 09:05:04 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Laravel | Page Register</title>
    <meta name="description" content="Some description for the page" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ $dashboard_assets }}/images/favicon.png">
    <link href="{{ $dashboard_assets }}/css/style.css" rel="stylesheet">


</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <a href="index.html"><img src="{{ $dashboard_assets }}/public/images/logo-full.png" alt=""></a>
                                    </div>
                                    <h4 class="text-center mb-4">Sign up your account</h4>
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Full Name</strong></label>
                                            <input id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ old('name') }}" required autocomplete="name" autofocus>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Re-enter Password</strong></label>
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" required autocomplete="new-password">

                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-primary btn-block">Sign me up</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Already have an account? <a class="text-primary" href="page-login.html">Sign
                                                in</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ $dashboard_assets }}/vendor/global/global.min.js" type="text/javascript"></script>
    <script src="{{ $dashboard_assets }}/vendor/bootstrap-select/dist/js/bootstrap-select.min.js" type="text/javascript">
    </script>
    <script src="{{ $dashboard_assets }}/js/custom.min.js" type="text/javascript"></script>
    <script src="{{ $dashboard_assets }}/js/deznav-init.js" type="text/javascript"></script>
    <script src="{{ $dashboard_assets }}/https://omah.dexignzone.com/laravel/demo/js/custom.min.js" type="text/javascript">
    </script>
    <script src="{{ $dashboard_assets }}/https://omah.dexignzone.com/laravel/demo/js/deznav-init.js"
        type="text/javascript"></script> -->

</body>


<!-- Mirrored from omah.dexignzone.com/laravel/demo/page-register by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Jan 2024 09:05:04 GMT -->

</html>
