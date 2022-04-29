<!-- Modal Crear una zona nueva-->
<div class="modal fade" id="modalNuevaZona" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nueva Zona</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="formNuevaSolicitud">
                    <div class="form-row ">

                        <div class="col-3">
                            <label for="txtIdZona">Zona Id</label>
                            <input style="height:2.2em" type="text" class="form-control text-right" id="txtIdZona"
                                placeholder="ID" readonly value='0'>
                        </div>

                        <div class="col-9">
                            <label for="txtZona">Descripcion</label>
                            <input style="height:2.2em" type="text" class="form-control text-right" id="txtZona"
                                placeholder="Descripcion">
                        </div>

                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button onclick="guardarZona()" type="button" class="btn btn-success">Guardar zona</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Crear una sucursal nueva-->
<div class="modal fade" id="modalSucursalesNueva" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nueva Sucursal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="formNuevaSolicitud">
                    <div class="form-row ">
                        <div class="col-12">
                        <label for="cboZonas">Zona</label>
                            <select class="form-control" id="cboZonas">
                                <option>Seleccione una Zona</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="txtIdSucursal">Sucursal Id</label>
                            <input style="height:2.2em" type="text" class="form-control text-right" id="txtIdSucursal"
                                placeholder="ID" readonly value='0'>
                        </div>

                        <div class="col-9">
                            <label for="txtSucursal">Descripcion</label>
                            <input style="height:2.2em" type="text" class="form-control text-right" id="txtSucursal"
                                placeholder="Descripcion">
                        </div>

                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button onclick="guardarSucursal()" type="button" class="btn btn-success">Guardar Sucursal</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal Crear una sucursal nueva-->
<div class="modal fade" id="modalPrimerCorte" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Primer Corte</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="formNuevaSolicitud">
                    <div class="form-row "> 

                        <div class="col-3">
                            <label for="txtIdSucursalPcorte">Sucursal Id</label>
                            <input style="height:2.2em" type="text" class="form-control text-right" id="txtIdSucursalPcorte"
                                placeholder="ID" readonly value='0'>
                        </div>

                        <div class="col-9">
                            <label for="txtSucursalPcorte">Descripcion</label>
                            <input style="height:2.2em" type="text" class="form-control text-right" id="txtSucursalPcorte"
                                placeholder="Descripcion" readonly>
                        </div>

                    </div>
                    <div class="form-row">
                    <div class="col-12">
                            <label for="txtSucursalPcorte">Fecha</label>
                            <input style="height:2.2em" type="date" class="form-control  " id="txtFechaCorte"
                                placeholder="Descripcion" >
                        </div>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button onclick="generarPrimerCorte()" type="button" class="btn btn-success">Generar Corte</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Asignar modelo a la sucursal-->
<div class="modal fade" id="modalAsignarModelo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Asignar Modelo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="formAsignarModelo">
                    <div class="form-row "> 

                        <div class="col-3">
                            <label for="txtIdSucursalModelo">Sucursal Id</label>
                            <input style="height:2.2em" type="text" class="form-control text-right" id="txtIdSucursalModelo"
                                placeholder="ID" readonly value='0'>
                        </div>

                        <div class="col-9">
                            <label for="txtSucursalModelo">Descripcion</label>
                            <input style="height:2.2em" type="text" class="form-control text-right" id="txtSucursalModelo"
                                placeholder="Descripcion" readonly>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="col-12">
                            <label for="cboModelos">Modelos</label>
                            <select class="custom-select" id="cboModelos">
                                <option value="0" selected>Seleccione una opcion</option>
                            </select>
                        </div>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button onclick="guardarSucursalModelo()" type="button" class="btn btn-success">Asignar</button>
            </div>
        </div>
    </div>
</div>