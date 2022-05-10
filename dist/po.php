<?php

error_reporting(0);
include 'config/koneksi.php';
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
		$this->Image('../logo.jpg',1,0,200,100);
		$this->SetFont("", "B", 20);
		$this->SetX($left); $this->Cell(0, 30, 'PT Pertamina Persero', 0, 1,'C');
		$this->SetX($left); $this->Cell(0, 30, 'Purchase Order (PO)', 0, 1,'C');
				
		$this->Ln(40);
		$h = 18;
		$left = 20;
		$top = 80;	
		#tableheader
		$this->SetFillColor(200,200,200);	
		$left = $this->GetX();
		$this->SetFont("", "B", 12);
		
		//$this->Ln(20);

		$this->SetWidths(array(25,150,150,53,70,80,150,100,100));
		$this->SetAligns(array('C','C','C','C','C','C','C','C','C','C','C','C'));
		$this->SetFont("", "B", 10);
		$this->Row(array('No','Nama Costumer','Nama Barang','Jumlah','Harga','Kali Pengiriman','Tempat Penerimaan','Diskon','Total'));
		
		$no = 1; $this->SetFillColor(255);
		$this->SetFont('Arial','',9);
		$this->SetWidths(array(25,85,82,53,55,55,70,200,70,60,60,60));
		$this->SetAligns(array('C','L','L','C','L','C','C','C','C','C','C','C'));
		#data dari database
		// mysql_connect("localhost","root","");
		// mysql_select_db("dbpanti");
	

					$now = date('Y');
		if (isset($_GET['tahun'])&&isset($_GET['bulan'])) {
			# code...
			$tahuns = $_GET['tahun'];
			$bulans = $_GET['bulan'];
			if (!empty($tahuns) && !empty($bulans)) 
				{
					# code...
					$query = "select * from surat_masuk where month(tanggal_terima)='$bulans' and year(tanggal_terima) = '$tahuns' order by no desc ";
				}
			elseif (!empty($tahuns) && empty($bulans)) {
			 
					$query = "select * from surat_masuk where year(tanggal_terima) = '$tahuns' order by no desc";
				}
			else{
					$query = "select * from surat_masuk where tahun = '$now' order by no desc";		
			}
		}else{
			# code...

			$query = "";
		}

	    $sql = mysql_query($query);
	    while($data = mysql_fetch_array($sql))
	    {
		$this->SetFont('Arial','',9);

	      $this->Row(
	        array($no++,
			ucwords($data[16]),
	        $data[17], 
			ucwords($data[2]),
			date('d-m-Y', strtotime($data[3])), 
			date('d-m-Y', strtotime($data[4])), 
			$data[5],
	        ucwords($data[6]),
			$data[7],
	        $data[9],
	        $data[10], 
	        $data[11], 
	      ));
	    }

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

		#tabel footer
		$this->Ln(20);
		$this->Ln(20);
		$this->SetFont("", "", 9);
		$this->SetX(700); $this->Cell(0, 15, 'Padang, '.date('d').' '.$bln[date('m')].' '.date('Y').'', 0, 1,'C');
		$this->SetX(700); $this->Cell(0, 15, 'Pimpinan Pertamina', 0, 1,'C');
		$this->Ln(40);
		$this->Ln(40);
		$this->SetX(700); $this->Cell(0, 20, 'Nama Pimpinan', 0, 1,'C');
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
