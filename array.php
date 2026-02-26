<?php


// $num = array("anantharaj","Name","is");
// //  echo $num[1], $num[2] ,$num[0];
//  echo $num[1]." ".$num[2]." ".$num[0];

// echo "<br>";


//  $sum= array(5,1,4);
// //  echo "sum is".($sum[0]+$sum[1]+$sum[2]);
// $total=($sum[0]+$sum[1]+$sum[2]);

// echo $total;

// echo "<br>";

// $n1=0;
// $n1+=$sum[0];  //$n1=$n1+$sum[0];   0 + 5
// $n1+=$sum[1];
// $n1+=$sum[2];

// echo $n1;


// assoctive array......


// $multi = [1 => 5 , 2 =>5 , 3 => 10];

// $mul=1;
// $mul*=$multi[1];  //0*5
// $mul*=$multi[2];
// $mul*=$multi[3];

// echo $mul;

// // echo $mul=($multi[1]*$multi[2]*$multi[3]);


// //foreach method......................................................

// // foreach($multi as $key => $value){

// //     echo "<br>". $mul *= $value ;

// // }


// $array1=[

// ["phone"=>2053684756, "Name"=>"ananthu"],
// [1=>"My" , 2=>"is" , 3=>"name"],
// "my contact number is"
// ];

// echo $array1[1][1]." ".$array1[1][3]." ".$array1[1][2]." ".$array1[0]["Name"]."<br>".$array1[2]." ".$array1[0]["phone"];
// $i=1; $i<=10; $i++;

// $num= [1=>5, 2=>8, 3=>5, 4=>2, 5=>6];


// array for loop chaking and count setting.....................................


// $num = array(5, 8, 5, 2, 6, 3);
// $sum = 0;
// // $sum+=$num[0];
// // $sum+=$num[1];
// // $sum+=$num[2];
// // $sum+=$num[3];
// // $sum+=$num[4];


// for ($i = 0; $i < count($num); $i++) {
//     $sum += $num[$i];
// }
// echo $sum;

// $num3=array(11,12,13,14,15);
// $num2=array(1,2,3,4,5);

// //----------array_add...........
// array_unshift($num2,2);
// array_push($num2,6);
// //--------------array_remove............
// array_shift($num2);
// array_pop($num2);
// //-----------------array_splice................
// array_splice($num2,4);
// //-----------------array_merge..............
// $array=array_merge($num3,$num2);

// var_dump($num2);
// var_dump($num3);
// var_dump($array);



// $array1=array(1,2,3,4,5,6);

// $sum=$array1[0];

// for($i=1;$i<count($array1);$i++){
//        if($array1[$i] > $sum){

//         $sum= $array1[$i];

//        }
// }
// echo $sum;



$array2=array(1,2,3,4,5,6,7,8);

// $sum1=$array2[0];

// for($i=1;$i>count($array2);$i++){
//        if($array2[$i] < $sum){

//         $sum1= $array2[$i];

//        }
// }
// echo $sum1;

$sum1="";
for($i=1;$i<count($array2);$i++){

    if($array2[$i]%2==0){
        $sum1.=$array2[$i].',';
    }
}

echo "this number"." ".$sum1." is even";





