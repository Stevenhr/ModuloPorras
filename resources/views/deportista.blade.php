@extends('master')                              

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



 
    <script type="text/javascript">
  $(function(e)
  { 
                var $personas_actuales = $('#personas').html();
                var URL = $('#main_persona').data('url');
                var buscar = function(e)
                {
                  var key = $('input[name="buscador"]').val();
                  if (key.length > 2)
                  {
                    $('#buscar span').removeClass('glyphicon-search').addClass('glyphicon-remove');
                    $('#buscar').data('role', 'reset');

                    $.get(
                      URL+'/service/buscar/'+key,
                      {}, 
                      function(data)
                      {
                        if(data.length > 0)
                        {
                          var html = '';
                          $.each(data, function(i, e){
                            html += '<li class="list-group-item" style="">'+
                                       
                                            '<h2>MENÚ DEPORTISTA</h2>'+
                                            '<ul class="nav nav-pills">'+
                                              '<li class="active"><a data-toggle="pill" href="#home">Home</a></li>'+
                                              '<li><a data-toggle="pill" href="#menu1">Menu 1</a></li>'+
                                              '<li><a data-toggle="pill" href="#menu2">Menu 2</a></li>'+
                                              '<li><a data-toggle="pill" href="#menu3">Menu 3</a></li>'+
                                            '</ul>'+
                                            '<div class="tab-content">'+
                                              '<div id="home" class="tab-pane fade in active">'+
                                                '<br>'+
                                                  '<h4 class="list-group-item-heading">'+
                                                      ''+e['Primer_Apellido'].toUpperCase()+' '+e['Segundo_Apellido'].toUpperCase()+' '+e['Primer_Nombre'].toUpperCase()+' '+e['Segundo_Nombre'].toUpperCase()+''+'</h4>'+
                                                  '<p class="list-group-item-text">'+
                                                      '<div class="row">'+
                                                          '<div class="col-xs-12">'+
                                                              '<div class="row">'+
                                                                  '<div class="col-xs-12 col-sm-6 col-md-3"><small>Identificación: '+e.tipo_documento['Nombre_TipoDocumento']+' '+e['Cedula']+'</small></div>'+
                                                              '</div>'+
                                                          '</div>'+
                                                      '</div>'+
                                                  '</p>'+
                                                '</p>'+
                                              '</div>'+
                                              '<div id="menu1" class="tab-pane fade">'+
                                                '<h3>Menu 1</h3>'+
                                                '<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>'+
                                              '</div>'+
                                              '<div id="menu2" class="tab-pane fade">'+
                                                '<h3>Menu 2</h3>'+
                                                '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>'+
                                              '</div>'+
                                              '<div id="menu3" class="tab-pane fade">'+
                                                '<h3>Menu 3</h3>'+
                                                '<p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>'+
                                              '</div>'+
                                            '</div>'+
                                  

                                      '</li>';

                              
                                            
                                        
                          });
                          $('#personas').html(html);
                          $('#paginador').fadeOut();
                        }
                      },
                      'json'
                    )
                  } else if(key.length == 0){
                    reset(e);
                  }
                };


                $('input[name="buscador"]').on('keyup', buscar);
                $('#buscar').on('click', function(e)
                {
                  var role = $(this).data('role');
                  switch(role)
                  {
                    case 'buscar':
                      $(this).data('role', 'reset');
                      buscar(e);
                    break;

                    case 'reset':
                      $(this).data('role', 'buscar');
                      reset(e);
                    break;
                  }
                });

                var popular_errores_modal = function(data)
                {
                  $('#form_deportista .form-group').removeClass('has-error');
                  var selector = '';
                  for (var error in data){
                      if (typeof data[error] !== 'function') {
                          switch(error)
                          {
                            case 'uno':
                            case 'dos':
                            case 'tres':
                              selector = 'input';
                            break;

                            case 'Cedula':
                            case 'Primer_Apellido':
                            case 'Primer_Nombre':
                            case 'Fecha_Nacimiento':
                            case 'Id_Genero':
                              selector = 'input';
                            break;
                          }
                          $('#form_deportista '+selector+'[name="'+error+'"]').closest('.form-group').addClass('has-error');
                      }
                  }
                }

          $('#form_deportista').on('submit', function(e){
            
                  $.post(
                    'Deportista/ingreso',
                    $(this).serialize(),
                    function(data){
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

          var reset = function(e)
                {
                  $('input[name="buscador"]').val('');
                  $('#buscar span').removeClass('glyphicon-remove').addClass('glyphicon-search');
                  $('#personas').html($personas_actuales);
                  $('#paginador').fadeIn();
                };


                var popular_modal_persona = function(persona)
                {
                  $('select[name="Id_TipoDocumento"]').val(persona['Id_TipoDocumento']);
                  $('input[name="Cedula"]').val($.trim(persona['Cedula']));
                  $('input[name="Primer_Apellido"]').val($.trim(persona['Primer_Apellido']));
                  $('input[name="Segundo_Apellido"]').val(persona['Segundo_Apellido']);
                  $('input[name="Primer_Nombre"]').val($.trim(persona['Primer_Nombre']));
                  $('input[name="Segundo_Nombre"]').val($.trim(persona['Segundo_Nombre']));
                  $('input[name="Fecha_Nacimiento"]').val($.trim(persona['Fecha_Nacimiento']));
                  $('select[name="Id_Etnia"]').val(persona['Id_Etnia']);
                  $('select[name="Nombre_Ciudad"]').data('value', persona['Nombre_Ciudad']);
                  $('select[name="Id_Pais"]').val(persona['Id_Pais']).trigger('change');
                  $('input[name="Id_Persona"]').val(persona['Id_Persona']);

                  $('input[name="Id_Genero"]').removeAttr('checked').parent('.btn').removeClass('active');
                  $('input[name="Id_Genero"][value="'+persona['Id_Genero']+'"]').trigger('click');

                  $('#modal_form_persona').modal('show');
                };


                $('#personas').delegate('a[data-role="editar"]', 'click', function(e){
                  var id = $(this).data('rel');
                  $.get(
                    URL+'/service/obtener/'+id,
                    {},
                    function(data)
                    { 
                      if(data)
                      {
                        popular_modal_persona(data);
                      }
                    },
                    'json'
                  );
                });
 });
</script>

       
@stop


