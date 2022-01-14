<?php
    require 'view/menu.php';
    $menu = new Menu();
    $menu->header('AdministradorS');
?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 text-right">
                <button class="btn btn-success" data-toggle='modal' data-target='#modalRegistrarAdministradorS'> <i class="fas fa-plus-circle"></i> Registrar AdministradorS </button>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tabla AdministradorS</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="dataTableAdministradorS" name="dataTableAdministradorS" class="table table-bordered table-hover dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>

                                    <th>Escuela Clave </th>
                                    <th>Nombre</th>
                                    <th>Localidad</th>
                                    <th>Turno</th>
                                    <th>Nombre Director</th>
                                    <th>Opciones</th>
                                   
                                  
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--*****************************************MODALS****************************************-->
<!--------------------------------------------------------- Modal Registrar----------------------------------------------->
<div class="modal fade" id="modalRegistrarAdministradorS" tabindex="-1" role="dialog" aria-labelledby="modalRegistrarAdministradorS" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-success">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between " >
                        <h4 class="card-title">AdministradorS <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <!---->

                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="formRegistrarAdministradorS" name="formRegistrarAdministradorS" method="post">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Escuela Clave </label>
                                    <input type="text" class="form-control" id="escuela_clave" name="escuela_clave" placeholder="Escuela Clave"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nombre (*)</label>
                                    <input type="text" class="form-control" id="escuela_nombre" name="escuela_nombre" placeholder="Nombre"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Localidad</label>
                                    <input type="text" class="form-control" id="escuela_localidad" name="escuela_localidad" placeholder="Localidad"/>
                                </div>
                            </div>
                            
                             <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Turno</label>
                                    <input type="text" class="form-control" id="escuela_turno" name="escuela_turno" placeholder="Turno"/>
                                </div>
                            </div>
                             <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nombre Director</label>
                                    <input type="text" class="form-control" id="nombre_director" name="nombre_director" placeholder="Nombre Director"/>
                                </div>
                            </div>
                            <!--
                             <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Apellido paterno</label>
                                    <input type="text" class="form-control" id="director_apaterno" name="director_apaterno" placeholder="Apellido Paterno"/>
                                </div>
                            </div>
                             <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Apellido materno</label>
                                    <input type="text" class="form-control" id="director_amaterno" name="director_amaterno" placeholder="Apellido Materno"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Clave Director</label>
                                    <input type="text" class="form-control" id="director_clave" name="director_clave" placeholder="clave_director"/>
                                </div>
                            </div>-->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success">Registrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--------------------------------------------------------- Modal Actualizar----------------------------------------------->
<div class="modal fade" id="modalActualizarAdministradorS" tabindex="-1" role="dialog" aria-labelledby="modalActualizarAdministradorS" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-warning">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between " >
                        <h4 class="card-title">AdministradorS <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <!---->
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="formActualizarAdministradorS" name="formActualizarAdministradorS">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Matrícula (*)</label>
                                    <input type="text" class="form-control" id="matriculaAdminActualizar" name="matriculaAdminActualizar" placeholder="Matrícula"/>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Escuela Clave</label>
                                    <input type="text" class="form-control" id="escuelaclaveActualizar" name="escuelaclaveActualizar" placeholder="Escuela clave "/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Escuela Nombre</label>
                                    <input type="text" class="form-control" id="escuelanombreActualizar" name="escuelanombreActualizar" placeholder="Apellido paterno"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Escuela Localidad</label>
                                    <input type="text" class="form-control" id="escuelalocalidadActualizar" name="escuelalocalidadActualizar" placeholder="Apellidom materno"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Escuela Turno</label>
                                    <input type="text" class="form-control" id="escuelaturnoActualizar" name="escuelaturnoActualizar" placeholder="Expediente"/>
                                </div>
                            </div>
                        <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Nombre Director</label>
                                    <input type="text" class="form-control" id="nombredirectorActualizar" name="nombredirectorActualizar" placeholder="Expediente"/>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-warning">Actualizar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--------------------------------------------------------- Modal DetalleAdministradorS----------------------------------------------->
<div class="modal fade" id="modalDetalleAdministradorS" tabindex="-1" role="dialog" aria-labelledby="modalDetalleAdministradorS" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-primary">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between " >
                        <h4 class="card-title">AdministradorS <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <!---->
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="formConsulta" name="formConsulta">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Matricula</label>
                                    <input disabled type="text" class="form-control" id="matriculaAdminConsultar" name="matriculaAdminActualizar" placeholder="Matrícula"/>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Escuela Clave</label>
                                    <input disabled type="text" class="form-control" id="escuelaclaveConsultar" name="escuelaclaveConsultar" placeholder="Matrícula"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nombre </label>
                                    <input disabled type="text" class="form-control" id="escuelanombreConsultar" name="escuelanombreConsultar" placeholder="Nombre"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Localidad</label>
                                    <input disabled type="text" class="form-control" id="escuelalocalidadConsultar" name="escuelalocalidadConsultar" placeholder="Localidad"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Turno</label>
                                    <input disabled type="text" class="form-control" id="escuelaturnoConsultar" name="escuelaturnoConsultar" placeholder="Turno"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nombre Director</label>
                                    <input disabled type="text" class="form-control" id="nombredirectorConsultar" name="nombredirectorConsultar" placeholder="Nombre Director"/>
                                </div>
                            </div>
                           
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- ****************************** Modal Eliminar AdministradorS *************************************************-->
<div class="modal fade" id="modalEliminarAdministradorS" tabindex="-1" role="dialog" aria-labelledby="modalEliminarAdministradorS" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Registro</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form role="form" id="formEliminarAdministradorS" name="formActualizarAdministradorS">
                <input type="text" hidden id="idEliminarAdministradorS" name="idEliminarAdministradorS">
                <div class="modal-body text-center text-danger">¿Realmente deseas eliminar este AdministradorS?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-danger" type="submit">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
    $menu->footer();
?>

<script>

    $(document).ready(function (){
        mostrarAdministradorSs();
        enviarFormularioRegistrar();
        enviarFormularioActualizar();
        eliminarRegistro();
    });

    var mostrarAdministradorSs = function() {
        var tableAdministradorS = $('#dataTableAdministradorS').DataTable({
            "processing": true,
            "ajax": {
                "url": "<?php echo constant('URL');?>administradorS/read"
            },
            "columns": [
               
                { "data": "escuela_clave" },
                { "data": "escuela_nombre" },
                { "data": "escuela_localidad" },
                { "data": "escuela_turno" },
                { "data": "nombre_director" },
                /*{ "data": "director_apaterno" },
                { "data": "director_amaterno" },
               */
                {data:null,
                    "defaultContent":
                        `<button class='consulta btn btn-primary' data-toggle='modal' data-target='#modalDetalleAdministradorS' title="Ver Detalles"><i class="fa fa-eye"></i></button>
                         <button class='editar btn btn-warning' data-toggle='modal' data-target='#modalActualizarAdministradorS' title="Editar Datos"><i class="fa fa-edit"></i></button>
                         <button class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminarAdministradorS' title="Eliminar Registro"><i class="far fa-trash-alt"></i></button>`
                }
            ],
            responsive: true,
            autoWidth: false,
            language: idiomaDataTable,
            lengthChange: true,
            buttons: ['copy', 'excel', 'csv', 'pdf', 'colvis'],
            dom: 'Bfltip'
        });
        obtenerdatosDT(tableAdministradorS);
    }

    var obtenerdatosDT = function (table) {
        $('#dataTableAdministradorS tbody').on('click', 'tr', function() {
            var data = table.row(this).data();
            var idEliminar = $('#idEliminarAdministradorS').val(data.matricula_admin);
            
            var idActualizar = $("#matriculaAdminActualizar").val(data.matricula_admin);
            var escuela_clave = $("#escuelaclaveActualizar").val(data.escuela_clave);
            var escuela_nombre = $("#escuelanombreActualizar").val(data.escuela_nombre);
            var escuela_localidad = $("#escuelalocalidadActualizar").val(data.escuela_localidad);
            var escuela_turno = $("#escuelaturnoActualizar").val(data.escuela_turno);
            var nombre_director = $("#nombredirectorActualizar").val(data.nombre_director);
            
            var idConsulta = $("#matriculaAdminConsultar").val(data.matricula_admin);
            var escuela_claveConsultar = $("#escuelaclaveConsultar").val(data.escuela_clave);
            var escuela_nombreConsultar = $("#escuelanombreConsultar").val(data.escuela_nombre);
            var escuela_localidadConsultar =$("#escuelalocalidadConsultar").val(data.escuela_localidad);
            var escuela_turnoConsultar = $("#escuelaturnoConsultar").val(data.escuela_turno);
            var nombre_directorConsultar = $("#nombredirectorConsultar").val(data.nombre_director);
            
            

            
        });
    }

    var enviarFormularioRegistrar = function () {
        $.validator.setDefaults({
            submitHandler: function () {
                var datos = $('#formRegistrarAdministradorS').serialize();
                $.ajax({
                    type: "POST",
                    url: "<?php echo constant('URL');?>administradorS/insert",
                    data: datos,
                    success: function (data) {
                        if (data == 'ok') {
                            Swal.fire(
                                "¡Éxito!",
                                "El AdministradorS ha sido registrado de manera correcta",
                                "success"
                            ).then(function () {
                                window.location = "<?php echo constant('URL');?>administradorS";
                            })
                        } else {
                            Swal.fire(
                                "¡Error!",
                                "Ha ocurrido un error al registrar el administradorS. " + data,
                                "error"
                            );
                        }
                    },
                });
            }
        });
        $('#formRegistrarAdministradorS').validate({
            rules: {
                matriculaAdminActualizar: {
                    required: true,
                    number: true
                },
                escuelaclaveActualizar:{
                    required: true,
                    number: true
                },
                nombre: {
                    required: true
                },
                apellido: {
                    required: true
                }
            },
            messages: {
                matriculaAdminActualizar: {
                    required: "Ingresa una matrícula",
                    number: "Sólo números"
                },
                escuelaclaveActualizar:{
                    required:"Ingrese la clave",
                    number: "Solo números"
                },
                
                nombre: {
                    required: "Ingresa un nombre"
                },
                apellido: {
                    required: "Ingresa un apellido"
                }
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    }

    var enviarFormularioActualizar = function () {
        $.validator.setDefaults({
            submitHandler: function () {
                var datos = $('#formActualizarAdministradorS').serialize();
                $.ajax({
                    type: "POST",
                    url: "<?php echo constant('URL');?>administradorS/update",
                    data: datos,
                    success: function (data) {
                        if (data == 'ok') {
                            Swal.fire(
                                "¡Éxito!",
                                "El AdministradorS ha sido Actualizado de manera correcta",
                                "success"
                            ).then(function () {
                                window.location = "<?php echo constant('URL');?>administradorS";
                            })
                        } else {
                            Swal.fire(
                                "¡Error!",
                                "Ha ocurrido un error al Actualizar el administradorS. " + data,
                                "error"
                            );
                        }
                    },
                });
            }
        });
        $('#formActualizarAdministradorS').validate({
            rules: {
                matriculaActualizar: {
                    required: true,
                    number: true
                },
                escuelanombreActualizar: {
                    required: true
                },
                apellidoActualizar: {
                    required: true
                }
            },
            messages: {
                matriculaActualizar: {
                    required: "Ingresa una matrícula",
                    number: "Sólo números"
                },
                escuelanombreActualizar: {
                    required: "Ingresa un nombre"
                },
                apellidoActualizar: {
                    required: "Ingresa un apellido"
                }
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    }

    var eliminarRegistro = function () {
        $( "#formEliminarAdministradorS" ).submit(function( event ) {
            event.preventDefault();
            var datos = $('#formEliminarAdministradorS').serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo constant('URL');?>administradorS/delete",
                data: datos,
                success: function (data) {
                    if (data == 'ok') {
                        Swal.fire(
                            "¡Éxito!",
                            "El AdministradorS ha sido eliminado correctamente",
                            "success"
                        ).then(function () {
                            window.location = "<?php echo constant('URL');?>administradorS";
                        })
                    } else {
                        Swal.fire (
                            "¡Error!",
                            "Ha ocurrido un error al eliminar el administradorS. " + data,
                            "error"
                        );
                    }
                },
            });
        });
    }

    /*var dataTableFunction = function () {
        var table = $("#dataTableAdministradorS").DataTable({
            responsive: true,
            language: idiomaDataTable,
            lengthChange: true,
            buttons: ['copy', 'excel', 'csv', 'pdf', 'colvis'],
            dom: 'Bfltip'
        });

        table.buttons().container().appendTo('#dataTableAdministradorS_wrapper .col-md-6:eq(0)');
    }*/
</script>