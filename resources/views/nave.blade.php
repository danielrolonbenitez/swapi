@extends('layouts.layout')
@section('content')
<!-- Contenido -->

    <section class="container-fluid content">
        <div class="row justify-content-center">
            <!-- Post -->
            <div class="col-md-12 text-center">
                <h2>Naves Espaciales </h2><h6>total: {{ count($naves) }}</h6>
                <hr class="post-hr">
            </div>
           
            <!-- Post 2 -->
            @include('form',['tipo'=>'nave'])
            
        </div>
    </section>
   <script src="{{asset('js/form.js')}}"></script>
@endsection