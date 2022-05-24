<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>

<div class="container mt-5">
    <form method="post" id="update_user" name="update_user" action="<?= site_url('/update') ?>">
        <input type="hidden" name="id" id="id" value="<?php echo $user_obj['id']; ?>">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="<?php echo $user_obj['name']; ?>">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="<?php echo $user_obj['email']; ?>">
        </div>
        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="jk" class="form-control">
                <option selected disabled value="">-Pilih Opsi-</option>
                <?php foreach (["PRIA", 'WANITA'] as $key) { ?>
                    <?php $opt = ($key == $user_obj['jenis_kelamin']) ? 'selected' : ''; ?>
                    <option value="<?php echo $key; ?>" <?php echo $opt; ?>><?php echo $key; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label>Domisili</label>
            <input type="text" name="dom" class="form-control" value="<?php echo $user_obj['domisili']; ?>">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" value="<?php echo $user_obj['password']; ?>">
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
    if ($("#update_user").length > 0) {
        $("#update_user").validate({
            rules: {
                name: {
                    required: true,
                },
                email: {
                    required: true,
                    maxlength: 60,
                    email: true,
                },
                password: {
                    required: true,
                },
            },
            messages: {
                name: {
                    required: "Name is required.",
                },
                email: {
                    required: "Email is required.",
                    email: "It does not seem to be a valid email.",
                    maxlength: "The email should be or equal to 60 chars.",
                },
                password: {
                    required: "Password is required.",
                },
            },
        })
    }
</script>
<?php $this->endSection('content'); ?>