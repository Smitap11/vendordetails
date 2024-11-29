<?= $this->extend("layout/base"); ?>

<?= $this->section("content"); ?>

<section>

<div class="auth-container">
    <div class="auth-wrapper">
    <h3>Create Your Account</h3>
        <?php if (session('error')): ?>
            <div class="error-message"><?= session('error') ?></div>
        <?php endif; ?>
        <?= \Config\Services::validation()->listErrors() ?>
        <form id="signupForm" method="post">
          <?= csrf_field() ?>
            <div class="mb-3">
                <label for="username" class="form-label">Username <span style="color: red;">*</span></label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email <span style="color: red;">*</span></label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password <span style="color: red;">*</span></label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn gradient-custom">Sign Up</button>

            <div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center" style="position: fixed; top: 50px; right: 10px; min-height: 200px;">
                <div class="toast" id="signupSuccessToast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto">Success</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    <!-- pass ajax error msg here -->
                </div>
                </div>
            </div>

        </form>
        <div class="login-link">
            <p>Already have an account? 
                <a href="<?= base_url('login') ?>">Log In</a>
            </p>
        </div>

    </div>
</div>



    <!-- Define the URL using PHP -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        // After each successful response, update the CSRF token
        function updateCsrfToken(response) {
            if (response.csrf_hash) {
                $('input[name="csrf_test_name"]').val(response.csrf_hash);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': response.csrf_hash
                    }
                });
            }
        }

        $('#signupForm').submit(function (e) {
            e.preventDefault();

            const password = $('#password').val();
            const passwordPattern = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&_])[A-Za-z\d@$!%*#?&_]{6,}$/;

            if (!passwordPattern.test(password)) {
                showBootstrapToast('Error', 'Password must have at least 6 characters along with a letter, number, and a special character.', 'danger');
                return;
            }

            var formData = $(this).serialize();
            var signupUrl = "<?= base_url('signup') ?>";

            $.ajax({
                url: signupUrl,
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function (response) {
                    if (response.status === 'success') {
                        // Redirect on success
                        updateCsrfToken(response);  
                        showBootstrapToast('Success', 'Account created successfully! Redirecting...', 'success');
                        setTimeout(() => {
                            window.location.href = '<?= base_url('supplier_registration'); ?>';
                        }, 2000);
                    } else {
                        // Show error message in the toast
                        updateCsrfToken(response);  
                        showBootstrapToast('Error', response.message, 'danger');
                        setTimeout(() => {
                            document.getElementById('contactInfoForm').reset();
                        }, 500);
                    }
                },
                error: function (xhr) {
                    let errorMessage = xhr.responseJSON?.message || 'Something went wrong. Please try again.';
                    showBootstrapToast('Error', errorMessage, 'danger');
                }
            });
        });

        // Bootstrap Toast Function
        function showBootstrapToast(title, message, type) {
            const toastContainer = $('#signupSuccessToast');
            toastContainer.find('.toast-header strong').text(title);
            toastContainer.find('.toast-body').text(message);
            toastContainer.removeClass('bg-success bg-danger').addClass(`bg-${type}`);
            const toastInstance = new bootstrap.Toast(toastContainer[0]);
            toastInstance.show();
        }
    });
</script>


</section>

<?= $this->endSection(); ?>
