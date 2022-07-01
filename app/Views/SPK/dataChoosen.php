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
        display: inline;
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
    .reset{
        margin-left: 1rem;
        margin-bottom: 1rem;
        font-size: 1rem;
        padding: 0.5rem 1rem 0.5rem 1rem;
        border-radius: 1rem;
        background-color: red;
        color: #ddd;
        text-decoration: none;
        border: none;
    }

    
   
  
</style>

<?= $this->include('layout/header') ?>
<div class="container">


    <?= $this->include('layout/sidebar') ?>

    <div class="content">
        <p class="title-content">Data Yang Dipilih</p>
       <a class="reset" href="/spk/data/delete">Reset</a>
        <table id="category">
            <tr>
                <th>Nomor Pilihan</th>
                <th>Kategori</th>
                <th>SubCategory</th>
              

            </tr>

            <?php
            $i = 0;
            $temp = null;
            $temp1 = null;

            ?>
            <?php   foreach ($data as $item) { ?>

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

                                <?= $i + 1?></td>
                        <?php
                            $temp = $item['num_choose'];
                        }
                        ?>
                       
                        <td><?= $item['kategori'][$j] ?></td>
                        <td><?= $item['subkategori'][$j] ?></td>
                      
                        <?php
                            $temp = $item['num_choose'];
                        
                        ?>
                    </tr>
                <?php } ?>
            <? $i++;
            } ?>



        </table>


    </div>

</div>


<?= $this->include('layout/footer') ?>