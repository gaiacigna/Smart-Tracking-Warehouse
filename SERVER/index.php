<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
body {
    font-family:Arial, Helvetica, sans-serif;
    background-image: url('Images/blue.gif') !important;
    background-size: cover;
    color: #333;
    margin: 0;
    padding: 0;
}

h2 {
    color: #fff;
    text-align: center;
    margin-top: 50px;
    font-weight: bolder;
}

.logo-container {
    display: inline-block; 
    font-size: 18px;
    line-height: 1; 
}

.logo-container img {
    vertical-align: middle; 
    width: 7%; 
    height: auto; 
}

h3 {
    color: #fff;
    text-align: center;
    margin-top: 0px;
}

form {
    width: 16% !important;
    margin: 50px auto !important;
    padding: 30px;
    border-radius: 10px;
    background-color: rgba(255, 255, 255, 0.265);
    box-shadow: 0 0 10px rgba(0,0,0,0.3);
}

label {
    display: block;
    font-family: Arial, Helvetica, sans-serif;
    font-weight: bolder;
    margin-bottom: 10px;
    color:#fff;
}

input[type="text"], input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

input[type="submit"] {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: #0099cc;
    color: #fff;
    cursor: pointer;
    font-family: Arial, Helvetica, sans-serif;
    font-weight: bolder;
}

input[type="submit"]:hover {
    background-color: #007799;
}

@media (min-width: 300px) {

    h2 {
        font-size: xx-large !important;
        margin-bottom: 0;
    }
    
    .logo-container img{
        width: 10% !important;
    }

    h3{
        font-size: x-large !important;
    }

    body {
        background: #007799; 
        background-size: cover;
    }
    
    form {
        margin-top: 30% ;
        width: 90% ;
        
    }
}

@media (max-width: 784px) {
    h2 {
        margin-bottom: 0;
    }

    body {
        background: #007799; 
        background-size: cover;
    }
    
    form {
     
        margin-left: 20%;
        width: 90%;
        
    }
}

@media (max-width: 1682px) {

    h2{
        display: flex;
        justify-content: center ;
    }
    body {
        background: #007799 !important; 
        background-size: cover;
    }
    
    form {
        display: block;
        justify-content: center;
        margin-top: 50%;
        width: 50%;
    }

    input[type="submit"]{
        width: 50%;
        margin-left: 25%;

    }

} 

    </style>
</head>
<body>
    <h2 class="logo-container">Benvenuto in <img src = "Images/Enel_X_Logo_Violet_RGB.png" alt = "logo"></h2>
    <h3>Effettua il login</h3>
    <form action="dashboard.php" method="POST">
        <label for="ID_cod">ID Operatore:</label><br>
        <input type="text" id="ID_cod" name="ID_cod" placeholder="ID/Codice Fiscale" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="Password" name="Password" placeholder="Password" required><br>
        <input type="submit" value="Login">
    </form>

   
</body>
</html>