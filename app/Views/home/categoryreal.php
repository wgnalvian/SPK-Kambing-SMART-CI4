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
        display: inline;
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
        <p class="title-content">List Kategori</p>
        <a class="reset" href="/category/delete">Reset</a>
        <hr>
        <table id="category">
            <tr>
                <th>Category</th>
                <th>Nilai bobot</th>
               
            </tr>
            
       
            <?php  foreach($kategori as $item){ ?>
              
            <tr>
                <td><?= $item['kategori'] ?></td>
                <td><?= $item['nilai_bobot'] ?></td>
                
            </tr>
            <? } ?>



        </table>


    </div>

</div>

<?= $this->include('layout/footer') ?>