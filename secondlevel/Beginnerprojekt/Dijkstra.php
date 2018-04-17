<?php

class Dijkstra
{
    private $startLabel;
    private $items;
    
    /**
     * @param string $startLabel Eindeutige ID jenes Knotens, zu dem die $items ermittelt wurden.
     * @param array $items
     */
    function __construct($startLabel, array $items)
    {
        $this->startLabel = $startLabel;
        $this->items = $items;
    }
    /**
     * @param string $destinationLabel Eindeutige ID jenes Knotens, zu dem der küzeste Pfad gefunden werden soll.
     * @return null|array Nodes
     *    null, falls der Zielknoten vom Startknoten aus nicht erreichbar ist.
     */
    function getShortestPathTo($label)
    {
        // was passiert wenn label nicht existiert?
        $node = $this->items[$label]['node']; // Zielknoten
        $nodes = [$node];
        while($label = $this->items[$label]['predLabel'])
        {
            $node = $this->items[$label]['node'];
            array_unshift($nodes, $node); // Knoten vorne einfügen
        }
        if($node->getLabel() != $this->startLabel) // Kontrolle, ob Startknoten erreicht
        {
            return null;
        }
        return $nodes;
    }
}  

