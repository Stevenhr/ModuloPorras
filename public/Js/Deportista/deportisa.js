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
                            html += '<li class="list-group-item" style="border:0">'+
                                       
                                            '<h2>MENÚ DEPORTISTA</h2>'+
                                            '<ul class="nav nav-pills">'+
                                              '<li class="active"><a data-toggle="pill" href="#home">Información Basica</a></li>'+
                                              '<li><a data-toggle="pill" href="#menu1">Información Deportiva</a></li>'+
                                              '<li><a data-toggle="pill" href="#menu2">Información Basica</a></li>'+
                                              '<li><a data-toggle="pill" href="#menu3">Apoyos y Servicios</a></li>'+
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