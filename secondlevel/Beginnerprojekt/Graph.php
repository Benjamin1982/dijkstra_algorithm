<?php 
/*************
 * 
 * @author Benjamin
 * Implementierung des Grafen
 */
require_once('Node.php');

class Graph
{
    private $nodes = array();
    private $BED= false;
    private  $num=0;
    
    function initPushAndPop()
    {
        echo " Aufruf der Funktion / Call to function [initPushAndPop]";
        if($this->BED){ echo "\nProzedur abgebrochen!";
            return;
        }
        echo "\nAufruf der func. initP&P\n";
        echo "Push:\n";
        array_push ( $this->nodes,'Knoten 31' )   ;
        array_push ( $this->nodes,'Knoten 32' )   ;
        array_push ( $this->nodes,'Knoten 33' )   ;
        foreach ($this->nodes as $node)
            echo $node."\n";    
            echo "Pop:\n";
        unset ($this->nodes[0]);
        unset ($this->nodes[1]);
        unset ($this->nodes[2]);
       
        
        foreach ($this->nodes as $node)
            echo $node->getLabel()."\n"; 
    }
    
    function __construct( $lab )
    {
        echo "\nEin Graph mit Index-Nr. = ".$lab." wird erzeugt.\n";
        $this->initPushAndPop( );
        
        //zahl sichern:
        $this->num = $lab;
    }
    
    
    public function testFunction($t)
    {
    echo "Aufbau des Graphen ...";
            $this->addNode('');
            $this->addNode('');
            $this->addNode('');
            $this->addNode('');
            $this->addNode('');
    }
    /**
    * Neuen Knoten anlegen
    * @param string $label Eindeutige Identifikation mittels Parameter string
    * return void
    */
    public function addNode($label)
    {
        if($this->num  == 1)
           print_r( "\nx=================================");
        $this->nodes[$label] = new Node($label);
        $out=$this->nodes[$label]->getLabel( );
        print_r( "           \nneuer  Knoten hinzugefügt: ".$out);
        $this->num++;
        if($this->num == 6)
        print_r( "\ny=================================\n");
    }
    
    /**
     * Neue Kante anlegen.
     * @param string $startLabel eindeutige ID des Startknotens
     * @param string $destinationLabel eindeutige ID des Zielknotens
     * @param number $cost >= 0 Kosten (Gewicht)
     * @throws Exception Wenn Start- oder Zielknoten nicht zuvor mittels addNode definiert wurden.
     */
   
    public function addEdge($startLabel, $destinationLabel, $cost)
    {
        // Auto fährt am Tag x geradeaus los ....
       
    }
}