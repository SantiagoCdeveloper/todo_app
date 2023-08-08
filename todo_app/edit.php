<?php

include("db.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM task WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $title = $row['title'];
        $description = $row['description'];
    }
}

if(isset($_POST['update'])){
    $id = $_GET['id'];
    $title = $_POST['title'];
    $description= $_POST['description'];
    $query = "UPDATE task set title = '$title', description = '$description' where id = $id";
    mysqli_query($conn,$query);
    header("Location: index.php");
}

?>
<?php include("include/header.php")?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id']?>" method="POST">
                    <div class="form-group mb-3">
                        <input type="text" name="title" value="<?php echo $title; ?>" class="form-control" placeholder="Update title">
                    </div>
                    <div class="form-group mb-3">
                        <textarea name="description" rows="2" class="form-control" placeholder="Update description"><?php echo $description; ?></textarea>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <button class="btn btn-success w-100" name="update">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("include/footer.php")?>
