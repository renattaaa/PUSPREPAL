<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<!-- Coding by CodingNepal | www.codingnepalweb.com -->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title> Admin Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <link rel="stylesheet" href="css/admin.css">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <!-- NAVBAR -->
  <div class="sidebar">
    <div class="logo-details">
      <i class=''></i>
      <span class="logo_name">PUSPREPAL</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="#" class="active">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Dashboard</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-list-ul'></i>
          <span class="links_name">Kategori</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-trophy'></i>
          <span class="links_name">Prestasi</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-cog'></i>
          <span class="links_name">Setting</span>
        </a>
      </li>
      <li class="log_out">
        <a href="index.php">
          <i class='bx bx-log-out'></i>
          <span class="links_name">Log out</span>
        </a>
      </li>
    </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>
      <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search'></i>
      </div>
    </nav>
    <!-- end NAVBAR -->
    <center>
      <div class="home-content">
        <div class="link-create">
          <h1>DASHBOARD ADMIN</h1>
          <a href="create.php" style="color: black; text-decoration: none; font-size: 20px;">+ Tambah</a>
        </div>

        <div class="card-header" style="margin-top: 16px;border: 1px solid #bfbfbf;">
          <div class="list-admin">
            <table class="table-card">
              <thead class="thead-dashboard">
                <tr>
                  <th scope="col" style="padding: 10px 10px;">No</th>
                  <th scope="col" style="padding: 10px 10px;">Kategori</th>
                  <th scope="col" style="padding: 10px 10px;">Foto Prestasi</th>
                  <th scope="col" style="padding: 10px 10px;">Caption</th>
                  <th scope="col" style="padding: 10px 10px;">Tanggal</th>
                  <th scope="col" style="padding: 10px 10px;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql2   = "select * from prestasi order by id_prestasi desc";
                $q2     = mysqli_query($koneksi, $sql2);
                $urut   = 1;
                while ($r2 = mysqli_fetch_array($q2)) {
                  $id_prestasi         = $r2['id_prestasi'];
                  $kategori        = $r2['kategori'];
                  $foto_prestasi       = $r2['foto_prestasi'];
                  $caption      = $r2['caption'];
                  $tanggal              = $r2['tanggal'];

                ?>
                  <tr>
                    <th scope="row"><?php echo $urut++ ?></th>
                    <td scope="row"><?php echo $kategori ?></td>
                    <td scope="row"><?php echo $foto_prestasi ?></td>
                    <td scope="row"><?php echo $caption ?></td>
                    <td scope="row"><?php echo $tanggal ?></td>
                    <td scope="row">
                      <a href="create.php?op=edit&id_prestasi=<?php echo $id_prestasi ?>"><button type="button" class="button-dashboard1">Edit</button></a>
                      <a href="create.php?op=delete&id_prestasi=<?php echo $id_prestasi ?>" onclick="return confirm('yakin mau dihapus?')"><button type="button" class="button-dashboard2">Delete</button></a>
                    </td>
                  </tr>
                <?php
                }
                ?>
              </tbody>

            </table>
          </div>
        </div>
    </center>
  </section>


  <script>
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function() {
      sidebar.classList.toggle("active");
      if (sidebar.classList.contains("active")) {
        sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
      } else
        sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }
  </script>

</body>

</html>