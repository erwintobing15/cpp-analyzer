<?php

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
    function to_be_separated($str) {

        $splitted_str = str_split($str);

        foreach ($splitted_str as $key => $value) {
            $is_identifier = in_array($value,$this->identifiers,TRUE);
            $is_constant = in_array($value,$this->constants,TRUE);

            if (!($is_identifier || $is_constant)) {
                return TRUE;
            }
        }

        return FALSE;
    }

    // split string that contain symbol
    function split_string($str) {

        // initialize array as an output
        $str_result = [];

        $splitted_str = str_split($str);

        // initialize temp string
        $temp_str = $splitted_str[0];
        for ($i = 1; $i < sizeof($splitted_str); $i++)
        {
            // check if input string is identifier or constant
            $is_char_before_identifier = in_array($splitted_str[$i-1], $this->identifiers, TRUE);
            $is_char_now_identifier = in_array($splitted_str[$i], $this->identifiers, TRUE);
            $is_char_before_constant = in_array($splitted_str[$i-1], $this->constants, TRUE);
            $is_char_now_constant = in_array($splitted_str[$i], $this->constants, TRUE);

            $char_before_not_symbol = ($is_char_before_identifier || $is_char_before_constant);
            $char_now_not_symbol = ($is_char_now_identifier || $is_char_now_constant);

            // concate char to new word if it is identifier or constant
            // else if char is a symbol check if it need to be concated to other symbol
            // else push string made to result and make a new string
            if ($char_before_not_symbol == TRUE && $char_now_not_symbol == TRUE) {
                $temp_str .= $splitted_str[$i];
            }
            else if ($char_before_not_symbol == FALSE && $char_now_not_symbol == FALSE) {
                if (in_array($splitted_str[$i],$this->special_symbols,TRUE)) {
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

    // categorize tokens extract from input code
    function categorize_tokens($token) {
        if (in_array($token, $this->identifiers)) { return "Identifier"; }
        if (in_array($token, $this->constants)) { return "Constant"; }
        if (in_array($token, $this->keywords)) { return "Keyword"; }
        if (in_array($token, $this->operators)) { return "Operators"; }
        if (in_array($token, $this->special_symbols)) { return "Special Symbol"; }
    }

    // generate tokens as an array from input code
    function generate_tokens($input_code) {
        // split code base on new line
        $text_input = explode("\n", $input_code);

        $token_output = [];
        foreach ($text_input as $key_row => $string_row) {
          $string_splitted = explode(" ", $string_row);
          $temp_arr = [];
          foreach ($string_splitted as $key_string => $string) {
            // check if the string need to be split
            $need_split = ($this->to_be_separated($string));
            if ($need_split) {
                // split string then add every new string to temp_arr
                $new_string = $this->split_string($string);
                foreach ($new_string as $key_str => $splitted_str) {
                    array_push($temp_arr, $splitted_str);
                }
            } else {
                array_push($temp_arr, $string);
            }  
          }
          array_push($token_output, $temp_arr);
        }

        return $token_output;
    }

}

?>