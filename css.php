<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f2f2f2;
}

header {
    background-color:black;
    color:#f2f2f2;
    padding: 10px;
    text-align: center;
}

nav ul {
    list-style-type: none;
    padding: 0;
    background-color:white;
    overflow: hidden;
}

nav li {
    float: left;
}

nav a {
    display: block;
    color:black;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

nav a:hover {
    background-color: #ddd;
    color: #333;
}


main {
    background-color: white;
    padding: 20px;
    margin: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(189, 184, 201, 0.1);
}

footer {
    background-color: #333;
    color:white;
    text-align: center;
    padding: 5px;
    position: fixed;
    bottom: 0;
    width: 100%;
}

form {
    max-width: 400px;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
}

input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    background-color:blue;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #555;
}

p {
    margin-top: 15px;
}

@media (max-width: 600px) {
    /* Adjust styles for smaller screens */
    nav {
        text-align: center;
    }
    nav ul {
        text-align: center;
    }

    nav li {
        display: block;
        float: none;

    }
}

    
</body>
</html>
