<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mazer Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="stylesheet" href="/assets/css/pages/auth.css">
    <style>
        #auth #auth-left .auth-logo {
            margin-bottom: 1rem !important;
        }

        #auth #auth-left .auth-title {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .fs-4 {
            font-size: calc(15.4px + .3vw) !important;
        }
    </style>
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <h2>PT. Bintoro Indah Group</h2>
                    </div>
                    <h4 class="auth-title">Sign Up</h4>

                    <form action="/auth/daftar" method="post" id="signupForm">
                        <?= csrf_field() ?>

                        <?php if (session()->getFlashdata('errors')): ?>
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                        <li><?= esc($error) ?></li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                        <?php endif ?>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" id="nik" name="nik" value="<?= old('nik') ?>" class="form-control form-control-sm" placeholder="NIK" required>
                            <small id="nik-error" class="text-danger d-none">NIK harus 16 digit angka</small>
                            <div class="form-control-icon">
                                <i class="bi bi-credit-card"></i>
                            </div>
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input name="nama_pelamar" value="<?= old('nama_pelamar') ?>" type="text" class="form-control form-control-sm" placeholder="Nama Pelamar">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input name="telepon" value="<?= old('telepon') ?>" type="text" class="form-control form-control-sm" placeholder="No HP">
                            <div class="form-control-icon">
                                <i class="bi bi-telephone"></i>
                            </div>
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input name="username" value="<?= old('username') ?>" type="text" class="form-control form-control-sm" placeholder="Username Anda">
                            <div class="form-control-icon">
                                <i class="bi bi-person-circle"></i>
                            </div>
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input name="password" id="password" type="password" class="form-control form-control-sm" placeholder="Password" required>
                            <div class="form-control-icon">
                                <i class="bi bi-lock"></i>
                            </div>
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input name="confirm_password" id="confirm-password" type="password" class="form-control form-control-sm" placeholder="Confirm Password" required>
                            <small id="password-error" class="text-danger d-none">Password tidak cocok</small>
                            <div class="form-control-icon">
                                <i class="bi bi-lock-fill"></i>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block shadow-lg mt-5">Sign Up</button>
                    </form>


                    <div class="text-center mt-5 text-lg fs-4">
                        <p class='text-gray-600'>Already have an account? <a href="/auth"
                                class="font-bold">Log
                                in</a>.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('signupForm');
            const password = document.getElementById('password');
            const confirmPassword = document.getElementById('confirm-password');
            const errorText = document.getElementById('password-error');
            const nik = document.getElementById('nik');
            const nikError = document.getElementById('nik-error');

            let confirmPasswordStarted = false; // ✅ Flag ini akan aktif saat user mulai mengetik

            function validatePasswordMatch() {
                if (!confirmPasswordStarted) return true; // ✅ Jangan validasi sebelum user mulai mengetik confirm password

                if (password.value !== confirmPassword.value) {
                    errorText.classList.remove('d-none');
                    confirmPassword.classList.add('is-invalid');
                    return false;
                } else {
                    errorText.classList.add('d-none');
                    confirmPassword.classList.remove('is-invalid');
                    return true;
                }
            }

            confirmPassword.addEventListener('input', function() {
                confirmPasswordStarted = true; // ✅ Set aktif saat user mengetik pertama kali
                validatePasswordMatch();
            });

            password.addEventListener('input', validatePasswordMatch);

            nik.addEventListener('keydown', function(e) {
                // Izinkan tombol navigasi dan kontrol
                if (
                    e.key === 'Backspace' ||
                    e.key === 'Delete' ||
                    e.key === 'ArrowLeft' ||
                    e.key === 'ArrowRight' ||
                    e.key === 'Tab'
                ) {
                    return;
                }

                // Blokir jika bukan angka 0–9
                if (!/^\d$/.test(e.key)) {
                    e.preventDefault();
                }
            });

            // ✅ Validasi panjang NIK saat diketik
            nik.addEventListener('input', function() {
                nikStarted = true;
                const nikValue = nik.value.trim();

                if (!/^\d{16}$/.test(nikValue)) {
                    nik.classList.add('is-invalid');
                    nikError.classList.remove('d-none');
                } else {
                    nik.classList.remove('is-invalid');
                    nikError.classList.add('d-none');
                }
            });

            form.addEventListener('submit', function(e) {
                let hasError = false;

                if (!validatePasswordMatch()) {
                    hasError = true;
                }

                const nikValue = nik.value.trim();
                const isValidNIK = /^[0-9]{16}$/.test(nikValue);

                if (!isValidNIK) {
                    nik.classList.add('is-invalid');
                    nikError.classList.remove('d-none');
                    hasError = true;
                } else {
                    nik.classList.remove('is-invalid');
                    nikError.classList.add('d-none');
                }

                if (hasError) {
                    e.preventDefault();
                }
            });
        });
    </script>



</body>

</html>