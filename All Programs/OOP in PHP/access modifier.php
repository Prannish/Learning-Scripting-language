<?php
class Test {
    public $a = "Public";
    private $b = "Private";
    protected $c = "Protected";

    public function showAll() {
        echo "$this->a, $this->b, $this->c";
    }
}

$obj = new Test();
echo $obj->a; // OK
// echo $obj->b; // Error
// echo $obj->c; // Error
$obj->showAll(); // Output: Public, Private, Protected
?>