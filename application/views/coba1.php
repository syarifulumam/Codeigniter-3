<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="card w-50 mx-auto">
            <div class="card-header d-flex justify-content-between align-items-center">
                Form
                <button type="button" class="btn btn-primary add-form-input">tambah</button>
            </div>
            <div class="card-body">
                <?= form_open('#') ?>
                <div class="my-2 d-flex gap-2">
                    <select class="form-select form-select-sm" id="selectUser" aria-label="Small select example">
                        <option selected>-- Pilih User --</option>
                        <?php foreach ($users as $user) : ?>
                            <option value="<?= $user->id ?>"><?= $user->username ?></option>
                        <?php endforeach ?>
                    </select>
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">+</button>
                    <button type="button" class="btn btn-primary btn-sm">refresh</button>
                </div>
                <input type="text" name="password" class="form-control form-control-sm mb-2">
                <button type="submit" class="btn btn-primary">Submit</button>
                <?= form_close() ?>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <?= form_open('', ['id' => 'formTambahUser']) ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="username" class="col-form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#formTambahUser').on('submit', function(e) {
                e.preventDefault(); // Mencegah form melakukan submit normal

                $.ajax({
                    url: '<?= base_url('coba1/insert') ?>', // Sesuaikan dengan URL controller
                    type: 'POST',
                    data: $(this).serialize(), // Mengambil data dari form
                    success: function(response) {
                        // Jika berhasil, lakukan sesuatu (misalnya, perbarui <select> option)
                        $('#selectUser').html(response); // Update <select> dengan data baru
                        $('#formTambahUser')[0].reset(); // Mengosongkan form
                        $('#exampleModal').modal('hide'); // Menutup modal
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText); // Handle error jika ada
                    }
                });
            });
        });
    </script>
</body>

</html>