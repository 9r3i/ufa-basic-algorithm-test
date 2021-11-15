<?php

// set header as text to get the same output as cli does
header('content-type:text/plain');

// SOAL #1, Urutkan array berikut [12,9,30,'A','M',99,82,'J','N','B'] dengan urutan abjad di  depan dan angka di belakang, contoh ['A', 'B','J', 'M', 'N', 9, 12, 30, 82, 99]
$array=[12,9,30,'A','M',99,82,'J','N','B'];
$output=['A', 'B','J', 'M', 'N', 9, 12, 30, 82, 99];

var_dump($array===$output);

usort($array,function($a,$b){
  $aa=is_string($a)?ord($a):$a+123;
  $bb=is_string($b)?ord($b):$b+123;
  if($aa==$bb){
    return 0;
  }
  return $aa<$bb?-1:1;
});

print_r($array);
print_r($output);
var_dump($array===$output);


/**
output:

bool(false)
Array
(
    [0] => A
    [1] => B
    [2] => J
    [3] => M
    [4] => N
    [5] => 9
    [6] => 12
    [7] => 30
    [8] => 82
    [9] => 99
)
Array
(
    [0] => A
    [1] => B
    [2] => J
    [3] => M
    [4] => N
    [5] => 9
    [6] => 12
    [7] => 30
    [8] => 82
    [9] => 99
)
bool(true)
//*/



/**
SOAL #2

Silakan tulis kode yang mengandung setidaknya satu fungsi/metode utama yang disebut pattern_count yang menerima dua string atau dua array karakter dengan panjang antara 0 dan 100 karakter. Pertama parameter adalah teks dan parameter kedua adalah pattern. Fungsi ini akan mengembalikan angka bagaimana banyak pola ada di dalam teks. Asumsikan parameter input selalu tidak nol. Solusi Anda tidak boleh menggunakan fungsi pembantu yang telah ditentukan sebelumnya seperti substr_count di PHP atau panjang kecocokan regex dalam JavaScript.

Contoh:
a. Input: “palindrom”, “ind”
Output : 1
d. Input: “ababab”, “aba”
 Output : 2
b. Input: “abakadabra”, “ab”
Output : 2
e. Input: “aaaaaa”, “aa”
 Output : 5
c. Input: “hello”, “”
Output : 0
f. Input: “hell”, “hello”
 Output: 0

*/

$sample=[
  'palindrom'=>'ind',
  'ababab'=>'aba',
  'abakadabra'=>'ab',
  'aaaaaa'=>'aa',
  'hello'=>'',
  'hell'=>'hello',
];

echo "\n\n\n";
foreach($sample as $text=>$pattern){
  var_dump(
    $text.','.$pattern.' = '.
    pattern_count($text,$pattern)
  );
}

function pattern_count(string $text,string $pattern):int{
  $result=0;
  if(strlen($pattern)==0){return $result;}
  $maxlength=strlen($text)-strlen($pattern);
  $offset=0;
  while($offset<=$maxlength){
    $pos=strpos($text,$pattern,$offset);
    if($pos===false){break;}
    $result++;
    $offset=$pos+1;
  }return $result;
}

/**
output:

string(17) "palindrom,ind = 1"
string(14) "ababab,aba = 2"
string(17) "abakadabra,ab = 2"
string(13) "aaaaaa,aa = 5"
string(10) "hello, = 0"
string(14) "hell,hello = 0"
//*/



/**
SOAL #3

Buat fungsi yang menghitung banyak nya huruf yang user masukan dalam 1x inputan dan urutkan hasil akhir sesuai abjad, Perhatikan huruf kapital, jika terdapat abjad yang sama namun dalam kapital maka pisah huruf tersebut, contoh :

a. Input : “Hello World”
   Output : [“d”:1, “e”:1, “H”:1, “l”: 3, “o”:2, “r”:1, “W”:1]
b. Input : “Bismillah”
   Output: [“a”:1, ”B”:1, ”h”:1, ”i”:2, ”l”:2, “m”:1, “s”:1]
c. Input: “MasyaAllah”
   Output: [“A”:1, “a”:3, “h”:1, ”l”:2, “M”:1, “s”:1, “y”:1]

//*/

$contohs=[
  'Hello World',
  'Bismillah',
  'MasyaAllah',
];

echo "\n\n\n";
foreach($contohs as $contoh){
  echo "$contoh --> ".letter_count($contoh)."\n\n";
}

function letter_count(string $text):string{
  $result=[];
  foreach(range('A','Z') as $letter){
    $upper=pattern_count($text,$letter);
    if($upper>0){$result[]="\"{$letter}\":".$upper;}
    $lowerLetter=strtolower($letter);
    $lower=pattern_count($text,$lowerLetter);
    if($lower>0){$result[]="\"{$lowerLetter}\":".$lower;}
  }return '['.implode(', ',$result).']';
}

/**
output:

Hello World --> ["d":1, "e":1, "H":1, "l":3, "o":2, "r":1, "W":1]

Bismillah --> ["a":1, "B":1, "h":1, "i":2, "l":2, "m":1, "s":1]

MasyaAllah --> ["A":1, "a":3, "h":1, "l":2, "M":1, "s":1, "y":1]

//*/












