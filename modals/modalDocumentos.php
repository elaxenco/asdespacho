  
  <!-- Modal Crear una sucursal nueva-->
<div class="modal fade" id="modalDocumentos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Documentos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="row">
                          <div class="col-2">
                            <label for="exampleInputEmail1" class="form-label">Id</label>
                            <input  class="form-control" id="id_d" aria-describedby="emailHelp" readonly> 
                          </div>  
                            <div class="col-10">
                              <label for="exampleInputEmail1" class="form-label">Deudor</label>
                              <input  class="form-control" id="nombre_d" aria-describedby="emailHelp" readonly> 
                            </div> 
                            <div class="col-12">
                            <label for="exampleInputEmail1" class="form-label">Clave Catastral</label>
                            <input  class="form-control" id="clave_catastral" aria-describedby="emailHelp" readonly> 
                          </div>
                    </div>
                    
                 
                      <div class="col-12">
                        <label for="exampleInputEmail1" class="form-label">Descripcion documento</label>
                        <input   class="form-control" id="documento_d" aria-describedby="emailHelp" > 
                      </div> 
 
                  <br>
                  <input id="documento" type="file" name="file">  
                  <div class="col-12">
                      <div id="imgMagnifyCte" class="magnify  m-2 d-none">
                          <!-- This is the magnifying glass which will contain the original/large version -->
                          <div id="imgLargeCte" class="large"></div>
                          <!-- <img id="imgSmallCte" class="imgSmall img-fluid img-thumbnail" width="500" height="400"/> -->
                          <img id="imgSmallCte" class="imgSmall img-fluid img-thumbnail" width="500" height="400"/>
                      </div>
                      <div  > 
                        <iframe id="pdfCte" class="d-none mt-2" width="500" height="400">
                          The “iframe” tag is not supported by your browser.
                        </iframe>
                    </div>
                  </div> 

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button onclick="guardarDocumento()" type="button" class="btn btn-success">Guardar</button>
            </div>
        </div>
    </div>
</div>
  
  
 <!-- Modal Crear una sucursal nueva-->
 <div class="modal fade" id="modalImagenes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Documentos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="row">
                          <div class="col-2">
                            <label for="exampleInputEmail1" class="form-label">Id</label>
                            <input  class="form-control" id="id_d2" aria-describedby="emailHelp" readonly> 
                          </div>  
                            <div class="col-10">
                              <label for="exampleInputEmail1" class="form-label">Deudor</label>
                              <input  class="form-control" id="nombre_d2" aria-describedby="emailHelp" readonly> 
                            </div> 
                            <div class="col-12">
                            <label for="exampleInputEmail1" class="form-label">Clave Catastral</label>
                            <input  class="form-control" id="clave_catastral2" aria-describedby="emailHelp" readonly> 
                          </div> 
                    </div>
  <br>
                    <div class="table-responsive-md">
                            <table class="table table-sm table-hover table-bordered table-striped small" id="tbImg">
                                <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Nombre</th> 
                                            <th class="text-center">Fecha</th>  
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                </thead>
                                <tbody id="tbImagenes"> 

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
  

 <!-- Modal Crear una sucursal nueva-->
 <div class="modal fade" id="modalVerDocumentos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Documentos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"> 
                  <div class="col-12">
                      <div id="imgMagnifyCte2" class="magnify  m-2 d-none">
                          <!-- This is the magnifying glass which will contain the original/large version -->
                          <div id="imgLargeCte2" class="large"></div>
                          <!-- <img id="imgSmallCte" class="imgSmall img-fluid img-thumbnail" width="500" height="400"/> -->
                          <img id="imgSmallCte2" class="imgSmall img-fluid img-thumbnail" width="500" height="400"/>
                      </div>
                      <div  > 
                        <iframe id="pdfCte2" class="d-none mt-2" width="500" height="400">
                          The “iframe” tag is not supported by your browser.
                        </iframe>
                    </div>
                  </div> 

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button> 
            </div>
        </div>
    </div>
</div>