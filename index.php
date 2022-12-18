<?php
    include 'koneksi.php';

    session_start();

    $query = "SELECT * FROM lppm";
    $sql = mysqli_query($conn, $query);
    $nomor = 0;
?>

<!DOCTYPE html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!--Fontawesome-->
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
    <title>sistem temu balik</title>
    <!--Datatables-->
    <link rel="stylesheet" type="text/css" href="datatables/datatables.css">
    <script type="text/javascript" src="datatables/datatables.js"></script>
</head>

<script type="text/javascript">
$(document).ready(function() {
    $('#dt').DataTable();
});
</script>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                SITEBU
            </a>
            <a href="logout.php" type="button" class="btn btn-warning mb-3">
                <i class="fa fa-sign-out" aria-hidden="true"></i>
            </a>
        </div>
    </nav>
    <!-- Judul -->
    <div class="container">
        <h1 class="mt-4">DATA ARSIP LPPM</h1>
        <figure>
            <blockquote class="blockquote">
                <p>Berisi data laporan penelitian dan pengabdian masyarakat dari dosen perguruan tinggi swasta.</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                Dikelola Oleh Unit Kearsipan Lembaga Layanan Pendidikan Tinggi Wilayah VI Jawa Tengah<cite
                    title="Source Title"></cite>
            </figcaption>
        </figure>
        <a href="kelola.php" type="button" class="btn btn-primary mb-3">
            <i class="fa fa-plus"></i>
            Tambah Data</a>
        <!-- endjudul -->
        <?php
                if (isset($_SESSION['eksekusi'])):
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['eksekusi'];?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
            session_destroy();
            endif;
        ?>


        <div class="table-responsive">
            <table id="dt" class="table align-middle table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>
                            <center>Nama PTS</center>
                        </th>
                        <th>
                            <center>Skema</center>
                        </th>
                        <th>
                            <center>Jenis Laporan</center>
                        </th>
                        <th>
                            <center>Judul Buku</center>
                        </th>
                        <th>Nama Peneliti</th>
                        <th>Tahun</th>
                        <th>Jumlah</th>
                        <th>
                            <center>No Boks</center>
                        </th>
                        <th>Rak</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                            while($result = mysqli_fetch_assoc($sql)){
                    ?>
                    <tr>
                        <td>
                            <center>
                                <?php echo ++$nomor;?>
                            </center>
                        </td>
                        <td>
                            <center>
                                <?php echo $result['nama_pts'];?>
                            </center>
                        </td>
                        <td>
                            <center>
                                <?php echo $result['skema'];?>
                            </center>
                        </td>
                        <td>
                            <center>
                                <?php echo $result['jenis_laporan'];?>
                            </center>
                        </td>
                        <td>
                            <?php echo $result['judul_buku'];?>
                        </td>
                        <td>
                            <?php echo $result['nama_peneliti'];?>
                        </td>
                        <td>
                            <?php echo $result['tahun'];?>
                        </td>
                        <td>
                            <?php echo $result['jumlah'];?>
                        </td>
                        <td>
                            <?php echo $result['no_boks'];?>
                        </td>
                        <td>
                            <?php echo $result['rak'];?>
                        </td>
                        <td>
                            <a href="kelola.php?ubah= <?php echo $result['no'];?>" type="button"
                                class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
                            <br> <br>
                            <a href="proses.php?hapus= <?php echo $result['no'];?>" type="button"
                                class="btn btn-danger btn-sm" onClick="return confirm('Apakah anda yakin???')"><i
                                    class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php
                            }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>