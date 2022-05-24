<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>
<div class="container mt-4">
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
    }
    ?>
    <div class="mt-3">
        <form action="<?php echo base_url('/Penjualan/store') ?>" method="post">
            <table class="table table-bordered" id="dt-list">
                <thead>
                    <tr>
                        <th>Pilih</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($brg) : ?>
                        <?php foreach ($brg as $b) : ?>
                            <tr>
                                <td style="text-align: center;"><input type="checkbox" name="pj_cb[]"></td>
                                <td><?php echo $b['kode']; ?></td>
                                <td><?php echo $b['nama_barang']; ?></td>
                                <td><?php echo $b['kategori']; ?></td>
                                <td><?php echo $b['harga']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                <input type="submit" value="Beli" class="btn btn-success mb-2">
                <!-- <a href="<?php echo base_url('/Penjualan/store') ?>" class="btn btn-success mb-2">Beli</a> -->
            </div>
        </form>
    </div>
</div>
<?php $this->endSection('content'); ?>