<?php
/**
 * Created by PhpStorm.
 * User: adriano
 * Date: 04/07/18
 * Time: 23:57
 */

class Grafo
{
    /**
     * @var int
     */
    public $vertices;

    /**
     * @var int
     */
    public $arestas;


    /**
     * Vertice @var
     */
    public $adj = [];


    /**
     * Grafo constructor.
     * @param $vertices
     * @param int $arestas
     */
    public function __construct($vertices, $arestas = 0)
    {
        $this->vertices = $vertices;
        $this->arestas = $arestas;

        $this->adj[] = new Vertice();

        for($i = 0; $i < $this->vertices; $i++){
            $this->adj[$i]->cab = NULL;
        }

        return $this;
    }


    /**
     * @param $vi
     * @param $vf
     * @param $p
     * @return bool
     */
    public function criaAresta($vi, $vf, $p){
        if ($vf < 0 || $vf >= $this->vertices)
            return false;
        if ($vi < 0 || $vi >= $this->vertices)
            return false;

        $novo = new Adjacencia($vf, $p);
        $novo->prox = $this->adj[$vi]->cab;
        $this->adj[$vi]->cab = $novo;

        $this->arestas++;

        return true;
    }


    /**
     *
     */
    public function imprimi(){

        echo "Vértices " . $this->vertices . " Arestas " . $this->arestas;

        echo "<br/>";
        $i = 0;
        for($i; $i < $this->vertices; $i++){
            echo "v" . $i . ": ";
            $ad = $this->adj[$i]->cab;

            while($ad){
                echo "v" . $ad->vertice.  " (" . $ad->peso  . ") ";

                $ad = $ad->prox;
            }

            echo "<br/>";

        }
    }

}