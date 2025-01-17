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
        <h1>Listado de usuarios</h1>
        <br>
      </div>
      <br>
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-primary">
            <div class="card-header">
              <h3 class="card-title">Usuarios Registrados</h3>
              <div class="card-tools">
                <a href="create.php" class="btn btn-primary"><i class="bi bi-plus-square"></i> Crear nuevo usuario</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                <thead>
                  <tr>
                    <th><center>Nro</center></th>
                    <th><center>Nombres del usuario</center></th>
                    <th><center>Rol</center></th>
                    <th><center>Email</center></th>
                    <th><center>Fecha de creación</center></th>
                    <th><center>Estado</center></th>
                    <th><center>Acciones</center></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $contadorUsuarios = 0;
                  foreach ($usuarios as $usuario) {
                    $idUsuario = $usuario['id_usuario'];
                    $contadorUsuarios++;
                  ?>
                  <tr>
                    <td style="text-align:center;"> <?= $contadorUsuarios; ?> </td>
                    <td> <?= htmlspecialchars($usuario['nombres']); ?> </td>
                    <td> <?= htmlspecialchars($usuario['nombre_rol']); ?> </td>
                    <td> <?= htmlspecialchars($usuario['email']); ?> </td>
                    <td> <?= htmlspecialchars($usuario['fyh_creacion']); ?> </td>
                    <td> <?= htmlspecialchars($usuario['estado']); ?> </td>
                    <td style="text-align:center">
                      <div class="btn-group" role="group" aria-label="Acciones">
                        <a href="show.php?id=<?= $idUsuario; ?>" class="btn btn-info btn-sm"><i class="bi bi-eye-fill"></i></a>
                        <a href="edit.php?id=<?= $idUsuario; ?>" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>
                        <form action="<?= APP_URL; ?>/app/controllers/usuarios/delete.php" method="post" id="formularioEliminar<?= $idUsuario; ?>" onsubmit="return confirmarEliminacion(event, <?= $idUsuario; ?>)">
                          <input type="hidden" name="id_usuario" value="<?= $idUsuario; ?>">
                          <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                        </form>
                      </div>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php 
include '../../admin/layout/parte2.php';
include '../../layout/mensajes.php';
?>

<script>
  function confirmarEliminacion(event, idUsuario) {
    event.preventDefault();
    Swal.fire({
      title: 'Eliminar registro',
      text: '¿Desea eliminar este registro?',
      icon: 'question',
      showDenyButton: true,
      confirmButtonText: 'Eliminar',
      confirmButtonColor: '#a5161d',
      denyButtonColor: '#270a0a',
      denyButtonText: 'Cancelar'
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById('formularioEliminar' + idUsuario).submit();
        Swal.fire('Eliminado', 'Se eliminó el registro', 'success');
      }
    });
  }

  $(function () {
    $("#example1").DataTable({
      "pageLength": 5,
      "language": {
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Usuarios",
        "infoEmpty": "Mostrando 0 a 0 de 0 Usuarios",
        "infoFiltered": "(Filtrado de _MAX_ total Usuarios)",
        "lengthMenu": "Mostrar _MENU_ Usuarios",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscador:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
          "first": "Primero",
          "last": "Último",
          "next": "Siguiente",
          "previous": "Anterior"
        }
      },
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      buttons: [
        {
          extend: 'collection',
          text: 'Reportes',
          buttons: [
            { extend: 'copy', text: 'Copiar' },
            { extend: 'pdf', text: 'PDF' },
            { extend: 'csv', text: 'CSV' },
            { extend: 'excel', text: 'Excel' },
            { extend: 'print', text: 'Imprimir' }
          ]
        },
        {
          extend: 'colvis',
          text: 'Visor de columnas',
          collectionLayout: 'fixed three-column'
        }
      ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
