<?php

namespace App\Core;

class Field {
    const TYPE_TEXT = 'text';
    const TYPE_PASSWORD = 'password';
    const TYPE_NUMBER = 'number';
    public $type;
    public $attribute;

    public function __construct(string $attribute){
            $this->type = self::TYPE_TEXT;
            $this->attribute = $attribute;
    }

    public function __toString(){
        return sprintf('
        <div class="form-group">
        <label>%s</label>
        <input type="%s" name="%s">
        </div>
        ',
        $this->getLabel($this->attribute),
        $this->type,
        $this->attribute
        );
    }

    public function passwordField(){
        $this->type = self::TYPE_PASSWORD;
        return $this;
    }

    public function labels():array{
        return [
            'firstname' => 'First name',
            'lastname' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'confirmPassword' => 'Confrim Password'
        ];
    }

    public function getLabel($attribute){
        return $this->labels()[$attribute]?? $attribute;

    }

}