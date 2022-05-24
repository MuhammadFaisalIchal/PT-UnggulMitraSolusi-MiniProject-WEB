<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>
<div class="container mt-4">
    <!-- <div class="d-flex justify-content-end">
        <a href="<?php echo site_url('/pj-form') ?>" class="btn btn-success mb-2">Add User</a>
    </div> -->
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
                    <th>Kode Barang</th>
                    <th>Quantity</th>
                    <!-- <th>Action</th> -->
                </tr>
            </thead>
            <tbody>
                <?php if ($pjd) : ?>
                    <?php foreach ($pjd as $pj) : ?>
                        <tr>
                            <td><?php echo $pj['id_nota']; ?></td>
                            <td><?php echo $pj['kode_barang']; ?></td>
                            <td><?php echo $pj['qty']; ?></td>
                            <!-- <td>
                                <a href="<?php echo base_url('edit-pj/' . $pj['id']); ?>" class="btn btn-primary btn-sm">Edit</a>
                                <a href="<?php echo base_url('delete-pj/' . $pj['id']); ?>" class="btn btn-danger btn-sm">Delete</a>
                            </td> -->
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $this->endSection('content'); ?>