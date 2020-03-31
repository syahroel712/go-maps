<?php include "config/koneksi.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <title>Go-maps</title>
  <?php include 'components/head.php' ?>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
  <link href="assets/css/select2-bootstrap4.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
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
      });
    });
  </script>
</body>

</html>
