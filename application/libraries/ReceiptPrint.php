<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// IMPORTANT - Replace the following line with your path to the escpos-php autoload script
require_once __DIR__ . '/mike42/escpos-php\autoload.php';
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
class ReceiptPrint {
  private $CI;
  private $connector;
  private $printer;
  // TODO: printer settings
  // Make this configurable by printer (32 or 48 probably)
  private $printer_width = 32;
  function __construct()
  {
    $this->CI =& get_instance(); // This allows you to call models or other CI objects with $this->CI->... 
  }
  function connect($nama)
  {
    $this->connector = new WindowsPrintConnector($nama);
    $this->printer = new Printer($this->connector);
  }
  private function check_connection()
  {
    if (!$this->connector OR !$this->printer OR !is_a($this->printer, 'Mike42\Escpos\Printer')) {
      throw new Exception("Tried to create receipt without being connected to a printer.");
    }
  }
  public function close_after_exception()
  {
    if (isset($this->printer) && is_a($this->printer, 'Mike42\Escpos\Printer')) {
      $this->printer->close();
    }
    $this->connector = null;
    $this->printer = null;
    $this->emc_printer = null;
  }
  // Calls printer->text and adds new line
  private function add_line($text = "", $should_wordwrap = true)
  {
    $text = $should_wordwrap ? wordwrap($text, $this->printer_width) : $text;
    $this->printer->text($text."\n");
  }

  // Calls printer->text and adds new line
  private function add_line_special($text = "", $should_wordwrap = true)
  {
    $text = $should_wordwrap ? wordwrap($text, $this->printer_width-8) : $text;
    $this->printer->text($text."\n");
  }
  public function printrekap($kasawal = "",$totalpemasukan = "",$cashdetail ="",$debitdetail="",$ovodetail,$pengeluaran,$sisauang,$sisauangdikasir)
  {
    $kasawal = number_format(parseInt($kasawal),"0",",",".");
    $totalpemasukan = number_format(parseInt($totalpemasukan),"0",",",".");
    $cashdetail = number_format(parseInt($cashdetail),"0",",",".");
    $debitdetail = number_format(parseInt($debitdetail),"0",",",".");
    $ovodetail = number_format(parseInt($ovodetail),"0",",",".");
    $pengeluaran = number_format(parseInt($pengeluaran),"0",",",".");
    $sisauang = number_format(parseInt($sisauang),"0",",",".");
    $sisauangdikasir = number_format(parseInt($sisauangdikasir),"0",",",".");

    date_default_timezone_set("Asia/Bangkok");
    $this->check_connection();
    $img_logo = EscposImage::load(__DIR__ . "/logo112.png");
    echo pathinfo(__DIR__ . "\logo.bmp", PATHINFO_EXTENSION);
    // echo $img_logo;
    $this->printer->setJustification(Printer::JUSTIFY_CENTER);
    $this->printer->bitImageColumnFormat($img_logo);
    $this->add_line("Rekap Pemasukan Pengeluaran");
    $this->add_line(date('d/m/Y'));
    $this->add_line("H:i");
    $this->printer->setJustification(Printer::JUSTIFY_LEFT);
    $this->add_line("================================");

    $stringkasawal = "Kas Awal    :    Rp.---.---.---";
    $stringpemasukan = "Pemasukan   :    Rp.---.---.---";
    $stringcashdetail = "*cash :Rp.--.---.---";
    $stringdebitdetail = "*debit:Rp.--.---.---";
    $stringovodetail = "*ovo  :Rp.--.---.---";
    $stringpengeluaran = "Pengeluaran :    Rp.---.---.---";
    $stringsisauang = "Sisa Uang   :    Rp.---.---.---";
    $stringuangdikasir = "Mesin Kasir :    Rp.---.---.---";

    $spacekasawal = 32-(strlen($stringkasawal)+strlen($kasawal));
    $spacepemasukan = 32-(strlen($stringpemasukan)+strlen($pemasukan));
    $spacecashdetail = 20-(strlen($stringcashdetail)+strlen($cashdetail));
    $spacedebitdetail = 20-(strlen($stringdebitdetail)+strlen($debitdetail));
    $spaceovodetail = 20-(strlen($stringovodetail)+strlen($ovodetail));
    $spacepengeluaran = 32-(strlen($stringpengeluaran)+strlen($pengeluaran));
    $spacesisauang = 32-(strlen($stringsisauang)+strlen($sisauang));
    $spaceuangdikasir = 32-(strlen($stringuangdikasir)+strlen($uangdikasir));

    for ($i=0; $i < $spacekasawal; $i++) { 
      $stringkasawal = $stringkasawal." ";
    }

    for ($i=0; $i < $spacepemasukan; $i++) { 
      $stringpemasukan = $stringpemasukan." ";
    }

    for ($i=0; $i < $spacecashdetail; $i++) { 
      $stringcashdetail = $stringcashdetail." ";
    }

    for ($i=0; $i < $spacedebitdetail; $i++) { 
      $stringdebitdetail = $stringdebitdetail." ";
    }

    for ($i=0; $i < $spaceovodetail; $i++) { 
      $stringovodetail = $stringovodetail." ";
    }

    for ($i=0; $i < $spacepengeluaran; $i++) { 
      $stringpengeluaran = $stringpengeluaran." ";
    }

    for ($i=0; $i < $spacesisauang; $i++) { 
      $stringsisauang = $stringsisauang." ";
    }

    for ($i=0; $i < $spaceuangdikasir; $i++) { 
      $stringuangdikasir = $stringuangdikasir." ";
    }

    $stringkasawal = $stringkasawal.$kasawal;
    $stringpemasukan = $stringpemasukan.$totalpemasukan;
    $stringcashdetail = $stringcashdetail.$cashdetail;
    $stringdebitdetail = $stringdebitdetail.$debitdetail;
    $stringovodetail = $stringovodetail.$ovodetail;
    $stringpengeluaran = $stringpengeluaran.$pengeluaran;
    $stringsisauang = $stringsisauang.$sisauang;
    $stringuangdikasir = $stringuangdikasir.$sisauangdikasir;


    $this->add_line($stringkasawal);
    $this->add_line($stringpemasukan);
    $this->add_line($stringcashdetail);
    $this->add_line($stringdebitdetail);
    $this->add_line($stringovodetail);
    $this->add_line($stringpengeluaran);
    $this->add_line("                 _______________");
    $this->add_line($stringsisauang);
    $this->add_line($stringuangdikasir);
    $this->printer->cut();
    $this->printer->close();
  }
}