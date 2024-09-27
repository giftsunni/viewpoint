<script>
 // Success Modal Handling (SweetAlert)
document.addEventListener('DOMContentLoaded', function() {
    <?php if (isset($_SESSION['message']) && $_SESSION['message_type'] == 'success') : ?>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '<?php echo $_SESSION['message']; ?>',
            customClass: 'small-alert'
        });
        <?php unset($_SESSION['message'], $_SESSION['message_type']); // Clear the message after showing ?>
    <?php endif; ?>
});

</script>


<style>
        /* Custom SweetAlert2 styling */
        .swal2-popup {
            width: 300px !important;
            /* Adjust width as needed */
            padding: 20px !important;
        }

        .swal2-title {
            font-size: 18px !important;
        }

        .swal2-html-container {
            font-size: 14px !important;
            /* Adjust text font size */
        }

        .swal2-confirm {
            font-size: 14px !important;
            /* Adjust confirm button font size */
        }

        .swal2-cancel {
            font-size: 14px !important;
            /* Adjust cancel button font size */
        }
    </style>