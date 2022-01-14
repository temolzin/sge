<?php
    session_start();
require 'view/menu.php';
$menu = new Menu();
$menu->header('materia_profesor_consulta');
?>
<head>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="public/plugins/fontawesome-free/css/all.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="public/plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="public/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="public/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="public/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="public/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="public/plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="public/plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="public/dist/css/adminlte.min.css">
</head>
<section class="content">
    <div class="container-fluid">
        
        <br>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header"  >
                        <h3>Materias Y Grupos Registrados</h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="dataTableMateriaProfesor" name="dataTableMateriaProfesor" class="table table-bordered table-hover dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Grupo</th>
                                    <th>Materia</th>
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

<!--------------------------------------------------------- Modal Detalle------------------------------------------>
<div class="modal fade" id="modalDetalleMateriaProfesor" tabindex="-1" role="dialog" aria-labelledby="modalDetalleMateriaProfesor" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-primary">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between " >
                        <h4 class="card-title">Asignación de Materias-Profesores <small> &nbsp;</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <!---->
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="formConsulta" name="formConsulta">
                    <div class="card-body">


                       <div class="card border-red">
                        <div class="card-header py-1 bg-secondary "> 
                            <h3 class="card-title">Información de la materia-profesor</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body border-primary">
                            <div class="row">
                                <input type="text" hidden class="form-control" id="id_materiaProfesorConsultar" name="id_materiaProfesorConsultar" />
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Profesor</label>
                                        <select disabled name="id_profesorConsultar" id="id_profesorConsultar" class="form-control id_profesor">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Grupo </label>

                                        <select disabled name="id_grupoConsultar" id="id_grupoConsultar" class="form-control id_grupo">
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Materia </label>
                                        <input disabled name="id_materiaConsultar" id="id_materiaConsultar" class="form-control id_materiaConsultar">
                                    </input>
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

    $(document).ready(function (){
        mostrarMaterias();
      
        llenarMateria();
        llenarProfesor();
        llenarGrupo();

        
    });

  const llenarMateria = () => {
    $.ajax({
      type: "GET",
      url: "<?php echo constant('URL');?>materia/read",
      async: false,
      dataType: "json",
      success: function(data){
        $.each(data,function(key, registro) {
          var id = registro.id_materia;
          var nombre = registro.nombre_materia;
          $(".id_materia").append('<option value='+id+'>'+nombre+'</option>');
      });
    },
    error: function(data) {
        console.log(data);
    }
});
}

const llenarProfesor = () => {
    $.ajax({
        type: "GET",
        url: "<?php echo constant('URL');?>profesor/read",
        async: false,
        dataType: "json",
        success: function(data){
            $.each(data,function(key, registro) {
                var id = registro.id_profesor;
                var nombre = registro.nombre_profesor;
                var appat = registro.appaterno_profesor;
                var apmat = registro.apmaterno_profesor;
                $(".id_profesor").append('<option value='+id+'>'+nombre+' '+appat+' '+apmat+'</option>');
            });
        },
        error: function(data) {
            console.log(data);
        }
    });
}

const llenarGrupo = () => {
    $.ajax({
      type: "GET",
      url: "<?php echo constant('URL');?>grupo/read",
      async: false,
      dataType: "json",
      success: function(data){
        $.each(data,function(key, registro) {
          var id = registro.id_grupo;
          var nombre = registro.nombre_grupo;
          $(".id_grupo").append('<option value='+id+'>'+nombre+'</option>');
      });
    },
    error: function(data) {
        console.log(data);
    }
});
}



var mostrarMaterias = function() {
    var tableMateria = $('#dataTableMateriaProfesor').DataTable({
        "processing": true,
        "serverSide": false,
        "ajax": {
            "url": "<?php echo constant('URL');?>materia_profesor_consulta/readTable"
        },
        "columns": [
            { "data": "nombre_grupo" },
            { "data": "nombre_materia"},
            {data:null,
                "defaultContent":
                `<button class='consulta btn btn-primary' data-toggle='modal' data-target='#modalDetalleMateriaProfesor' title="Ver Detalles"><i class="fa fa-eye"></i></button>`
            }
            ],
            "fnFooterCallback": function (nRow, aaData, iStart, iEnd, aiDisplay) {
             if (aiDisplay.length > 0) {
               $('body').removeClass('no-record');
             }
             else {
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
    obtenerdatosDT(tableMateria);
}

var obtenerdatosDT = function (table) {
    $('#dataTableMateriaProfesor tbody').on('click', 'tr', function() {
        var data = table.row(this).data();
        console.log(data);
        var idEliminar = $('#idEliminarMateriaProfesor').val(data.id_materia_profesor);


        var idActualizar = $('#id_MateriaProfesorActualizar').val(data.id_materia_profesor);
        var id_profesor = $("#id_profesorActualizar  option[value=" + data.id_profesor + "]").attr("selected",true);
        var id_grupo = $("#id_grupoActualizar option[value=" + data.id_grupo + "]").attr("selected",true);
        var id_materia = $("#id_materiaActualizar option[value=" + data.id_materia + "]").attr("selected",true);

        var idConsulta = $("#id_materiaProfesorConsultar").val(data.id_materia_profesor);
        var id_profesorConsulta = $("#id_profesorConsultar option[value=" + data.id_profesor + "]").attr("selected",true);
        var id_grupoConsulta = $("#id_grupoConsultar option[value=" + data.id_grupo + "]").attr("selected",true);

        var id_materiaConsulta = $('#id_materiaConsultar').val(data.nombre_materia);
    });
}

$.validator.addMethod("selectRequired", function(value, element, arg){
    return arg !== value;
}, "Selecciona un valor");



</script>