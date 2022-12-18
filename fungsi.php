<?php
    include 'koneksi.php';

    function tambah_data($data){
        $nama_pts = $data['nama_pts'];
        $skema = $data['skema'];
        $jenis_laporan = $data['jenis_laporan'];
        $judul_buku = $data['judul_buku'];
        $nama_peneliti = $data['nama_peneliti'];
        $tahun = $data['tahun'];
        $jumlah = $data['jumlah'];
        $no_boks = $data['no_boks'];
        $rak = $data['rak'];
        
        $query = "INSERT INTO lppm VALUES(null,'$nama_pts', '$skema', '$jenis_laporan', '$judul_buku', '$nama_peneliti', '$tahun', '$jumlah', '$no_boks', '$rak')";
        $sql = mysqli_query($GLOBALS['conn'], $query);

        return true;
    }


    function ubah_data($data){

        $no = $data['no'];
        $nama_pts = $data['nama_pts'];
        $skema = $data['skema'];
        $jenis_laporan = $data['jenis_laporan'];
        $judul_buku = $data['judul_buku'];
        $nama_peneliti = $data['nama_peneliti'];
        $tahun = $data['tahun'];
        $jumlah = $data['jumlah'];
        $no_boks = $data['no_boks'];
        $rak = $data['rak'];

        $query = "UPDATE lppm SET nama_pts='$nama_pts', skema='$skema', jenis_laporan='$jenis_laporan', judul_buku='$judul_buku', nama_peneliti='$nama_peneliti', 
        tahun='$tahun', jumlah='$jumlah', no_boks='$no_boks', rak='$rak' WHERE no='$no';";

        $sql=mysqli_query($GLOBALS['conn'], $query);

            return true;

    }


    function hapus_data($data){

        $no = $data['hapus'];
        $query = "DELETE FROM lppm WHERE no = '$no';";
        $sql = mysqli_query($GLOBALS['conn'], $query);

            return true;
    }

?>