<!-- json_encode = mengubah array menjadi json -->
<!-- json_decode = mengubah json menjadi array, jika ingin menjadi array assosiatif maka tambahkan true, dan jika tidak ditambahkan maka akan menjadi object  -->


<?php
// contoh mengubah array menjadi json
$mahasiswa = [
    [
        "nama"  => "aan abdul rohman",
        "npm"   => "43a87006180281",
        "email" => "aanabdul@gmail.com"
    ],
    [
        "nama"  => "aan abdul rohman",
        "npm"   => "43a87006180281",
        "email" => "aanabdul@gmail.com"
    ]
];

// contoh jika ingin mengambil datanya dari database
// configurasi db
$dbh = new PDO(
    'mysql:host=localhost;
                dbname=ppid',
    'root',
    ''
);

// memanggil table
$db = $dbh->prepare('SELECT * FROM user');
$db->execute();
// menjadikan array
$user = $db->fetchAll(PDO::FETCH_ASSOC);

$data = json_encode($mahasiswa);
$data2 = json_encode($user);
echo "mengubah array menjadi json : <br>" . $data;
echo "<br><br>";
echo "mengubah array menjadi json dengan cara memanggil dari db : <br>" . $data2;
echo "<br><br>";


// mengubah json menjadi array menggunakan json_decode
// disini saya memanggil data json yang sudah saya buat di file latihan.json, kalian juga bisa memanggil data nya dari mana saja
$data = file_get_contents('latihan.json');
// menjadikan array assosiatif dengan menambahkan true
$mahasiswa = json_decode($data, true);

echo " mengubah json menjadi array : <br>";
var_dump($mahasiswa);
// mencoba menngal data yang ada di dalam array, yaitu nama pembimbing 1 = kresno
echo $mahasiswa[0]["pembimbing"]["pembimbing1"];
?>

<!-- di dalam vidio web unpas ada juga yang menggunakan js vanila dan jquery, namun saya tidak menyertakannya disini, cek saja di playlis api vidio ke 3-->