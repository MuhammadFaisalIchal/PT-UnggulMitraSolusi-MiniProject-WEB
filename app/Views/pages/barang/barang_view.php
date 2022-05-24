<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>
<div class="container mt-4">
    <div class="d-flex justify-content-end">
        <a href="<?php echo site_url('/barang-form') ?>" class="btn btn-success mb-2">Add Barang</a>
    </div>
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
    }
    ?>
    <div class="mt-3">
        <table class="table table-bordered" id="dt-list">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($brg) : ?>
                    <?php foreach ($brg as $b) : ?>
                        <tr>
                            <td><?php echo $b['kode']; ?></td>
                            <td><?php echo $b['nama_barang']; ?></td>
                            <td><?php echo $b['kategori']; ?></td>
                            <td><?php echo $b['harga']; ?></td>
                            <td>
                                <a href="<?php echo base_url('edit-barang/' . $b['id']); ?>" class="btn btn-primary btn-sm">Edit</a>
                                <a href="<?php echo base_url('/delete-brg/' . $b['id']); ?>" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $this->endSection('content'); ?>