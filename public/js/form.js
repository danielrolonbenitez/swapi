$(document).ready(function() {
            $(".btn-submit").click(function(e){
                e.preventDefault();

                var _token = $("input[name='_token']").val();
                var tipo = $("#tipo").val();
                var nombre= $("#nombre").val();
                var valor=validate(nombre,'nombre');
               if(valor==0){ 
                        $.ajax({
                            url: "ajax/buscar",
                            type:'POST',
                            data: {_token:_token, nombre:nombre,tipo:tipo},
                            success: function(data) {
                              var cont="hay un total de "+data.length+' '+tipo;
                              printMsg(data,cont);
                            }
                        });
               }

            }); 


          $(".agregar").click(function(e){
                e.preventDefault();

                var _token = $("input[name='_token']").val();
                var tipo = $("#tipo").val();
                var nombre= $("#nombreAgregar").val();
                var cantidad= $("#cantidad").val();
                var valor=validate(nombre,'nombre');
                valor=validate(cantidad,'cantidad');
                if(valor==0){
                            $.ajax({
                                url: "ajax/agregar-transporte",
                                type:'POST',
                                data: {_token:_token, nombre:nombre,tipo:tipo,cantidad:cantidad},
                                success: function(data) {
                                 var cont="se agregaron al inventario"+' '+data.cantidad+' '+tipo+''+data.nombre;
                                  printMsg(data,cont);
                                  window.setTimeout(function () {
                                          window.location.reload();
                                  }, 2000);
                                }
                            });
                  }

            }); 


            function printMsg (msg,cont) {
              if(msg!==" "){
                  
                  $('.alert-block').css('display','block');
                   $('.alert-block').html(cont);
              }else{
                   $('.alert-block').css('display','block');
                   $('.alert-block').html("no se encontraron resultado");
              }
            }
        

           $("#comboEliminar").click(function(e){

               if($('#comboEliminar').is(':checked')){
                   $('.eliminar').removeClass('invisible');
                   $('.agregar').hide();
               }else{
                    $('.eliminar').addClass('invisible');
                   $('.agregar').show();

               }

           });


           $(".eliminar").click(function(e){
                e.preventDefault();

                var _token = $("input[name='_token']").val();
                var tipo = $("#tipo").val();
                var nombre= $("#nombreAgregar").val();
                var cantidad= $("#cantidad").val();
                 var valor=validate(nombre,'nombre');
                valor=validate(cantidad,'cantidad');
                  if(valor==0){
                        $.ajax({
                            url: "ajax/eliminar-transporte",
                            type:'POST',
                            data: {_token:_token, nombre:nombre,tipo:tipo,cantidad:cantidad},
                            success: function(data) {
                             var cont="se eliminaron del inventario"+' '+data.cantidad+' '+tipo+''+data.nombre;
                              printMsg(data,cont);
                              window.setTimeout(function () {
                                      window.location.reload();
                              }, 2000);
                            }
                        });
                    }
            }); 

         function validate(dato,campo){
                   if(dato==""){
                    alert("el campo "+campo+" es requerido");
                    return 1;
                   }else{ return 0;}
         }


        });