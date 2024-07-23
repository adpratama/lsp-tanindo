<?php
echo '<table>
  <tbody>';
$no = 1;

include APPPATH . 'third_party/PHPExcel-8/PHPExcel.php';

$excel = new PHPExcel();

// Settingan awal fil excel
$excel->getProperties()->setCreator('My Notes Code')
  ->setLastModifiedBy('Bangun Desa LogistIndo')
  ->setTitle("Data Member KTNA");
// ->setSubject("Cuti")
// ->setDescription("Laporan Data Cuti Karyawan")
// ->setKeywords("Daftar Cuti Karyawan");

// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
$style_col = array(
  'font' => array('bold' => true), // Set font nya jadi bold
  'alignment' => array(
    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
  ),
  'borders' => array(
    'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
    'right' => array('style' => PHPExcel_Style_Border::BORDER_THIN), // Set border right dengan garis tipis
    'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
    'left' => array('style' => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
  )
);

// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
$style_row = array(
  'alignment' => array(
    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
  ),
  'borders' => array(
    'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
    'right' => array('style' => PHPExcel_Style_Border::BORDER_THIN), // Set border right dengan garis tipis
    'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
    'left' => array('style' => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
  )
);

$excel->setActiveSheetIndex(0)->setCellValue('A1', "Daftar Cuti Karyawan");
$excel->getActiveSheet()->mergeCells('A1:I1'); // Set Merge Cell pada kolom A1 sampai E1
$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
// $excel->getActiveSheet()->getStyle('F1')->getAlignment()->setWrapText(true); // Set text wrapper
// $excel->getActiveSheet()->getStyle('H1')->getAlignment()->setWrapText(true); // Set text wrapper

// Buat header tabel nya pada baris ke 3
$excel->setActiveSheetIndex(0)->setCellValue('A3', "No.");
$excel->setActiveSheetIndex(0)->setCellValue('B3', "NIP");
$excel->setActiveSheetIndex(0)->setCellValue('C3', "NIK");
$excel->setActiveSheetIndex(0)->setCellValue('D3', "Nama");
$excel->setActiveSheetIndex(0)->setCellValue('E3', "Email");
$excel->setActiveSheetIndex(0)->setCellValue('F3', "Jabatan");
$excel->setActiveSheetIndex(0)->setCellValue('G3', "Alamat");
$excel->setActiveSheetIndex(0)->setCellValue('H3', "Provinsi");
$excel->setActiveSheetIndex(0)->setCellValue('I3', "Nomor Hp");

$sql = "SELECT * FROM profil ORDER BY uid DESC";

$member = $this->db->query($sql)->result_array();

$no = 1; // Untuk penomoran tabel, di awal set dengan 1
$i = 0;
$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
foreach ($member as $data) { // Lakukan looping pada variabel siswa

  $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
  $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $data['nik']);
  $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $data['nomor_urut']);
  $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $data['full_name']);
  $excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $data['email']);
  $excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $data['jabatan']);
  $excel->setActiveSheetIndex(0)->setCellValue('G' . $numrow, $data['alamat']);
  $excel->setActiveSheetIndex(0)->setCellValue('H' . $numrow, $data['provinsi']);
  $excel->setActiveSheetIndex(0)->setCellValue('I' . $numrow, $data['phone_number']);

  // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
  $excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row);
  $excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row);
  $excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row);
  $excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_row);
  $excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_row);
  $excel->getActiveSheet()->getStyle('F' . $numrow)->applyFromArray($style_row);
  $excel->getActiveSheet()->getStyle('G' . $numrow)->applyFromArray($style_row);
  $excel->getActiveSheet()->getStyle('H' . $numrow)->applyFromArray($style_row);
  $excel->getActiveSheet()->getStyle('I' . $numrow)->applyFromArray($style_row);

  $no++; // Tambah 1 setiap kali looping
  $i++;
  $numrow++; // Tambah 1 setiap kali looping
}
// Set width kolom
$excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true); // Set width kolom A
$excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true); // Set width kolom B
$excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true); // Set width kolom C
$excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true); // Set width kolom D
$excel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true); // Set width kolom E
$excel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true); // Set width kolom E
$excel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true); // Set width kolom E
$excel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true); // Set width kolom E
$excel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true); // Set width kolom E

// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
// Set orientasi kertas jadi LANDSCAPE
$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
// Set judul file excel nya
$excel->getActiveSheet(0)->setTitle("Data Member KTNA");
$excel->setActiveSheetIndex(0);
// Proses file excel
// ob_end_clean();

$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
header("Content-type: application/vnd.ms-excel");
header('Content-Disposition: attachment; filename="Data-Member-KTNA.xlsx"');
header("Pragma: no-cache");
header("Expires: 0");
ob_end_clean();
// header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
// header('Content-Disposition: attachment; filename="Daftar Belanja.xlsx"'); // Set nama file excel nya
// header('Cache-Control: max-age=0');
$write->save('php://output');
