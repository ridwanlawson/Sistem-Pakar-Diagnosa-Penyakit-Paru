<?php

error_reporting(0);
// include 'koneksi.php';
require('assets/pdf/fpdf.php');

class FPDF_AutoWrapTable extends FPDF {
  	private $data = array();
  	private $options = array(
  		'filename' => '',
  		'destinationfile' => '',
  		'paper_size'=>'F4',
  		'orientation'=>'L'
  	);
	
  	
  	function __construct($data = array(), $options = array()) {
    	parent::__construct();
    	$this->data = $data;
    	$this->options = $options;
	}
	
	public function rptDetailData () {
		//
		$border = 0;
		$this->AddPage();
		$this->SetAutoPageBreak(true,60);
		$this->AliasNbPages();
		$left = 35;
		
		//header
		$this->Image('../logo.png',50,10,200,90);
		$this->SetFont("", "B", 20);
		// $this->SetX($left); $this->Cell(0, 30, 'Tunas Antarnusa Muda', 0, 1,'C');
		$this->SetX($left); $this->Cell(0, 30, 'Denpo Andalas Samudera', 0, 1,'C');
		$this->SetX($left); $this->Cell(0, 30, 'Bukti Transaksi', 0, 1,'C');
				
		$this->Ln(40);
		$h = 18;
		$left = 20;
		$top = 80;	
		#tableheader
		$this->SetFillColor(200,200,200);	
		$left = $this->GetX();
		$this->SetFont("", "B", 12);
		
		//$this->Ln(20);

		$this->SetWidths(array(105,150,150,150,80,80,80,80));
		$this->SetAligns(array('C','C','C','C','C','C','C','C'));
		$this->SetFont("", "B", 10);
		$this->Row(array('No Pengiriman','Nama Pengirim','Nama Penerima','Tujuan','Total Biaya','Biaya Asuransi','Biaya Packing','Total Bayar'));
		
		$no = 1; $this->SetFillColor(255);
		$this->SetFont('Arial','',9);
		$this->SetWidths(array(105,150,150,150,80,80,80,80));
		$this->SetAligns(array('C','L','L','L','C','C','C','C'));

		#data dari database
		mysql_connect("localhost","root","");
		mysql_select_db("denpo");
	
		if (!empty($_GET['id'])) {
			$id = $_GET['id'];
			$query = mysql_query("SELECT transaksi.*, pengiriman.timestampp, pengiriman.nm_pengirim, pengiriman.nm_penerima, pengiriman.id_tarif, kota.*, tarif.*, tracking.id_pengiriman FROM transaksi, pengiriman, kota, tarif, tracking WHERE tracking.id_pengiriman = '$id' AND tracking.id_pengiriman = transaksi.id_pengiriman AND transaksi.id_pengiriman = pengiriman.id_pengiriman AND pengiriman.id_tarif = tarif.id_tarif AND tarif.id_kota = kota.id_kota group by id_transaksi") or die(mysql_error());
		}
	    while($data = mysql_fetch_array($query))
	    {
		$this->SetFont('Arial','',9);

	      $this->Row(
	        array(
			ucwords($data['id_pengiriman']),
	        ucwords($data['nm_pengirim']), 
			ucwords($data['nm_penerima']),
			ucwords($data['nm_kota']),
			'Rp.'.number_format($data['tot_biaya']), 
			'Rp.'.number_format($data['b_asuransi']),
	        'Rp.'.number_format($data['b_packing']),
	        'Rp.'.number_format($data['tot_bayar']), 
	      ));
	    }

		$this->Ln(20);

		$this->SetWidths(array(215,215,120,120,100,100));
		$this->SetAligns(array('C','C','C','C','C'));
		$this->SetFont("", "B", 10);
		$this->Row(array('Alamat Pengirim','Alamat Penerima','No HP Pengirim','No HP Penerima','Jumlah Koli','Berat'));
		
		$no = 1; $this->SetFillColor(255);
		$this->SetFont('Arial','',9);
		$this->SetWidths(array(215,215,120,120,100,100));
		$this->SetAligns(array('L','L','C','C','C'));

		#data dari database
		mysql_connect("localhost","root","");
		mysql_select_db("denpo");
	
		if (!empty($_GET['id'])) {
			$id = $_GET['id'];
			$query = mysql_query("SELECT transaksi.*, pengiriman.*, kota.*, tarif.*, tracking.id_pengiriman FROM transaksi, pengiriman, kota, tarif, tracking WHERE tracking.id_pengiriman = '$id' AND tracking.id_pengiriman = transaksi.id_pengiriman AND transaksi.id_pengiriman = pengiriman.id_pengiriman AND pengiriman.id_tarif = tarif.id_tarif AND tarif.id_kota = kota.id_kota group by id_transaksi") or die(mysql_error());
		}
	    while($data = mysql_fetch_array($query))
	    {
		$this->SetFont('Arial','',9);

	      $this->Row(
	        array(
	        ucwords($data['alt_pengirim']), 
			ucwords($data['alt_penerima']),
			$data['nohp_pengirim'],
			$data['nohp_penerima'], 
			$data['jml_koli'],
			$data['berat'].' kg' 
	      ));
	    }

		$this->Ln(20);

		# untuk menuliskan nama bulan dengan format Indonesia
		$bln = array(
		  '01' => 'Januari',
		  '02' => 'Februari',
		  '03' => 'Maret',
		  '04' => 'April',
		  '05' => 'Mei',
		  '06' => 'Juni',
		  '07' => 'Juli',
		  '08' => 'Agustus',
		  '09' => 'September',
		  '10' => 'Oktober',
		  '11' => 'November',
		  '12' => 'Desember'
		);
		$this->SetWidths(array(150,150,87,180,150,150));
		$this->SetAligns(array('C','C','C','C','C'));
		$this->SetFont("", "B", 10);
		$this->Row(array('Asal Barang','Pelayanan','Cara Bayar','Jenis Kiriman','Type','Tanggal Kirim'));
		
		$no = 1; $this->SetFillColor(255);
		$this->SetFont('Arial','',9);
		$this->SetWidths(array(150,150,87,180,150,150));
		$this->SetAligns(array('C','C','C','C','C'));

		#data dari database
		mysql_connect("localhost","root","");
		mysql_select_db("denpo");
	
		if (!empty($_GET['id'])) {
			$id = $_GET['id'];
			$query = mysql_query("SELECT transaksi.*, pengiriman.*, kota.*, jenis.*, tracking.id_pengiriman FROM transaksi, pengiriman, kota, jenis, tracking WHERE tracking.id_pengiriman = '$id' AND tracking.id_pengiriman = transaksi.id_pengiriman AND transaksi.id_pengiriman = pengiriman.id_pengiriman AND pengiriman.id_kota_asal = kota.id_kota AND pengiriman.jenis = jenis.id_jenis group by id_transaksi") or die(mysql_error());
		}
	    while($data = mysql_fetch_array($query))
	    {
		$this->SetFont('Arial','',9);

	      $this->Row(
	        array(
	        ucwords($data['nm_kota']), 
			ucwords($data['pelayanan']),
			$data['cara_bayar'],
			ucwords($data['nm_jenis']), 
			$data['type'],
			date('d', strtotime($data['timestampp'])).' '.$bln[date('m', strtotime($data['timestampp']))].' '.date('Y', strtotime($data['timestampp'])),
	      ));
	    }


		#tabel footer
		$this->Ln(20);
		$this->Ln(20);
		$this->SetFont("", "", 9);
		
		$this->SetX(50); 
		$this->Cell(0, 20, 'Persetujuan                                                                                                                              Petugas                                                                                                                               Diterima dengan ', 0, 2,'L');

		$this->Cell(0, 15, 'Pengirim                                                                                                                      Denpo Andalas Samudera                                                                                                              Lengkap dan baik', 0, 1,'L');
		$this->SetX(50); 
		$this->Ln(40);
		$this->Ln(40);
		$this->SetX(50); 
		$this->Cell(0, 20, '(Nama/ Tanda Tangan/ Tgl)                                                                                       (Nama/ Tanda Tangan/ Tgl)                                                                                                       (Nama/ Tanda Tangan/ Tgl)', 0, 1,'L');
	}

	public function printPDF () {
				
		if ($this->options['paper_size'] == "F4") {
			$a = 8.3 * 72; //1 inch = 72 pt
			$b = 13.0 * 72;
			$this->FPDF($this->options['orientation'], "pt", array($a,$b));
		} else {
			$this->FPDF($this->options['orientation'], "pt", $this->options['paper_size']);
		}
		
	    $this->SetAutoPageBreak(false);
	    $this->AliasNbPages();
	    $this->SetFont("helvetica", "B", 10);
	    //$this->AddPage();
	
	    $this->rptDetailData();
			    
	    $this->Output($this->options['filename'],$this->options['destinationfile']);
  	}
  	
  	private $widths;
	private $aligns;

	function SetWidths($w)
	{
		//Set the array of column widths
		$this->widths=$w;
	}

	function SetAligns($a)
	{
		//Set the array of column alignments
		$this->aligns=$a;
	}

	function Row($data)
	{
		//Calculate the height of the row
		$nb=0;
		for($i=0;$i<count($data);$i++)
			$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
		$h=15*$nb;
		//Issue a page break first if needed
		$this->CheckPageBreak($h);
		//Draw the cells of the row
		for($i=0;$i<count($data);$i++)
		{
			$w=$this->widths[$i];
			$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
			//Save the current position
			$x=$this->GetX();
			$y=$this->GetY();
			//Draw the border
			$this->Rect($x,$y,$w,$h);
			//Print the text
			$this->MultiCell($w,15,$data[$i],0,$a);
			//Put the position to the right of the cell
			$this->SetXY($x+$w,$y);
		}
		//Go to the next line
		$this->Ln($h);
	}

	function CheckPageBreak($h)
	{
		//If the height h would cause an overflow, add a new page immediately
		if($this->GetY()+$h>$this->PageBreakTrigger)
			$this->AddPage($this->CurOrientation);
	}

	function NbLines($w,$txt)
	{
		//Computes the number of lines a MultiCell of width w will take
		$cw=&$this->CurrentFont['cw'];
		if($w==0)
			$w=$this->w-$this->rMargin-$this->x;
		$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
		$s=str_replace("\r",'',$txt);
		$nb=strlen($s);
		if($nb>0 and $s[$nb-1]=="\n")
			$nb--;
		$sep=-1;
		$i=0;
		$j=0;
		$l=0;
		$nl=1;
		while($i<$nb)
		{
			$c=$s[$i];
			if($c=="\n")
			{
				$i++;
				$sep=-1;
				$j=$i;
				$l=0;
				$nl++;
				continue;
			}
			if($c==' ')
				$sep=$i;
			$l+=$cw[$c];
			if($l>$wmax)
			{
				if($sep==-1)
				{
					if($i==$j)
						$i++;
				}
				else
					$i=$sep+1;
				$sep=-1;
				$j=$i;
				$l=0;
				$nl++;
			}
			else
				$i++;
		}
		return $nl;
	}
} //end of class

//pilihan
$options = array(
	'filename' => '', //nama file penyimpanan, kosongkan jika output ke browser
	'destinationfile' => '', //I=inline browser (default), F=local file, D=download
	'paper_size'=>'F4',	//paper size: F4, A3, A4, A5, Letter, Legal
	'orientation'=>'L', //orientation: P=portrait, L=landscape
);

$tabel = new FPDF_AutoWrapTable($data, $options);
$tabel->printPDF();

?>
