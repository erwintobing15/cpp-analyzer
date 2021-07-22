<?php

require 'tokens.php';

class Analyzer {

    public $identifiers;
    public $constants;
    public $keywords;
    public $operators;
    public $special_symbols;

    function __construct($identifiers,$constants,$keywords,$operators,$special_symbols) {
        $this->identifiers = $identifiers;
        $this->constants = $constants;
        $this->keywords = $keywords;
        $this->operators = $operators;
        $this->special_symbols = $special_symbols;
    }

}

?>