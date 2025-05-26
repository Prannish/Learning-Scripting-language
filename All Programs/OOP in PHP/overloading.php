<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    class myclass
    {
        public function __call($name, $arguments)
        {
            if ($name == 'donothing') {
                if (count($arguments) === 1) {
                    return $this->donothingwithoneparameter($arguments[0]);
                } else if (count($arguments) === 2) {
                    return $this->donothingwithtwoparameter($arguments[0], $arguments[1]);
                } else {
                    throw new InvalidArgumentException('invalid number of arguements');
                }
            }
            throw new BadFunctionCallException("Method{$name} does not exists");
        }
        private function donothingwithoneparameter($param1)
        {
            return "called with one parameter:{$param1}"."<br>";
        }
        private function donothingwithtwoparameter($param1,$param2)
        {
            return "called with two parameters:{$param1} and {$param2}"."<br>";
        }
    }

    $obj = new myclass();
    echo $obj->donothing('hello');
    echo $obj->donothing('hello','world');


    ?>
</body>

</html>