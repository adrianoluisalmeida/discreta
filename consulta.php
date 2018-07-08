<?php
require "Graph.php";
$graph = Graph::create();


$graph
    ->add('Rio Grande do Sul', 'Santa Catarina', 400)
    ->add('Santa Catarina', 'Paraná', 300)
    ->add('Paraná', 'Mato Grosso do Sul', 160)
    ->add('Paraná', 'São Paulo', 200)
    ->add('São Paulo', 'Rio de Janeiro', 90)
    ->add('Rio de Janeiro', 'Minas Gerais', 400)
    ->add('Rio de Janeiro', 'Espírito Santo', 200)
    ->add('Espírito Santo', 'Bahia', 100)
    ->add('Espírito Santo', 'Minas Gerais', 100)
    ->add('Minas Gerais', 'Goiás', 100)
    ->add('Minas Gerais', 'Distrito Federal', 100)
    ->add('Goiás', 'Tocantins', 100)
    ->add('Distrito Federal', 'Tocantins', 100)
    ->add('Distrito Federal', 'Bahia', 270)
    ->add('Goiás', 'Bahia', 270)
    ->add('Bahia', 'Sergipe', 150)
    ->add('Sergipe', 'Alagoas', 150)
    ->add('Bahia', 'Piauí', 100)
    ->add('Bahia', 'Maranhão', 100)
    ->add('Bahia', 'Tocantins', 300)
    ->add('Tocantins', 'Maranhão', 500)
    ->add('Tocantins', 'Pará', 150)
    ->add('Pará', 'Maranhão', 100)
    ->add('Pará', 'Amapá', 150)
    ->add('Pará', 'Roraima', 100)
    ->add('Tocantins', 'Piauí', 400)
    ->add('Maranhão', 'Piauí', 600)
    ->add('Bahia', 'Alagoas', 300)
    ->add('Alagoas', 'Alagoas', 100)
    ->add('Bahia', 'Pernambuco', 200)
    ->add('Pernambuco', 'Paraíba', 150)
    ->add('Pernambuco', 'Ceará', 300)
    ->add('Pernambuco', 'Piauí', 150)
    ->add('Piauí', 'Ceará', 150)
    ->add('Paraíba', 'Rio Grande do Norte', 700)
    ->add('Paraíba', 'Ceará', 400)
    ->add('São Paulo', 'Mato Grosso do Sul', 200)
    ->add('São Paulo', 'Minas Gerais', 300)
    ->add('Mato Grosso do Sul', 'Goiás', 150)
    ->add('Mato Grosso do Sul', 'Minas Gerais', 150)
    ->add('Mato Grosso do Sul', 'Mato Grosso', 100)
    ->add('Mato Grosso', 'Rondônia', 70)
    ->add('Rondônia', 'Acre', 150)
    ->add('Acre', 'Amazonas', 150)
    ->add('Rondônia', 'Amazonas', 100)
    ->add('Amazonas', 'Roraima', 400)
    ->add('Amazonas', 'Pará', 150)
    ->add('Mato Grosso', 'Amazonas', 100)
    ->add('Mato Grosso', 'Pará', 200)
    ->add('Mato Grosso', 'Tocantins', 150)
    ->add('Mato Grosso', 'Goiás', 100)
    ->add('Mato Grosso', 'Distrito Federal', 100);


$route = $graph->search($_POST['origem'], $_POST['destino']); // ['s', 'b', 'c', 'd', 't']
$cost  = $graph->cost($route);     // 6.0

Header("Location: index.php?origem=" . $_POST['origem'] .  "&destino=".$_POST['destino']."&cost=".$cost."&route=" . implode("->", $route));
