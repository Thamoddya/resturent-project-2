<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,user-scalable=false, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - Home</title>
    @include('Components.HeaderImports')
    
</head>

<body class="MainBG ">

    @include('Admin.Components.NavBar')
    @yield('AdminContent')


    @include('Components.FooterImports')
</body>

</html>