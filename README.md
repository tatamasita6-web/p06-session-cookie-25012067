# Praktikum Pemrograman Web I - Pertemuan 6

## Judul
Penerapan Session, Cookie, dan Flash Message pada Aplikasi Keranjang Belanja.

## Deskripsi
Aplikasi toko sederhana berbasis PHP yang menampilkan katalog produk dan menyediakan fitur keranjang belanja.

Aplikasi ini menggunakan:
- Session untuk menyimpan data keranjang belanja.
- Flash Message untuk menampilkan pesan sementara.
- Cookie untuk menyimpan pilihan tema terang atau gelap selama 30 hari.

## Daftar Produk
1. Kopi Susu - Rp15.000
2. Roti Cokelat - Rp12.000
3. Teh Lemon - Rp10.000

## Teknologi
- PHP 8
- HTML
- CSS

## Cara Menjalankan
1. Simpan folder proyek di dalam `C:\xampp\htdocs\web1`.
2. Jalankan Apache melalui XAMPP.
3. Buka browser.
4. Akses alamat berikut:

   `http://localhost/web1/pertemuan-06/`

## Fitur
- Menampilkan katalog produk.
- Menambahkan produk ke keranjang.
- Menghapus produk dari keranjang.
- Mengosongkan keranjang.
- Menghitung total belanja.
- Mengubah tema terang dan gelap.

## Identitas
Nama: Masita Khairunnissa
NIM: 25012067
Kelas: 25M31
## Fitur Tema

Aplikasi menyediakan pilihan tema terang dan gelap.
Pilihan tema disimpan menggunakan cookie selama 30 hari,
sehingga tema tetap digunakan ketika halaman dibuka kembali.

## Pengujian Tema

1. Buka halaman katalog.
2. Ubah tema menggunakan tombol tema.
3. Muat ulang halaman.
4. Pastikan tema yang dipilih tetap digunakan.