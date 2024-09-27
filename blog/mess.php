<?php
// Check for session messages and display with Toastr
if (isset($_SESSION['message'])): ?>
    <script>
        // Trigger the appropriate Toastr notification
        document.addEventListener('DOMContentLoaded', function() {
            <?php if ($_SESSION['message_type'] == 'success'): ?>
                toastr.success("<?php echo $_SESSION['message']; ?>");
            <?php else: ?>
                toastr.error("<?php echo $_SESSION['message']; ?>");
            <?php endif; ?>
        });
    </script>
<?php
    // Unset the session variables so the message doesn't show again on page reload
    unset($_SESSION['message']);
    unset($_SESSION['message_type']);
endif;
?>
