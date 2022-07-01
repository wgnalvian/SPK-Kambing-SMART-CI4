<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style>
        * {
            padding: 0;
            margin: 0;
        }

        .container {
            background-color: #85FFBD;
            background-image: linear-gradient(45deg, #85FFBD 0%, #FFFB7D 100%);
            position: relative;
            display: flex;
            align-items: center;
            width: 100%;
            height: 100vh;

        }




        .register-container {
            background-color: white;
            box-sizing: border-box;
            padding: 2rem;
            display: flex;
            justify-content: space-around;
            flex-direction: column;
            margin-top: -20px;
            margin-left: 40px;
            position: relative;
            width: 300px;
            height: 350px;
            border: 2px solid black;
        }

        .register-container .title {
            text-align: center;
            font-size: 1.5rem;
            font-weight: bolder;
            text-shadow: 4px 4px 2px #32FF6A;

        }

        .register-container input {
            background-color: #00FFAB;
            border: 2px solid black;
            border: 2px solid green;
            padding: 0.1rem 0 0.1rem 0;
            border-radius: 1rem;
            width: 100%;
            box-sizing: border-box;
            padding: 0.5rem;
        }

        .register-container button {
            font-weight: bolder;
            width: 100%;
            padding: 0.7rem 0 0.7rem 0;
            background-color: yellow;
           padding: 1rem 2rem 1rem 2rem;
        }

        .error {
            margin-top: 10px;
            color: red;
            font-size: 15px;
        }



        .title-container {
            right: 20px;
            text-shadow: 4px 4px 2px #32FF6A;
            display: flex;
            align-items: center;
            justify-content: space-between;
            text-align: center;
            font-weight: bolder;
            position: absolute;
            width: 70vw;
            font-size: 2rem;
            height: 300px;

        }

        .yet {
            font-weight: bolder;
            position: absolute;
            bottom: -25px;
        }

        .container img {
            position: absolute;
            width: 200px;
            height: 200px;
            right: 20px;
            bottom: 20px;
        }
    </style>

    <?php
    if (session()->getFlashdata('error')) {

        $validator  = session()->getFlashdata('error');
    }

    ?>
    <form action="/login" method="POST">
        <div class="container">

            <img src="<?= base_url('images/wedhus.png') ?>" />
            <div class="register-container">
                <p class="title">Login</p>
                <div>
                    <input name="username" placeholder="username" />
                    <p class="error"><?= isset($validator) ? (array_key_exists('username', $validator) ? $validator['username'] : null) : null ?></p>
                </div>
                <div>
                    <input type="password" name="password" placeholder="password" />
                    <p class="error"><?= isset($validator) ? (array_key_exists('password', $validator) ? $validator['password'] : null) : null ?></p>
                </div>
                <button type="submit">Login</button>
                <p class="yet">Apakah anda belum <a href="/register">Register ?</a></p>
                

            </div>
            <div class="title-container">
                <p>Sistem Pengambilan Keputusan Metode SMART Pemilihan Kambing Kurban</p>

                <div>
                </div>
    </form>

</body>

</html>