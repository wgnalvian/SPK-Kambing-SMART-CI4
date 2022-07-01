<?= $this->include('layout/header') ?>
<style>
      .content {
        width: calc(100vw - 250px);
        height: 100%;
        box-sizing: border-box;
        padding: 2rem;
        padding-left: 10rem;
        overflow-y: scroll;
    }

    .title-content {
        font-weight: bolder;
        font-size: 2rem;
        text-shadow: 4px 4px 2px #32FF6A;
        padding-bottom: 1rem;
    }
    .topetunjuk{
        width: 100%;
        height: 50px;
        margin-top: 1rem;
        background-color: pink;
        box-sizing: border-box;
        padding: 0.5rem;
    }
    .topetunjuk a{
        font-weight: bolder;
    }

    .hero{
        width: 600px;
    }
   
    
    

</style>
    <div class="container">
   
        <?= $this->include('layout/sidebar') ?>
        <div class="content">
        <p class="title-content">SELAMAT DATANG  <?= session()->get('user')['username'] ?></p>
        <hr>
        <div class="topetunjuk">
            <p>Baca Petunjuk Penggunaan Website ini <a href="/petunjuk">DISINI</a></p>
        </div>
        <img class="hero" src="<?= base_url("images/bg.png") ?>" alt="">
        </div>
    </div>

   <?= $this->include('layout/footer') ?>