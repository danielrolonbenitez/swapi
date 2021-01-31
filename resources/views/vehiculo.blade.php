@extends('layouts.layout')
@section('content')
<!-- Contenido -->

    <section class="container-fluid content">
        <div class="row justify-content-center">
            <!-- Post -->
            <div class="col-md-12 text-center">
                <h2>Vehiculos </h2><h6>total: {{ count($vehiculos) }}</h6>
                <hr class="post-hr">
            </div>
           
            <!-- Post 2 -->
            @include('form',['tipo'=>'vehiculo'])
        </div>
    </section>
   <script src="{{asset('js/form.js')}}"></script>
@endsection