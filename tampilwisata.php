<?php
function curl($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

$url = "http://localhost/praktikum/pertemuan1/getwisata.php"; 
$data = curl($url);
$wisata = json_decode($data, true);

echo "<table border='1' cellspacing='0' cellpadding='8'>";
echo "<tr><th>KOTA</th><th>LANDMARK</th><th>TARIF</th></tr>";

foreach ($wisata as $w) {
    echo "<tr>";
    echo "<td>{$w['kota']}</td>";
    echo "<td>{$w['landmark']}</td>";
    echo "<td>{$w['tarif']}</td>";
    echo "</tr>";
}

echo "</table>";
?>
