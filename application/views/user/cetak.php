<?php
	$url = base_url();
	$content = '
        <style type="text/css">
            .container{padding: 40 20 40 20;}
            .tabel{border-collapse: collapse;margin-left: 25px;}
            .tabel th{padding: 8px 5px;}
            .tabel td{padding-left: 5px;}
            .garis{margin-top: 25px;}
            .judul{text-align:center; margin-top: 15px; font-weight: 300;}
        </style>
    ';
    foreach($data_siswa_kursus as $value):
    $tgl_lahir = date('d F Y', strtotime($value->tanggal_lahir));
    $tgl_daftar = date('d F Y', strtotime($value->tanggal_daftar));
    $nama_siswa = $value->nama; 
    $content .= '
        <page>
            <div class="container">
                <img src="'.$url.'/asset/img/a2k4.png"; style="width: 15%;margin-left: 300px;"/>
                <h4 style="text-align: center;margin-bottom: 0;">DEWAN PENGURUS WILAYAH ASOSIASI AHLI KESELAMATAN DAN KESEHATAN KERJA</h4>
                <h4 style="text-align: center;margin-bottom: 0;margin-top: 0;">KONSTRUKSI - INDONESIA (A2K4-INDONESIA) WILAYAH PROVINSI</h4>
                <h4 style="text-align: center;margin-bottom: 0;margin-top: 0;">SUMATERA SELATAN</h4>
                <P style="text-align: center;margin-top: 6px; font-size: 11px;margin-bottom: 0">Jalan macan lindungan No. 70 A RT. 01 RW 05 Kel. Bukit Baru Kec. Ilir Barat 1 Palembang Telp : 07115640125, CP: 085273467419 Email: a2k4isumsel@yahoo.co.id Website :  </P>

                <hr class="garis" style="color: #000;margin-top: 5px">
                <h4 style="text-align: center;margin-bottom: 0; font-weight: 100">FORMULIR PENDAFTARAN</h4>
                <h5 style="text-align: center;font-weight: 100">PELATIHAN KURSUS A2K4 - INDONESIA PROVINSI SUMATERA SELATAN</h5>
                <p>Nama Kursus : <strong>'.$value->jenis_kursus.'</strong> </p>
                <p>Nama Lengkap : '.$value->nama.' </p>
                <p>Tempat / Tanggal Lahir : '.$value->tempat_lahir.', '.$tgl_lahir.' </p>
                <p>Jenis Kelamin : '.$value->jenis_kelamin.' </p>
                <p>Alamat : '.$value->alamat.' </p>
                <p>Nomor Hp : '.$value->nmr_hp.' </p>
                <p>Email : '.$value->email.' </p><br><br><br>
                <p>Palembang, '.$tgl_daftar.'</p>
                <img src="'.$url.'/asset/admin/images/siswa_kursus/'.$value->foto.'"; style="width: 20%;"/>
				<p>('.$value->nama.')</p>
            </div>
        </page>
   	';
   endforeach;

    require_once("./asset/plugins/html2pdf/html2pdf.class.php");
    $html2pdf = new HTML2PDF('p','A4','en');
    $html2pdf->writeHTML($content);
    $html2pdf->output('Siswa-kursus-'.$nama_siswa.'.pdf');
?>