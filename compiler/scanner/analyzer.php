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

    // check if string contain symbol or not
    function is_contain_symbol($str,$identifiers,$constants) {

        $splitted_str = str_split($str);

        foreach ($splitted_str as $key => $value) {
            $is_identifier = in_array($value,$identifiers,TRUE);
            $is_constant = in_array($value,$constants,TRUE);

            if (!($is_identifier || $is_constant)) {
                return TRUE;
            }
        }

        return FALSE;
    }

}

?>