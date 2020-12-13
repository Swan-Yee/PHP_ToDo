<?php
require 'config.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP To Do App</title>
    <!-- bootstrap css cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <?php
    $pdostatement=$pdo->prepare("SELECT * FROM todo ORDER BY id DESC");
    $pdostatement->execute();
    $result= $pdostatement->fetchAll();

    ?>
    <div class="card">
        <div class="card-body">
            <h1 class="h1">To-Do-App</h1>
                <div>
                    <a href="app.php" class="btn btn-success">Create New List</a>
                </div>
                <br>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i=1;
                        if($result){
                            foreach($result as $value){
                                ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $value['title'] ?></td>
                                        <td><?php echo $value['description'] ?></td>
                                        <td><?php echo date('Y-m-d',strtotime($value['create_at'])) ?></td>
                                        <td>
                                            <a href="edit.php?id=<?php echo $value['id']; ?>" class="btn btn-warning">Edit</a>
                                            <a href="delete.php?id=<?php echo $value['id']; ?>" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                <?php
                            $i++;
                            }
                        }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</body>
</html>