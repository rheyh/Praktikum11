<?php
include 'database.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum 11</title>
    <!--------------------- Font Used ----------------------------->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <!--------------------- CSS ------------------------------------->
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="section">
        <div class="container">
            <div class="box1">
                <button><a href="add-data.php" style="text-decoration: none ; font-weight:bold;"> + Add Data</a></button><br><br>
            </div><br>
            <h2>Employee Data</h2>
            <div class="box">
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Gender</th>
                            <th>Position</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = mysqli_query($conn, "SELECT * FROM `data_karyawan`  ");
                        if (mysqli_num_rows($data) > 0) {
                            while ($row = mysqli_fetch_assoc($data)) {
                        ?>
                                <tr>
                                    <td><?php echo $row['id'] ?></td>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo $row['email'] ?></td>
                                    <td><?php echo $row['address'] ?></td>
                                    <td><?php echo $row['gender'] ?></td>
                                    <td><?php echo $row['position'] ?></td>
                                    <td><?php echo $row['status'] ?></td>
                                    <td>
                                        <center>
                                            <button id="buttdetail">
                                                <a href="edit-data.php?id=<?php echo $row['id'] ?>">Edit</a>
                                            </button>
                                            <button id="buttdetail">
                                                <a href="delete.php?id=<?php echo $row['id'] ?>" onclick="return confirm('Delete Data Confirm ?') ">Delete</a> </button>
                                                
                                        </center>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</body>

</html>