<?php
require_once('Edge.php');
class Node
{
    // string type
    private $label;
    private $outgoingEdges = []; // Ausgehende Kanten auf Nachbarsknoten
    
    /**
     * @param string $label eindeutige Knoten-ID
     */
    public function __construct($label){
        $this->label = $label;
    }
    
    /**
     * @return string
     */
    function getLabel()
    {
        return $this->label;
    }
    /**
     * Ausgehende Kante auf Nachbarsknoten.
     * @param Edge $edge
     */
    function addOutgoingEdge(Edge $edge)
    {
        $this->outgoingEdges[] = $edge;
    }
    /**
     * @return array
     */
    function getOutgoingEdges()
    {
        return $this->outgoingEdges;
    }
}



