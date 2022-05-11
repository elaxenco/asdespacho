
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
                <form action="" id="formBase">
                    <div class="form-row "> 
                        <div class="col-3">
                            <label for="txtBaseId">Base Id</label>
                            <input style="height:2.2em" type="text" class="form-control text-right" id="txtBaseId"
                                placeholder="ID" readonly value='0'>
                        </div> 
                        <div class="col-9">
                            <label for="txtDescripconBase">Descripcion</label>
                            <input style="height:2.2em" type="text" class="form-control text-right" id="txtDescripconBase" name="descripcion"
                                placeholder="Descripcion">
                        </div> 
                        <div class="col-12">
                            <label for="txtAnio">Año</label>
                            <input style="height:2.2em"   class="form-control text-right" id="txtAnio" name="anio_base"
                                placeholder="Año" type="number">
                        </div> 
                        <div class="col-12">
                        <label for="cboAyuntamientos">Ayuntamiento</label>
                            <select class="form-control" id="cboAyuntamientos" name="ayuntamiento_id">
                                <option>Seleccione una Ayuntamiento</option>
                            </select>
                        </div>
                        <div class="col-12">
                        <label for="cboNotificadores">Notificador</label>
                            <select class="form-control" id="cboNotificadores" name='notificador_id'>
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



<!-- Modal para subir excel-->
<div class="modal fade" id="modalCargarBase" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cargar Base</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="formBaseExcel">
                    <div class="form-row "> 
                        <div class="col-2">
                            <label for="txtBaseIdExcel">Base Id</label>
                            <input style="height:2.2em" type="text" class="form-control text-right" id="txtBaseIdExcel"
                                placeholder="ID" readonly value='0'>
                        </div> 
                        <div class="col-8">
                            <label for="txtDescripconBaseExcel">Descripcion</label>
                            <input style="height:2.2em" type="text" class="form-control text-right" id="txtDescripconBaseExcel" name="descripcion"
                                placeholder="Descripcion" readonly>
                        </div> 
                        <div class="col-2">
                            <label for="txtAnioExcel">Año</label>
                            <input style="height:2.2em"   class="form-control text-right" id="txtAnioExcel" name="anio_base"
                                placeholder="Año" type="number" readonly>
                        </div> 
                        <div class="col-12">
                            <br>
                            <input type="file"  accept=".xlsx, .xls, .csv" id="inputExcel" name="excel"/>
                            <br> 
                        </div>
                        <div class="col-12">
                            <div class="row">
                            <br> 
                                        <div class="col-md-4 col-12"> 
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <button onclick="verificarExcel(false)" type="button" class="btn btn-primary btn-lg btn-block">Verificar Excel</button>
                                        </div>
                                        <div class="col-md-4 col-12"> 
                                        </div>
                                    </div> 
                                    <br> 
                                    <br>
                            </div>
</div>

                        <div class="table-responsive-md">
                            <div class="tableFixHead"> <!-- CLASE PARA PONER thead fijo  -->
                                <table id="tabla_colocado" class="table table-striped table-hover table-sm small ">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Cve Catastral</th>
                                            <th class="text-center">Nombre</th>
                                            <th class="text-center">Dom Ubi</th>
                                            <th class="text-center">Dom Notif</th>
                                            <th class="text-center">Sup Terreno</th>
                                            <th class="text-center">Sup Construc</th>
                                            <th class="text-center">Val Gravable</th>
                                            <th class="text-center">PS Dscto</th>
                                            <th class="text-center">Val Catastral</th>
                                            <th class="text-center">Val Terreno</th>
                                            <th class="text-center">Val Construccion</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbExcel">
                                        <!-- <tr> </tr> -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button onclick="verificarExcel(true)" type="button" class="btn btn-success">Guardar Base</button>
            </div>
        </div>
    </div>
</div>