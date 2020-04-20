<?php


class Prefix
{


    /**
     * string $number
     * returns null
     */
     public static function getDestination($number){

         //strip the first 3 chars prefix
         $first_prefix_3_numbers = substr($number, 0, 3);

         $suffix = str_replace($first_prefix_3_numbers,'',$number);
         if(strlen($suffix) >= 4){

             $number_search = substr($suffix, 0, 4);
             //check the number
             $prefixname = Prefix::getPrefix($first_prefix_3_numbers.$number_search);
         }
         else{
             //check the number
             $prefixname = Prefix::getPrefix($first_prefix_3_numbers);
         }

         if($prefixname){
             return $prefixname->prefix_name;
         }
         else{
             //last try using the first 3 characters
             $prefixname = Prefix::getPrefix($first_prefix_3_numbers);
             if($prefixname){
                 return $prefixname->prefix_name;
             }
             else{
                 echo 'Invalid number';
             }

         }

     }
    /**
     * string $number
     * returns object
     */
     public static function getPrefix($number){

         global $connect_db;

         $sql = "SELECT prefix_name FROM PrefixMap where prefix_number like '$number%'";
         $query = $connect_db->query($sql);
         $results = $query->fetch_object();

         return $results;

     }

    /**
     * string $number
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

