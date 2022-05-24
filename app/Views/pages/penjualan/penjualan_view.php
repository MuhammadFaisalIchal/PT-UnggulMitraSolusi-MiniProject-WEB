<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>
<div class="container mt-4">
    <div class="d-flex justify-content-end">
        <a href="<?php echo site_url('/pj-form') ?>" class="btn btn-success mb-2">Add Penjualan</a>
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
                    <th>ID Nota</th>
                    <th>Tanggal</th>
                    <th>Kode Pelanggan</th>
                    <th>Sub Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($pjs) : ?>
                    <?php foreach ($pjs as $pj) : ?>
                        <tr>
                            <td><a href="<?php echo base_url('pjd-list/' . $pj['id_nota']); ?>"><?php echo $pj['id_nota']; ?></a></td>
                            <td><?php echo $pj['tgl']; ?></td>
                            <td><?php echo $pj['kode_pelanggan']; ?></td>
                            <td><?php echo $pj['subtotal']; ?></td>
                            <td>
                                <!-- <a href="<?php echo base_url('edit-pj/' . $pj['id']); ?>" class="btn btn-primary btn-sm">Edit</a> -->
                                <a href="<?php echo base_url('delete-pj/' . $pj['id']); ?>" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $this->endSection('content'); ?>