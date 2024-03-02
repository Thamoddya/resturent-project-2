<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,user-scalable=false, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }} - Login</title>
    @include('Components.HeaderImports')

</head>

<body class="MainBG ">

    {{-- @dd(session()) --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 ">
                <div class="row p-2 d-flex  align-items-center h-100">

                    <div class="col-12 col-md-8 offset-md-2 col-lg-4 offset-lg-4 bg-white ">
                        <div class="row">
                            <div class="col-12 mt-4">
                                <h4 class="text-center fw-bold">{{ env('APP_NAME') }} Login</h4>
                            </div>
                            <div class="col-12 mt-3">
                                <h6>Instructions</h6>
                                <ul>
                                    <li class="text-secondary" style="font-size: 13px">Enter Your Email Password
                                        Correctly</li>
                                    <li class="text-secondary" style="font-size: 13px">If any error occured , contact
                                        admin.</li>
                                    <li class="text-secondary" style="font-size: 13px">You can only reset your password
                                        by contacting system admin.</li>
                                </ul>
                            </div>
                            <div class="col-12 mt-5 mb-3">
                                <ul>
                                    @if (session('error'))
                                        I <li class="text-danger">{{ session('error') }}</li>
                                    @endif
                                </ul>

                                <form action="{{ route('auth.login') }}" method="POST" >
                                    @csrf
                                    @method('POST')
                                    <div class="mb-3">
                                        <input type="email" required class="form-control" name="email"
                                            placeholder="name@example.com">
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" class="form-control" placeholder="Password"
                                            name="password">
                                    </div>
                                    <div class="col-12  mt-1 mb-3">
                                        <a href="#" class="text-decoration-none">Fogot Password</a>
                                    </div>

                                    <button type="submit" class="btn btn-primary rounded-0 px-5">Login</button>
                                </form>
                            </div>
                        </div>

                        <br>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('Components.FooterImports')
</body>

</html>
