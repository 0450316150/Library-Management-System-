<?php
$insert = false;
if(isset($_POST['name'])){
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("Connection to database failed: " . mysqli_connect_error());
    }

    // Get form values and hash the password
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hashing the password for security
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    // Insert into database
    $sql = "INSERT INTO `lms`.`user` (`name`, `email`, `password`, `phone`, `address`) VALUES ('$name', '$email', '$password', '$phone', '$address')";

    if($con->query($sql) === true){
        $insert = true;
    } else {
        echo "ERROR: $sql <br> $con->error";
    }

    $con->close();
}

?>

<script type="text/javascript">
    window.location.href = "index.php";
</script>
