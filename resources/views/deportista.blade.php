@extends('master')          

@section('script')
  @parent
    <script src="{{ asset('public/Js/Deportista/deportisa.js') }}"></script> 
@stop  

@section('content') 
  


         <div id="main_persona" class="row" data-url="{{ url(config('usuarios.prefijo_ruta')) }}">  

  <div class="content">
		    <div class="panel panel-primary">
					  <div class="panel-heading">
					    <h3 class="panel-title">Deportista</h3>
					  </div>
					  <div class="panel-body">
					  		<div class="row">

                        <div id="main_persona" class="row" data-url="{{ url(config('usuarios.prefijo_ruta')) }}">
                          
                          <div id="alerta" class="col-xs-12" style="display:none;">
                            <div class="alert alert-success alert-dismissible" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              Datos actualizados satisfactoriamente.
                               

                            </div>
                          </div>
                          <div class="col-xs-12">
                            <div class="input-group">
                                  <input name="buscador" type="text" class="form-control" placeholder="Buscar">
                                  <span class="input-group-btn">
                                    <button id="buscar" data-role="buscar" class="btn btn-default" type="button"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                    
                                  </span>
                              </div>
                          </div>
                          <div class="col-xs-12">
                            <br>
                          </div>

                          <div class="col-xs-12">
                            <ul id="personas">
                              
                            </ul>
                          </div>

                          <div id="paginador" class="col-xs-12">
                           
                          </div>
                          
                        </div>
							</div>
					  </div>
						    
       </div>
  </div>


<div class="modal fade bs-example-modal-lg" id="modal_form_persona" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Modal title</h4>
      </div>

      <div class="modal-body">
                              <form class="form-horizontal" id="form_deportista" action="">
                                <fieldset>
                                  <legend>Legend</legend>
                                  <div class="form-group">
                                    <label for="inputEmail" class="col-lg-2 control-label">Uno</label>
                                    <div class="col-lg-10">
                                      <input class="form-control" id="inputEmail" placeholder="text" type="text" name="uno">
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="inputEmail" class="col-lg-2 control-label">Dos</label>
                                    <div class="col-lg-10">
                                      <input class="form-control" id="inputEmail" placeholder="text" type="text" name="dos">
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="inputEmail" class="col-lg-2 control-label">Tres</label>
                                    <div class="col-lg-10">
                                      <input class="form-control" id="inputEmail" placeholder="text" type="text" name="tres">
                                    </div>
                                  </div>
                                 <div class="form-group">
                                    <div class="col-lg-10 col-lg-offset-2">
                                      <button type="reset" class="btn btn-default">Cancel</button>
                                      <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                  </div>
                                  
                                </fieldset>
                              </form>
      </div>
    </div>
  </div>
</div>

@stop


