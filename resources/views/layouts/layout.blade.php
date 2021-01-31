<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet"  href="{{asset('css/style.css')}}">
        <link rel="stylesheet"  href="{{asset('css/bootstrap.min.css')}}">
        <script src={{asset('js/jquery.min.js')}}></script>
        <script src="{{asset('js/bootstrap.js')}}"></script>
        
    </head>
    <body>
           <section class="container">

                <div class="text-center"><h1>Api SW</h1></div>
                 <nav class="navbar navbar-light bg-light">
                          <form class="form-inline">
                            
                            <a href="{{ route('naves') }}"><button class="btn btn-sm btn-outline-success" type="button">Naves</button></a>
                            <a href="{{ route('vehiculos') }}">
                            <button class="btn btn-sm btn-outline-success" type="button">Vehiculos</button></a>
                            <a href="{{ route('importar') }}">
                            <button class="btn btn-sm btn-outline-success" type="button">Importat datos desde api</button></a>

                          </form>
                        </nav>
                 @include('flash-message')
                 @yield('content')
               
           </section>
        
    </body>
</html>
