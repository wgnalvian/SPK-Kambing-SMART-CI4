<style>
    .content {
        width: calc(100vw - 250px);
        height: 100%;
        box-sizing: border-box;
        padding: 2rem;
        padding-left: 10rem;
    }

    .title-content {
        font-weight: bolder;
        font-size: 2rem;
            text-shadow: 4px 4px 2px #32FF6A;
        padding-bottom: 1rem;
    }

    .form-item {
        display: flex;
        flex-direction: column;
        padding: 1rem 0 1rem 0;
    }

    .form-item input {
        padding: 0.5rem;
        border-radius: 1rem;
        
        background-color: #00FFAB;
        border: 2px solid black;
        margin: 1rem 0 1rem 0;

    }

    .content button{
        padding: 1rem;
        border-radius: 1rem;
        border : 2px solid black;
        background-color: white;
    }
</style>
<?php

use PHPUnit\Util\Xml\Validator;

    if (session()->getFlashdata('error')) {

        $validator  = session()->getFlashdata('error');  

    }

    ?>
<?= $this->include('layout/header') ?>
<div class="container">
   
    <?= $this->include('layout/sidebar') ?>
    <form action="/category/add" method="POST">
        <div class="content">
            <p class="title-content">Tambah Kategori</p>
            <hr>
            <div class="form-item">

                <label for="kategori">Kategori</label>
                <input name="kategori" id="kategori" placeholder="Nama Kategori" />
               <p><?= isset($validator) ? (array_key_exists('kategori',$validator) ? $validator["kategori"] : null) : null ?></p>
            </div>
            <div class="form-item">

                <label for="kategori">Nilai Bobot</label>
                <input type="numeric" name="nilai_bobot" id="nilai_bobot" placeholder="Nilai Bobot" />
                <p><?= isset($validator) ? (array_key_exists('nilai_bobot',$validator)? $validator['nilai_bobot'] : null) : null ?></p>
            </div>

            <button type="submit">Add Category</button>

        </div>
    </form>
</div>

<?= $this->include('layout/footer') ?>