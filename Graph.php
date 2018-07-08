<?php
/**
 * Created by PhpStorm.
 * User: adriano
 * Date: 07/07/18
 * Time: 10:45
 */
 
class Graph
{
    private $nodes = [];
    private $total_cost = 0;

    public function __construct()
    {
        $this->nodes = [];
        $this->total_cost = 0;
    }

    public static function create(): Graph
    {
        return new Graph();
    }

    /**
     * adicione borda
     * @param string $a Node A
     * @param string $b Node B
     * @param int|float $distance distância
     * @return Graph
     */
    public function add(string $a, string $b, $distance): Graph
    {
        if (!is_numeric($distance)) {
            return false;
        }
        $distance = floatval($distance);
        $this->total_cost += $distance;
        $this->nodes[$a][$b] = $distance;
        $this->nodes[$b][$a] = $distance;
        return $this;
    }

    /**
     * remover borda
     * @param  string $a Node A
     * @param  string $b Node B
     * @return Graph
     */
    public function remove(string $a, string $b): Graph
    {
        if (isset($this->nodes[$a][$b])) {
            unset($this->nodes[$a][$b]);
            unset($this->nodes[$b][$a]);
        }
        return $this;
    }

    /**
     * obter lista de nós
     * @return array node list
     */
    public function getNodes(): array
    {
        return $this->nodes;
    }

    /**
     * calcular o custo da rota
     * @param  array $route
     * @return float
     */
    public function cost(array $route): float
    {
        $result = 0;
        if (count($route) > 0) {
            $num = count($route) - 1;
            for ($i = 0; $i < $num; $i++) {
                if (!isset($this->nodes[$route[$i]][$route[$i + 1]])) {
                        throw new \UnexpectedValueException("borda de {$route[$i]} para {$route[$i+1]} não existe");
                }
                $result += $this->nodes[$route[$i]][$route[$i + 1]];
            }
        }
        return floatval($result);
    }

    /**
     * rota de pesquisa
     * @param  string $from node name
     * @param  string $to node name
     * @return array node list
     */
    public function search(string $from, string $to): array
    {
        if (!isset($this->nodes[$from]) || !isset($this->nodes[$to])) {
            throw new \UnexpectedValueException("nó {$from} ou nó {$to} não existe");
        }
        // inicialização
        $nodes = array_keys($this->nodes);
        $distance = [];
        $parent = [];
        $visit = [];
        foreach ($this->nodes as $key => $value) {
            $distance[$key] = $this->total_cost + 1;
        }
        $distance[$from] = 0;
        // definir o nó inicial
        foreach ($this->nodes as $key => $val) {
            $parent[$key] = null;
        }
        foreach ($this->nodes[$from] as $key => $val) {
            $distance[$key] = $this->nodes[$from][$key];
            $parent[$key] = $from;
        }
        $visit[] = $from;
        // pesquisar rota mais curta
        for (; ;) {
            $min_distance = $this->total_cost + 1;
            $node = null;
            foreach (array_diff($nodes, $visit) as $key) {
                if ($distance[$key] < $min_distance) {
                    $node = $key;
                    $min_distance = $distance[$key];
                }
            }
            if ($node === $to) {
                break;
            } elseif (is_null($node)) {
                throw new \UnexpectedValueException("caminho de {$from} para {$to} não existe");
            }
            foreach (array_diff(array_keys($this->nodes[$node]), $visit) as $key) {
                if ($distance[$key] > $distance[$node] + $this->nodes[$node][$key]) {
                    $distance[$key] = $distance[$node] + $this->nodes[$node][$key];
                    $parent[$key] = $node;
                }
            }
            $visit[] = $node;
        }
        $result = [];
        for (; ;) {
            $result[] = $node;
            if ($node === $from) {
                break;
            }
            $node = $parent[$node];
        }
        return array_reverse($result);
    }
}
