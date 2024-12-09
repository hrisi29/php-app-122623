<?php 
$count=0;
$sum=0;
$num=29;
for($i=0;$i<=50;$i++){
    if($i==$num){
       echo "Любимо число: $i <br>"; 
    }
   
    if($i%3==0){
        $count++;
        
    }
    if($i%2!=0){
        $sum+=$i;
    }
    
}
echo "Броят на числата, които се делят на 50 без остатък е $count";
echo "<br>$sum";
?>