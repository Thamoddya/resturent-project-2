<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,user-scalable=false, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hotel Admin - Home</title>
    @include('Components.HeaderImports')
    
</head>

<body class="MainBG ">

    @include('Hotel.Components.NavBar')
    @yield('HotelAdminContent')


    @include('Components.FooterImports')
</body>

</html>