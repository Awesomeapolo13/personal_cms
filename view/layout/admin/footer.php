</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
        </div>
    </div>
</footer>

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<?php
includeView('admin/logout_modal');
?>

<!-- Core plugin JavaScript-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="/public/js/admin/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="/public/js/admin/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="/public/js/admin/demo/chart-area-demo.js"></script>
<script src="/public/js/admin/demo/chart-pie-demo.js"></script>

<?php
includeView('base/footer');