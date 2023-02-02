<!--*****************************************MODALS****************************************-->
<!--------------------------------------------------------- Modal Registrar Concepto----------------------------------------------->
<div class="modal fade" id="modalRegistrarConcepto" tabindex="-1" role="dialog" aria-labelledby="modalRegistrarConcepto" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-success">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Parcial <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                </div>
                <form>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nombre Concepto (*)</label>
                                    <input type="text" class="form-control" id="nombre_concepto" name="nombre_concepto" placeholder="Nombre" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Cantidad (*)</label>
                                    <input type="numer" class="form-control" id="cantidad_concepto" name="cantidad_concepto" placeholder="Cantidad" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Descripción (*)</label>
                                    <input type="text" class="form-control" id="nombre_parcial" name="descripcion_concepto" placeholder="Descripción" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Tipo (*)</label>
                                    <input type="text" class="form-control" id="tipo_concepto" name="tipo_concepto" placeholder="Tipo" />
                                </div>
                            </div>
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
<!--------------------------------------------------------- Modal Detalle Concepto----------------------------------------------->
<div class="modal fade" id="modalDetalleConcepto" tabindex="-1" role="dialog" aria-labelledby="modalDetalleConcepto" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-primary">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Concepto <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                </div>
                <form role="form" id="formConsulta" name="formConsulta">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header py-1 bg-primary">
                                <h3 class="card-title">Información Consulta</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body border-primary">
                                <div class="row">
                                    <input type="text" hidden class="form-control" id="id_conceptoConsultar" name="id_conceptoConsultar" />

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Nombre (*)</label>
                                            <select disabled name="id_conceptoConsultar" id="id_conceptoConsultar" class="form-control id_concepto"></select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Cantidad (*) </label>
                                            <input disabled name="cantidad_conceptoConsultar" id="cantidad_conceptoConsultar" class="form-control cantidad_conceptoConsultar">
                                            </input>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Descripción </label>
                                            <input disabled name="descripcion_conceptoConsultar" id="descripcion_conceptoConsultar" class="form-control descripcion_conceptoConsultar">
                                            </input>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Tipo </label>
                                            <input disabled name="tipo_conceptoConsultar" id="tipo_conceptoConsultar" class="form-control tipo_conceptoConsultar">
                                            </input>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!--------------------------------------------------------- Modal Eliminar Concepto----------------------------------------------->
<div class="modal fade" id="modalEliminarConcepto" tabindex="-1" role="dialog" aria-labelledby="modalEliminarConcepto" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Registro</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form role="form" id="formEliminarConcepto" name="formEliminarConcepto">
                <input type="text" hidden id="idEliminarConcepto" name="idEliminarConcepto">
                <div class="modal-body text-center text-danger">¿Realmente deseas eliminar el registro del parcial?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-danger" type="submit">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>