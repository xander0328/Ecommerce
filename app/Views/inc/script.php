<!-- Plugins JS File -->
<script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.hoverIntent.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.waypoints.min.js"></script>
<script src="<?= base_url() ?>assets/js/superfish.min.js"></script>
<script src="<?= base_url() ?>assets/js/owl.carousel.min.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap-input-spinner.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.plugin.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.magnific-popup.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.countdown.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

<!-- <script src="https://code.jquery.com/jquery-3.7.0.js"></script> -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<!-- Main JS File -->
<script src=" <?= base_url() ?>assets/js/main.js"></script>
<script src="<?= base_url() ?>assets/js/demos/demo-4.js"></script>

<script>
document.getElementById("change_password").addEventListener("submit", function(event) {
    var oldPassword = document.getElementById("old_password").value.trim();
    var newPassword = document.getElementById("new_password").value;
    var confirmPassword = document.getElementById("confirm_password").value;

    if (newPassword !== confirmPassword) {
        alert("New Password and Confirm Password must match.");
        event.preventDefault();
    }
});
</script>