

<!DOCTYPE html>
<html lang="en" class="h-100">


<!-- Mirrored from omah.dexignzone.com/laravel/demo/page-login by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Jan 2024 09:02:57 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Laravel | Page Login</title>
    <meta name="description" content="Some description for the page" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{$dashboard_assets}}public/images/favicon.png">
    <link href="{{$dashboard_assets}}/public/css/style.css" rel="stylesheet">

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
                                        <a href="{{$dashboard_assets}}/index.html"><img src="{{$dashboard_assets}}/public/images/logo-full.png" alt=""></a>
                                    </div>
                                    <h4 class="text-center mb-4">Sign in your account</h4>
                                    <form action="https://omah.dexignzone.com/laravel/demo/index">
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                value="Password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox ml-1">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="basic_checkbox_1" name="remember" id="remember"
                                                        {{ old('remember') ? 'checked' : '' }}>
                                                    <label class="custom-control-label"
                                                        for="basic_checkbox_1">Remember
                                                        my preference</label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                @if (Route::has('password.request'))
                                                    <a href="{{$dashboard_assets}}/page-forgot-password.html">Forgot Password?</a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Sign Me
                                                In</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Don't have an account? <a class="text-primary"
                                                href="{{$dashboard_assets}}/{{route('register')}}">Sign up</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{$dashboard_assets}}/public/vendor/global/global.min.js" type="text/javascript"></script>
    <script src="{{$dashboard_assets}}/public/vendor/bootstrap-select/dist/js/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="{{$dashboard_assets}}/public/js/custom.min.js" type="text/javascript"></script>
    <script src="{{$dashboard_assets}}/public/js/deznav-init.js" type="text/javascript"></script>
    <script src="{{$dashboard_assets}}/https://omah.dexignzone.com/laravel/demo/js/custom.min.js" type="text/javascript"></script>
   <script src="{{$dashboard_assets}}/https://omah.dexignzone.com/laravel/demo/js/deznav-init.js" type="text/javascript"></script> -->
   
</body>


</html>
