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
    foreach($data_siswa_pel as $value):
    $tgl_lahir = date('d F Y', strtotime($value->tanggal_lahir));
    $tgl_daftar = date('d F Y', strtotime($value->tgl_daftar));
    $nama_siswa = $value->nama_siswa;
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
                <p>Nama Pelatihan : <strong>'.$value->jenis_pelatihan.'</strong> </p>
                <p>Nama Lengkap : '.$value->nama_siswa.' </p>
                <p>Nama Perusahaan : '.$value->nama_perusahaan.' </p>
                <p>Alamat Perusahaan : '.$value->alamat_perusahaan.' </p>
                <p>Nomor Telepon Perusahaan : '.$value->telp_perusahaan.' </p>
                <p>Email Perusahaan : '.$value->email_perusahaan.' </p>
                <p>Alamat : '.$value->alamat_pribadi.' </p>
                <p>Email : '.$value->email_pribadi.' </p>
                <p>Nomor Hp : '.$value->telp_pribadi.' </p>
                <p>Tempat / Tanggal Lahir : '.$value->tempat_lahir.', '.$tgl_lahir.' </p>
                <p>Agama : '.$value->agama.' </p>
                <p>Alergi : '.$value->alergi.' </p>
                <p><strong>Riwayat Pendidikan *</strong></p>
                <p>Nama SMA : '.$value->nama_sma.' </p>
                <p>Nama Universitas (D3) : '.$value->nama_d3.' </p>
                <p>Nama Universitas (S1) : '.$value->nama_s1.' </p>
                <p>Nama Universitas (S2) : '.$value->nama_s2.' </p><br>
                <p style="color:#fff"><strong>Riwayat Pekerjaan *</strong></p>
                <p><strong>Riwayat Pekerjaan *</strong></p>
                <p>Tahun Masuk : '.$value->tahun_masuk.'</p>
                <p>Tahun Keluar : '.$value->tahun_keluar.' </p>
                <p>lama kerja (Tahun) : '.$value->lama_kerja.' </p>
                <p>Jabatan : '.$value->jabatan.' </p>
                <p>Divisi : '.$value->divisi.' </p><br><br><br>
                <p>Palembang, '.$tgl_daftar.'</p>
                <img src="'.$url.'/asset/admin/images/siswa_pelatihan/'.$value->foto.'"; style="width: 20%;"/>
				<p>('.$value->nama_siswa.')</p>
            </div>
        </page>
   	';
    endforeach;

    require_once("./asset/plugins/html2pdf/html2pdf.class.php");
    $html2pdf = new HTML2PDF('p','A4','en');
    $html2pdf->writeHTML($content);
    $html2pdf->output('siswa-pelatihan-'.$nama_siswa.'.pdf');
?>