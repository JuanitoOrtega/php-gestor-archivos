        </div>
    </div>
    
    <!-- Javascripts -->
    <script src="<?=BASE_URL?>Assets/plugins/jquery/jquery-3.7.0.min.js"></script>
    <script src="<?=BASE_URL?>Assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- jquery-confirm -->
    <script src="<?=BASE_URL?>Assets/plugins/jquery-confirm/jquery-confirm.min.js"></script>
    <script src="<?=BASE_URL?>Assets/plugins/perfectscroll/perfect-scrollbar.min.js"></script>
    <script src="<?=BASE_URL?>Assets/plugins/pace/pace.min.js"></script>
    <!-- datatables -->
    <script src="<?=BASE_URL?>Assets/plugins/DataTables/datatables.min.js"></script>
    <script src="<?=BASE_URL?>Assets/js/main.min.js"></script>
    <!-- moment -->
    <script src="<?=BASE_URL?>Assets/plugins/moment/moment.min.js"></script>
    <script src="<?=BASE_URL?>Assets/plugins/moment/es-us.js"></script>
    <!-- sweetalert2 -->
    <script src="<?=BASE_URL?>Assets/plugins/sweetalert2/sweetalert2@11.js"></script>
    <script>
        const base_url = '<?=BASE_URL?>';
    </script>
    <!-- Custom JS -->
    <script src="<?=BASE_URL?>Assets/js/custom.js"></script>
    <?php if (!empty($data['script'])) { ?>
<script src="<?=BASE_URL?>Assets/js/modulos/<?=$data['script']?>"></script>
    <?php } ?>
</body>
</html>