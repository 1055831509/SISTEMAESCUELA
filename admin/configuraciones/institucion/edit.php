<?php
$id_config_institucion = $_GET['id'];
include '../../../app/config.php';
include '../../../admin/layout/parte1.php';

include '../../../app/controllers/configuraciones/institucion/datos_institucion.php';

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   <br>
    <div class="content">
      <div class="container">
        <div class="row">
          <h1>Modififcar datos de la institucion: <?=$nombre_institucion;?></h1> 
          
          <br>

        </div>
        <br>
        <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-success">
              <div class="card-header">
                <h3 class="card-title">Llene los datos</h3>

                
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                 <form action="<?=APP_URL;?>/app/controllers/configuraciones/institucion/update.php" method="post" enctype="multipart/form-data">
                 <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                          <input type="text" name="id_config_institucion" value="<?=$id_config_institucion;?>" hidden>
                          <input type="text" name="logo" value="<?=$logo;?>" hidden>
                    <label for="">Nombre de la institucion <b>*</b></label>
                    <input type="text" name="nombre_institucion" value="<?=$nombre_institucion?>" class="form-control" required>
                </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                    <label for="">Correo de la institucion</label>
                    <input type="email" name="correo" value="<?=$correo?>" class="form-control">
                </div>
                    </div>
                </div>

                <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                    <label for="">Telefono</label>
                    <input type="number" name="telefono" value="<?=$telefono?>" class="form-control">
                </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                    <label for="">Celular <b>*</b></label>
                    <input type="number" name="celular" value="<?=$celular?>" class="form-control" required>
                </div>
                </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                    <label for="">Direccion <b>*</b></label>
                    <input type="text" name="direccion" value="<?=$direccion?>" class="form-control" required>
                </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                    <label for="">Logo de la institucion</label>
                    <input type="file" name="file" id="file" class="form-control">
                    <br>
                    <center>
                    <output id="list">
                    <img src="<?=APP_URL."/public/images/configuracion/".$logo;?>" width="200px" alt="">
                    </output>
                    </center>
                </div>
                        </div>
                    </div>
                </div>
             </div>
            <div class="row"></div>
            <hr>
            
            <div class="row">
            
            <div class="col-md-12">
              <div class="form-group">
                  <button type="submit" class="btn btn-success">Actualizar</button>
                  <a href="<?=APP_URL;?>/admin/configuraciones/institucion" class="btn btn-secondary">Cancelar</a>
              </div>
            </div>

</div>
                 </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php 
  include '../../../admin/layout/parte2.php';
  include '../../../layout/mensajes.php';
  ?>

<script>
  function archivo(evt) {
    var files = evt.target.files; // Obtiene los archivos seleccionados
    for (var i = 0, f; f = files[i]; i++) {
      // Verifica que el archivo sea una imagen
      if (!f.type.match('image.*')) {
        continue;
      }

      var reader = new FileReader(); // Crea un lector de archivos
      reader.onload = (function (theFile) {
        return function (e) {
          // Inserta la imagen en el elemento con id "list"
          document.getElementById("list").innerHTML = [
            '<img class="thumb thumbnail" src="', 
            e.target.result, 
            '" width="150" height="150" alt="Previsualización de la imagen"/>'
          ].join('');
        };
      })(f);

      reader.readAsDataURL(f); // Lee el archivo como una URL de datos
    }
  }

  // Agrega el evento al input de tipo archivo
  document.getElementById('file').addEventListener('change', archivo, false);
</script>

