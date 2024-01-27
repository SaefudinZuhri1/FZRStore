// Raja Ongkir

$(document).ready(function() {
   $.ajax({
    url: '../data_provinsi.php',
    type: 'post',
    success: function (data_provinsi) {
       $("select[name=provinsi]").html(data_provinsi); 
    }
   });

   $("select[name=provinsi]").on("change", function() {

        var id_provinsi = $(this).val();

        $.ajax({
          url: '../data_distrik.php',
          type: 'post',
          data: 'id_provinsi='+id_provinsi,
          success: function (data_distrik) {
            $("select[name=distrik]").html(data_distrik); 
          }
        });

   });

    // Mendapatkan Daftar Ekspedisi
    $.ajax({
      url: '../data_ekspedisi.php',
      type: 'post',
      success: function (data_ekspedisi) {
        $("select[name=ekspedisi]").html(data_ekspedisi); 
      }
    });
  
    // Menangani Perubahan Pilihan pada Ekspedisi
    $("select[name=ekspedisi]").on("change", function() {
      // Mendapatkan Ekspedisi yang Dipilih
      var ekspedisi_terpilih = $(this).val();
  
      // Mendapatkan Id Distrik
      var distrik_terpilih = $("option:selected", "select[name=distrik]").attr("id_distrik");
      
      // Mendapatkan Modal Input Berat
      var total_berat = $("input[name=total_berat]").val();
  
      // Mengirim Data ke data_paket.php menggunakan AJAX
      $.ajax({
        url: '../data_paket.php',
        type: 'post',
        data: { ekspedisi: ekspedisi_terpilih, distrik: distrik_terpilih, berat: total_berat },
        success: function (hasil_paket) {
          $("select[name=pengiriman]").html(hasil_paket); 

          $("input[name=nama_ekspedisi]").val(ekspedisi_terpilih);

          console.log(hasil_paket);
        }
      });  
    });

    $("select[name=distrik]").on("change", function() {
      var prov = $("option:selected", this).attr("nama_provinsi");
      var dist = $("option:selected", this).attr("nama_distrik");
      var tipe = $("option:selected", this).attr("tipe_distrik");
      var kodepos = $("option:selected", this).attr("kode_pos");
      
      $("input[name=nama_provinsi]").val(prov);
      $("input[name=nama_distrik]").val(dist);
      $("input[name=tipe_distrik]").val(tipe);
      $("input[name=kode_pos]").val(kodepos);


    })

    $("select[name=pengiriman]").on("change", function() {
      var paket = $("option:selected", this).attr("paket");
      var ongkir = $("option:selected", this).attr("ongkir");
      var etd = $("option:selected", this).attr("etd");
      $("input[name=paket]").val(paket);
      $("input[name=ongkir]").val(ongkir);
      $("input[name=estimasi]").val(etd);

    })
        
});