<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300&display=swap" rel="stylesheet"> 

<script src="https://kit.fontawesome.com/88bbde95ae.js" crossorigin="anonymous"></script>  
<title>Document</title>
</head>

<body>
    <style>
      
        * {
          font-family: 'Poppins', sans-serif;
            padding: 0;
            margin: 0;

        }

        .container {
            position: relative;
            width: 100%;
            height: 100vh;
            overflow: hidden;
            display: flex;
        }

        .sidebar {
            
            overflow-y: auto;
            width: 250px;
            height: 100%;
            border-right: 2px solid black;
        }

        .title-sidebar {
            height: 200px;
            width: 100%;
            box-sizing: border-box;
            padding: 1rem;
            font-size: 2rem;
            text-shadow: 4px 4px 2px #32FF6A;
        }

        .items-sidebar {
            width: 100%;

        }

        .sidebar ul {
            background-color: pink;
            width: 100%;
            list-style: none;


        }

        .sidebar ul li:hover {
            box-sizing: border-box;
            padding: 0.5rem;
            background-color: #99F3BD;
        }

        .sidebar ul li {
            box-sizing: border-box;
            padding: 1rem;

        }

        .sublist {
            background-color: #FFCD38 !important;
        }

        a {
            text-decoration: none;
            color: black;
        }

        .hidden {
            display: none;
        }
        .bg{
        z-index: -2;
        position: absolute;
        bottom: 0;
        width: 100vw;
        height: auto;
        display: flex;
       
    }
    .bg img{
        height: 150px;
    }
    table{
        background-color: white;
    }
    </style>