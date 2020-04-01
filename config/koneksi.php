<?php
require_once "Medoo.php";

use Medoo\Medoo;

$DB = new Medoo([
    // required
    'database_type' => 'mysql',
    'database_name' => 'db_prim',
    'server' => 'localhost',
    'username' => 'root',
    'password' => 'mysql'
]);

/*


    // versi mysqli
    $data_tempat = mysqli_query("SELECT * FROM tempat");
    while($data = mysqli_fetch_assoc($data_tempat))
    {
        echo $data['id_tempat'];
    }

    // versi medoo
    $data_tempat = $DB->query("SELECT * FROM tempat WHERE id = :id ", array(":id" => $_POST['id']))->fetchAll(PDO::FETCH_ASSOC);
    foreach($data_tempat as $no => $data)
    {
        echo $data['id_tempat'];
    }


    // cara insert, delete atau update
    $data = array(
        ":nama" => $_POST['nama'],
        ":nama" => $_POST['nama'],
    );
    $DB->query("UPDATE tempat SET nama = :nama, kelas = :kelas  WHERE id = :id", $data);
*/
