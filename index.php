<?php 
// nomer 1
    $tokens = [];

    function generate($user){
        global $tokens;
        $token = generateRandom();
        if(!isset($tokens[$user])){
            $tokens[$user] = [];
        }

        if(count($tokens[$user]) >= 10){
            array_shift($tokens[$user]);
        }

        $tokens[$user] [] = $token;
        return $token;

    }


    function verifyToken($user , $token){
        global $tokens;

        if(isset($tokens[$user])){
            $index = array_search($token,$tokens[$user]);
            if($index !== false){
                unset($tokens[$user][$index]);
                return true;
            }
        }
        return false;

    }


    function generateRandom(){
        return bin2hex(random_bytes(16));
    }

    $token1 = generate('tia');

var_dump($token1);
var_dump(verifyToken('tia',$token1) ? "true" : "false") ;


// nomer 2
class Nilai{

    public $mapel;
    public $nilai;

    public function construct ($mapel, $nilai){
        $this->mapel = $mapel;
        $this->nilai = $nilai;


    }
}

class Siswa{

    public $nrp;
    public $nama;
    public $daftarNilai;
    public function construct ($nrp, $nama){
        $this->nrp = $nrp;
        $this->nama = $nama;
        $this->daftarNilai = [new Nilai("",0),new Nilai("",0),new Nilai("",0)];

    }

}

$siswaList = [];
$mapelList = ['Inggris' , 'Indonesia' , 'Jepang'];

for($i = 0; $i < 10; $i++){
    $nama = substr(str_shuffle(str_repeat($x = 'abcdefghijklmnopqrstuvwxyz',ceil(10/strlen($x)))),1,10);
    $mapel = $mapelList[array_rand($mapelList)];
    $nilai = rand(0,100);
    $siswa = new Siswa("", $nama);
    $siswa->daftarNilai[0] = new Nilai($mapel,$nilai);
    array_push($siswaList,$siswa);
}
var_dump($siswaList);

// nomer 3
$warna = ["merah", "kuning", "hijau"];
$hitung = 0;
function color(){
    global $warna,$hitung;

    $warnaWarni = $warna[$hitung%count($warna)];
    $hitung++;
    return $warnaWarni;
    
}


var_dump(color());
var_dump(color());
var_dump(color());
var_dump(color());

// nomer 4
function nilaiTerbesar($arr){
    rsort($arr);
    $max = $arr[0];
    foreach($arr as $value){
        if($value < $max){
            return $value;
        }
    }
    return null;
}

$array = [1,2,3,4,5,6,7,8,9,10];
var_dump(nilaiTerbesar($array));

// nomer 5

function hurufTerbanyak($kata){

    $karakter = array_count_values(str_split($kata));

    arsort($karakter);
    $karakterTerbanyak = key($karakter);
    $jumlahTerbanyk = reset($karakter);

    $hasil = "$karakterTerbanyak  $jumlahTerbanyk"."x";
    return $hasil;



}

var_dump(hurufTerbanyak("halllo"));
var_dump(hurufTerbanyak("malam"));



?>