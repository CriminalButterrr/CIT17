<?php

    //CONSTANTS
    echo "CONSTANT <br/>";
    
    //constant() example
    define("MINISIZE", 50);

    echo MINISIZE;
    echo constant("MINISIZE");
    
    //Valid constant names
    define("ONE", "first thing");
    define("TWO2", "second thing");
    define("THREE_3", "third thing");

    //Invalid constant names
    define("2TWO", "second thing");
    define("__THREE__", "third value");

    echo "<br/>Valid constant names: ";
    echo "ONE, TWO2, THREE_3";
    echo "<br/>Inalid constant names: ";
    echo "2TWO, __THREE__";
?>