<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('layouts.partials.head')

</head>
<body style="font-family: arial;">
    @include('layouts.partials.navbar')

    <div class="col-sm-12 mx-auto">
        <div class="container">
            <div class="row">

                @yield('content')
                
            </div>
        </div>
    </div>
    

    @include('layouts.partials.scripts')
</body>
</html>