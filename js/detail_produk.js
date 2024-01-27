// Untuk Gambar

let bigImg = document.querySelector('.big-img img');
function showImg(pic) {
    bigImg.src = pic;
}

// Button Size Pilih
function pilihUkuran(element) {
    // Hapus kelas 'active' dari semua elemen dengan kelas 'pukuran'
    var pukuranElements = document.querySelectorAll('.pukuran');
    pukuranElements.forEach(function (el) {
        el.classList.remove('active');
    });

    // Tambahkan kelas 'active' pada elemen yang dipilih
    element.classList.add('active');
}