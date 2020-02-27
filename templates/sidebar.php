<div class="panel panel-default sidebar-menu">

  <div class="panel-kategori">
    <div class="panel-heading">
      <h3 class="panel-title">Kategori</h3>
    </div>

    <div class="panel-body">
      <ul class="nav nav-pills nav-stacked category-menu">
      <?php
        $daftarkategori = daftarKategori("category");
        $limit = 0;
        while ($row = mysqli_fetch_row($daftarkategori)) {
          if ($limit < 5) {
            echo '
            <li><a href="shop-category.php?id='.$row[1].'&offset=0">'.$row[1].'</a></li>
            ';
            $limit++;
          }
        }
      ?>
      </ul>
    </div>
  </div>

</div>

<div class="panel panel-default sidebar-menu">
  <div class="panel-harga">
    <div class="panel-heading">
      <h3 class="panel-title">Filter Harga</h3>
    </div>

    <div class="panel-body">
      <ul class="nav nav-pills nav-stacked category-menu">
        <li>
          <p>Minimum</p>
          <input type="text" class="form-control" placeholder="Harga terendah" name="q">
        </li>
        <li>
          <p>Maximum</p>
          <input type="text" class="form-control" placeholder="Harga tertinggi" name="q"><br>
        </li>
        <li>
          <button type="button" class="btn btn-info" ><i class="fa fa-search"></i> &nbsp;Cari</button>
        </li>
      </ul>
    </div>
  </div>
</div>

<div class="panel panel-default sidebar-menu">

  <div class="panel-kategori">
    <div class="panel-heading">
      <h3 class="panel-title">Urutkan</h3>
    </div>

    <div class="panel-body">
      <ul class="nav nav-pills nav-stacked category-menu">
        <li><a href="#">Terbaru</a></li>
        <li><a href="#">Terpopuler</a></li>
        <li><a href="#">Harga Terendah</a></li>
        <li><a href="#">Harga Tertinggi</a></li>
        <li><a href="#">A-Z Judul</a></li>
        <li><a href="#">Z-A Judul</a></li>
        <li><a href="#">A-Z Penulis</a></li>
        <li><a href="#">Z-A Penulis</a></li>
      </ul>
    </div>
  </div>

</div>
