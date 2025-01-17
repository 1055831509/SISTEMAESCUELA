<?php
include '../../../app/config.php';
include '../../../admin/layout/parte1.php';
include '../../../app/controllers/configuraciones/institucion/listado_instituciones.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Listado de instituciones</h1>
                <br>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Instituciones Registradas</h3>
                            <div class="card-tools">
                                <a href="create.php" class="btn btn-primary"><i class="bi bi-plus-square"></i> Crear nueva institucion</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                                    <thead>
                                        <tr>
                                            <th><center>Nro</center></th>
                                            <th><center>Nombre de la institucion</center></th>
                                            <th><center>Logo</center></th>
                                            <th><center>Direccion</center></th>
                                            <th><center>Telefono</center></th>
                                            <th><center>Celular</center></th>
                                            <th><center>Correo electronico</center></th>
                                            <th><center>Fecha de creacion</center></th>
                                            <th><center>Estado</center></th>
                                            <th><center>Acciones</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $contador_instituciones = 0;
                                        foreach ($instituciones as $institucione) {
                                            $id_config_institucion = $institucione['id_config_institucion'];
                                            $contador_instituciones++;
                                            ?>
                                            <tr>
                                                <td style="text-align:center;">
                                                    <?= $contador_instituciones; ?>
                                                </td>
                                                <td><?= $institucione['nombre_institucion']; ?></td>
                                                <td>
                                                    <img src="<?= APP_URL . "/public/images/configuracion/" . $institucione['logo']; ?>" width="100px" alt="">
                                                </td>
                                                <td><?= $institucione['direccion']; ?></td>
                                                <td><?= $institucione['telefono']; ?></td>
                                                <td><?= $institucione['celular']; ?></td>
                                                <td><?= $institucione['correo']; ?></td>
                                                <td><?= $institucione['fyh_creacion']; ?></td>
                                                <td><?= $institucione['estado']; ?></td>
                                                <td style="text-align:center;">
                                                    <div class="btn-group" role="group" aria-label="Acciones">
                                                        <a href="show.php?id=<?= $id_config_institucion; ?>" class="btn btn-info btn-sm">
                                                            <i class="bi bi-eye-fill"></i>
                                                        </a>
                                                        <a href="edit.php?id=<?= $id_config_institucion; ?>" class="btn btn-success btn-sm">
                                                            <i class="bi bi-pencil"></i>
                                                        </a>
                                                        <form action="<?= APP_URL; ?>/app/controllers/configuraciones/institucion/delete.php" method="post" id="miFormulario<?= $id_config_institucion; ?>" style="display:inline;">
                                                            <input type="hidden" name="id_config_institucion" value="<?= $id_config_institucion; ?>">
                                                            <button type="button" class="btn btn-danger btn-sm" onclick="preguntar(<?= $id_config_institucion; ?>)">
                                                                <i class="bi bi-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            <script>
                                                function preguntar(id) {
                                                    Swal.fire({
                                                        title: 'Eliminar registro',
                                                        text: '¿Desea eliminar este registro?',
                                                        icon: 'question',
                                                        showDenyButton: true,
                                                        confirmButtonText: 'Eliminar',
                                                        confirmButtonColor: '#a5161d',
                                                        denyButtonColor: '#270a0a',
                                                        denyButtonText: 'Cancelar',
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            document.getElementById('miFormulario' + id).submit();
                                                            Swal.fire('Eliminado', 'Se eliminó el registro', 'success');
                                                        }
                                                    });
                                                }
                                            </script>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include '../../../admin/layout/parte2.php';
include '../../../layout/mensajes.php';
?>

<script>
    $(function () {
        $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Instituciones",
                "infoEmpty": "Mostrando 0 a 0 de 0 Instituciones",
                "infoFiltered": "(Filtrado de _MAX_ total Instituciones)",
                "lengthMenu": "Mostrar _MENU_ Instituciones",
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
            "columnDefs": [
                { "orderable": false, "targets": -1 } // Desactiva ordenación en la última columna (Acciones)
            ]
        });
    });
</script>
