<?php

class CPF {

    function __construct(
        public string $cpf,
    ){
        if(!$this->_validate($this->cpf)){
            throw new Exception('Invalid CPF');
        }
    }

    private function _validate(string $cpf): bool {
        return strlen($cpf) == 11;
    }
}