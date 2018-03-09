<?php 
$persons_info = [
                  "Samith" =>
                              [
                                 "Physics" => 70,
                                 "Chemistry" => 30,
                                 "Math" => 50,
                                 "Biology" => 90,
                                 "English" => 54,
                              ],
                 "Photon" =>
                              [
                                 "Physics" => 10,
                                 "Chemistry" => 40,
                                 "Math" => 20,
                                 "Biology" => 80,
                                 "English" => 70,
                              ],
                 "Erfan" =>
                              [
                                 "Physics" => 100,
                                 "Chemistry" => 49,
                                 "Math" => 83,
                                 "Biology" => 76,
                                 "English" => 23,
                              ],
                ];

foreach ($persons_info as $person_info => $subjects){
            echo "<strong>".$person_info."</strong><br/>";
            foreach($subjects as $subject => $score){
           	    echo $subject.": ".$score."<br/>";
           }
	   }
?>