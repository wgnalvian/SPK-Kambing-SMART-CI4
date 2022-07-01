<?= $this->include('layout/bg') ?>
<style>
    .head{
        z-index: -2;
        position: absolute;
        width: 50px;
        left: 9rem;
        top: 1rem;
    }
</style>
<div class="sidebar">
    <img class="head" src="<?= base_url("images/head.png") ?>">
    <div class="title-sidebar">
        <p>Smart Wedhus</p>

    </div>

    <ul class="items-sidebar">
        <li class="item-sidebar">
            <p><a href="/home">Home</a></p>
        </li>
           <?php if (session()->get('user')['username'] != 'Admin') { ?>
          
                <li><a href="/category">List Kategori</a></li>
                <li><a href="/subcategory">List SubKategori</a></li>
              
        <?php } ?>
        <?php if (session()->get('user')['username'] == 'Admin') { ?>
            <li class="item-sidebar kategori">
                <p>Admin</p>
            </li>
            <ul id="kategori" class=" sublist hidden">
                <li><a href="/category">List Kategori</a></li>
                <li><a href="/subcategory">List SubKategori</a></li>
                <li><a href="/category/add"><i class="fa-clipboard-medical"></i> Tambah Kategori</a></li>
                <li><i class="fa-solid fa-ellipsis-stroke"></i><a href="/subcategory/add">Tambah Subkategori</a></li>
            </ul>
        <?php } ?>

        <li class="item-sidebar spk">
            <p>Smart</p>
        </li>
        <ul id="spk" class="sublist hidden">
            <li><a href="/spk">Pemilihan Data</a></li>
            <li><a href="/spk/data">Data Dipilih</a></li>
            <li><a href="/spk/final">Hitung Smart</a></li>
        </ul>
        <li class="item-sidebar">
            <p><a href="/logout">Logout</a></p>
        </li>
    </ul>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    <?php if (session()->getFlashKeys('nofitication')) { ?>
        Swal.fire('Dilarang', '<?= session()->getFlashdata('notification') ?>', 'error')
    <?php } ?>
</script>