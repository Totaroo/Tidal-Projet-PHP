<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenu</title>
</head>
<body>
    <div>    
        <form action="../controllers/login.php" method="POST"></form>
            <h2>Connexion</h2>

            <label><b>Username :</b></label>
            <input type="text" placeholder="JohnDoe" name="username" required>

            <label><b>Password :</b></label>
            <input type="password" placeholder="password" name="password" required>

            <input type="submit" id="submit" value="LOGIN">
                 
        </form>
    </div>
</body>
</html>