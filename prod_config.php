<?php
$setting = [
    'driver' => 'mysql',
    'address' => 'localhost',
    'port' => '3306',
    'username' => 'u858375660_spt_arms_admin',
    'password' => '^8AZXLn6T',
    'database' => 'u858375660_spt_arms',
    // 'debug' => false,
    // middlewares 
    'middlewares' => 'dbAuth,authorization,sanitation,validation',
    'dbAuth.mode' => 'optional',//'required'
    'dbAuth.registerUser'=> '1', // enable user registration
    'dbAuth.passwordLength' => '0',
    'authorization.tableHandler' => function ($operation, $tableName) {
        $valid = true;
        if(!array_key_exists('user',$_SESSION) && $operation === 'create' && $tableName === 'students'){
            $valid = true;
        }
        if(!array_key_exists('user',$_SESSION) && $operation === 'create' && $tableName === 'volunteers'){
            $valid = true;
        }
        if(array_key_exists('user',$_SESSION) && $tableName != 'users'){
            
            $valid = true;
        }   
        return true;
    },
    'sanitation.handler' => function ($operation, $tableName, $column, $value) {
        if($tableName == 'users' && $column['name'] == 'password')
            return(password_hash($value,PASSWORD_DEFAULT));
        return is_string($value) ? strip_tags($value) : $value;
    },


    
];