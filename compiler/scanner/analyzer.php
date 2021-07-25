<?php

class Analyzer {

    public $alphabets;
    public $numbers;
    public $keywords;
    public $operators;
    public $special_symbols;

    function __construct($alphabets,$numbers,$keywords,$operators,$special_symbols) {
        $this->alphabets = $alphabets;
        $this->numbers = $numbers;
        $this->keywords = $keywords;
        $this->operators = $operators;
        $this->special_symbols = $special_symbols;
    }

    // check if string contain symbol or not
    function to_be_separated($str) {

        $splitted_str = str_split($str);

        $char_ident_const = 0;
        $char_ope_sym = 0;
        foreach ($splitted_str as $key => $value) {
            $is_identifier = in_array($value,$this->alphabets,TRUE);
            $is_constant = in_array($value,$this->numbers,TRUE);

            if ($is_identifier || $is_constant) {
                $char_ident_const += 1;
            }

            $is_operator = in_array($value,$this->operators,TRUE);
            $is_spec_symb = in_array($value,$this->special_symbols,TRUE);

            if ($is_operator || $is_spec_symb) {
                $char_ope_sym += 1;
            }
        }

        if (strlen($str) == $char_ident_const) { return FALSE; }
        if (strlen($str) == $char_ope_sym) { return FALSE; }

        return TRUE;
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
            $is_char_before_identifier = in_array($splitted_str[$i-1], $this->alphabets, TRUE);
            $is_char_now_identifier = in_array($splitted_str[$i], $this->alphabets, TRUE);
            $is_char_before_constant = in_array($splitted_str[$i-1], $this->numbers, TRUE);
            $is_char_now_constant = in_array($splitted_str[$i], $this->numbers, TRUE);

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
    function categorize_tokens($token,$check_const,$double_quote,$single_quote) {

        // checking constant using keyword const
        if ($check_const == "const") { return "Constant"; }

        if (in_array($token, $this->keywords,TRUE)) { return "Keyword"; }
        if (in_array($token, $this->operators,TRUE)) { return "Operator"; }
        if (in_array($token, $this->special_symbols,TRUE)) { return "Special Symbol"; }

        // checking string after checking operator so the close quote not return string too
        if ($double_quote == 1) { return "String"; }
        if ($single_quote == 1) { return "Char"; }

        // split string to check every character is in identifers or constant array
        $splitted_token = str_split($token);
        $char_identifier = 0;
        $char_number = 0;
        foreach ($splitted_token as &$value) {
            if (in_array($value, $this->alphabets,TRUE)) { $char_identifier += 1; }
            if (in_array($value, $this->numbers,TRUE)) { $char_number += 1; }
        }

        if (strlen($token) == $char_identifier) { return "Identifier"; }
        if (strlen($token) == $char_number) { return "Number"; }
        if (strlen($token) == ($char_identifier+$char_number)) { return "Identifier"; }

        return "Couldn't analyze token";
    }

    // generate tokens as an array from input code
    function generate_tokens($input_code) {
        // split code base on new line
        $text_input = explode("\n", $input_code);

        $token_output = [];
        foreach ($text_input as $key_row => $string_row) {

          $string_splitted = explode(" ", $string_row);
          $temp_arr = [];
          $double_quote = 0;    // initialized for string categorizing
          $single_quote = 0;    // initialized for char categorizing
          foreach ($string_splitted as $key_string => $string) {
            // initialize variable as parameter to check constant
            $check_const = isset($string_splitted[$key_string-2]) ? trim($string_splitted[$key_string-2]) : NULL;

            // check if the string need to be split
            // else add string to temp_arr directly
            $need_split = ($this->to_be_separated($string));
            if ($need_split) {
                // split string then add every new string to temp_arr
                $new_string = $this->split_string($string);
                foreach ($new_string as $key_str => $splitted_str) {
                    // check if the string is not whitespace
                    if (!ctype_space($splitted_str) && strlen($splitted_str) > 0) {
                        // push a new array contain token and its category to temp_array
                        $new_token_arr = [];
                        array_push($new_token_arr,$splitted_str);
                        $token_category = $this->categorize_tokens(trim($splitted_str),
                                                                    $check_const,
                                                                    $double_quote,
                                                                    $single_quote);
                        array_push($new_token_arr,$token_category);
                        array_push($temp_arr, $new_token_arr);

                        // check double quote
                        if ($splitted_str == '"') { $double_quote += 1; }
                        if ($splitted_str == "'") { $single_quote += 1; }
                    }
                }
            } else {
                // check if the string that will be added not whitespace
                if (!ctype_space($string) && strlen($string) > 0) {
                    // push a new array contain token and its category to temp_array
                    $new_token_arr = [];
                    array_push($new_token_arr,$string);
                    $token_category = $this->categorize_tokens(trim($string),
                                                                $check_const,
                                                                $double_quote,
                                                                $single_quote);
                    array_push($new_token_arr,$token_category);
                    array_push($temp_arr, $new_token_arr);

                    // check double quote
                    if ($string == '"') { $double_quote += 1; }
                    if ($string == "'") { $single_quote += 1; }
                }      
            }  
          }
          array_push($token_output, $temp_arr);
        }

        return $token_output;
    }

}

?>