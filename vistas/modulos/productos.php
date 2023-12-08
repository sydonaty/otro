<?php

if($_SESSION["perfil"] == "Vendedor"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar productos
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar productos</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">
          
          Agregar producto

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablaProductos" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Imagen</th>
           <th>Código</th>
           <th>Descripción</th>
           <th>Proveedor</th>
           <th>Stock</th>
           <th>Procesador</th>
           <th>RAM</th>
           <th>Almacenamiento</th>
           <th>Camara</th>
           <th>Pantalla</th>
           <th>Precio de compra</th>
           <th>Precio de venta</th>
           <th>Agregado</th>
           <th>Acciones</th>
           
         </tr> 

        </thead>      

       </table>

       <input type="hidden" value="<?php echo $_SESSION['perfil']; ?>" id="perfilOculto">

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR PRODUCTO
======================================-->

<div id="modalAgregarProducto" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar producto</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">


            <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->
            <h4 class="modal-title" style="background-color: #007BFF; color: white;">Proveedor</h4>

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" id="nuevaCategoria" name="nuevaCategoria" required>
                  
                  <option value="">Selecionar Proveedor</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                  foreach ($categorias as $key => $value) {
                    
                    echo '<option value="'.$value["id"].'">'.$value["categoria"].'</option>';
                  }

                  ?>
  
                </select>

              </div>

            </div>

            <!-- ENTRADA PARA EL CÓDIGO -->
            <h4 class="modal-title" style="background-color: #007BFF; color: white;">Ingresar codigo del producto.</h4>
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 

                <input type="number" class="form-control input-lg" id="nuevoCodigo" name="nuevoCodigo" placeholder="Ingresar código" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DESCRIPCIÓN -->
            <h4 class="modal-title" style="background-color: #007BFF; color: white;">Ingresar el modelo del telefono.</h4>

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaDescripcion" placeholder="Ingresar descripción" required>

              </div>

            </div>

             <!-- ENTRADA PARA STOCK -->
             <h4 class="modal-title" style="background-color: #007BFF; color: white;">Ingresar el Stock.</h4>

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-check"></i></span> 

                <input type="number" class="form-control input-lg" name="nuevoStock" min="0" placeholder="Stock" required>

              </div>

            </div>
            
             <!-- ENTRADA PARA Procesador -->
             <h4 class="modal-title" style="background-color: #007BFF; color: white;">Ingresar el Procesador.</h4>

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-microchip"></i></span> 
              
                <select class="form-control input-lg" name="nuevoProcesador" required>

                 <option value="QualcomSnapDragon">Qualcom Snap Dragon</option>

                 <option value="MediaTek">MediaTek</option>

                 <option value="Dimensity">Dimensity</option>
                
                </select>

              </div>

            </div>
            
             <!-- ENTRADA PARA RAM -->
             <h4 class="modal-title" style="background-color: #007BFF; color: white;">Cantidad de memoria RAM</h4>

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa-solid fa-microchip"></i></span> 

                <select class="form-control input-lg" name="nuevoRAM" required>

                   <option value="6 Gb">6 Gb.</option>

                   <option value="8 Gb">8 Gb.</option>

                   <option value="12 Gb">12 Gb.</option>

                   <option value="16 Gb ">16 Gb.</option>

                </select>

              </div>

            </div>
            
             <!-- ENTRADA PARA Almacenamiento -->
             <h4 class="modal-title" style="background-color: #007BFF; color: white;">Cantidad de Almacenamiento.</h4>

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-database"></i></span> 

                <select class="form-control input-lg" name="nuevoAlmacenamiento" required>

                 <option value="64 Gb">64 Gb.</option>

                 <option value="128 Gb">128 Gb.</option>

                 <option value="256 Gb">256 Gb.</option>

                </select>

              </div>

            </div>

             <!-- ENTRADA PARA Camara -->
             <h4 class="modal-title" style="background-color: #007BFF; color: white;">Ingresar datos de la Camara</h4>

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-camera"></i></span> 

                <select class="form-control input-lg" name="nuevoCamara" required>

                 <option value="48MP">48MP.</option>

                 <option value="60MP">60MP.</option>
 
                 <option value="128MP">128MP.</option>

                 <option value="200MP">200.</option>

                </select>

              </div>

            </div>
            
             <!-- ENTRADA PARA Pantalla -->
             <h4 class="modal-title" style="background-color: #007BFF; color: white;">Ingresar el tipo de Pantalla</h4>

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-desktop"></i></span> 

                <select class="form-control input-lg" name="nuevoPantalla" required>
                   
                    <option value="OLED">OLED.</option>

                    <option value="AMOLED">AMOLED.</option>
                 
                    <option value="LCD">LCD.</option>

                    <option value="IPS">IPS.</option>


                </select>

              </div>

            </div>

             <!-- ENTRADA PARA PRECIO COMPRA -->
             <h4 class="modal-title" style="background-color: #007BFF; color: white;">Precios de Compra y venta</h4>

             <div class="form-group row">

                <div class="col-xs-6">
                
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span> 

                    <input type="number" class="form-control input-lg" id="nuevoPrecioCompra" name="nuevoPrecioCompra" step="any" min="0" placeholder="Precio de compra" required>

                  </div>

                </div>

                <!-- ENTRADA PARA PRECIO VENTA -->

                <div class="col-xs-6">
                
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 

                    <input type="number" class="form-control input-lg" id="nuevoPrecioVenta" name="nuevoPrecioVenta" step="any" min="0" placeholder="Precio de venta" required>

                  </div>
                
                  <br>

                  <!-- CHECKBOX PARA PORCENTAJE -->

                  <div class="col-xs-6">
                    
                    <div class="form-group">
                      
                      <label>
                        
                        <input type="checkbox" class="minimal porcentaje" checked>
                        Utilizar procentaje
                      </label>

                    </div>

                  </div>

                  <!-- ENTRADA PARA PORCENTAJE -->

                  <div class="col-xs-6" style="padding:0">
                    
                    <div class="input-group">
                      
                      <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="40" required>

                      <span class="input-group-addon"><i class="fa fa-percent"></i></span>

                    </div>

                  </div>

                </div>

            </div>

            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">
              
              <div class="panel">SUBIR IMAGEN</div>

              <input type="file" class="nuevaImagen" name="nuevaImagen">

              <p class="help-block">Peso máximo de la imagen 2MB</p>

              <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar producto</button>

        </div>

      </form>

        <?php

          $crearProducto = new ControladorProductos();
          $crearProducto -> ctrCrearProducto();

        ?>  

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR PRODUCTO
======================================-->

<div id="modalEditarProducto" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar producto</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">


            <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->
            

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                
                <select class="form-control input-lg"  name="editarCategoria" readonly required>
                  
                  <option id="editarCategoria"></option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA EL CÓDIGO -->
            <h4 class="modal-title" style="background-color: #007BFF; color: white;">Editar el Codigo: </h4>
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 

                <input type="text" class="form-control input-lg" id="editarCodigo" name="editarCodigo" readonly  required>
                

              </div>

            </div>

            <!-- ENTRADA PARA LA DESCRIPCIÓN -->
            <h4 class="modal-title" style="background-color: #007BFF; color: white;">Editar La descripcion:</h4>
             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                <input type="text" class="form-control input-lg" id="editarDescripcion" name="editarDescripcion"  required>

              </div>

            </div>

             <!-- ENTRADA PARA STOCK -->
             <h4 class="modal-title" style="background-color: #007BFF; color: white;">Cantidad de Stock Actual:</h4>
             <div class="form-group"> 
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-check"></i></span> 

                <input type="number" class="form-control input-lg" id="editarStock" name="editarStock" min="0" required>

              </div>

            </div>
            
            <!-- ENTRADA PARA el Procesador -->
            <h4 class="modal-title" style="background-color: #007BFF; color: white;">Caracteristicas del Procesador:</h4>

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-microchip"></i></span> 
              
                <select class="form-control input-lg" id="editarProcesador" name="editarProcesador" required>

                 <option value="QualcomSnapDragon">Qualcom Snap Dragon</option>

                 <option value="MediaTek">MediaTek</option>

                 <option value="Dimensity">Dimensity</option>
                
                </select>

              </div>

            </div>

            <!-- ENTRADA PARA la RAM -->
            <h4 class="modal-title" style="background-color: #007BFF; color: white;">Memoria RAM:</h4>

            <div class="form-group">
  
              <div class="input-group">
    
                 <span class="input-group-addon"><i class="fa-solid fa-microchip"></i></span>
    
                <select class="form-control input-lg" id="editarRAM" name="editarRAM" required>
      
                   <option value="4GB">4GB</option>
      
                   <option value="8GB">8GB</option>
      
                   <option value="16GB">16GB</option>
    
                </select>
 
              </div>

            </div>
            
            <!-- ENTRADA PARA El Almacenamiento -->
            <h4 class="modal-title"><h4 class="modal-title" style="background-color: #007BFF; color: white;">Espacio de Almacenamiento:</h4></h4>
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-database"></i></span> 

                <select class="form-control input-lg" id="editarAlmacenamiento" name="editarAlmacenamiento" required>

                  <option value="64 Gb">64 Gb.</option>

                  <option value="128 Gb">128 Gb.</option>

                  <option value="256 Gb">256 Gb.</option>

              </select>

              </div>

            </div>
            
            <!-- ENTRADA PARA LA CAMARa -->
            <h4 class="modal-title" style="background-color: #007BFF; color: white;">Caracteristicas de la camara:</h4>
           
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-camera"></i></span> 

                  <select class="form-control input-lg" id="editarCamara" name="editarCamara" required>

                     <option value="48MP">48MP.</option>

                     <option value="60MP">60MP.</option>

                     <option value="128MP">128MP.</option>

                    <option value="200MP">200.</option>

                  </select>

              </div>

            </div>
            
            <!-- ENTRADA PARA LA Pantalla -->
            <h4 class="modal-title" style="background-color: #007BFF; color: white;">Caracteristicas de la pantalla:</h4>

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-desktop"></i></span> 

                 <select class="form-control input-lg" id="editarPantalla" name="editarPantalla" required>
                   
                    <option value="OLED">OLED.</option>

                    <option value="AMOLED">AMOLED.</option>
                 
                    <option value="LCD">LCD.</option>

                    <option value="IPS">IPS.</option>


                </select>

              </div>

            </div>

             <!-- ENTRADA PARA PRECIO COMPRA -->
             <h4 class="modal-title" style="background-color: #007BFF; color: white;">Precios de Compra y venta</h4>
             <div class="form-group row">

                <div class="col-xs-6">
                
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span> 

                    <input type="number" class="form-control input-lg" id="editarPrecioCompra" name="editarPrecioCompra" step="any" min="0" required>

                  </div>

                </div>

                <!-- ENTRADA PARA PRECIO VENTA -->

                <div class="col-xs-6">
                  
                
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 

                    <input type="number" class="form-control input-lg" id="editarPrecioVenta" name="editarPrecioVenta" step="any" min="0" readonly required>
                    

                  </div>
                
                  <br>

                  <!-- CHECKBOX PARA PORCENTAJE -->

                  <div class="col-xs-6">
                    
                    <div class="form-group">
                      
                      <label>
                        
                        <input type="checkbox" class="minimal porcentaje" checked>
                        Utilizar procentaje
                      </label>

                    </div>

                  </div>

                  <!-- ENTRADA PARA PORCENTAJE -->

                  <div class="col-xs-6" style="padding:0">
                    
                    <div class="input-group">
                      
                      <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="40" required>

                      <span class="input-group-addon"><i class="fa fa-percent"></i></span>

                    </div>

                  </div>

                </div>

            </div>

            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">
              
              <div class="panel">SUBIR IMAGEN</div>

              <input type="file" class="nuevaImagen" name="editarImagen">

              <p class="help-block">Peso máximo de la imagen 2MB</p>

              <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

              <input type="hidden" name="imagenActual" id="imagenActual">

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

      </form>

        <?php

          $editarProducto = new ControladorProductos();
          $editarProducto -> ctrEditarProducto();

        ?>      

    </div>

  </div>

</div>

<?php

  $eliminarProducto = new ControladorProductos();
  $eliminarProducto -> ctrEliminarProducto();

?>      



