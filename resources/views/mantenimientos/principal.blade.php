<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Parosac</title>
    <link rel="icon" type="image/ico" href="/cleanzone/img/favicon.ico">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800" rel="stylesheet"
          type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Raleway:300,200,100" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700" rel="stylesheet" type="text/css">

    {!! HTML::style('cleanzone/lib/bootstrap/dist/css/bootstrap.min.css') !!}
    {!! HTML::style('cleanzone/lib/font-awesome/css/font-awesome.min.css') !!}
    {!! HTML::style('cleanzone/lib/jquery.nanoscroller/css/nanoscroller.css') !!}
    {!! HTML::style('cleanzone/lib/jquery.datatables/plugins/bootstrap/3/dataTables.bootstrap.css') !!}
    {!! HTML::style('cleanzone/lib/bootstrap.switch/css/bootstrap3/bootstrap-switch.min.css') !!}
    {!! HTML::style('cleanzone/lib/bootstrap.datetimepicker/css/bootstrap-datetimepicker.min.css') !!}
    {!! HTML::style('cleanzone/lib/jquery.select2/select2.css') !!}

    {!! HTML::style('cleanzone/lib/bootstrap.slider/css/bootstrap-slider.css') !!}
    {!! HTML::style('cleanzone/lib/bootstrap.daterangepicker/daterangepicker-bs3.css') !!}
    {!! HTML::style('cleanzone/lib/jquery.icheck/skins/square/blue.css') !!}
    {!! HTML::style('cleanzone/lib/jquery.gritter/css/jquery.gritter.css') !!}
    {!! HTML::style('cleanzone/lib/jquery.niftymodals/css/component.css') !!}
    {!! HTML::style('cleanzone/lib/jquery.select2/select2.css') !!}
    {!! HTML::style('cleanzone/lib/dropzone/dist/dropzone.css') !!}
    {!! HTML::style('cleanzone/lib/jquery.magnific-popup/magnific-popup.css') !!}

    {!! HTML::style('cleanzone/css/style.css') !!}
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">

    <style>
        .table tbody tr:hover{
            background: rgba(96, 125, 139, 0.18);
            cursor:pointer;
        }
    </style>
    @yield('css')
</head>

<body>
<div id="head-nav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" data-toggle="collapse" data-target=".navbar-collapse" class="navbar-toggle"><span
                        class="fa fa-gear"></span></button>
            <a href="#" class="navbar-brand" style="height: 50px;"></a></div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="#">Inicio</a></li>
                <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Operaciones <b
                                class="caret"></b></a>
                    <ul class="dropdown-menu col-menu-2">
                        <li class="col-sm-6 no-padding">
                            <ul>
                                <li class="dropdown-header"><i class="fa fa-legal"></i>Clientes</li>
                                <li><a href="/mantenimientos/cliente">Clientes</a></li>
                                <li><a href="/mantenimientos/menu">Programación de Menus</a></li>
                            </ul>
                        </li>
                        <li class="col-sm-6 no-padding">
                            <ul>
                                <li class="dropdown-header"><i class="fa fa-book"></i>Operación</li>
                                <li><a href="/mantenimientos/servir">Servir</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right user-nav">
                <li class="dropdown profile_menu">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle"><img class="img-circle" style='width: 25px;' alt="Avatar" src="http://i1184.photobucket.com/albums/z337/pocaspenas/gato_shrek.jpg"><span>Oliver Sánchez</span><b
                                class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">My Account</a></li>
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Messages</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Sign Out</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right not-nav">
                <li class="button dropdown"><a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle"><i
                                class="fa fa-comments"></i></a>
                    <ul class="dropdown-menu messages">
                        <li>
                            <div class="nano nscroller">
                                <div class="content">
                                    <ul>
                                        <li>
                                            <a href="#"><img class="img-circle" style='width: 37px;' src="http://i1184.photobucket.com/albums/z337/pocaspenas/gato_shrek.jpg" alt="avatar"><span
                                                        class="date pull-right">2 Nov.</span><span
                                                        class="name">Lucy</span> is now following you</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <ul class="foot">
                                <li><a href="#">View all messages </a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="button dropdown"><a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle"><i
                                class="fa fa-globe"></i><span class="bubble">2</span></a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="nano nscroller">
                                <div class="content">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-cloud-upload info"></i><b>Daniel</b> is now
                                                following you <span class="date">2 minutes ago.</span></a></li>
                                        <li><a href="#"><i class="fa fa-male success"></i><b>Michael</b> is now
                                                following you <span class="date">15 minutes ago.</span></a></li>
                                        <li><a href="#"><i class="fa fa-bug warning"></i><b>Mia</b> commented on post
                                                <span class="date">30 minutes ago.</span></a></li>
                                        <li><a href="#"><i class="fa fa-credit-card danger"></i><b>Andrew</b> killed
                                                someone <span class="date">1 hour ago.</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <ul class="foot">
                                <li><a href="#">View all activity </a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="button"><a href="javascript:;" class="speech-button"><i class="fa fa-microphone"></i></a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div id="cl-wrapper">
    <!--Sidebar item function-->
    <!--Sidebar sub-item function-->
    @yield('content')

    <div id="msg_error" style='display:none;'></div>
</div>

{!! HTML::script('cleanzone/lib/jquery/jquery.min.js') !!}
{!! HTML::script('cleanzone/lib/bootstrap/dist/js/bootstrap.min.js') !!}
{!! HTML::script('cleanzone/lib/jquery.nanoscroller/javascripts/jquery.nanoscroller.js') !!}
{!! HTML::script('cleanzone/js/cleanzone.js') !!}
{!! HTML::script('cleanzone/lib/jquery.gritter/js/jquery.gritter.js') !!}

{!! HTML::script('cleanzone/lib/jquery.datatables/js/jquery.dataTables.min.js') !!}
{!! HTML::script('cleanzone/lib/jquery.datatables/plugins/bootstrap/3/dataTables.bootstrap.js') !!}
{!! HTML::script('cleanzone/lib/jquery.select2/select2.min.js') !!}
{!! HTML::script('cleanzone/lib/bootstrap.slider/js/bootstrap-slider.js') !!}
{!! HTML::script('cleanzone/lib/jquery.nestable/jquery.nestable.js') !!}
{!! HTML::script('cleanzone/lib/jquery-ui/jquery-ui.min.js') !!}
{!! HTML::script('cleanzone/lib/bootstrap.switch/js/bootstrap-switch.js') !!}
{!! HTML::script('cleanzone/lib/bootstrap.datetimepicker/js/bootstrap-datetimepicker.min.js') !!}
{!! HTML::script('cleanzone/lib/jquery.icheck/icheck.min.js') !!}
{!! HTML::script('cleanzone/lib/moment.js/min/moment.min.js') !!}
{!! HTML::script('cleanzone/lib/bootstrap.daterangepicker/daterangepicker.js') !!}
{!! HTML::script('cleanzone/lib/bootstrap.slider/js/bootstrap-slider.js') !!}
{!! HTML::script('cleanzone/lib/jquery.parsley/dist/parsley.min.js') !!}
{!! HTML::script('cleanzone/lib/jquery.parsley/src/extra/dateiso.js') !!}
{!! HTML::script('cleanzone/lib/jquery.niftymodals/js/jquery.modalEffects.js') !!}
{!! HTML::script('cleanzone/lib/jquery.select2/select2.min.js') !!}
{!! HTML::script('cleanzone/lib/dropzone/dist/dropzone.js') !!}
{!! HTML::script('cleanzone/lib/masonry/masonry.pkgd.min.js') !!}
{!! HTML::script('cleanzone/lib/jquery.magnific-popup/jquery.magnific-popup.min.js') !!}

<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>


@yield('scripts')
<script>

    function grupo_opciones(id){
        var opciones = "<div class='btn-group'>";
        opciones += "<button class='btn btn-default btn-xs' type='button'>Acciones</button>";
        opciones += "<button data-toggle='dropdown' class='btn btn-xs btn-primary dropdown-toggle' type='button' aria-expanded='true'>";
        opciones += "        <span class='caret'></span>";
        opciones += "        <span class='sr-only'>Toggle Dropdown</span>";
        opciones += "</button>";
        opciones += "<ul role='menu' class='dropdown-menu pull-right'>";
        opciones += "<li><a href='#' onclick=editar("+id+")><i class='fa fa-edit'></i> Editar</a></li>";
        opciones += "<li><a href='#' onclick=eliminar("+id+")><i class='fa fa-trash-o'></i> Eliminar</a></li>";
        opciones += "</ul>";
        return opciones;
    }

    function notificacion_html5(title,body){
        if(window.Notification && Notification.permission !== "denied") {
            Notification.requestPermission(function(status) {  // status is "granted", if accepted by user
                var n = new Notification(title, {
                    body: body,
                    icon : '/img/logo - copia.png'
                });
                setTimeout(function(){
                    n.close();
                },2000);
            });
        }
    }
    function notificacion(titulo,texto,clase){
        $.gritter.add({title: titulo, text: texto, class_name: clase});
    }

    function mostrar_error(html){
        var pag = $("#msg_error");
        pag.append(html);
        var errores = $(pag).find('.exception_message');
        var errors_title = [];
        var errors_detail = [];
        $.each(errores,function(index,value){
            errors_title.push($(value).html().split("<br>")[0]);
            errors_detail.push($(value).html().split("<br>")[1]);
        });
        errors_title = $.unique(errors_title);
        $.each(errors_title,function(index,value){
            notificacion('Error', value, 'warning');
        });
        pag.html("");
        return errors_title;
    }

</script>
</body>
</html>
