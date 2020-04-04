<?php
include "config/koneksi.php";
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <title>Aplikasi Cari Rute Wisata</title>
  <?php include 'components/head.php' ?>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
  <link href="assets/css/select2-bootstrap4.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
  <link rel="stylesheet" href="assets/css/leaflet.css" />
  <script src="assets/js/leaflet.js"></script>
  <script src="assets/js/leaflet.providers.js"></script>
  <script src="assets/js/leaflet.bing.js"></script>
  <script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=Promise"></script>
  <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
  <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
  <script type="text/javascript" src="https://unpkg.com/vis-network/standalone/umd/vis-network.min.js"></script>
</head>

<body>

  <!-- Navigation -->
  <?php include 'components/menu.php' ?>


  <?php include 'content.php' ?>

  <?php //include 'components/footer.php'
  ?>

  <?php include 'components/scripts.php' ?>

  <script>
    $(document).ready(function() {
      $('.select2').select2({
        theme: 'bootstrap4',
        tags: true,
      });
    });
  </script>
</body>

</html>

<?php
$output = ob_get_contents();
ob_end_clean();
echo $output;
?>