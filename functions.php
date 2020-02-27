<?php

$host = 'localhost';
$user = 'root';
$password = '';
$database = 'book';

$db = mysqli_connect($host, $user, $password, $database);

function getEbooks(){
  global $db;
  // $get_ebooks = 'select * from ebook order by time DESC LIMIT 6';
  $get_ebooks = 'select ebook.*, penulis.nama_penulis from ebook INNER JOIN penulis ON ebook.penulis_id=penulis.penulis_id order by time DESC LIMIT 6';

  $run_ebooks = mysqli_query($db, $get_ebooks);

  while($row_ebooks = mysqli_fetch_array($run_ebooks)){
    $ebook_id = $row_ebooks['ebook_id'];
    $penulis_id = $row_ebooks['penulis_id'];
    $nama_penulis = $row_ebooks['nama_penulis'];
    $judul_ebook = $row_ebooks['judul_ebook'];
    $tampilkan_judul = $judul_ebook;
    // begin fungsi untuk membuat etxt menjadi ... apabila terlalu panjang
    if( strlen( $judul_ebook) > 25) {
        $tampilkan_judul = explode( "\n", wordwrap( $judul_ebook, 25));
        $tampilkan_judul = $tampilkan_judul[0] . '...';
    }
    // end fungsi untuk membuat etxt menjadi ... apabila terlalu panjang
    $harga = $row_ebooks['harga'];
    $cover_ebook = $row_ebooks['cover_ebook'];
    $ebook_docs = $row_ebooks['ebook_docs'];
    $deskripsi_ebook = $row_ebooks['deskripsi_ebook'];
    $isbn = $row_ebooks['isbn'];
    $sku = $row_ebooks['sku'];



    echo "

    <div class='item'>
      <div class='card box-shadow'>
        <img class='card-img-top img-fluid' src=$cover_ebook alt='card-img'>
        <div class='card-body'>
          <a href='details.php?ebook_id=$ebook_id'><h3 class='card-title ebook-title'><strong>$tampilkan_judul</strong></h3></a>
          <p class='card-text ebook-author'>$nama_penulis</p>
          <h4 class='card-title ebook-price'><strong>Rp. $harga</strong></h4>
          <a class='btn btn-lg btn-danger btn-beli text-capitalize'><i class='fa fa-shopping-cart'> </i>&nbsp; Beli</a>
        </div>
      </div>
    </div>

    ";
  }
}



function getCategoriesNonfiction(){
  global $db;
  $get_categories_nonfiction = 'select * from kategori WHERE jenis_kategori = "non-fiksi"';

  $run_categories_nonfiction = mysqli_query($db,$get_categories_nonfiction);

  while($row_categories = mysqli_fetch_array($run_categories_nonfiction)){
    $kategori_id = $row_categories['kategori_id'];
    $nama_kategori = $row_categories['nama_kategori'];


    echo "

    <li><a href='#'>$nama_kategori</a></li>

    ";
  }
}

function getCategoriesFiction(){
  global $db;
  $get_categories_fiction = 'select * from kategori WHERE jenis_kategori = "fiksi"';

  $run_categories_fiction = mysqli_query($db,$get_categories_fiction);

  while($row_categories = mysqli_fetch_array($run_categories_fiction)){
    $kategori_id = $row_categories['kategori_id'];
    $nama_kategori = $row_categories['nama_kategori'];


    echo "

    <li><a href='#'>$nama_kategori</a></li>

    ";
  }
}

function getSubCategories(){
  global $db;
  $get_sub_categories = 'select subkategori.subkategori_id, subkategori.kategori_id, subkategori.nama_subkategori, kategori.nama_kategori from subkategori
                          INNER JOIN kategori ON subkategori.kategori_id=kategori.kategori_id';

  $run_sub_categories = mysqli_query($db,$get_sub_categories);

  while($row = mysqli_fetch_array($run_sub_categories)){
    $subkategori_id = $row['subkategori_id'];
    $nama_kategori = $row['nama_kategori'];
    $nama_subkategori = $row['nama_subkategori'];


    echo "

    <li><a href=''>$nama_subkategori</a></li>

    ";
  }
}

?>
