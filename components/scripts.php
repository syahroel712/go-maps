<!-- Bootstrap core JavaScript -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script>
<script>
    function goBack() {
        window.history.back();
    }
</script>
<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#example').DataTable({
            fixedHeader: true
        });
    });
</script>
