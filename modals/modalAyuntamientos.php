<!-- Modal Crear una sucursal nueva-->
<div class="modal fade" id="modalAyuntamientos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Ayuntamiento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="formNuevaSolicitud">
                    <div class="form-row ">
                        <div class="col-12">
                        <label for="cboZonas">Zona</label>
                            <select class="form-control" id="cboZonas" onchange="cargarSucursalesSelect(this.value)">
                                <option>Seleccione una Zona</option>
                            </select>
                        </div>
                        <div class="col-12">
                        <label for="cboSucursales">Sucursal</label>
                            <select class="form-control" id="cboSucursales">
                                <option>Seleccione una Sucursal</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="txtIdAyuntamiento">Ayuntamiento Id</label>
                            <input style="height:2.2em" type="text" class="form-control text-right" id="txtIdAyuntamiento"
                                placeholder="ID" readonly value='0'>
                        </div>

                        <div class="col-9">
                            <label for="txAyuntamiento">Descripcion</label>
                            <input style="height:2.2em" type="text" class="form-control text-right" id="txAyuntamiento"
                                placeholder="Descripcion">
                        </div>

                        <div class="col-12">
                            <label for="txDomicilio">Domicilio</label>
                            <input style="height:2.2em" type="text" class="form-control text-right" id="txDomicilio"
                                placeholder="Domicilio">
                        </div>

                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button onclick="guardarAyuntamiento()" type="button" class="btn btn-success">Guardar Ayuntamiento</button>
            </div>
        </div>
    </div>
</div>