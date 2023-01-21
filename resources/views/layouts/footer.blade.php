<footer class="footer">
    <div class="container-fluid d-flex justify-content-between">
        <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © tminnovation.co.in 2023</span>
        <span class="float-none float-sm-end mt-1 mt-sm-0 text-end"><a href="http://tminnovation.co.in/" target="_blank">tminnovation.co.in</a></span>
    </div>
</footer>

<script src="assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="assets/vendors/chart.js/Chart.min.js"></script>
<script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="assets/js/off-canvas.js"></script>
<script src="assets/js/hoverable-collapse.js"></script>
<script src="assets/js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="assets/js/dashboard.js"></script>
<script src="assets/js/todolist.js"></script>

<style>
    .required:after {
    content:" *";
    color: red;
  }
</style>

<script>
    $("document").ready(function(){
    setTimeout(function(){
       $("div.alert").remove();
    }, 2000 ); // 5 secs
    });
</script>
