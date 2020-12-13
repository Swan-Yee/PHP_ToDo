<?php
require 'config.php';
    if ($_POST){
        $title =$_POST['title'];
        $des =$_POST['description'];

        $sql= "INSERT INTO todo(title,description) VALUES (:title,:description)";
        $pdostatement =$pdo->prepare($sql);
        $result=$pdostatement->execute(
            array(
                ':title'=>$title,
                ':description'=>$des
            )
        );

        if($result){
            echo "<script>alert('New Todo is add!');window.location.href='index.php';</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create View</title>
    <!-- bootstrap css cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="card">
        <div class="card-body">
            <h1>Create New To Do Tasks</h1>
            
            <form action="app.php" method='post'>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" required>
                </div>
                <div class="form-group">
                    <label for="des">Description</label>
                    <textarea name="description" id="des" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" value="Submit" name="" class="btn btn-primary">
                    <a href="index.php" class="btn btn-default" name="">Back</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>