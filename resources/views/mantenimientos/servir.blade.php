@extends('mantenimientos/principal')

@section('content')
    <div id="pcont" class="container-fluid">
        <div class="page-head">
            <h2 style="display:inline-block;">Compañia</h2>
            <i id="loading" style="display:none;" class="fa fa-2x fa-spinner fa-spin"></i>
            <select class="input-lg" id="cmbCliente" style="width: 700px;margin-top:-20px;"
                    onchange="listarMenus()"></select>
            <input id="txtFecha" onchange="listarMenus()" class="form-control date datetime input-lg"
                   data-min-view="2" data-date-format="dd/mm/yyyy" type="text"
                   maxlength="10" data-parsley-trigger="change"
                   data-parsley-required="true" style="font-size: 22px;font-weight: 600;width: 180px;display:inline-block;margin-top:-5px;">
            <button class="btn btn-default" onclick="listarMenus()"><i class="fa fa-refresh"></i></button>
        </div>
        <div class="cl-mcont">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="tab-container">
                        <ul class="nav nav-tabs">
                            <li class="active"><a style="font-size: 23px;font-weight: 700;color: #1f3b62;" href="#tp_1" data-toggle="tab">Buscar Comensal</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tp_1" class="tab-pane active cont">
                                <div class="row">
                                    <label class="col-sm-2" style="font-size: 22px;padding: 5px 0px;">Nro Doc.</label>
                                    <div class="col-sm-3">
                                        <input onchange="buscarDocumento(this)"
                                               id="txtDocumento" class="form-control" type="text"
                                               data-parsley-trigger="change" data-parsley-length="[8,15]"
                                               data-parsley-required="true" style="font-size: 17px;font-weight: 600;">
                                    </div>
                                    <div class="col-sm-5">
                                        <button class="btn btn-default"><i class="fa fa-search"></i></button>
                                        <button class="btn btn-primary" onclick="buscarHuella()"><i class="fa fa-hand-o-up"></i></button>
                                        <button class="btn btn-default" onclick="cancelarPedido()"><i class="fa fa-ban"></i> Cancelar</button>
                                    </div>
                                </div>
                                <blockquote style="margin-top:20px;">
                                    <div class="row" style="margin-top:0px;">
                                        <div class="col-sm-3">
                                            <img id="imgFoto" class="img-responsive">
                                        </div>
                                        <div class="col-sm-9">
                                            <label id="lblComensal"></label>
                                            <div>
                                                <table class="table table-responsive" id="tblListado">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 90%;">Plato</th>
                                                            <th style="width: 10%;">Quitar</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="tab-container">
                        <ul class="nav nav-tabs">
                            <li class="active"><a style="font-size: 23px;font-weight: 700;color: green;" href="#tp1" data-toggle="tab">Elección</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tp1" class="tab-pane active cont">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="dvGaleria" class="gallery-cont">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tp2" class="tab-pane cont">
                                <div class="container">
                                    <form id="frmCliente" method="post" data-parsley-validate=""
                                          data-parsley-excluded="[disabled=disabled]" novalidate="">
                                        <input type="hidden" id="hddCodigo" value="">
                                        <div class="row">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">

        var t;
        $(document).ready(function () {
            //initialize the javascript
            App.init();
            App.formElements();
            t = $("#tblListado").DataTable();
            $("#cmbCliente").select2();
            $("#frmCliente").parsley();
            listarCliente();
            $('.gallery-cont').masonry();
            cancelar();
        });

        function cancelarPedido(){
            $("#txtDocumento").val("");
            $("#imgFoto").attr('src','');
            $("#lblComensal").html("");
            $("#txtDocumento").focus();
        }
        function guardar() {
            var accion = $("#hddCodigo").val() == "" ? true : false;
            if ($("#frmCliente").parsley().validate()) {
                if (accion)
                    registrar()
                else
                    modificar()
            }
        }

        function obtenerDatos() {
            var info = [{
                "_token": "{{ csrf_token() }}",
                "nombres": $("#txtPersona_Nombres").val(),
                "codigo_educando": $("#txtCodigo_Educando").val(),
                "codigo_recaudacion": $("#txtCodigo_Recaudacion").val(),
                "colegio_procedencia_id": parseInt($("#cmbColegio_Procedencia").val()),
                "padres_juntos": $("#chkPadres_Conviven").is(":checked"),
                "activo": $("#chkActivo").is(":checked")
            }][0];
            return info;
        }

        function registrar() {
            if (confirm("¿Deseas continuar el registro?")) {
                var info = obtenerDatos();
                $.ajax({
                    url: "/intranet/mantenimientos/alumno",
                    type: "POST",
                    data: info,
                    beforeSend: function () {
                        $("#loading").show();
                    },
                    success: function (data) {
                        notificacion('Registro', 'Datos registrados correctamente', 'primary');
                        cancelar();
                    },
                    error: function (request, status, error) {
                        mostrar_error(request.responseText);
                    },
                    complete: function () {
                        $("#loading").hide();
                    }
                });
            }
        }

        function modificar() {
            if (confirm("¿Deseas continuar la modificación?")) {
                var info = obtenerDatos();
                $.ajax({
                    url: "/intranet/mantenimientos/alumno/" + $("#hddCodigo").val(),
                    type: "PUT",
                    data: info,
                    beforeSend: function () {
                        $("#loading").show();
                    },
                    success: function (data) {
                        notificacion('Actualización', 'Datos actualizados correctamente', 'success');
                        cancelar();
                    },
                    error: function (request, status, error) {
                        mostrar_error(request.responseText);
                    },
                    complete: function () {
                        $("#loading").hide();
                    }
                });
            }
        }

        function eliminar(id) {
            if (confirm("¿Deseas eliminar el elemento?")) {
                var info = [{"_token": "{{ csrf_token() }}"}][0];
                $.ajax({
                    url: "/intranet/mantenimientos/alumno/" + id,
                    type: "DELETE",
                    data: info,
                    beforeSend: function () {
                        $("#loading").show();
                    },
                    success: function (data) {
                        notificacion('Eliminación', 'Datos actualizados correctamente', 'warning');
                        cancelar();
                    },
                    error: function (request, status, error) {
                        mostrar_error(request.responseText);
                    },
                    complete: function () {
                        $("#loading").hide();
                    }
                });
            }
        }

        function editar(id) {
            $.ajax({
                url: "/intranet/mantenimientos/alumno/" + id,
                type: "GET",
                beforeSend: function () {
                    $("#loading").show();
                },
                success: function (data) {
                    $("#hddCodigo").val(id);

                    $("#txtPersona_Nombres").val(data["nombres"]);
                    $("#txtPersona_ApPat").val(data["apellido_paterno"]);
                    $("#txtPersona_ApMat").val(data["apellido_materno"]);
                    $("#txtPersona_Numero_Documento").val(data["numero_documento"]);
                    $("#cmbPersona_TipoDoc").val(data["tipo_documento"]);
                    $("#txtPersona_FechaNac").val(data["fecha_nacimiento"]);
                    $("#txtPersona_Direccion").val(data["direccion"]);
                    $("#txtPersona_Telf_Fijo").val(data["telf_fijo"]);
                    $("#cmbPersona_Sexo").val(data["sexo"]);

                    $("#txtCodigo_Recaudacion").val(data["codigo_recaudacion"]);
                    $("#txtCodigo_Educando").val(data["codigo_educando"]);
                    $("#cmbColegio_Procedencia").val(data['colegio_procedencia_id']);
                    $("#chkPadres_Conviven").iCheck(data['padres_juntos'] == true ? "check" : "uncheck");
                    $("#chkActivo").iCheck(data['activo'] == true ? "check" : "uncheck");
                    $("#btnGuardar").text("Guardar");
                    $("#txtPersona_Numero_Documento").prop('disabled', true);
                    $('a[href="#tp2"]').click();
                    $('a[href="#tp2"]').text("Modificando : " + data["apellido_paterno"] + ' ' + data['apellido_paterno'] + ' ' + data["nombres"]);
                },
                error: function (request, status, error) {
                    mostrar_error(request.responseText);
                },
                complete: function () {
                    $("#loading").hide();
                }
            });
        }

        function cancelar() {
            $("#hddCodigo").val("");
            $("#txtPersona_Nombres").val("");
            $("#txtPersona_ApPat").val("");
            $("#txtPersona_ApMat").val("");
            $("#txtPersona_Numero_Documento").val("");
            $("#txtPersona_FechaNac").val("");
            $("#txtPersona_Direccion").val("");
            $("#txtPersona_Telf_Fijo").val("");
            $("#cmbPersona_Sexo").val("F");
            $("#cmbPersona_TipoDoc").val("DN");

            $("#chkActivo").iCheck("check");
            $("#chkPadres_Conviven").iCheck("check");
            $("#btnGuardar").text("Registrar");
            $('#frmCliente').parsley().reset();
            $("#txtPersona_Numero_Documento").prop('disabled', false);
            $('a[href="#tp1"]').click();
            $('a[href="#tp2"]').text("Registrar");
            listarComensal();
        }

        function listarCliente() {
            $.ajax({
                url: "/mantenimientos/cliente/*",
                type: "GET",
                beforeSend: function () {
                    $("#loading").show();
                },
                success: function (data) {
                    var opciones = "<option value=''>---</option>";
                    $.each(data, function (index, value) {
                        opciones += "<option value='" + value["id"] + "'>" + value["razon_social"] + " (" + value["ruc"] + ") / " + value["representante"] + "</option>";
                    });
                    $("#cmbCliente").append(opciones);
                },
                error: function (request, status, error) {
                    mostrar_error(request.responseText);
                },
                complete: function () {
                    $("#loading").hide();
                }
            });
        }

        function listarMenus() {
            var cliente_id =  $("#cmbCliente").val();
            var fecha =  $("#txtFecha").val();
            if(cliente_id != "" && fecha != "") {
                var info = [{
                    "_token": "{{ csrf_token() }}",
                    "cliente_id": parseInt(cliente_id),
                    "fecha": fecha
                }][0];
                $.ajax({
                    url: "/mantenimientos/menu/listar",
                    type: "GET",
                    data: info,
                    beforeSend: function () {
                        $("#loading").show();
                    },
                    success: function (data) {
                        var $container = $('.gallery-cont');
                        $container.masonry('destroy');

                        var imagenes = "";
                        $.each(data, function (index, value) {
                            imagenes += '<div class="item">';
                            imagenes += '   <div class="photo">';
                            imagenes += '        <div class="head">';
                            imagenes += '            <h4 title="'+value["nombre"]+'">' + value["plato"]["nombre"] + '</h4>';
                            imagenes += '        </div>';
                            imagenes += '        <div class="img">';
                            imagenes += '           <img  src="' + value["plato"]["url_foto"] + '">';
                            imagenes += '           <div class="over">';
                            imagenes += '               <div class="func">';
                            imagenes += '                   <a href="#" plato_nombre="'+value["plato"]["nombre"]+'" onclick="agregar_plato(this)"><i class="fa fa-plus"></i></a>';
                            imagenes += '                   <a href="' + value["plato"]["url_foto"] + '" class="image-zoom"><i class="fa fa-search"></i></a>';
                            imagenes += '               </div>';
                            imagenes += '           </div>';
                            imagenes += '       </div>';
                            imagenes += '   </div>';
                            imagenes += '</div>';
                        });

                        $container.html(imagenes);

                        $container.masonry();

                        $('img').on('load',function() {
                            $(".gallery-cont").masonry();
                        });

                        $(".image-zoom").magnificPopup({
                            type: "image",
                            mainClass: "mfp-with-zoom",
                            zoom: {
                                enabled: !0, duration: 300, easing: "ease-in-out", opener: function (a) {
                                    var b = $(a).parents("div.img");
                                    return b
                                }
                            }
                        });
                    },
                    error: function (request, status, error) {
                        mostrar_error(request.responseText);
                    },
                    complete: function () {
                        $("#loading").hide();
                    }
                });
            }else{
                $(".gallery-cont").html("");
            }
        }

        function listarComensal() {
            var cliente_id = $("#cmbCliente").val();

            if (cliente_id != "" && cliente_id != null) {
                var info = [{ "_token": "{{ csrf_token() }}",
                    "cliente_id": parseInt(cliente_id)}][0];

                $.ajax({
                    url: "/mantenimientos/comensal/listar",
                    type: "GET",
                    data: info,
                    beforeSend: function () {
                        $("#loading").show();
                    },
                    success: function (data) {
                        console.log(data);
                        t.clear().draw();
                        $.each(data, function (index, value) {
                            var nodo = t.row.add([value['numero_documento'],
                                value['apellido_paterno'],
                                value['apellido_materno'],
                                value['nombres'],
                                grupo_opciones(value['id'])]).draw(false).node();
                            if (value["activo"] == false)
                                $(nodo).addClass('danger');
                        });
                    },
                    error: function (request, status, error) {
                        mostrar_error(request.responseText);
                    },
                    complete: function () {
                        $("#loading").hide();
                    }
                });
            }
        }

        function buscarDocumento(){
            var cliente_id = $("#cmbCliente").val();
            var numero_documento = $("#txtDocumento").val();
            if (cliente_id != "" && cliente_id != null) {
                var info = [{ "_token": "{{ csrf_token() }}",
                    "cliente_id": parseInt(cliente_id),
                    "numero_documento": numero_documento}][0];
                $.ajax({
                    url: "/mantenimientos/comensal/buscar",
                    type: "GET",
                    data: info,
                    beforeSend: function () {
                        $("#loading").show();
                    },
                    success: function (data) {
                        if(data.length > 0){
                            $.each(data, function (index, value) {
                                $("#imgFoto").attr('src',value["url_foto"]);
                                $("#lblComensal").html("<h3>"+value["apellido_paterno"]+" "+value["apellido_materno"]+" "+value["nombres"]+"</h3>");
                            });
                        }else{
                            $("#imgFoto").attr('src','');
                        }

                    },
                    error: function (request, status, error) {
                        mostrar_error(request.responseText);
                    },
                    complete: function () {
                        $("#loading").hide();
                    }
                });
            }
        }

        $('#txtDocumento').keyup(function(e){
            if(e.keyCode == 13)
            {
                buscarDocumento();
            }
        });

        $('#txtDocumento').focus(function(){
            $("#txtDocumento").select();
        });

        function buscarHuella(){
            $.ajax({
                url: "http://127.0.0.1:12345",
                type: "POST",
                data: {"tipo" : "C"},
                dataType: "json",
                beforeSend: function () {
                    $("#loading").show();
                    alert(1);
                },
                success: function (data) {
                    console.log(data);
                },
                error: function (request, status, error) {
                    mostrar_error(request.responseText);
                },
                complete: function () {
                    $("#loading").hide();
                }
            });
        }

        function agregar_plato(obj){
            var plato = $(obj).attr("plato_nombre");
            $("#dvItems").append(plato + "<button onclick='eliminarItem(this)' class='btn btn-default'><i class='fa fa-trash-o'></i></button>");
        }

        function eliminarItem(obj){
            $(obj).remove();
        }

    </script>
@endsection

