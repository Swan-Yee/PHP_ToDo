<?php
require 'config.php';

if($_POST){
    $title =$_POST['title'];
    $des =$_POST['description'];
    $id=$_POST['id'];

    $pdostatement=$pdo->prepare("UPDATE todo SET title='$title',description='$des' WHERE id='$id'");
    $result=$pdostatement->execute();

    if($result){
        echo "<script>alert('New Todo is Updated!');window.location.href='index.php';</script>";
    }
}
else{
    $pdostatement=$pdo->prepare("SELECT * FROM todo WHERE id=".$_GET['id']);
    $pdostatement->execute();
    $result=$pdostatement->fetchAll();

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit New</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="card">
        <div class="card-body">
            <h1>Create New To Do Tasks</h1>
            
            <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo $result[0]['id'] ?>">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" value="<?php echo $result[0]['title'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="des">Description</label>
                    <textarea name="description" id="des" cols="30" rows="10" class="form-control"><?php echo $result[0]['description'] ?></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" value="Edit" name="" class="btn btn-primary">
                    <a href="index.php" class="btn btn-default">Back</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>