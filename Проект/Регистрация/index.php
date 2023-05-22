<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<?php
require('connect.php');

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    $result = mysqli_query($connection, $query);

    if ($result) { 
        $smsg = "Регистрация прошла успешно";
    } else { 
        $fsmsg = "Ошибка";
    }
}
?>

    <div class="container">
        <form class="form-signin" method="POST">
            <h2>Registration</h2>
            <?php if(isset($smsg)){  ?><div class ="alert alert-succes" role="alert"> <?php echo $smsg; ?> </div><?php }?> 
            <?php if(isset($fsmsg)){  ?><div class ="alert alert-danger" role="alert"> <?php echo $fsmsg; ?> </div><?php }?>

            <input type="text" name="username" class="form-control" placeholder="Username" required> 
            <input type="email" name="email" class="form-control" placeholder="Email" required>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
            <a href="login.php" class="btn btn-lg btn-primary btn-block">Login</a>
        </form>
    </div>
</body>
</html>