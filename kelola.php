<!DOCTYPE html>

<?php
    include 'koneksi.php';
    session_start();

    $nama_pts = '';
    $skema = '';
    $jenis_laporan = '';
    $judul_buku = '';
    $nama_peneliti = '';
    $tahun ='';
    $jumlah ='';
    $no_boks = '';
    $rak = '';

    if(isset($_GET['ubah'])){
        $no = $_GET['ubah'];
        
        $query = "SELECT * FROM lppm WHERE no = '$no';"; 
        $sql = mysqli_query($conn, $query);

        $result = mysqli_fetch_assoc($sql);

        $nama_pts = $result['nama_pts'];
        $skema = $result['skema'];
        $jenis_laporan = $result['jenis_laporan'];
        $judul_buku = $result['judul_buku'];
        $nama_peneliti = $result['nama_peneliti'];
        $tahun = $result['tahun'];
        $jumlah = $result['jumlah'];
        $no_boks = $result['no_boks'];
        $rak = $result['rak'];

        //var_dump($result);

        //die();
    }
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!--Fontawesome-->
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
    <title>sistem temu balik</title>
</head>

<body>
    <nav class="navbar navbar-light bg-light mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                SITEBU
            </a>
        </div>
    </nav>
    <div class="container">
        <form method="POST" action="proses.php">
            <input type="hidden" value="<?php echo $no;?>" name="no">
            <div class="mb-3 row">
                <label for="nama pts" class="col-sm-2 col-form-label">Nama PTS</label>
                <div class="col-sm-10">
                    <input type="text" name="nama_pts" class="form-control" id="nama pts"
                        value="<?php echo $nama_pts;?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="skema" class="col-sm-2 col-form-label">Skema</label>
                <div class="col-sm-10">
                    <input type="text" name="skema" class="form-control" id="skema" value="<?php echo $skema;?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jenis laporan" class="col-sm-2 col-form-label">Jenis Laporan</label>
                <div class="col-sm-10">
                    <input type="text" name="jenis_laporan" class="form-control" id="jenis laporan"
                        value="<?php echo $jenis_laporan;?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="judul buku" class="col-sm-2 col-form-label">Judul Buku</label>
                <div class="col-sm-10">
                    <textarea input <?php if(!isset($_GET['ubah'])){echo"required ";}?> class="form-control"
                        id="judul buku" value="<?php echo $judul_buku;?>" name="judul_buku" rows="3"></textarea>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama peneliti" class="col-sm-2 col-form-label">Nama Peneliti</label>
                <div class="col-sm-10">
                    <input type="text" name="nama_peneliti" class="form-control" id="nama peneliti"
                        value="<?php echo $nama_peneliti;?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
                <div class="col-sm-10">
                    <input type="text" name="tahun" class="form-control" id="tahun" value="<?php echo $tahun;?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                <div class="col-sm-10">
                    <select id="jumlah" name="jumlah" class="form-select">
                        <option selected>Jumlah</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="no boks" class="col-sm-2 col-form-label">No Boks</label>
                <div class="col-sm-10">
                    <select id="no_boks" name="no_boks" class="form-select">
                        <option selected>No Boks</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="rak" class="col-sm-2 col-form-label">Rak</label>
                <div class="col-sm-10">
                    <input type="text" name="rak" class="form-control" id="rak" value="<?php echo $rak;?>">
                </div>
            </div>
            <div class="mb-3 row mt-5">
                <div class="col">
                    <?php
                        if(isset($_GET['ubah'])){
                    ?>
                    <button type="submit" name="aksi" value="edit" class="btn btn-primary">
                        <i class="fa fa-floppy-o" aria-hidden="true"></i>
                        Simpan Perubahan
                    </button>
                    <?php 
                    } else {
                    ?>
                    <button type="submit" name="aksi" value="add" class="btn btn-primary">
                        <i class="fa fa-floppy-o" aria-hidden="true"></i>
                        Tambahkan
                    </button>
                    <?php
                    }
                    ?>
                    <a href="index.php" type="button" class="btn btn-danger">
                        <i class="fa fa-reply" aria-hidden="true"></i>
                        Batal</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>