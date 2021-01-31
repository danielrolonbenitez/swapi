<div class="col-md-10">
                <div class="container center_div card content-center " >
                    <div class="card-body m-left" style="margin-left:25% " >
                      <div >
                         <!-- busca en el inventario-->
                        <form   method="POST" action="{{ route('buscar')}}" >
                            
                                <label class="control-label">Buscar cantidad por Nombre</label>
                                <div class="input-group">
                                    <div class="form-outline">
                                                 <input  type="text" id="nombre" name="nombre" class="form-control" required/>
                                    </div>
                                    <input  id="tipo" type="hidden" name="tipo" value="{{ $tipo }}">
                                    <button type="button" class="btn btn-primary btn-submit">Buscar</button>
                                     
                                </div>
                           
                            @csrf
                        </form><br/>
                           <div style="border:1px solid silver;width:300px; "></div>
                          <!--agregar al inventario-->
                           <form method="POST" action="{{ route('agregar')}}">
                            
                                <label class="control-label">Agregar en el Inventario</label>
                                <div class="input-group">
                                       <div class="form-outline">
                                                 <label>Nombre:</label><input  type="search" id="nombreAgregar" name="nombre" class="form-control" required/>
                                                 <label>Cantidad:</label><input  type="number" id="cantidad" name="cantidad" min="1" class="form-control" />
                                        </div>     
                                    
                                    </div>
                                    <label>Seleccione para eliminar del inventario</label> <input type="checkbox" id="comboEliminar" /><br/>
                                    <input  id="tipo" type="hidden" name="tipo" value="{{ $tipo }}">
                                    <button type="button" class="btn btn-primary agregar">Agregar</button>
                                     
                                     <button  type="button" class="btn btn-primary eliminar invisible">Eliminar del inventario</button>
                           
                            @csrf
                        </form>
                            <!--mensaje-->
                         <div class="alert alert-success alert-block" style="display: none;">
                                  <button type="button" class="close" data-dismiss="alert">×</button>
                               <strong class="success-msg"></strong>
                         </div>
                      </div>    
                    </div>
                </div>
            </div>