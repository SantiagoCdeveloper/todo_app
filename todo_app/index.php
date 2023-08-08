<?php include("db.php")?>
<?php include("include/header.php")?>

<div class="container mt-5">
    <div class="row"> 
        <div class="col-md-4">
            <?php if(isset($_SESSION['message'])) {?>
                <div class="alert alert-<?php echo $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                    <?php echo $_SESSION['message']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php session_unset(); } ?>
            <div class="card card-body">
                <form action="save_task.php" method="POST">
                    <div class="form-group mb-3">
                        <input type="text" name="title" class="form-control" placeholder="Task title" autofocus>
                    </div>
                    <div class="form-group mb-3"> 
                        <textarea name="description" rows="2" class="form-control" placeholder="Task Description"></textarea>
                    </div>
                    <input type="submit" class="btn btn-success btn-block w-100" name="save_task" value="Save Task">
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created at</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM task";
                    $result_tasks = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_array($result_tasks)){?>
                        <tr>
                            <td><?php echo $row['title']?></td>
                            <td><?php echo $row['description']?></td>
                            <td><?php echo $row['create_at']?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['id']; ?>"style="text-decoration: none;">
                                    <img src="img/editar.png" class="img-fluid" style="max-width: 24px; max-height: 24px; margin-right: 10px text">
                                </a>
                                <a href="delate_task.php?id=<?php echo $row['id']; ?>"style="text-decoration: none;">
                                    <img src="img/borrar.png" class="img-fluid" style="max-width: 24px; max-height: 24px; margin-left: 10px">
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

