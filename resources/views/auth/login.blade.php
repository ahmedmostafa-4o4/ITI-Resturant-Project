<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Images Admin | Login/Register</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('dashboard/vendors/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('dashboard/vendors/font-awesome/css/font-awesome.min.css') }}">
    <!-- NProgress -->
    <link rel="stylesheet" href="{{ asset('dashboard/vendors/nprogress/nprogress.css') }}">
    <!-- Animate.css -->
    <link rel="stylesheet" href="{{ asset('dashboard/vendors/animate.css/animate.min.css') }}">

    <!-- Custom Theme Style -->
    <link rel="stylesheet" href="{{ asset('dashboard/build/css/custom.min.css') }}">
</head>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <h1>Login Form</h1>
                        <div>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Username" required="" name="email" />
                            @error('email')
                            <div style="color: red; margin-top:3px;">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required="" name="password" />
                            @error('password')
                            <div style="color: red; margin-top:3px;">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div>
                            <button class="btn btn-default submit">Log in</button>
                            <a class="reset_pass" href="#">Lost your password?</a>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">New to site?
                                <a href="#signup" class="to_register"> Create Account </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class="fa fa-file-image-o"></i></i> Images Admin</h1>
                                <p>©2016 All Rights Reserved. Images Admin is a Bootstrap 4 template. Privacy and Terms</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>

            <div id="register" class="animate form registration_form">
                <section class="login_content">
                    <form action="{{ route('register') }}" method="post">
                        @csrf
                        <h1>Create Account</h1>
                        <div>
                            <input type="text" class="form-control @error('namel') is-invalid @enderror" placeholder="Fullname" required="" name="name" />
                            @error('name')
                            <div style="color: red; margin-top:3px;">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" required="" name="email" />
                            @error('email')
                            <div style="color: red; margin-top:3px;">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required="" name="password" />
                            @error('password')
                            <div style="color: red; margin-top:3px;">
                                {{$message}}
                            </div> @enderror
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Confirm Password" required="" name="password_confirmation" />
                        </div>
                        <div>
                            <button class="btn btn-default submit">Submit</button>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">Already a member ?
                                <a href="#signin" class="to_register"> Log in </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class="fa fa-file-image-o"></i></i> Images Admin</h1>
                                <p>©2016 All Rights Reserved. Images Admin is a Bootstrap 4 template. Privacy and Terms</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>

</html>