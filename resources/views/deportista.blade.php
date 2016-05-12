@extends('master')                              

@section('content') 
        
           

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
                          
                        </div>
							</div>
					  </div>
						    
       </div>
  </div>




  <form class="form-horizontal" id="form_deportista" action="">
  <fieldset>
    <legend>Legend</legend>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Uno</label>
      <div class="col-lg-10">
        <input class="form-control" id="inputEmail" placeholder="text" type="text">
      </div>
    </div>

    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Dos</label>
      <div class="col-lg-10">
        <input class="form-control" id="inputEmail" placeholder="text" type="text">
      </div>
    </div>

    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Tres</label>
      <div class="col-lg-10">
        <input class="form-control" id="inputEmail" placeholder="text" type="text">
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

    <script type="text/javascript">
  $(function(e)
  { 
                var URL = "app/";

                var popular_errores_modal = function(data)
                {
                  $('#form_persona .form-group').removeClass('has-error');
                  var selector = '';
                  for (var error in data){
                      if (typeof data[error] !== 'function') {
                          switch(error)
                          {
                            case 'tipoDocumento':
                            case 'Id_Etnia':
                            case 'Id_Pais':
                              selector = 'select';
                            break;

                            case 'Cedula':
                            case 'Primer_Apellido':
                            case 'Primer_Nombre':
                            case 'Fecha_Nacimiento':
                            case 'Id_Genero':
                              selector = 'input';
                            break;
                          }
                          $('#form_persona '+selector+'[name="'+error+'"]').closest('.form-group').addClass('has-error');
                      }
                  }
                }

          $('#form_deportista').on('submit', function(e){
            
                  $.post(
                    URL+'Deportista',
                    $(this).serialize(),
                    function(data){
                      alert(data);
                      if(data.status == 'error')
                      {
                        popular_errores_modal(data.errors);
                      } else {
                        $('#alerta').show();
                        $('#modal_form_persona').modal('hide');

                        setTimeout(function(){
                          $('#alerta').hide();
                        }, 4000)
                      }
                    },
                    'json'
                  );

                  e.preventDefault();
          });
 });
</script>

       
@stop


