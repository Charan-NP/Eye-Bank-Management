
<?php

session_start();

// Include the database connection file
include 'db.php';
?>
<!DOCTYPE html>
<html  lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>about</title>
      
        
    <style>
    body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f2f2f2;
}

header {
    background-color:skyblue;
    color:#f2f2f2;
    padding: 10px;
    text-align: center;
}

nav ul {
    list-style-type: none;
    padding: 0;
    background-color:skyblue;
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
    background-color: black;
    color:white;
    text-align: center;
    padding: 5px;
    position: fixed;
    bottom: 0;
    width: 100%;
}

form {
    max-width: 1000px;
    margin: 20px auto;
    background-color: #fff;
    padding: 10px;
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
    font-size:25px;
    text-align:center;

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
</style>
    </head>
    <body>
        <nav>
            <ul>
            <center><h1>About Us</h1></center>
            </ul>

        </nav>
       
       
       
        <div>
        <center><h2> What is Eye Bank?</h2></center>
        <p>Eye banks recover, prepare and deliver donated eyes for cornea transplants and researchEye banks recover, prepare and deliver donated eyes for cornea transplants and research.
             Eye banks can be defined as “a non-profit organization that obtains, medically evaluates and
             distributes eye tissue for transplant, research, and education”.
             Ideally, an eye bank should function autonomously and not be part of a medical organization.</p>
       </div>
       <div>
       <center><h2> Who can be an eye donor?</h2></center>
        <p>Practically anyone from the age of 1 year. There is no maximum age limit. 
            Spectacle wearers, persons who had cataract surgery, diabetics and hypertensive individuals can donate eyes.</p>
       </div>
       <div>
       <center><h2> Can we donate eye after death?</h2></center>
        <p>Eyes should be donated within 6-8 hrs of death.” Anyone can be donor, irrespective of age, sex, blood group or religion.”</p>
       </div>
       <div>
       <center><h2>Contact Us </h2></center>
        <p>Phone:9353724598</p>
        <p>Phone:8792856126</p>
        <p>Email:eyebank@gmail.com</p>
        <p>Address:Nehru Nagar,Puttur,Karnataka,India</p>
       </div>
        
    </body>
</html>