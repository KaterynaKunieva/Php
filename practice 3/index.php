<?php
function printValues($arr) {
    global $count;
    global $values;

    if(!is_array($arr)){
        die("Помилка, це не масив");
    }
    

    foreach($arr as $key=>$value){
        if(is_array($value)){
            printValues($value);
        } else{
            $values[] = $value;
            $count++;
        }
    }

    return array('total' => $count, 'values' => $values);
};
 


$json1 = '{
        "name": "Oleg",
        "surname": "Kaminsky",
        "status": "active",
        "type": "donut",
        "currency": "dollar",
        "commodity": "Cake",
        "toppings": [
            { "id": "5002", "type": "Glazed" },
            { "id": "5006", "type": "Chocolate with Sprinkles" },
            { "id": "5004", "type": "Maple" }
    ]
}';

$arr=json_decode($json1, true);
$result = printValues($arr);
echo "<h3>" . $result["total"] . " value(s) found: </h3>";
echo implode("<br>", $result["values"]);

echo "<hr>";

?>