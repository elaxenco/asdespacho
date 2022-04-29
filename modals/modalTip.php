<!-- Modal Crear una sucursal nueva-->
<div class="modal fade" id="modalNuevoTip" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">TIP</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="formTip">
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
                        <div class="col-md-6">
                            <label for="txtPublicacion">Publicacion</label>
                            <input style="height:2.2em"  class="form-control  " id="txtPublicacion" type='date'
                                placeholder="" name='fecha_publicacion'  >
                        </div>
                        <div class="col-md-6">
                            <label for="txtPeriodos">Periodos</label>
                            <input style="height:2.2em" type="number" class="form-control  " id="txtPeriodos" 
                                placeholder="0.00" name='num_periodos' value=0>
                        </div>
                    </div> 
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="txtArticulo">Articulo</label>
                            <input style="height:2.2em"   class="form-control  " id="txtArticulo"  
                                placeholder="Articulo" name='articulo'  >
                        </div>
                        <div class="col-md-6">
                            <label for="txtDecreto">Decreto</label>
                            <input style="height:2.2em"   class="form-control  " id="txtDecreto"  
                                placeholder="Decreto" name='decreto' >
                        </div>
                    </div> 

                    <div class="form-row">
                        <div class="col-md-4">
                            <label for="txtIncremento">% Incremento</label>
                            <input style="height:2.2em"   class="form-control  " id="txtIncremento"  
                                placeholder="% Incremento" name='porc_incremento'  >
                        </div>
                        <div class="col-md-4">
                            <label for="txtVigencia">Vigencia</label>
                            <input style="height:2.2em" type="date" class="form-control  " id="txtVigencia"  
                                name='vigencia_apartir' >
                        </div>
                        <div class="col-md-4">
                            <label for="txtRango">Rango</label>
                            <input style="height:2.2em"   class="form-control  " id="txtRango"  
                                name='rango' >
                        </div>
                    </div> 
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button onclick="generarTip()" type="button" class="btn btn-success">Guardar Tip</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="AgregarDetalle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalle TIP</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="formTipDet">
                    <div class="form-row "> 

                        <div class="col-3">
                            <label for="txtIdTipDet">Id</label>
                            <input style="height:2.2em" type="text" class="form-control text-right" id="txtIdTipDet"
                                placeholder="ID" readonly value='0' name='id'>
                        </div>

                        <div class="col-9">
                            <label for="txtAnioTipDet">Año</label>
                            <input style="height:2.2em" type="number" class="form-control text-right" id="txtAnioTipDet"
                                placeholder="1900" readonly name='anio' >
                        </div>

                    </div>
                    <div class="form-row"> 
                        <div class="col-md-2">
                            <label for="txtLimInf">Limite Inferior</label>
                            <input style="height:2.2em" type="number" class="form-control  " id="txtLimInf" 
                                placeholder="0.00" name='limite_inferior' value=0>
                        </div>
                        <div class="col-md-2">
                            <label for="txtLimSup">Limite Superior</label>
                            <input style="height:2.2em" type="number" class="form-control  " id="txtLimSup" 
                                placeholder="0.00" name='limite_superior' value=0>
                        </div>
                        <div class="col-md-2">
                            <label for="txtCFC">Cuota Fija Const</label>
                            <input style="height:2.2em" type="number" class="form-control  " id="txtCFC" 
                                placeholder="0.00" name='cuota_fija_construccion' value=0>
                        </div>
                        <div class="col-md-2">
                            <label for="txtTC">Tasa Const</label>
                            <input style="height:2.2em" type="number" class="form-control  " id="txtTC" 
                                placeholder="0.00" name='tasa_limite_inferior_construccion' value=0>
                        </div>
                        <div class="col-md-2">
                            <label for="txtCFSC">Cuora Fija S Const</label>
                            <input style="height:2.2em" type="number" class="form-control  " id="txtCFSC" 
                                placeholder="0.00" name='cuota_fija_sconstruccion' value=0>
                        </div>
                        <div class="col-md-2">
                            <label for="txtTSC">Tasa S Const</label>
                            <input style="height:2.2em" type="number" class="form-control  " id="txtTSC" 
                                placeholder="0.00" name='tasa_limite_inferior_sconstruccion' value=0>
                        </div>
                    </div> 
                     
                </form>
                <br><br>
                    <div class="row">
                    <div class="col-4"> 
                        </div>
                        <div class="col-4">
                             <button onclick="agregarTarifa()" type="button" class="btn btn-primary btn-lg btn-block">Agregar Trifa</button>
                        </div>
                        <div class="col-4"> 
                        </div>
                    </div> 

                    <br>

                        <div class="table-responsive-md">
                            <table class="table table-sm table-hover table-bordered table-striped small">
                                <thead>
                                    <tr>
                                        <th scope="col" rowspan="2" class="text-center">ID</th>
                                        <th scope="col" rowspan="2" class="text-center">Año</th> 
                                        <th scope="col" rowspan="2" class="text-center">Num</th> 
                                        <th scope="col" colspan="2" class="text-center">Rangos</th> 
                                        <th scope="col" colspan="2" class="text-center">Construido</th> 
                                        <th scope="col" colspan="2" class="text-center">Baldios</th> 
                                        <th scope="col" rowspan="2" class="text-center">Acciones</th> 
                                    </tr>
                                    <tr>
                                        <th scope="col"  class="text-center">Limite Inferior</th>
                                        <th scope="col" class="text-center">Limite Superior</th> 
                                        <th scope="col" class="text-center">Cuota fija</th> 
                                        <th scope="col" class="text-center">Tasa</th> 
                                        <th scope="col" class="text-center">Cuota fija</th> 
                                        <th scope="col" class="text-center">Tasa</th> 
                                    </tr>
                                </thead>
                                   
                                <tbody id="tbTipDetAdd">
                                    

                                </tbody>
                            </table>
                        </div>

                        <div class="row">
                    <div class="col-4"> 
                        </div>
                        <div class="col-4">
                             <button onclick="guardarTarifa()" type="button" class="btn btn-primary btn-lg btn-block">Guardar Tarifas</button>
                        </div>
                        <div class="col-4"> 
                        </div>
                    </div> 

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button> 
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="VerDetalle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalles TIP</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                        <form action="" id="formTipDet">
                                <div class="form-row "> 

                                    <div class="col-3">
                                        <label for="txtIdTipDetT">Id</label>
                                        <input style="height:2.2em" type="text" class="form-control text-right" id="txtIdTipDetT"
                                            placeholder="ID" readonly value='0' name='id'>
                                    </div>

                                    <div class="col-9">
                                        <label for="txtAnioTipDetT">Año</label>
                                        <input style="height:2.2em" type="number" class="form-control text-right" id="txtAnioTipDetT"
                                            placeholder="1900" readonly name='anio' >
                                    </div>

                                </div>
                        </form>

                        <div class="table-responsive-md">
                            <table class="table table-sm table-hover table-bordered table-striped small">
                                <thead>
                                    <tr> 
                                        <th scope="col" rowspan="2" class="text-center">Num</th> 
                                        <th scope="col" colspan="2" class="text-center">Rangos</th> 
                                        <th scope="col" colspan="2" class="text-center">Construido</th> 
                                        <th scope="col" colspan="2" class="text-center">Baldios</th>  
                                    </tr>
                                    <tr>
                                        <th scope="col"  class="text-center">Limite Inferior</th>
                                        <th scope="col" class="text-center">Limite Superior</th> 
                                        <th scope="col" class="text-center">Cuota fija</th> 
                                        <th scope="col" class="text-center">Tasa</th> 
                                        <th scope="col" class="text-center">Cuota fija</th> 
                                        <th scope="col" class="text-center">Tasa</th> 
                                    </tr>
                                </thead>
                                   
                                <tbody id="tbTipDet">
                                    

                                </tbody>
                            </table>
                        </div>
 

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button> 
            </div>
        </div>
    </div>
</div>