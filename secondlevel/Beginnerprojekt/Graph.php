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
    
    function initPushAndPop()
    {
        echo "  Aufruf Funktion / Call to function [initPushAndPop]";
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
        $this->initPushAndPop( );
        
        //
    }
    
    
    public function testFunction($t)
    {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            $this->addNode('Labello');
=======
        echo "gruene Ideen schlafen heftig!";
>>>>>>> parent of 368cfa7... Alice und Bob
=======
        echo "gruene Ideen schlafen heftig!";
>>>>>>> parent of 368cfa7... Alice und Bob
=======
        echo "gruene Ideen schlafen heftig!";
>>>>>>> parent of 368cfa7... Alice und Bob
    }
    /**
    * Neuen Knoten anlegen
    * @param string $label Eindeutige Identifikation mittels Parameter string
    * return void
    */
    public function addNode($label)
    {
        $this->nodes[$label] = new Node($label);
    }

    /**
     * Neue Kante anlegen.
     * @param string $startLabel eindeutige ID des Startknotens
     * @param string $destinationLabel eindeutige ID des Zielknotens
     * @param number $cost >= 0 Kosten (Gewicht)
     * @throws Exception Wenn Start- oder Zielknoten nicht zuvor mittels addNode definiert wurden.
     */
    /*
    public function addEdge($startLabel, $destinationLabel, $cost)
    {
        // Auto fährt am Tag x geradeaus los ....
        try {
            
        }
        catch(Exception i)
        {
            
        }
    }*/
}