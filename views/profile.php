<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
    crossorigin="anonymous">

</head>
<body>
    <?php
    require "../classes/User.php";

    session_start();
    include "nav.php";


    $u = new User;
    $user_data = $u->getUser($_SESSION['user_id']);
    ?>

    <div class="card my-5 w-50 mx-auto">
        <div class="card-header">
            <img src="../images/<?= $user_data['photo'] ?>" alt="<?= $user_data['username']."'sphoto" ?>" class="img-thumbnail">
        </div>
        <div class="card-header">
            <form action="../actions/uploadPhoto.php" method="post" enctype="multipart/form-data">
                <label for="photo" class="form-label">Choose Photo</label>
                <input type="file" name="photo" id="photo" class="form-control">
                <button type="submit" class="btn btn-outline-secondary mt-2">Upload photo</button>
            </form>

            <h2 class="h4 mt-4"><?= $user_data['first_name']." ".$user_data['last_name'] ?></h2>
            <h3 class="h5"><?= $user_data['username'] ?></h3>

            <form action="../actions/deleteProfile.php" method="post">
                <button type="submit" class="btn btn-danger mt-2">Delete Account</button>
            </form>
        </div>
    </div>
</body>
</html>