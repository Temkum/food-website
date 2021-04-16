 <!-- FOOTER -->
 <div class="footer bottom">
   <div class="wrapper">
     <p class="text-center">Copyright &copy; 2021 by Restaurant. All rights reserved.</p>
   </div>
 </div>

 <!-- JavaScript Bundle with Popper -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js">
 </script>

 <script>
   /* window.onload = function() {
     var duration = 2000; //2 seconds
     setTimeout(function() {
       $('.alert').hide();
     }, 4000);
   }; */

   /* // set time interval for error messages
   setTimeout(function() {
     $(".alert").fadeOut("slow");
   }, 3000); // <-- time in milliseconds */

   window.setTimeout(function() {
     $(".alert").fadeTo(500, 0).slideUp(500, function() {
       $(this).remove();
     });
   }, 3000);
 </script>

 <script src="../js/admin.js"></script>
 </body>

 </html>