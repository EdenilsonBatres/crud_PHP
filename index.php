<?php include("db.php") ?>
<?php include("includes/header.php") ?>
<!-- //construllendo el cuerpo de la aplicacion -->
<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <!-- //bloque php para mostrar un mensaje -->
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                    <!-- <strong>Holy guacamole!</strong> You should check in on some of those fields below. -->
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times</span>
                    </button>
                </div>
                <!-- //la funcion de unset elimina las variables de sesion -->
            <?php session_unset();
            } ?>

            <div class="card card-body">
                <form action="save_task.php " method="POST">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Task title" autofocus>

                    </div>
                    <div class="form-group">
                        <textarea name="descrption" rows="2" class="form-control" placeholder="Task description"> </textarea>
                    </div>

                    <input type="submit" class="btn btn-success btn-block" name="save_task" value="save task" id="">
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <!-- //inicio del bloque de rellenado de tablas -->
            <table class="table table-bordered">
                <thead>
                    <!-- cabecera de la tabla -->
                    <tr>
                        <!-- filas -->
                        <th>Titulo</th>
                        <th>Description</th>
                        <th>Fecha</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <!-- // -->
                <tbody>
                    <!-- consulta a la base de datos -->
                    <?php
                    $query = "SELECT * FROM task";
                    $resultado_tareas =  mysqli_query($con, $query);
                    while ($row = mysqli_fetch_array($resultado_tareas)) {
                    ?>
                        <!--linea iterable con salida html -->
                        <tr>
                            <td><?php echo $row['title'] ?></td>
                            <td><?php echo $row['description'] ?></td>
                            <td><?php echo $row['created_at'] ?></td>
                            <td>
                                <a href="edit_task.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="delete_task.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">
                                 <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>

                        </tr>
                    <?php } ?>


                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>