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

    // split string that contain symbol
    function split_string($str,$identifiers,$constants,$special_symbols) {

        // initialize array as an output
        $str_result = [];

        $splitted_str = str_split($str);

        // initialize temp string
        $temp_str = $splitted_str[0];
        for ($i = 1; $i < sizeof($splitted_str); $i++)
        {
            // check if input string is identifier or constant
            $is_char_before_identifier = in_array($splitted_str[$i-1], $identifiers, TRUE);
            $is_char_now_identifier = in_array($splitted_str[$i], $identifiers, TRUE);
            $is_char_before_constant = in_array($splitted_str[$i-1], $constants, TRUE);
            $is_char_now_constant = in_array($splitted_str[$i], $constants, TRUE);

            $char_before_not_symbol = ($is_char_before_identifier || $is_char_before_constant);
            $char_now_not_symbol = ($is_char_now_identifier || $is_char_now_constant);

            // concate char to new word if it is identifier or constant
            // else if char is a symbol check if it need to be concated to other symbol
            // else push string made to result and make a new string
            if ($char_before_not_symbol == TRUE && $char_now_not_symbol == TRUE) {
                $temp_str .= $splitted_str[$i];
            }
            else if ($char_before_not_symbol == FALSE && $char_now_not_symbol == FALSE) {
                if (in_array($splitted_str[$i],$special_symbols,TRUE)) {
                array_push($str_result, $temp_str);
                $temp_str = $splitted_str[$i];
                } else {
                $temp_str .= $splitted_str[$i];
                }
            }
            else {
                array_push($str_result, $temp_str);
                $temp_str = $splitted_str[$i];
            }

            // add new string to array result if loop end
            if ($i == sizeof($splitted_str)-1) {
                array_push($str_result, $temp_str);
            }

        }

        // return splitted string as an array
        return $str_result;
    }

}

?>