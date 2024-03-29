<?php
    $a1 = ['nama'=>'Udin', 'nim' => '1111', "nilai"=>90];
    $a2 = ['nama'=>'Adit', 'nim' => '2222', "nilai"=>80];
    $a3 = ['nama'=>'Anggun', 'nim' => '3333', "nilai"=>70];
    $a4 = ['nama'=>'Siti', 'nim' => '4444', "nilai"=>60];
    $a5 = ['nama'=>'Alex', 'nim' => '5555', "nilai"=>50];

    $a6 = ['nama'=>'Justin', 'nim' => '6666', "nilai"=>20];
    $a7 = ['nama'=>'Rizky', 'nim' => '7777', "nilai"=>85];
    $a8 = ['nama'=>'Jamal', 'nim' => '8888', "nilai"=>75];
    $a9 = ['nama'=>'Irwan', 'nim' => '9999', "nilai"=>65];
    $a10 = ['nama'=>'Agus', 'nim' => '1010', "nilai"=>55];

    $ar_mahasiswa = [$a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10];

    //deklarasi nama nama judul pada tabel header menggunakan looping array
    $ar_judul = ['No', 'Nama', 'NIM', 'Nilai', 'Keterangan', 'Grade', 'Predikat'];

    //fungsi agregat di array
    $jumlah_nilai = array_column($ar_mahasiswa, 'nilai');
    $nilai_total = array_sum($jumlah_nilai);
    $nilai_tertinggi = max($jumlah_nilai);
    $nilai_terendah = min($jumlah_nilai);
    $jumlah_mahasiswa = count($ar_mahasiswa);
    $nilai_rata2 = $nilai_total/$jumlah_mahasiswa;

    $keterangan = [
        'Nilai Tertinggi' => $nilai_tertinggi,
        'Nilai Terendah' => $nilai_terendah,
        'Nilai Rata-rata' => $nilai_rata2,
        'Jumlah Mahasiswa' => $jumlah_mahasiswa,
        'Jumlah Keseluruhan Nilai' => $nilai_total
    ];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Daftar Nilai Mahasiswa</title>
</head>
<style>
    .text-center{
        text-align: center;
    }
    .bgcolor{
        background-color: grey;
    }
</style>
<body>
    <h3 align="center">Daftar Nilai Mahasiswa</h3>
    <table border="1" cellpadding="10" cellspacing="2" width="100%">
        <thead class="bgcolor">
            <tr>
            <?php foreach($ar_judul as $judul){ ?>
                <th><?= $judul ?></th>
            <?php } ?>
            </tr>
        </thead>
        
        <tbody>
            <?php
            $no=1;
            foreach ($ar_mahasiswa as $mahasiswa){
                //lulus/tidak
                $nilai = $mahasiswa['nilai'];
                $status_nilai = ($nilai > 65 ? "Lulus" : "Tidak Lulus");
                
                //grading
                if ($nilai <= 100 && $nilai >= 80) {
                    $grade = 'A';
                } elseif ($nilai <= 79 && $nilai >=65 ) {
                    $grade = 'B';
                } elseif ($nilai <= 64 && $nilai >= 55) {
                    $grade = 'C';
                } elseif ($nilai <= 54 && $nilai >= 50) {
                    $grade = 'D';
                } elseif ($nilai <= 49 && $nilai > 0) {
                    $grade = 'E';
                } else{
                    $grade = "nilai anda melebihi batas";
                }
                
                switch ($grade) {
                    case "A";
                        $predikat = "Memuaskan";
                    break;
                    case "B";
                        $predikat = "Bagus";
                    break;
                    case "C";
                        $predikat = "Cukup";
                    break;
                    case "D";
                    $predikat = "Kurang";
                    break;
                    case "E";
                    $predikat = "Buruk";
                    break;

                    default:
                    $predikat = null;
                }
            ?>

            <tr class="text-center">
                <td><?= $no++ ?></td>
                <td><?= $mahasiswa['nama'] ?></td>
                <td><?= $mahasiswa['nim'] ?></td>
                <td><?= $mahasiswa['nilai'] ?></td>
                <td><?= $status_nilai ?></td>
                <td><?= $grade ?></td>
                <td><?= $predikat ?></td>
            </tr>
            <?php } ?>
        </tbody>
        <tfoot class="bgcolor">
            <?php    
                foreach($keterangan as $ket => $hasil){
            ?>        
                <tr>
                    <th colspan="3"><?= $ket ?></th>
                    <th colspan="5"><?= $hasil ?></th>
                </tr>

            <?php } ?>
        </tfoot>
    </table>
</body>
</html>

