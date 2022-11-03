<?php
session_start();
if (!isset($_SESSION['tipo'])) {
    header("Location:usuario");
}
require 'view/menu.php';
$menu = new Menu();
$menu->header('director');
?>

<section class="content">
    <div class="container-fluid">
    <br>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-header">Directivos</h3>
                    </div>
                    <div class="card-body">
                        <table id="dataTableDirectivo" name="dataTableDirectivo" class="table table-bordered table-hover dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="width: 15px;">Foto</th>
                                    <th>Nombre</th>
                                    <th>Teléfono</th>
                                    <th>Cédula profesional</th>
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
<!--------------------------------------------------------- Modal Detalle------------------------------------------->
<div class="modal fade" id="modalDetalleDirectivo" tabindex="-1" role="dialog" aria-labelledby="modalDetalleDirectivo" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-primary">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Directivo <small> &nbsp;</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                </div>
                <form role="form" id="formConsulta" name="formConsulta">
                    <div class="card-body">
                        <div class="card border-red">
                            <div class="card-header py-1 bg-secondary ">
                                <h3 class="card-title">Información director</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body border-primary">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Clave director </label>
                                            <input disabled type="text" hiddden class="form-control" id="id_directorConsultar" name="id_directorConsultar" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Usuario</label>
                                            <input disabled type="text" class="form-control" id="username_usuarioConsultar" name="username_usuarioConsultar" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Contraseña</label>
                                            <input disabled type="password" class="form-control" id="password_usuarioConsultar" name="password_usuarioConsultar" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Nombre (s) </label>
                                            <input disabled type="text" class="form-control" id="nombre_directorConsultar" name="nombre_directorConsultar" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Apellido Paterno </label>
                                            <input disabled type="text" class="form-control" id="appaterno_directorConsultar" name="appaterno_directorConsultar" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Apellido Materno </label>
                                            <input disabled type="text" class="form-control" id="apmaterno_directorConsultar" name="apmaterno_directorConsultar" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Fecha nacimiento </label>
                                            <input disabled type="date" class="form-control" id="fechanacimiento_directorConsultar" name="fechanacimiento_directorConsultar" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Teléfono celular </label>
                                            <input disabled type="tel" class="form-control" id="telefono_directorConsultar" name="telefono_directorConsultar" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Correo electrónico</label>
                                            <input disabled type="email" class="form-control" id="email_directorConsultar" name="email_directorConsultar" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>RFC</label>
                                            <input disabled type="text" class="form-control" id="rfc_directorConsultar" name="rfc_directorConsultar" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>CURP</label>
                                            <input disabled type="text" class="form-control" id="curp_directorConsultar" name="curp_directorConsultar" />
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="card border-red">
                                <div class="card-header py-1 bg-secondary ">
                                    <h3 class="card-title">Datos Domicilio </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body border-primary">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Calle </label>
                                                <input disabled type="text" class="form-control" id="calle_directorConsultar" name="calle_directorConsultar" />
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Número Exterior </label>
                                                <input disabled type="text" class="form-control" id="numexterior_directorConsultar" name="numexterior_directorConsultar" />
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label> Número interior</label>
                                                <input disabled type="text" class="form-control" id="numinterior_directorConsultar" name="numinterior_directorConsultar" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Código Postal </label>
                                                <input disabled type="postal-code" class="form-control" id="codigoPostalConsultar" name="codigoPostalConsultar" />
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Estado </label>
                                                <input disabled name="selectEstadoConsultar" id="selectEstadoConsultar" class="form-control selectEstadoConsultar">
                                                <option value="default"></option>
                                                </input>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Municipio </label>
                                                <input disabled name="selectMunicipioConsultar" id="selectMunicipioConsultar" class="form-control selectMunicipioConsultar">
                                                <option value="default"></option>
                                                </input>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Colonia</label>
                                                <input disabled name="selectColoniaConsultar" id="selectColoniaConsultar" class="form-control selectColoniaConsultar">
                                                <option value="default"></option>
                                                </input>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card border-red">
                                <div class="card-header py-1 bg-secondary ">
                                    <h3 class="card-title">Formación Académica y Laboral</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body border-primary">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Grado académico </label>
                                                <select disabled name="id_grado_academicoConsultar" id="id_grado_academicoConsultar" class="form-control id_grado_academico">
                                                    <option value="default">Seleccione su grado de estudios</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Cédula Profesional </label>
                                                <input disabled type="text" class="form-control" id="cedulaprofesional_directorConsultar" name="cedulaprofesional_directorConsultar" />
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Escuela </label>
                                                <select disabled name="id_escuelaConsultar" id="id_escuelaConsultar" class="form-control id_escuela">
                                                    <option value="default">Seleccione su escuela</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>
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

<?php
$menu->footer();
?>
<script>
    var findCp = function(codigoPostal) {
        var codigoLeido = leerCodigoPostal(codigoPostal.value);
        $('#selectEstado').empty();
        for (let i in codigoLeido) {
            $('#selectEstado').append('<option value=' + codigoLeido[i].estado + '>' + codigoLeido[i].estado + '</option>');
            break;
        }
        $('#selectMunicipio').empty();
        for (let i in codigoLeido) {
            $('#selectMunicipio').append('<option value=' + codigoLeido[i].municipio + '>' + codigoLeido[i].municipio + '</option>');
            break;
        }
        $('#selectColonia').empty();
        for (let i in codigoLeido) {
            $('#selectColonia').append('<option value=' + codigoLeido[i].asentamiento + '>' + codigoLeido[i].asentamiento + '</option>');
        }
    }

    var findCpActualizar = function(codigoPostal) {
        var codigoLeido = leerCodigoPostal(codigoPostal.value);
        /*$('#selectEstado').empty();*/
        for (let i in codigoLeido) {
            $('#selectEstadoActualizar').append('<option value=' + codigoLeido[i].estado + '>' + codigoLeido[i].estado + '</option>');
            break;
        }
        $('#selectMunicipio').empty();
        for (let i in codigoLeido) {
            $('#selectMunicipioActualizar').append('<option value=' + codigoLeido[i].municipio + '>' + codigoLeido[i].municipio + '</option>');
            break;
        }
        $('#selectColonia').empty();
        for (let i in codigoLeido) {
            $('#selectColoniaActualizar').append('<option value=' + codigoLeido[i].asentamiento + '>' + codigoLeido[i].asentamiento + '</option>');
        }
    }

    function leerCodigoPostal(codigoPostal) {
        var result = '';
        $.ajax({
            type: "GET",
            url: "<?php echo constant('URL'); ?>/public/js/sepomex_abril-2016.json",
            async: false,
            dataType: "json",
            success: function(rawdata) {
                console.log(rawdata);
                console.log("<?php echo constant('URL'); ?>/public/js/sepomex_abril-2016.json");
                let busqueda = rawdata.filter(codigo => codigo.cp == codigoPostal);
                console.log(busqueda);
                result = busqueda;
            },
            error: function(data) {
                console.log(data);
            }
        });
        return result;
    }

    $(document).ready(function() {
        mostrarDirectivos();
        llenarGradoAcademico();
        llenarEscuela();
        rutaImagen();
    });

    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

    const rutaImagen = () => {
        $.ajax({
            type: "GET",
            url: "<?php echo constant('URL'); ?>directivo/read",
            async: false,
            dataType: "json",
            success: function(data) {
                $.each(data, function(key, registro) {
                    var id = registro.id_director;
                    var nombre = registro.nombre_director;
                    var appat = registro.appaterno_director;
                    var apmat = registro.apmaterno_director;
                    var foto = registro.foto_director;
                    var fullnameImagen = appat + '' + apmat + '' + nombre + '/' + foto;
                    var fotoConsulta = '<?php echo constant('URL'); ?>public/director/' + fullnameImagen;
                    $(".id_director").append('<option value=' + id + '>' + fotoConsulta + '</option>');
                    $('#imgdirectorConsultar').attr(fotoConsulta);
                });
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    const llenarGradoAcademico = () => {
        $.ajax({
            type: "GET",
            url: "<?php echo constant('URL'); ?>gradoAcademico/read",
            async: false,
            dataType: "json",
            success: function(data) {
                $.each(data, function(key, registro) {
                    var id = registro.id_grado_academico;
                    var nombre = registro.nombre_grado_academico;
                    $(".id_grado_academico").append('<option value=' + id + '>' + nombre + '</option>');
                });
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    const llenarEscuela = () => {
        $.ajax({
            type: "GET",
            url: "<?php echo constant('URL'); ?>escuela/read",
            async: false,
            dataType: "json",
            success: function(data) {
                $.each(data, function(key, registro) {
                    var id = registro.id_escuela;
                    var nombre = registro.nombre_escuela;
                    $(".id_escuela").append('<option value=' + id + '>' + nombre + '</option>');
                });
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    var mostrarDirectivos = function() {
        var tableDirectivo = $('#dataTableDirectivo').DataTable({
            "processing": true,
            "serverSide": false,
            "ajax": {
                "url": "<?php echo constant('URL'); ?>directivo/readtable"
            },
            "columns": [{
                    defaultContent: "",
                    'render': function(data, type, JsonResultRow, meta) {
                        var fullnameImagen = JsonResultRow.appaterno_director + '_' + JsonResultRow.apmaterno_director + '_' + JsonResultRow.nombre_director + '/' + JsonResultRow.foto_director;
                        var img = '<?php echo constant('URL'); ?>public/director/' + fullnameImagen;
                        return '<center><img src="' + img + '" class="img-circle"  class="cell-border compact stripe" height="50px" width="50px"/></center>';
                    }
                },
                {
                    defaultContent: "",
                    "render": function(data, type, full) {
                        return full['nombre_director'] + ' ' + full['appaterno_director'] + ' ' + full['apmaterno_director'];
                    }
                },
                {
                    "data": "telefono_director"
                },
                {
                    "data": "cedulaprofesional_director"
                },
                {
                    data: null,
                    "defaultContent": `<button class='consulta btn btn-primary' data-toggle='modal' data-target='#modalDetalleDirectivo' title="Ver Detalles"><i class="fa fa-eye"></i></button>`
                }
            ],
            "fnFooterCallback": function(nRow, aaData, iStart, iEnd, aiDisplay) {
                if (aiDisplay.length > 0) {
                    $('body').removeClass('no-record');
                } else {
                    $('body').addClass('no-record');
                }
            },
            responsive: true,
            autoWidth: false,
            language: idiomaDataTable,
            lengthChange: true,
            buttons: ['copy', 'excel', 'csv', 'pdf', 'colvis'],
            dom: 'Bfltip'
        });
        obtenerdatosDT(tableDirectivo);
    }

    var obtenerdatosDT = function(table) {
        $('#dataTableDirectivo tbody').on('click', 'tr', function() {
            var data = table.row(this).data();
            var idConsulta = $("#id_directorConsultar").val(data.id_director);
            var id_escuelaConsulta = $("#id_escuelaConsultar option[value=" + data.id_escuela + "]").attr("selected", true);
            var id_grado_academicoConsulta = $("#id_grado_academicoConsultar option[value=" + data.id_grado_academico + "]").attr("selected", true);
            var username_usuarioConsulta = $("#username_usuarioConsultar").val(data.username_usuario);
            var password_usuarioConsulta = $("#password_usuarioConsultar").val(data.password_usuario);
            var rutaImagenConsulta = $("#imgdirectorConsultar option[value=" + data.id_director + "]").attr("selected", true);
            var nombre_directorConsulta = $("#nombre_directorConsultar").val(data.nombre_director);
            var appaterno_directorConsulta = $("#appaterno_directorConsultar").val(data.appaterno_director);
            var apmaterno_directorConsulta = $("#apmaterno_directorConsultar").val(data.apmaterno_director);
            var rfc_directorConsulta = $("#rfc_directorConsultar").val(data.rfc_director);
            var curp_directorConsulta = $("#curp_directorConsultar").val(data.curp_director);
            var calle_directorConsulta = $("#calle_directorConsultar").val(data.calle_director);
            var numexterior_directorConsulta = $("#numexterior_directorConsultar").val(data.numexterior_director);
            var numinterior_directorConsulta = $("#numinterior_directorConsultar").val(data.numinterior_director);
            var cp_directorConsulta = $("#codigoPostalConsultar").val(data.cp_director);
            var estado_directorConsulta = $("#selectEstadoConsultar").val(data.estado_director);
            var municipio_directorConsulta = $("#selectMunicipioConsultar").val(data.municipio_director);
            var colonia_directorConsulta = $("#selectColoniaConsultar").val(data.colonia_director);
            var telefono_directorConsulta = $("#telefono_directorConsultar").val(data.telefono_director);
            var email_directorConsulta = $("#email_directorConsultar").val(data.email_director);
            var cedulaprofesional_directorConsulta = $("#cedulaprofesional_directorConsultar").val(data.cedulaprofesional_director);
            var fechanacimiento_directorConsulta = $("#fechanacimiento_directorConsultar").val(data.fechanacimiento_director);
        });
    }

    $.validator.addMethod("selectRequired", function(value, element, arg) {
        return arg !== value;
    }, "Selecciona un valor");
    function soloLetras(e) {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toLowerCase();
        letras = "áéíóúabcdefghijklmnñopqrstuvwxyz ";
        especiales = "8-37-39-46";
        tecla_especial = false
        for (var i in especiales) {
            if (key == especiales[i]) {
                tecla_especial = true;
                break;
            }
        }
        if (letras.indexOf(tecla) == -1 && !tecla_especial) {
            return false;
        }
    }
</script>