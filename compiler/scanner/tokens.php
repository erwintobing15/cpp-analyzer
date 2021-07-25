<?php

$alphabets = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r',
                's','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J',
                'K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','_', '.'];

$numbers = ['0','1','2','3','4','5','6','7','8','9','.','E','[',']'];

$keywords = [
    'alignas',	'alignof',	 'asm',	       'auto',	       'bool',	           'break',
    'case',	    'catch',	 'char',	   'char16_t',	   'char32_t',	       'class',
    'const',    'constexpr', 'const_cast', 'continue',	   'decltype',	       'default',
    'delete',	'double',	 'do',	       'dynamic_cast', 'else',	           'enum',
    'explicit',	'export',	 'extern',	   'FALSE',	       'float',	           'for',
    'friend',	'goto',	     'if',	       'include',      'inline',	       'int',	           
    'long',     'mutable',	 'namespace',  'new',	       'noexcept',	       'nullptr',	       
    'operator', 'private',	 'protected',  'public',	   'register',	       'reinterpret_cast', 
    'return',   'short',	 'signed',	   'sizeof',	   'static',	       'static_assert',	   
    'static_cast',           'struct',	   'switch',	   'template',         'this',	       
    'thread_local',	         'throw',      'TRUE',	       'try',	           'typedef',	   
    'typeid',	 'typename', 'union',      'unsigned',	   'using',	           'virtual',    
    'void',	     'volatile', 'wchar_t',    'while',    
];

$operators = [
    '+',    '-',    '*',    '/',    '%',    '++',   '--',   '=',    '+=',   '-=',
    '*=',   '/=',   '%=',   '==',   '!=',   '<',    '>',    '<=',   '>=',   '&&',
    '||',   '!',    '&',    '|',    '^',    '~',    '<<',   '>>',   '.',    '?:',
    '->'
];

$special_symbols = [
    '[',   ']',    '(',    ')',    '{',   '}',  "'",     
    ',',    ':',    ';',   '*',    '#',    '//',    '"'          
];

$special_case = [
    '()'
];

?>