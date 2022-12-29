<?php
include 'database.php';

$fetch_data = mysqli_query($conn, "SELECT * FROM data_karyawan WHERE id = '" . $_GET['id'] . "' ");
if (mysqli_num_rows($fetch_data) == 0) {
    echo '<script>window.location="index.php"</script>';
}
$fa_data = mysqli_fetch_assoc($fetch_data);
$id_employee = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee Data</title>
    <!--------------------- Font Used ----------------------------->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <!--------------------- Sweet Alert CDN ----------------------------->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--------------------- CSS ------------------------------------->
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="section">
        <div class="container">
            <h2>Edit Data</h2>
            <button onclick="history.back()">Go Back</button>
            <div class="box">
                <form action="" method="POST" enctype="multipart/form-data">
                    <h4>Name</h4>
                    <input type="text" name="name" class="input-control" value="<?php echo $fa_data['name'] ?>" required>
                    <h4>Email</h4>
                    <input type="text" name="email" class="input-control" value="<?php echo $fa_data['email'] ?>" required>
                    <h4>Address</h4>
                    <input type="text" name="address" class="input-control" value="<?php echo $fa_data['address'] ?>" required>
                    <h4>Gender</h4>
                    <select class="input-control" name="gender">
                        <option value="<?php echo $fa_data['gender'] ?>"><?php echo $fa_data['gender'] ?></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <h4>Position</h4>
                    <input type="text" name="position" class="input-control" value="<?php echo $fa_data['position'] ?>" required>
                    <h4>Status</h4>
                    <select class="input-control" name="status">
                        <option value="<?php echo $fa_data['status'] ?>"><?php echo $fa_data['status'] ?></option>
                        <option value="Fulltime">Fulltime</option>
                        <option value="Parttime">Parttime</option>
                        <option value="Intern">Intern</option>
                    </select>
                    <br><br>
                    <input type="submit" name="submit" value="Submit" class="btn">
                </form>

                <?php
                if (isset($_POST['submit'])) {
                    $nama = $_POST['name'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $gender = $_POST['gender'];
                    $position = $_POST['position'];
                    $status = $_POST['status'];


                    $update = mysqli_query($conn, "UPDATE data_karyawan SET 
                        name = '" . $nama . "',
                        email = '" . $email . "',
                        address = '" . $address . "',
                        gender = '" . $gender . "',
                        position = '" . $position . "',
                        status = '" . $status . "'
                        WHERE id = '" . $id_employee . "'
                        ");

                    if ($update) {
                        echo '<script>Swal.fire({
                            title: "Data Successfully Updated !",
                            text: "Click OK to Proceed",
                            icon: "success"
                          }).then(function() {
                            window.location = "index.php";
                          });
                        </script>';
                    } else {
                        echo 'gagal' . mysqli_error($conn);
                    }
                }
                ?>
            
            </div>
      
        </div>
    </div>
</body>

</html>