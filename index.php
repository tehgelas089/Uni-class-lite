<!-- PHP 8 minus -->
<!-- none consturction -->
<?php
class smartPhone
{
    public $merk = "merk", $warna = "warna", $chipset = "chipset", $ram = "ram", $rom = "rom";
    public function getLabel()
    {
        return "$this->merk, $this->warna, $this->chipset, $this->ram, $this->rom";
    }
}

$smartPhone1 = new smartPhone();
$smartPhone1->merk = "Samsung";
$smartPhone1->warna = "hijau";
$smartPhone1->chipset = "exynos";
$smartPhone1->ram = "6GB";
$smartPhone1->rom = "128GB";

/* use construction */
class laptop
{
    public $warna, $cpu, $ram, $gpu;
    /* visibilt */
    private $merk;
    public function __construct($merk = "merk", $warna = "warna", $cpu = "intel/amd", $ram = "ram", $gpu = "gpu")
    {
        $this->merk = $merk;
        $this->warna = $warna;
        $this->cpu = $cpu;
        $this->ram = $ram;
        $this->gpu = $gpu;
    }
    public function getLabel()
    {
        return "$this->merk, $this->warna, $this->cpu, $this->ram, $this->gpu";
    }
    public function cetak()
    {
        $str = "{$this->merk} | gpu: {$this->gpu},";
        return $str;
    }
    /* setter-getter */
    public function setMerk($merk)
    {
        return $this->merk = $merk;
    }
    public function getMerk()
    {
        return $this->merk;
    }
}

class cetakInfo
{
    public function cetak(laptop $laptop)
    {
        $str = "{$laptop->getMerk()} | {$laptop->gpu}";
        return $str;
    }
}
/* inheritance */
class intel extends laptop
{
    public $socket;
    public function __construct($merk = "merk", $warna = "warna", $cpu = "intel/amd", $ram = "ram", $gpu = "gpu", $socket = "none")
    {
        parent::__construct($merk, $warna, $cpu, $ram, $gpu);
        $this->socket = $socket;
    }
    public function cetak()
    {
        $str = parent::cetak() . " intel: {$this->cpu} socket {$this->socket}";
        return $str;
    }
}

class amd extends laptop
{
    public $socket;
    public function __construct($merk = "merk", $warna = "warna", $cpu = "intel/amd", $ram = "ram", $gpu = "gpu", $socket = "none")
    {
        parent::__construct($merk, $warna, $cpu, $ram, $gpu);
        $this->socket = $socket;
    }
    public function cetak()
    {
        $str = parent::cetak() . " amd: {$this->cpu} socket {$this->socket}";
        return $str;
    }
}
$laptop1 = new intel("asus", "hitam", "i5", "8GB", "nvidia gtx", "lga:1180");
$laptop2 = new amd("lenovo", "putih", "raizen3", "16GB", "amd radeon", "am:4");

/* static keyword */
class angka
{
    public static $angka = 1;
    public function hallo()
    {
        return "hallo " . self::$angka++ . " kali. <br>";
    }
}

/* constant */
define("NAMA", "Gfors");
const UMUR = 16;

class Constant
{
    const TEMPATTINGGAL = "Bandung";
}

/* interface */
interface asalNegara
{
    public function negara();
}

/* abstract class */
abstract class mobil
{
    protected $warna, $topspd, $negara;
    public function __construct($warna = "default", $topspd = "0mph", $negara = "none")
    {
        $this->warna = $warna;
        $this->topspd = $topspd;
        $this->negara = $negara;
    }
    abstract public function kecepatan();
}

class lamborgini extends mobil implements asalNegara
{
    public function __construct($warna = "default", $topspd = "0mph", $negara = "none")
    {
        parent::__construct($warna, $topspd, $negara);
    }
    public function negara()
    {
        $str = "berasal dari {$this->negara}";
        return $str;
    }
    public function kecepatan()
    {
        $spd = "Kecepatan mobil lamborgini berwarna {$this->warna} adalah {$this->topspd} dan {$this->negara()}";
        return $spd;
    }
}
class ferrari extends mobil implements asalNegara
{
    public function __construct($warna = "default", $topspd = "0mph", $negara = "none")
    {
        parent::__construct($warna, $topspd, $negara);
    }
    public function negara()
    {
        $str = "berasal dari {$this->negara}";
        return $str;
    }
    public function kecepatan()
    {
        $spd = "Kecepatan mobil ferrari berwarna {$this->warna} adalah {$this->topspd} dan {$this->negara()}";
        return $spd;
    }
}

$lambo = new lamborgini("biru", "200mph", "eropa");
$ferrari = new ferrari("merah", "210mph", "eropa");


echo "oop<br>";
echo "smartphone : " . $smartPhone1->getLabel();
echo "<hr>use construction<br>";
echo "laptop : " . $laptop1->getLabel();
echo "<hr>object type<br>";
$cetakLaptop = new cetakInfo;
echo $cetakLaptop->cetak($laptop1);
echo "<br>";
echo $cetakLaptop->cetak($laptop2);
echo "<hr>inheritance<br>";
echo $laptop1->cetak();
echo "<br>";
echo $laptop2->cetak();
echo "<hr>setter-getter<br>";
echo $laptop1->getMerk();
echo "<br>";
echo $laptop2->setMerk("Samsung");
echo "<hr>static keyword<br>";
$obj = new angka;
echo $obj->hallo();
echo $obj->hallo();
echo $obj->hallo();
echo "<br>";
$obj2 = new angka;
echo $obj2->hallo();
echo $obj2->hallo();
echo $obj2->hallo();
echo "<hr>constanta<br>";
echo NAMA;
echo "<br>";
echo UMUR;
echo "<br>";
echo Constant::TEMPATTINGGAL;
echo "<hr>abstrak & interface<br>";
echo $lambo->kecepatan();
echo "<br>";
echo $ferrari->kecepatan();
