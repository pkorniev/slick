<?php

namespace app\kernel;


class Configuration
{
    private $name;
    private $alias;
    private $layer;
    private $env;
    private $default_controller;
    private $default_action;
    private $db;
    private $params;

    private static function getRequiredVars()
    {
        return [
            'name',
            'alias',
            'layer',
            'env',
            'default_controller',
            'default_action',
            'db',
            'params'
        ];
    }

    public static function init($configuration)
    {
        $config = new self();
        foreach (self::getRequiredVars() as $variableName){
            $config->$variableName = $configuration[$variableName];
        }
        return $config;
    }

    public function __get($name)
    {
        return (isset($this->$name)) ? $this->$name : null;
    }
}