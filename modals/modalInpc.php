<!-- Modal Crear una sucursal nueva-->
<div class="modal fade" id="modalNuevoInpc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">INPC</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="formIncp">
                    <div class="form-row "> 

                        <div class="col-3">
                            <label for="txtIdSucursalPcorte">Id</label>
                            <input style="height:2.2em" type="text" class="form-control text-right" id="txtIdSucursalPcorte"
                                placeholder="ID" readonly value='0' name='id'>
                        </div>

                        <div class="col-9">
                            <label for="txtSucursalPcorte">Año</label>
                            <input style="height:2.2em" type="number" class="form-control text-right" id="txtSucursalPcorte"
                                placeholder="1900"  name='anio' value=0>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="col-12">
                            <label for="txtEnero">Enero</label>
                            <input style="height:2.2em" type="number" class="form-control  " id="txtEnero" type='number'
                                placeholder="0.00" name='enero' value=0>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12">
                            <label for="txtFebrero">Febrero</label>
                            <input style="height:2.2em" type="number" class="form-control  " id="txtFebrero"
                                placeholder="0.00" name='febrero' value=0>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12">
                            <label for="txtMarzo">Marzo</label>
                            <input style="height:2.2em" type="number" class="form-control  " id="txtMarzo"
                                placeholder="0.00" name='marzo' value=0>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12">
                            <label for="txtAbril">Abril</label>
                            <input style="height:2.2em" type="number" class="form-control  " id="txtAbril"
                                placeholder="0.00" name='abril' value=0>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12">
                            <label for="txtMayo">Mayo</label>
                            <input style="height:2.2em" type="number" class="form-control  " id="txtMayo"
                                placeholder="0.00" name='mayo' value=0>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12">
                            <label for="txtJunio">Junio</label>
                            <input style="height:2.2em" type="number" class="form-control  " id="txtJunio"
                                placeholder="0.00" name='junio' value=0>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12">
                            <label for="txtJulio">Julio</label>
                            <input style="height:2.2em" type="number" class="form-control  " id="txtJulio"
                                placeholder="0.00" name='julio' value=0>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12">
                            <label for="txtAgosto">Agosto</label>
                            <input style="height:2.2em" type="number" class="form-control  " id="txtAgosto"
                                placeholder="0.00" name='agosto' value=0>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12">
                            <label for="txtSeptiembre">Septiembre</label>
                            <input style="height:2.2em" type="number" class="form-control  " id="txtSeptiembre"
                                placeholder="0.00" name='septiembre' value=0>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12">
                            <label for="txtOctubre">Octubre</label>
                            <input style="height:2.2em" type="number" class="form-control  " id="txtOctubre"
                                placeholder="0.00" name='octubre' value=0>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12">
                            <label for="txtNoviembre">Noviembre</label>
                            <input style="height:2.2em" type="number" class="form-control  " id="txtNoviembre"
                                placeholder="0.00" name='noviembre' value=0>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12">
                            <label for="txtDiciembre">Diciembre</label>
                            <input style="height:2.2em" type="number" class="form-control  " id="txtDiciembre"
                                placeholder="0.00" name='diciembre' value=0>
                        </div>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button onclick="generarInpc()" type="button" class="btn btn-success">Guardar INPC</button>
            </div>
        </div>
    </div>
</div>
