  <!-- jQuery library js -->
  <script src="assets/js/lib/jquery-3.7.1.min.js"></script>
  <!-- Bootstrap js -->
  <script src="assets/js/lib/bootstrap.bundle.min.js"></script>
  <!-- Apex Chart js -->
  <script src="assets/js/lib/apexcharts.min.js"></script>
  <!-- Data Table js -->
  <script src="assets/js/lib/dataTables.min.js"></script>
  <!-- Iconify Font js -->
  <script src="assets/js/lib/iconify-icon.min.js"></script>
  <!-- jQuery UI js -->
  <script src="assets/js/lib/jquery-ui.min.js"></script>
  <!-- Vector Map js -->
  <script src="assets/js/lib/jquery-jvectormap-2.0.5.min.js"></script>
  <script src="assets/js/lib/jquery-jvectormap-world-mill-en.js"></script>
  <!-- Popup js -->
  <script src="assets/js/lib/magnifc-popup.min.js"></script>
  <!-- Slick Slider js -->
  <script src="assets/js/lib/slick.min.js"></script>
  <!-- prism js -->
  <script src="assets/js/lib/prism.js"></script>
  <!-- file upload js -->
  <script src="assets/js/lib/file-upload.js"></script>
  <!-- audioplayer -->
  <script src="assets/js/lib/audioplayer.js"></script>
  
  <!-- main js -->
  <script src="assets/js/app.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  

  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
 <script>
     document.addEventListener('DOMContentLoaded', function() {
         const elements = document.querySelectorAll('.fade-in, .slide-in-left');
         const observer = new IntersectionObserver(entries => {
             entries.forEach(entry => {
                 if (entry.isIntersecting) {
                     entry.target.classList.add('visible');
                 }
             });
         });

         elements.forEach(element => {
             observer.observe(element);
         });
     });


     //    sweet alert
     // Success and Error Modal Handling (SweetAlert)
     document.addEventListener('DOMContentLoaded', function() {
         <?php if (isset($_SESSION['message'])) : ?>
             Swal.fire({
                 icon: '<?php echo $_SESSION['message_type'] == 'success' ? 'success' : 'error'; ?>',
                 title: '<?php echo $_SESSION['message_type'] == 'success' ? 'Success!' : 'Error!'; ?>',
                 text: '<?php echo $_SESSION['message']; ?>',
                 customClass: 'small-alert'
             });
             <?php unset($_SESSION['message'], $_SESSION['message_type']); ?>
         <?php endif; ?>
     });
 </script>
   <script src="ckeditor5/ckeditor.js"></script>
<script>
  const editors = document.querySelectorAll('.editor');
  editors.forEach(editorElement => {
    ClassicEditor
      .create(editorElement, {
        toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'undo', 'redo'],
  
        
      })
      .then(editor => {
        window.editor = editor;
        // Additional actions with the editor instance can be performed here
      })
      .catch(err => {
        console.error(err.stack);
      });
  });
</script>
<style>
    .swal2-popup {
        width: 300px !important;
        max-width: 100%;
        height: auto;
    }
    .swal2-title {
        font-size: 1.5rem !important;
    }
    .swal2-html-container {
        font-size: 1rem !important;
    }
    
</style>

   <!-- Add JavaScript to hide the message after a few seconds -->
   <script>
        document.addEventListener("DOMContentLoaded", function() {
            const alertMessage = document.getElementById('alertMessage');
            if (alertMessage) {
                setTimeout(() => {
                    alertMessage.style.display = 'none';
                }, 5000); // Hide after 5 seconds
            }
        });
    </script>