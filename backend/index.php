<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link type="text/css" rel="stylesheet" href="css/style.css">
    <style>
        body{
            overflow-y: hidden;
        }
    </style>
</head>
<body>
<h2>Login</h2>



<div id="user" class="con">
    <ul><form action="login_verwerk.php" method="post"></ul>

        <label for="username"><p>Username</p></label>
        <li><input type="text" placeholder="username" name="username" id="username" required></li>

        <label for="password"><p>Wachtwoord</p></label>
        <li><input type="password" placeholder="password" name="password" id="password" required></li>

        <button class="button" id="submit" type="submit">Login</button>
    <ul></form></ul>
</div>

</body>
<script>
    // function addclass() {
    //     var element = document.getElementById("user");
    //     element.classList.remove("fadein");
    //     element.classList.add("fadeout");
    // }
</script>
</html>