<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="container-fluid px-4">
    <h1 class="mt-4">E-Voting MusCab</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Muhammadiyah & Aisyiyah</li>
    </ol>

    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    Form Update Password
                </div>
                <div class="card-body">
                    <form action="<?= site_url('panitia/password/update') ?>" method="post">
                        <div class="form-group">
                            <label for="nm_panitia">Nama Panitia :</label>
                            <input type="text" class="form-control" id="nm_panitia" name="nm_panitia" value="<?= $panitia->NM_PANITIA ?>">
                        </div>
                        <div class="form-group">
                            <label for="username">Username :</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?= $panitia->USERNAME ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="password">Password Baru :</label>
                            <input type="text" class="form-control" id="password" name="password" minlength="4">
                            <small class="text-danger">Kosongkan kolom ini jika tidak menginginkan perubahan password.</small>
                        </div>
                        <hr>
                        <input type="hidden" name="id_panitia" id="id_panitia" value="<?= $panitia->ID_PANITIA ?>" />
                        <input type="hidden" name="old_password" id="old_password" value="<?= $panitia->PASSWORD ?>" />

                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>