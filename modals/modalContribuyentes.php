
<!-- Modal Crear una sucursal nueva-->
<div class="modal fade" id="modalBaseContribuyentes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nueva Base</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="formBaseAyuntamiento">
                    <div class="form-row "> 
                        <div class="col-3">
                            <label for="txtBaseId">Base Id</label>
                            <input style="height:2.2em" type="text" class="form-control text-right" id="txtBaseId"
                                placeholder="ID" readonly value='0'>
                        </div> 
                        <div class="col-9">
                            <label for="txtDescripconBase">Descripcion</label>
                            <input style="height:2.2em" type="text" class="form-control text-right" id="txtDescripconBase"
                                placeholder="Descripcion">
                        </div> 
                        <div class="col-12">
                            <label for="txtAnio">Año</label>
                            <input style="height:2.2em" type="text" class="form-control text-right" id="txtAnio"
                                placeholder="Año">
                        </div> 
                        <div class="col-12">
                        <label for="cboAyuntamientos">Ayuntamiento</label>
                            <select class="form-control" id="cboAyuntamientos">
                                <option>Seleccione una Ayuntamiento</option>
                            </select>
                        </div>
                        <div class="col-12">
                        <label for="cboNotificadores">Notificador</label>
                            <select class="form-control" id="cboNotificadores">
                                <option>Seleccione una Notificador</option>
                            </select>
                        </div>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button onclick="guardarBaseContribuyentes()" type="button" class="btn btn-success">Guardar Base</button>
            </div>
        </div>
    </div>
</div>