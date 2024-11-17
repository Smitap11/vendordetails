<?= $this->extend("layout/base"); ?>

<?= $this->section("content"); ?>

<section>
    <div class="auth-container">
        <div class="auth-wrapper">
            <h3>Login</h3>
            <form id="loginForm" method="post">
                <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="username" class="form-label">Username <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" name="username" id="username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password <span style="color: red;">*</span></label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <button type="submit" class="btn gradient-custom">Login</button>
            </form>
            <div class="signup-link">
                <p>Don't have an account? <a href="<?= base_url('signup') ?>">Sign Up</a></p>
            </div>
        </div>
    </div>

    <!-- Toast for dynamic messages -->
    
    <div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center" style="position: fixed; top: 10px; right: 10px; min-height: 200px;">
        <div class="toast" id="loginSuccessToast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto">Success</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            <!-- pass ajax error msg here -->
        </div>
        </div>
    </div>

</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function () {
        function updateCsrfToken(response) {

            console.log('csrf = ',response.csrf_hash);

            if (response.csrf_hash) {
                $('input[name="csrf_test_name"]').val(response.csrf_hash);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': response.csrf_hash
                    }
                });
            }
        }
        $('#loginForm').submit(function (e) {
            e.preventDefault(); // Prevent default form submission

            let loginUrl = "<?= base_url('auth/login') ?>"; // Login endpoint
            let formData = $(this).serialize(); // Serialize form data

            $.ajax({
                url: loginUrl,
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function (response) {
                    if (response.status === 'success') {
                        // Redirect on successful login
                        updateCsrfToken(response);  
                        window.location.href = "<?= base_url('supplier_registration') ?>";
                    } else {
                        // Show error message in toast
                        updateCsrfToken(response);  
                        showBootstrapToast('Error', response.message, 'danger');

                    }
                },
                error: function (xhr) {
                    let errorMessage = xhr.responseJSON?.message || 'Something went wrong. Please try again.';
                    showBootstrapToast('Error', errorMessage, 'danger');
                }
            });
        });

        function showBootstrapToast(title, message, type) {
            const toastContainer = $('#loginSuccessToast');
            toastContainer.find('.toast-header strong').text(title);
            toastContainer.find('.toast-body').text(message);
            toastContainer.removeClass('bg-success bg-danger').addClass(`bg-${type}`);
            const toastInstance = new bootstrap.Toast(toastContainer[0]);
            toastInstance.show();
        }
    });

</script>

<?= $this->endSection(); ?>
