<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <form action="../actions/login.php" method="post" class="mx-auto w-50 my-5 border rounded-2 py-4 px-3">
        <h1 class="display-6 text-center text-uppercase">Login</h1>

        <input type="text" name="username" id="username" placeholder="USERNAME" class="form-control mb-3" required autofocus>

        <input type="text" name="password" id="password" placeholder="PASSWORD" class="form-control mb-4" required>

        <button type="submit" class="btn btn-primary w-100 mb-3">Login in</button>

        <div class="text-center">
            <a href="register.php" class="text-decoration-none">Create account</a>
        </div>
        
    </form>
</body>
</html>