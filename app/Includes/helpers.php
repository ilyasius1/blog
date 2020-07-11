<?php
//вместо date() - вывод с русскими месяцами. Если передается параметр $lowercase - месяц пишется с маленькой буквы
 function dateRu($date = NULL, $format = 'd F Y', $lowercase = true){
     if($date == NULL || $date == 0) {
         $date=time();
     }
     if(!is_int($date)){
         $date = strtotime($date);
     }
     $D = strpos($format,'D');
     $l = strpos($format,'l');
     $M = strpos($format,'M');
     $F = strpos($format,'F')+1;
     $monthNames=array('Января', 'Февраля', 'Марта', 'Апреля', 'Мая', 'Июня', 'Июля', 'Августа', 'Сентября', 'Октября', 'Ноября', 'Декабря');
     $weekDays = array('Понедельник', 'Вторник', 'Среда','Четверг','Пятница','Суббота','Воскресенье');


     if($F===false) return date($format, $date);
     if($lowercase !== false){
         return mb_strtolower(date(str_replace('F',$monthNames[date('n',$date)-1], $format), $date), 'UTF-8');
     }
     return date(str_replace('F',$monthNames[date('n',$date)-1], $format), $date);
 }
