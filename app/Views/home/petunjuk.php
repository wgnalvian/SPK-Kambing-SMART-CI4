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
    .petunjuk-penggunaan{
        width: 100%;
        margin-top : 1rem;
        min-height: 300px;
        box-sizing: border-box;
        padding : 1rem;
        background-color: pink;
    }

</style>
    <div class="container">
       
        <?= $this->include('layout/sidebar') ?>
        <div class="content">
        <p class="title-content">Petunjuk Penggunaan </p>
        <hr>
        <div class="petunjuk-penggunaan">
            <p>Berdoa sebelum menggunakan website ini</p>
            <p>[ USER ]</p>
            <p> -> Untuk memulai memilih data Alternatif klik pada tab "Smart"</p>
                <p> -> Setelah memilih data, maka anda dapat melihat data yang dipilih pada bagian "Data Dipilih"</p>
                <p> -> Untuk melihat perhitungan nilai normalisasi, nilai utility, dan nilai akhir USER dapat melihat pada bagian "Hitung Smart"</p>
        </div>
     
        </div>
    </div>

   <?= $this->include('layout/footer') ?>