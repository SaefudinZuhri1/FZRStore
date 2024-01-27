<?php

$ekspedisi = $_POST["ekspedisi"];  // Menggunakan $_POST karena AJAX Anda menggunakan metode POST
$distrik = $_POST["distrik"];
$berat = $_POST["berat"];

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "origin=501&destination=".$distrik."&weight=".$berat."&courier=".$ekspedisi."",
    CURLOPT_HTTPHEADER => array(
        "content-type: application/x-www-form-urlencoded",
        "key: f9b2b5eea0f5d0ce807e46350ea1a60f"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $array_response = json_decode($response, true);

    echo"<pre>";
    print_r($array_response);
    echo"</pre>";

    // Periksa apakah ada hasil dari permintaan
    if (isset($array_response["rajaongkir"]["results"]) && !empty($array_response["rajaongkir"]["results"])) {
      $data_paket = $array_response["rajaongkir"]["results"]["0"]["costs"];
  
      echo "<option>Pilih Pengiriman</option>";
  
      foreach ($data_paket as $key => $value) {
          echo "<option paket='".$value["service"]. "' ongkir='".$value["cost"]["0"]["value"]."' etd='".$value["cost"]["0"]["etd"]."'>";
          echo $value["service"]. " ";
          echo number_format($value["cost"][0]["value"], 2, ".", ""). " ";
          echo $value["cost"]["0"]["etd"]. " ";
          echo "</option>";

          echo"<pre>";
          print_r($data_paket);
          echo"</pre>";

      }
  } else {
      echo "<option>Data paket tidak ditemukan</option>";
  }
  
}
?>
