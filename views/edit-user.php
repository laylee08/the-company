<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
    crossorigin="anonymous">


</head>
<body>
    <?php
    require "../classes/User.php";

    $user_id = $_GET['user_id'];
    session_start();
    include "nav.php";

    $u = new User;
    $user = $u->getUser($user_id);
    ?>
        <form action="../actions/updateUser.php" method="post" class="border mx-auto w-50 my-5 px-3 py-4">
            <h1 class="h2 text-center text-uppercase fw-lighter">Edit user</h1>

            <input type="hidden" name="user_id" value="<?= $user['id'] ?>">

            <label for="first-name" class="form-label">First Name</label>
            <input type="text" name="first_name" id="first-name" class="form-control mb-2" required 
            autofocus value="<?= $user['first_name'] ?>">

            <label for="last-name" class="form-label">Last Name</label>
            <input type="text" name="last_name" id="last-name" class="form-control mb-2" required
            value="<?= $user['last_name'] ?>">

            <label for="username" class="form-label fw-bold">Username</label>
            <input type="text" name="username" id="username" class="form-control mb-2" required
             maxlength="15" value="<?= $user['username'] ?>"> 

             <button class="submit" class="btn btn-warning">Save</button>
             <a href="dashboard.php" class="btn btn-secondary ms-2">Cancel</a>
        </form>

</body>
</html>