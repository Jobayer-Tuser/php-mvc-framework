<?php

namespace Provider\Solid\SingleResponsibility;

class RequestValidation
{
    public function rules()
    {
        return [
            'name' => 'required',
            'phone' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
        ];
    }
}