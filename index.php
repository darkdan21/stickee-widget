<?php
$packs = $_GET['packs'];
$order = $_GET['order'];
$errors=array();
if(!is_numeric($order)){
    array_push($errors,"The provided order size is invalid");
}
$vals=explode(",",$packs);
if(array_filter($vals,'is_numeric')!=$vals){
    array_push($errors,"Invalid values given for pack sizes");
}

$results = new results($errors);
if (empty($errors)){
    sort($vals);
    $vals=array_reverse($vals);
    $order=calculate_volume($vals,$order); //get the number that will be delivered
    reset($vals);
    $results->add_results(calculate_packs($vals,$order)); //calculate the number of each pack

}

print_results($results);

function calculate_packs($packs, $order){
    $current = current($packs);
    if($current === FALSE)
    {
        return new results(array());
    } else {
        $return = new results(array());

        $remainder = $order % $current;

        $total = ($order-$remainder)/$current;

        $return->add_packs(array($current.",".$total));

        next($packs);
        $return->add_results(calculate_packs($packs,$remainder));

        return $return;
    }
}

function calculate_volume($packs, $order){
    $current = current($packs);
    if($current === FALSE)
    {
        return 0;
    } else {

        $remainder = $order % $current;

        $total = ($order-$remainder)/$current;

        if(key($packs)==(sizeof($packs)-1)&&$remainder!=0){
            $total++;
        }
        $total*=$current;

        next($packs);

        return $total+calculate_volume($packs, $remainder);
    }
}

function print_results($results){
    echo json_encode($results);
}

class results{
    public $errors=array();
    public $packs=array();
    function __construct($errors){
        $this->errors=$errors;
    }
    function add_results($results){
        $this->packs=array_merge($this->packs,$results->packs);
        $this->errors=array_merge($this->errors,$results->errors);
    }
    function add_errors($errors){
        $this->errors=array_merge($this->errors,$errors);
    }
    function add_packs($packs){
        $this->packs=array_merge($this->packs,$packs);
    }
}

