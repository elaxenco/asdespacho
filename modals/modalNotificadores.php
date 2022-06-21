<!-- Modal Crear una zona nueva-->
<div class="modal fade" id="modalNotificadores" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Notificadores</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="formNuevaSolicitud">
                    <div class="form-row "> 
                        <div class="col-12"> 
                            <select class="custom-select" id="cboNotificadores">
                                <option value="0" selected>Seleccione un notificadore</option>
                            </select>
                        </div> 

                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button onclick="asignarNotificador()" type="button" class="btn btn-success">Asignar notificador</button>
            </div>
        </div>
    </div>
</div>