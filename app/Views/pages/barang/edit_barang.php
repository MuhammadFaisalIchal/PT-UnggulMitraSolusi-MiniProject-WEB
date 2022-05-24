<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>

<div class="container mt-5">
    <form method="post" id="update_brg" name="update_brg" action="<?= site_url('/update-brg') ?>">
        <input type="hidden" name="id" id="id" value="<?php echo $brg_obj['id']; ?>">
        <div class="form-group">
            <label>Nama Barang</label>
            <input type="text" name="nama_brg" class="form-control" value="<?php echo $brg_obj['nama_barang']; ?>">
        </div>
        <div class="form-group">
            <label>Kategori</label>
            <input type="text" name="kategori" class="form-control" value="<?php echo $brg_obj['kategori']; ?>">
        </div>
        <div class="form-group">
            <label>Harga</label>
            <input type="number" name="harga" min="0.00" step="0.01" class="form-control" value="<?php echo $brg_obj['harga']; ?>">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-danger btn-block">Update Data</button>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
<script>
    if ($("#update_brg").length > 0) {
        $("#update_brg").validate({
            rules: {
                nama_brg: {
                    required: true,
                },
                kategori: {
                    required: true,
                },
                harga: {
                    required: true,
                },
            },
            messages: {
                nama_brg: {
                    required: "Name barang is required.",
                },
                kategori: {
                    required: "Kategori is required.",
                },
                harga: {
                    required: "Harga is required.",
                },
            },
        })
    }
</script>
<?php $this->endSection('content'); ?>