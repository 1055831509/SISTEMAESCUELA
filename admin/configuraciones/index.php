<?php
include '../../app/config.php';
include '../../admin/layout/parte1.php';
include '../../app/controllers/usuarios/listado_usuarios.php';

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   <br>
    <div class="content">
      <div class="container">
        <div class="row">
          <h1>Configuraciones del sistema</h1> 
          
          <br>

        </div>
        <br>
        <div class="row">

        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-primary"><i class="bi bi-hospital"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><b>Datos de la Institucion</b></span>
                <a href="institucion" class="btn btn-primary btn-sm">Configurar</a>
                </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="bi bi-calendar-range"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><b>Gestion</b></span>
                <a href="gestion" class="btn btn-info btn-sm">Configurar</a>
                </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

        
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php 
  include '../../admin/layout/parte2.php';
  include '../../layout/mensajes.php';
  ?>



