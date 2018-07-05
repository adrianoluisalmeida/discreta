<?php
/**
 * Created by PhpStorm.
 * User: adriano
 * Date: 04/07/18
 * Time: 23:56
 */

class Adjacencia
{


    /**
     * @var INT
     */
    public $vertice;

    /**
     * @var INT
     */
    public $peso;

    /**
     * Adjacencia
     */
    public $prox;


    /**
     * Adjacencia constructor.
     * @param $v
     * @param $peso
     * @param null $prox
     */
    public function __construct($v, $peso, $prox = NULL)
    {
        $this->vertice = $v;
        $this->peso = $peso;
        $this->prox = $prox;

        return $this;
    }

}