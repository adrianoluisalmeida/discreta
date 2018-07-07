<?php
/**
 * Created by PhpStorm.
 * User: adriano
 * Date: 07/07/18
 * Time: 10:45
 */

class Dijkstra
{

    public $d;
    private $p;
    private $s;


    /**
     * @param $g
     * @param $s
     * @return mixed
     */
    public function funDijkstra($g, $s)
    {
        $this->d[$g->vertices];

        $this->p[$g->vertices];

        $aberto[$g->vertices] = [];

        $this->InicializaD($g, $this->d, $this->p, $s);

        $i = 0;
        for ($i; $i<$g->vertices; $i++)
            $aberto[$i] = true;


        while($this->existeAberto($g, $aberto)){
            $u = $this->menorDis($g, $aberto, $this->d);

            $aberto[$u] = false;

            $ad = $g->adj[$u]->cab;



            while($ad){
                $this->relaxa($g, $this->d, $this->p, $u, $ad->vertice);
                $ad = $ad->prox;
            }


        }

        return $this->d;
    }



    /**
     * @param Grafo $g
     * @param array $aberto
     * @return bool
     */

    public function existeAberto($g, $aberto = array()){
        $i = 0;
        for($i; $i<$g->vertices; $i++){
            if($aberto[$i])
                return true;


            return false;
        }

    }

    /**
     * @param Grafo $g
     * @param array $aberto
     * @param array $this->d
     * @return int
     */
    public function menorDis($g, $aberto = array(), $d = array())
    {
        $i = 0;

        for ($i; $i < $g->vertices; $i++){
            if ($aberto[$i]) {
                break;
            }
        }

        if($i == $g->vertices)
            return -1;

        $menor = $i;

        for($i = $menor+1; $i<$g->vertices; $i++)
            if($aberto[$i] && ($this->d[$menor] > $this->d[$i]))
                $menor = $i;

        //$adj =  $g->adj[$menor]->cab;
        //$this->d[$menor] =  $adj->peso;


        return $menor;
    }




    public function InicializaD($g, $d, $p, $s){
        $v = 0;
        for($v; $v < $g->vertices; $v++){
            $this->d[$v] = PHP_INT_MAX / 2;
            $this->p[$v] = -1;
        }

        $this->d[$s] = 0;

    }


    /**
     * @param $g Grafo
     * @param $d Int
     * @param $p Int
     * @param $u Int
     * @param $v Int
     */
    public function relaxa($g, $d, $p, $u, $v){
        $ad = $g->adj[$u]->cab;
        while ($ad && $ad->vertice != $v)
            $ad = $ad->prox;


        if($ad){
            if($this->d[$v] > $this->d[$u] + $ad->peso){
                $this->d[$v] = $this->d[$u] + $ad->peso;
                $this->p[$v] = $u;
            }
        }
    }
}