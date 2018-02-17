<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

</head>
<body>

    <div class="container">
    
        <div class="row">
            @yield('content')
        </div>
    

        <div class="row">

            <div class="col-md-4">
                <div class="panel panel-primary">
                    
                </div>
            </div>
               
        </div>
    
    </div>


  

</body>
</html>