<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" /></head>
</head>
<body>
    <?php
    require "../classes/User.php";

    session_start();
    include "nav.php";

    $u = new User;
    $user_list = $u->getUsers();

    ?>

    <!-- list of users -->
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-8">
                <h2 class="display-6">User List</h2>
                <table class="table">
                    <thead class="table-secondary">
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <?php while($row = $user_list->fetch_assoc()) { ?>
                                <tr>
                                    <td><?= $row['id'] ?></td>
                                    <td><?= $row['first_name'] ?></td>
                                    <td><?= $row['last_name'] ?></td>
                                    <td><?= $row['username'] ?></td>
                                    <td>
                                        <a href="edit-user.php?user_id=<?=$row['id'] ?>" 
                                        class="btn btn-sm btn-outline-warning">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>
                                        <?php if($row['id'] != $_SESSION['user_id']) { ?>
                                            <form action="../actions/deleteUser.php" method="post" class="d-inline">
                                                <input type="hidden" name="user" value="<?= $row['id'] ?>">
                                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        <?php } ?>
                                    </td>
                                </tr>
                        <?php } ?>                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>