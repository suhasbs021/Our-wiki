
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>

    <!-- Bootstrap CSS Link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>update Form</h2>
    <a href ="<?php echo base_url('article')?>">back</a>
    <form action="<?= base_url('employee/update/'.$employee['id']) ?>" method ="POST">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" name="username" value="<?php echo $employee['username'] ?>">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="text" class="form-control" name="password" value="<?= $employee['password'] ?>">
        </div>
        <button type="submit" >submit</button>
    </form>
</div>

<!-- Bootstrap JS and Popper.js Scripts (required for some Bootstrap features) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
