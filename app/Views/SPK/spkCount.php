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

    #category {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #category td,
    #category th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #category tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #category tr:hover {
        background-color: #ddd;
    }

    #category th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
    }
    .subtitle-content{
        margin-top: 0.5rem;
        margin-bottom: 0.5rem;
        font-weight: bolder;
    }
</style>

<?= $this->include('layout/header') ?>
<div class="container">

    <?= $this->include('layout/sidebar') ?>
    <div class="content">
        <p class="title-content">Perhitungan SPK</p>
        <hr>
        <p class="subtitle-content">Tabel Nilai Normalisasi</p>
        <table id="category">
            <tr>

                <th>Kategori</th>
                <th>Nilai Normalisasi</th>

                <?php foreach ($nilai_normalisasi as $nnormal) { ?>
            </tr>
            <td>
                <?= $nnormal['kategori'] ?>
            </td>
            <td><?= $nnormal['nilai_normalisasi'] ?></td>
        <?php } ?>




        </table>
        <p class="subtitle-content">Tabel Nilai Bobot Utility</p>
        <table id="category">
            <tr>
                <th>Nomor Pilihan</th>
                <th>Kategori</th>
                <th>SubCategory</th>
                <th>Nilai Utility</th>
                <th>Bobot utility</th>

            </tr>

            <?php
            $i = 0;
            $temp = null;

            ?>
            <?php foreach ($data as $item) { ?>

                <?php for ($j = 0; $j < count($item['kategori']); $j++) { ?>
                    <tr>
                        <?php
                        if ($temp != $item['num_choose']) { ?>
                            <td rowspan="<?php
                                            if ($temp != $item['num_choose']) {
                                                echo count($item['kategori']);
                                                $temp = $item['num_choose'];
                                            } else {
                                                null;
                                            }
                                            ?>">

                                <?= $i + 1 ?></td>
                        <?php
                            $temp = $item['num_choose'];
                        }
                        ?>

                        <td><?= $item['kategori'][$j] ?></td>
                        <td><?= $item['subkategori'][$j] ?></td>
                        <td><?= $item['nilai_utility'][$j] ?></td>
                        <td><?= $item['bobot_utility'][$j] ?></td>
                    </tr>
                <?php } ?>
            <? $i++;
            } ?>



        </table>
        <p class="subtitle-content">Hasil Penentuan Keputusan </p>
        <table id="category">
            <tr>

                <th>Nomor Pilihan</th>
                <th>Nilai Akhir</th>
                <th>Status Keputusan</th>

                <?php for ($k=0; $k < count($nilai_spk['nilai_spk']);$k++) { ?>
            </tr>
            <td>
              
                <?= $nilai_spk['num_choose'][$k] ?>
            </td>
            <td><?= $nilai_spk['nilai_spk'][$k]?></td>
            <td><?= $nilai_spk['status'][$k] ?></td>
        <?php } ?>




        </table>


    </div>

</div>

<?= $this->include('layout/footer') ?>