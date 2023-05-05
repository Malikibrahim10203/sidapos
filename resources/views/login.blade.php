<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/login.css')}}" type="text/css">
    <title>Sidapos</title>
</head>
<body>
    <div class="container mt-5">
        <div class="right">
            <h1 class="h1a">Sidapos</h1>
            <img src="{{asset('img/login.png')}}" alt="">
        </div>
        <div class="login">
            <h1 class="h1b">LOGIN</h1>
            <form action="" method="post">    
                <label for="email">Email</label>
                <input type="text" name="email" placeholder="example@exam.com">
                <br>         
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="password">
                <br>
                <p>
                    <button type="submit" class="btn btn-success mt-3">Login</button>
                    <a href="#">Forget Password</a>
                </p>
            </form>
        </div>
    </div>
</body>
</html>