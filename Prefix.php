<?php


class Prefix
{

    /**
     * @param $number
     * @return mixed|string
     */
     public static function getDestination($number){
         $get_destination = Prefix::getPrefix($number);
         return ($get_destination)  ?  $get_destination : 'Invalid number';
     }

    /**
     * @param $number
     * @return mixed|string
     */
     public static function getPrefix($number){

         global $getData;
         $first_prefix_3_numbers = substr($number, 0, 3);
         $suffix = str_replace($first_prefix_3_numbers,'',$number);
         $destination = "";
         foreach ($getData as $data){
             if(in_array($first_prefix_3_numbers,$data)){
                 $destination = $data[1];
             }
             $trail_number = substr($data[2], 0, 7);
             if($trail_number){
                 if($first_prefix_3_numbers.$suffix == $trail_number){
                     $destination = $data[1];
                 }
             }
         }
         return $destination;
     }

    /**
     * @param $number
     * @return string
     */
     public static function changeDestination($number){
         try{

             if(strlen($number) == 10){

                 //check if number ends with "0" or "00"
                 $number_last = substr($number, -2);
                 $numbers = [];
                 if($number_last == "00"){
                     // create a block of 10 numbers and the respective prefix map

                     for ($x = 0; $x < 10; $x++){
                         $newNumber = substr_replace($number, $x.$x, -2);
                         array_push($numbers,$newNumber);
                     }

                     $exists = false;
                     $destinationNumbers  = '';
                     //update the block if all numbers exist in a destination
                     foreach ($numbers as $number){
                         $destination = Prefix::getDestination($number);
                         if($destination){
                             $exists = true;
                             $destinationNumbers.= '<div>'.$number.':'.$destination.'</div>';

                         }
                         else{
                             $exists = false;
                             throw new Exception("Doesnt exists, we exiting the application");

                         }

                     }
                     if($exists == true){
                         return $destinationNumbers;
                     }

                 }
                 else{
                     $number_last = substr($number, -1);
                     if($number_last == "0"){
                         // create a block of 10 numbers and the respective prefix map
                         for ($x = 0; $x < 10; $x++){
                             $newNumber = substr_replace($number, $x, -1);
                             array_push($numbers,$newNumber);
                         }
                         $exists = false;
                         $destinationNumbers  = '';
                         //update the block if all numbers exist in a destination
                         foreach ($numbers as $number){
                             $destination = Prefix::getDestination($number);
                             if($destination){
                                 $exists = true;
                                 $destinationNumbers.= '<div>'.$number.':'.$destination.'</div>';

                             }
                             else{
                                 $exists = false;
                                 throw new Exception("Doesnt exists, we exiting the application");

                             }

                         }
                         if($exists == true){
                             return $destinationNumbers;
                         }
                     }
                     else{
                         throw new Exception();
                     }
                 }

             }
             else{
                 throw new Exception("Invalid number");
             }
         }

         catch(Exception $e){
             echo $e->getMessage();
         }
     }

}

