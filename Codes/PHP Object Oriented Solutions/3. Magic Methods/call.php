<?php 
class MagicCall{
  public function __call($functionName, $arguments){
    if($functionName == "superman"):
        $argNum  = count($arguments);
        switch($argNum):
        case 1:
          echo "Argument: ".$arguments[0]."<br/>";
        break;

        case 2:
          echo "Argument: $arguments[0] $arguments[1] <br/>";
        break;

        default: echo "No more arguments please!";
        endswitch;
    endif; 
  }
}

$magic = new MagicCall();
$magic->superman("I can fly so high!");
$magic->superman("I can fly so high!", "My Laser can destroy!");
$magic->superman("I can fly so high!", "My Laser can destroy!", "Boom");
echo "<br/>";
echo "<br/>";


class MagicCaller{
  public function __call($functionName, $argument){
    if($functionName == "batman"):
      return call_user_func_array([$this, $functionName], $argument);
    endif;
  }

  function batman($argument){
    echo "$argument[0] $argument[1]!<br/>";
  }
}

$magical = new MagicCaller();
$magical->batman(["I have a batarang!", "Where is my bat mobile?"]);
?>