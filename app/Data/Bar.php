<?php 

class Bar
{
    private $foo;


    public function __construct(Foo $foo){
        $this->foo = $foo;
    }

    public function bar(){
        return $this->foo->foo() . " and Bar";
    }
}


?>