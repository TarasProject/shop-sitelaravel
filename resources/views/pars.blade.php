@extends('layouts.header-footer')
@section('content')
<?php

header('Content-type: text/html; charset-utf-8');

// require 'phpQuery.php';


function get_content($url) {
//$fp = fopen('file.txt', 'w');
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($ch, CURLOPT_FILE, $fp);
  $res = curl_exec($ch);
  curl_close($ch);
  return $res;
}

function parser($url, $start, $end){
  //умова виходу із рекурсії
  $i=1;
  if ($start<$end){
    //$file = file_get_contents($url);
    $file = get_content($url);
    $doc = phpQuery::newDocument($file);

    foreach ($doc->find('#itemsList .item-search') as $company){
      $company = pq($company);
      //echo $company;
//var_dump($company);

      $title = $company->find('.item-search__title.mobile-only-show')->html();
      $reviews_count = $company->find('.item-search__how-responds')->html();
      $description = $company->find('.item-search__description')->html();
      $logo = $company->find('.item-search__img img')->attr('src');
      $addres =$company->find('.company-address')->html();
      $phone = $company->find('.icon-phone')->html();
      $network = $company->find('.item-search__company-info div:eq(3)');



      // $img = $article->find('.img-cont img')->attr('src');
      // $text = $article->find('.pd-cont')->html();

      echo $i. $title.'<br>';
      echo $reviews_count.'<br>';
      echo $description.'<br>';
      echo "<img src='$logo'>".'<br>';
      echo $addres.'<br>';
      echo $phone.'<br>';
      echo $network.'<br>';

      // echo "<a href='$instagram'>instagram</a>".'<br>';
      // echo "<a href='$facebook'>facebook</a>".'<br>';
      echo '<hr>';
      $i++;
      // echo "<img src='$img'>";
      // echo $text;
      // echo "<hr>";

    }

    // $links = $doc->find('.pagination-sunshine a');
    // echo $links;

    //$next = 'https://list.in.ua/%D0%86%D0%B2%D0%B0%D0%BD%D0%BE-%D0%A4%D1%80%D0%B0%D0%BD%D0%BA%D1%96%D0%B2%D1%81%D1%8C%D0%BA/%D0%A1%D0%B0%D0%BB%D0%BE%D0%BD%D0%B8-%D0%BA%D1%80%D0%B0%D1%81%D0%B8/page/'.$start;
    //вводимо дві змінні $start і $end щоб не було рекурсії
    //умова якщо не порожній $next

    if(!empty($next)){

      $start++;
      //рекурсивно визиваємо наш (парсер) parser функцію
      parser($next, $start, $end);

      //var_dump($next);
    }
  }
}

$url = 'https://list.in.ua/%D0%86%D0%B2%D0%B0%D0%BD%D0%BE-%D0%A4%D1%80%D0%B0%D0%BD%D0%BA%D1%96%D0%B2%D1%81%D1%8C%D0%BA/%D0%A1%D0%B0%D0%BB%D0%BE%D0%BD%D0%B8-%D0%BA%D1%80%D0%B0%D1%81%D0%B8';
$start=0;
$end=1;
parser($url, $start, $end);
?>

@stop
