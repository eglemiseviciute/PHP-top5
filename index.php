<?php
$text = "
Semionas Semionovičius užsidėjęs akinius žiūri į pušį ir mato: pušyje sėdi mužikas ir rodo jam kumštį. 
Semionas Semionovičius nusiėmęs akinius žiūri į pušį ir mato, kad pušyje niekas nesėdi. 
Semionas Semionovičius užsidėjęs akinius žiūri į pušį ir vėl mato, kad pušyje sėdi mužikas ir rodo jam kumštį. 
Semionas Semionovičius nusiėmęs akinius vėl mato, kad pušyje niekas nesėdi. 
Semionas Semionovičius, vėl užsidėjęs akinius, žiūri į pušį ir vėl mato, kad pušyje sėdi mužikas ir rodo jam kumštį. 
Semionas Semionovičius nenori tikėti šiuo reiškiniu ir šį reiškinį laiko optine apgaule.";

// padarom viska mazosiomis raidemis kad galetume visus vienodus zodiuz paimt
$text = strtolower($text);  

// isemam nereikalingus simbolius is stringo
function RemoveSpecialChar($str) {
 
    // naudojam str_replace() funkcija
    // kad pakeisti zodyje simbolius i tarpus
    $res = str_replace( array( '\'', '"',".",":",
    ',' , ';', '<', '>' ), '', $str);

    // grazinam rezultata
    return $res;
    }
  $str1 = RemoveSpecialChar($text);
 

// funkcija surandanti top 5 pasikartojancius zodzius
  function find_five($string){
    // padarom i array teksta
$words= explode(" ", $string);

// suskaiciavom kiek pasikartoja kokiu zodziu 
$wordss = array_count_values($words);

// isrikiavom juos nuo didziausio iki maziausio
arsort($wordss);

// paemem  5 daugiausiai pasikartojancius zodius

$largeNumbers = array_slice($wordss, 0, 5);

// sudedam juo i SQL duomenu baze
foreach($largeNumbers as $key => $value) {
  echo"</br>";
  echo "$key pasikartoja $value kartus";

$con = mysqli_connect("localhost" , "root" , "" , "database") or die("Connection Failed");
$sql = "insert into table (Zodis, Pasikartojimu_kiekis) values ('$key','$value')";
$run = mysqli_query($con,$sql);

}
  }
find_five($str1);

