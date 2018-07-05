<?php

require "Adjacencia.php";
require "Grafo.php";
require "Vertice.php";

$gr = new Grafo(5);

$gr->criaAresta(0, 1, 2);
$gr->criaAresta(1, 2, 4);
$gr->criaAresta(2, 0, 12);
$gr->criaAresta(2, 4, 40);
$gr->criaAresta(3, 1, 3);
$gr->criaAresta(4, 3, 8);

$gr->imprimi();

