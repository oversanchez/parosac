@extends('mantenimientos/principal')

@section('content')
    <div id="pcont" class="container-fluid">
        <div class="page-head">
            <h2 style="display:inline-block;">Clientes</h2>
            <i id="loading" style="display:none;" class="fa fa-2x fa-spinner fa-spin"></i>
            <select class="input-lg" id="cmbCliente" style="width: 600px;margin-top:-20px;"
                    onchange="listarComensal()"></select>
            <button class="btn btn-default" onclick="cliente()"><i class="fa fa-edit"></i></button>
        </div>
        <div class="cl-mcont">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="tab-container">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tp1" data-toggle="tab">Mis Comenzales</a></li>
                            <li><a href="#tp2" data-toggle="tab">Registrar</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tp1" class="tab-pane active cont">
                                <table class='table table-bordered dataTable no-footer' id="tblListado">
                                    <thead>
                                    <tr>
                                        <th>Nro. Doc</th>
                                        <th>Ap. Paterno</th>
                                        <th>Ap. Materno</th>
                                        <th>Nombres</th>
                                        <th style="width:76px;">Acción</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                            <div id="tp2" class="tab-pane cont">
                                <div class="container">
                                    <form id="frmCliente" method="post" data-parsley-validate=""
                                          data-parsley-excluded="[disabled=disabled]" novalidate="">
                                        <input type="hidden" id="hddCodigo" value="">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <label class="col-sm-2">Tipo Doc.</label>
                                                    <div class="col-sm-3">
                                                        <select class="form-control" id="cmbPersona_TipoDoc"
                                                                requerid="">
                                                            <option value="DN">DNI</option>
                                                            <option value="CE">CARNET EXTRANJERÍA</option>
                                                            <option value="PA">PASAPORTE</option>
                                                        </select>
                                                    </div>
                                                    <label class="col-sm-1" style="width: 58px;padding: 5px 0px;">Nro
                                                        Doc.</label>
                                                    <div class="col-sm-3">
                                                        <input onchange="buscar_numero_documento(this)"
                                                               id="txtPersona_Numero_Documento" class="form-control"
                                                               type="text"
                                                               data-parsley-trigger="change"
                                                               data-parsley-length="[8,15]"
                                                               data-parsley-required="true">
                                                    </div>
                                                    <div class="col-sm-2" style="padding: 6px 0px;">
                                                        <label id="persona_mensaje">Teclea ⏎ ENTER </label>
                                                        <div id="persona_loading" style="display:none;">
                                                            <i class="fa fa-spinner fa-spin"></i>
                                                            <label>Validando</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2">Apellidos</label>
                                                    <div class="col-sm-4">
                                                        <input id="txtPersona_ApPat" class="form-control" type="text"
                                                               maxlength="50" data-parsley-trigger="change"
                                                               data-parsley-length="[1,50]"
                                                               data-parsley-required="true">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input id="txtPersona_ApMat" class="form-control" type="text"
                                                               maxlength="50">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2">Nombres</label>
                                                    <div class="col-sm-8">
                                                        <input id="txtPersona_Nombres" class="form-control" type="text"
                                                               maxlength="50" data-parsley-trigger="change"
                                                               data-parsley-length="[2,50]"
                                                               data-parsley-required="true">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2">Sexo</label>
                                                    <div class="col-sm-3">
                                                        <select class="form-control" id="cmbPersona_Sexo" requerid="">
                                                            <option value="M">MASCULINO</option>
                                                            <option value="F">FEMENINO</option>
                                                        </select>
                                                    </div>
                                                    <label class="col-sm-2">Fecha Nac.</label>
                                                    <div class="col-sm-3">
                                                        <input id="txtPersona_FechaNac"
                                                               class="form-control date datetime"
                                                               data-min-view="2" data-date-format="dd/mm/yyyy"
                                                               type="text"
                                                               maxlength="10" data-parsley-trigger="change"
                                                               data-parsley-required="true">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2">Dirección</label>
                                                    <div class="col-sm-9">
                                                        <input id="txtPersona_Direccion" class="form-control"
                                                               type="text"
                                                               maxlength="100" data-parsley-trigger="change"
                                                               data-parsley-required="true">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <label class="col-sm-2">Codigo Educando</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" id="txtCodigo_Educando" class="form-control">
                                                    </div>
                                                    <label class="col-sm-3">Codigo Recaudación</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" id="txtCodigo_Recaudacion"
                                                               class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2">Colegio Proc.</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" id="cmbColegio_Procedencia"
                                                                required="" style='width:100%;'>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2">Telef. fijo</label>
                                                    <div class="col-sm-3">
                                                        <input class="form-control" type="text"
                                                               id="txtPersona_Telf_Fijo"
                                                               placeholder="Ejem. 254478" data-parsley-trigger="change"
                                                               data-parsley-length="[6,8]" data-parsley-required="true">
                                                    </div>
                                                    <label class="col-sm-4">
                                                        <input id="chkPadres_Conviven" class="icheck" type="checkbox"
                                                               checked>Padres viven juntos
                                                    </label>
                                                    <label class="col-sm-2">
                                                        <input id="chkActivo" class="icheck" type="checkbox" checked>
                                                        Activo
                                                    </label>
                                                </div>
                                            </div>


                                        </div>


                                    </form>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button id="btnGuardar" class="btn btn-primary" onclick="guardar()">Registrar
                                            alumno
                                        </button>
                                        <button class="btn btn-default" onclick="cancelar()">Cancelar</button>
                                    </div>
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
            cancelar();
        });

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
                "apellido_paterno": $("#txtPersona_ApPat").val(),
                "apellido_materno": $("#txtPersona_ApMat").val(),
                "tipo_documento": $("#cmbPersona_TipoDoc").val(),
                "numero_documento": $("#txtPersona_Numero_Documento").val(),
                "sexo": $("#cmbPersona_Sexo").val(),
                "fecha_nacimiento": $("#txtPersona_FechaNac").val(),
                "direccion": $("#txtPersona_Direccion").val(),
                "telf_fijo": $("#txtPersona_Telf_Fijo").val(),

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

    </script>
@endsection

