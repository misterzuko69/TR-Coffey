<?php include 'connect.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Barang</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/admin.css" rel="stylesheet">
    <link rel="stylesheet" href="../fontawesome/css/font-awesome.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script>
        <?php
        if(isset($_GET['id'])){
            ?>
            document.getElementById("nama").value = <?php echo $_SESSION['data-admin'][$_GET['id']]['nama_barang'];?>
            document.getElementById("harga").value = <?php echo $_SESSION['data-admin'][$_GET['id']]['harga_barang'];?>
            document.getElementById("stok").value = <?php echo $_SESSION['data-admin'][$_GET['id']]['stok_barang'];?>
            document.getElementById("gambar").value = <?php echo $_SESSION['data-admin'][$_GET['id']]['link_gambar'];?>
            <?php
        }
        ?>
    </script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-transparent sticky-top">
        <div class="container-fluid w-75 mt-3">
            <a class="navbar-brand fw-bold Brand row" href="admins.php">
                <i class="fa fa-coffee fa-2x col-3" aria-hidden="true"></i>
                <p class="col-9 pt-2"><span>kopi</span>inaja</p>
            </a>
            <div class="collapse navbar-collapse ms-5 ps-3 ham-nav" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a aria-current="page" href="admins.php">Home</a>
                    </li>
                </ul>
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a aria-current="page" href="riwayatadmin.php">Riwayat</a>
                    </li>
                </ul>
            </div>
            <a href="logout.php">
                <button class="btn btn-danger">Keluar</button>
            </a>
        </div>
    </nav>
    <div class="container mt-4">
        <form method="POST" action="process.php" enctype="multipart/form-data">
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama Barang</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_barang" id="nama" value="<?php if(isset($_GET['id'])){$spacePos = strpos($_SESSION['data-admin'][$_GET['id']]['nama_barang']," "); echo substr($_SESSION['data-admin'][$_GET['id']]['nama_barang'],$spacePos+1);}?>" placeholder="Contoh: ABC" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="kelas" class="col-sm-2 col-form-label">Harga Barang</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="harga_barang" id="harga" value="<?php if(isset($_GET['id'])) echo $_SESSION['data-admin'][$_GET['id']]['harga_barang'];?>" placeholder="Contoh: 12000" min="0" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="stok" class="col-sm-2 col-form-label">Stok Barang</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="stok_barang" id="stok" value="<?php if(isset($_GET['id'])) echo $_SESSION['data-admin'][$_GET['id']]['stok_barang'];?>" placeholder="Contoh: 18" min="0" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jenis" class="col-sm-2 col-form-label">Jenis Barang</label>
                <div class="col-sm-10">
                    <select class="form-control" name="jenis_barang" id="jenis" required>
                    <?php if(isset($_GET['id'])){if(substr($_SESSION['data-admin'][$_GET['id']]['nama_barang'],0,$spacePos)=="Cup"){
                            ?>
                        <option value="Cup" selected readonly>Cup</option>     
                    <?php
                    } elseif(substr($_SESSION['data-admin'][$_GET['id']]['nama_barang'],0,$spacePos)=="Topping") {
                        ?>
                        <option value="Topping">Topping</option>
                        <?php }
                        elseif(substr($_SESSION['data-admin'][$_GET['id']]['nama_barang'],0,$spacePos)=="Kopi"){
                        ?>
                        <option value="Kopi">Kopi</option>
                        <?php }} else {?>
                            <option value="Topping">Topping</option>
                            <option value="Kopi">Kopi</option>
                        <?php
                        }
                                ?>
                    </select>
                </div>
            </div>
            <?php if(isset($_GET['id'])){ if(substr($_SESSION['data-admin'][$_GET['id']]['nama_barang'],0,$spacePos)=="Kopi"){
            ?>
            <div class="mb-3 row" id="gambar-container">
                <label for="gambar" class="col-sm-2 col-form-label">Upload Gambar</label>
                <div class="col-sm-10">
                    <div class="custom-file-input">
                        <input type="file" class="form-control gambar" name="link_gambar" id="gambar" required>
                        <input type="text" class="form-control gambar-link" name="link_gambar_text" id="gambar-link" value="<?php if (isset($_GET['id'])) echo $_SESSION['data-admin'][$_GET['id']]['link_gambar']; ?>" readonly>
                    </div>
                </div>
            </div>
            <?php }} else {?>
            <div class="mb-3 row" id="gambar-container">
                <label for="gambar" class="col-sm-2 col-form-label">Upload Gambar</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" name="link_gambar" id="gambar" required>
            </div>
            </div>
            <?php }?>
            <div class="mb-3 row">
                <div class="col mt-4 text-center">
                    <?php if(!isset($_GET['id'])){?>
                    <button type="submit" name="aksi" value="add" class="btn btn-primary">
                        <i class="fa fa-floppy-o" aria-hidden="true"></i>
                        Tambahkan
                    </button>
                    <?php } else {?>
                    <button type="submit" name="edit" value="<?php echo $_GET['id'];?>" class="btn btn-primary">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                        Edit
                    </button>
                    <?php }?>
                    <a href="admins.php" type="button" class="btn btn-danger">
                        <i class="fa fa-reply" aria-hidden="true"></i>
                        Batal
                    </a>
                </div>
            </div>
        </form>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const jenisSelect = document.getElementById('jenis');
            const gambarContainer = document.getElementById('gambar-container');

            const updateGambarInput = () => {
                if (jenisSelect.value === 'Kopi') {
                    gambarContainer.style.display = 'flex';
                } else {
                    gambarContainer.style.display = 'none';
                }
            };
            updateGambarInput();
            jenisSelect.addEventListener('change', updateGambarInput);
        });
    </script>
</body>
</html>