<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            padding: 0;
            margin: 0;

        }

        .container {
            overflow-x: hidden;
            width: 100vw;
            height: 100vh;
            position: relative;

        }

        .container img {
            right: 20px;
            z-index: -1;
            position: absolute;
            width: 800px;

        }

        .side {
            background-color: #85FFBD;
            background-image: linear-gradient(45deg, #85FFBD 0%, #FFFB7D 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-size: 2rem;
            font-weight: bolder;
            box-sizing: border-box;
            padding: 1rem;
            z-index: 1;
            width: 40%;
            background-color: red;
            height: 100%;
            text-align: center;
        }

        .side button {
            margin-top: 20px;
            font-size: 1rem;
            font-weight: bolder;
            border: none;
            background-color: yellow;
            padding: 1rem 2rem 1rem 2rem;
        }

        .pengembang {
            background-color: #FFDEE9;
            background-image: linear-gradient(0deg, #FFDEE9 0%, #B5FFFC 100%);

            display: flex;

            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .pengembang div {
            display: flex;
        }

        .title-pengembang {
            font-size: 2rem;
            font-weight: bolder;
            margin-bottom: 3rem;

        }

        .patokan {
            margin: 0 2rem 0 2rem;
        }

        .cek{
            z-index: 1 !important;
            width: 100px;
            height: 100px;
        }
      
    </style>
</head>

<body>

    <div class="container">

        <img src="<?= base_url('images/bg.png') ?>" />
        <div class="side">
            <p>Website Sistem Pemilihan Keputusan Metode SMART Pemilihan Kambing Kurban</p>
            <button class="mulai">Mulai</button>
        </div>


    </div>
    <div class="container pengembang">

        <p class="title-pengembang">Pengembang Web</p>
        <div>
            <p>Alvian Arif Wiguna</p>
            <p class="patokan">Ananda Bagus Lanang Samudra</p>
            <p>Marcelita A</p>
        </div>
    </div>
    <script>
        let element = document.querySelector('.mulai');
        element.addEventListener('click', (e) => {
            window.location.href = '<?= base_url('/login') ?>';
        })
    </script>
</body>

</html>