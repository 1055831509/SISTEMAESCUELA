<?php
include '../../../app/config.php';
include '../../../admin/layout/parte1.php';

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   <br>
    <div class="content">
      <div class="container">
        <div class="row">
          <h1>Registro de datos de la institucion</h1> 
          
          <br>

        </div>
        <br>
        <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Llene los datos</h3>

                
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                 <form action="<?=APP_URL;?>/app/controllers/configuraciones/institucion/create.php" method="post" enctype="multipart/form-data">
                 <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                    <label for="">Nombre de la institucion <b>*</b></label>
                    <input type="text" name="nombre_institucion" class="form-control" required>
                </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                    <label for="">Correo de la institucion</label>
                    <input type="email" name="correo" class="form-control">
                </div>
                    </div>
                </div>

                <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                    <label for="">Telefono</label>
                    <input type="number" name="telefono" class="form-control">
                </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                    <label for="">Celular <b>*</b></label>
                    <input type="number" name="celular" class="form-control" required>
                </div>
                </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                    <label for="">Direccion <b>*</b></label>
                    <input type="text" name="direccion" class="form-control" required>
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
                    <output id="list"></output>
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
                  <button type="submit" class="btn btn-primary">Registrar</button>
                  <a href="<?=APP_URL;?>/admin/usuarios" class="btn btn-secondary">Cancelar</a>
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

