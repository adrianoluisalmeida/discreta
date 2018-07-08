<?php

$graph = Graph::create();

$graph
    ->add('Rio Grande do Sul', 'Santa Catarina', 1)
    ->add('Santa Catarina', 'Paraná', 2)
    ->add('Paraná', 'Mato Grosso do Sul', 2)
    ->add('Mato Grosso do Sul', 'Goiás', 2)
    ->add('Paraná', 'São Paulo', 4)
    ->add('São Paulo', 'Rio de Janeiro', 2)
    ->add('São Paulo', 'Minas Gerais', 5)
    ->add('Minas Gerais', 'Goiás', 2)
    ->add('Rio de Janeiro', 'Minas Gerais', 1)
    ->add('Rio de Janeiro', 'Espírito Santo', 3)
    ->add('Espírito Santo', 'Bahia', 1);

$route = $graph->search('Rio Grande do Sul', 'Goiás'); // ['s', 'b', 'c', 'd', 't']
$cost  = $graph->cost($route);     // 6.0

echo ['route' => $route, 'cost' => $cost];
