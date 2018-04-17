<?php 
/*************
 * 
 * @author Benjamin
 * Implementierung des Graphen
 */
require_once('Node.php');

class Graph
{
    private $nodes = array();
    private $BED= false;
    private  $num=0;
    
    // add comment 
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
            $this->addNode('0');//0
            $this->addNode('1');
            $this->addNode('2');
            $this->addNode('3');
            $this->addNode('4');
            $this->addNode('5');
            $this->addNode('6');
            $this->addNode('7');
            $this->addNode('8');
            $this->addNode('9');
            $this->addNode('a');
            $this->addNode('b');
            $this->addNode('c');
            $this->addNode('d');
            $this->addNode('e');
            $this->addNode('f');
            //
            $this->addEdge($this->nodes[0]->getLabel(),$this->nodes[1]->getLabel(),5);
            $this->addEdge($this->nodes[2]->getLabel(),$this->nodes[1]->getLabel(),6);
    }
    /**
    * Neuen Knoten anlegen
    * @param string $label Eindeutige Identifikation mittels Parameter string
    * return void
    */
    public function addNode($label)
    {
        if($this->num  == 1)
           print_r( "\n=================================");
        $this->nodes[$label] = new Node($label);
        $out=$this->nodes[$label]->getLabel( );
        print_r( "           \nneuer  Knoten hinzugefügt: ".$out);
        $this->num++;
        if($this->num == 17)
        print_r( "\n=================================\n");
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
        // Auto fährt am Tag x geradeaus los .... prüfen,
         if(!array_key_exists($startLabel, $this->nodes))
         {
             // a,b,c,d
             throw new Exception('startLabel not exists');
         }
         if(!array_key_exists($destinationLabel, $this->nodes))
         {
             throw new Exception('destinationLabel not exists');
         }
         $this->nodes[$startLabel]->addOutgoingEdge(new Edge($this->nodes[$destinationLabel], $cost));
         echo "\nDurchleben sie eine kante von ".  $this->nodes[$startLabel]->getLabel()." auf ".$this->nodes[$destinationLabel]->getLabel();
         echo "\nMit einem Kantengewicht von (außen) :".$cost;
    }
    
    /**
     * @param string $startLabel Eindeutige ID jenes Knotens, zu dem die Knoten-d-Werte ermittelt werden sollen.
     * @throws Exception Wenn der Startknoten nicht zuvor mittels addNode definiert wurden.
     */
    function dijkstra($startLabel)
    {
        // Array mit Knoten spreizen
        $items = [];                             // Man könnte die Parameter d und pred auch als
        foreach($this->nodes as $label => $node) // Eigenschaften in der Klasse Node aufnehmen.
        {                                        // Das Problem ist jedoch, dass jeder
            $items[$label] =                      // Graph-Algorithmus andere Parameter benötigt.
            [                                     // Node müsste also mit jedem neuen Algorithmus
                'node' => $node,                   // verändert werden (verstößt gegen das
                'd' => INF,                        // never-touch-a-running-system-Prinzip) und
                'predLabel' => null                // würde immer größer werden (Gottes-Klasse).
            ];                                    // Darum gibt es in den Algorithmen statt
        }                                        // dessen einen Warpper um node-Objekte.
        $labels = array_keys($this->nodes);
        
        // 1. Schritt:
        if(!array_key_exists($startLabel, $items))
        {
            throw new Exception('startLabel not exists');
        }

        $items[$startLabel]['d'] = 0;
        
        // alle weiteren Schritte:
        while(count($labels) > 0)
        {
            // Den Knoten mit dem kleinsten D aus $labels extrahieren:
            $minDItem = null;
            foreach($labels as $label)
            {
                if
                (
                    $minDItem === null ||
                    $items[$label]['d'] < $minDItem['d']
                    )
                {
                    $minDItem = $items[$label];
                }
            }
            $minDItemLabel = $minDItem['node']->getLabel();
            $labels = array_diff($labels, [$minDItemLabel]);
            
            // Nachbarsknoten von $minDItem:
            foreach($minDItem['node']->getOutgoingEdges() as $edge)
            {
                // Nachbarsknoten von $minDItem, die sich noch in $labels befinden:
                $minDNeighbourLabel = $edge->getDestinationNode()->getLabel();
                if(in_array($minDNeighbourLabel, $labels))
                {
                    $minDNeighbourItem = &$items[$minDNeighbourLabel];
                    $d = $minDItem['d'] + $edge->getCost();    // Knotenkosten + Kantenkosten zum Nachbarsknoten
                    if                                         // Bei extrem hohen Werten kann d auch INF werden. Auch
                    (                                          // in diesem Fall gibt es eine Verbindung zwischen den
                        is_infinite($minDNeighbourItem['d']) || // Knoten. Da INF < INF jedoch false liefert, muss hier
                        $d < $minDNeighbourItem['d']            // extra noch auf is_infinite kontrolliert werden.
                        )
                    {
                        $minDNeighbourItem['d'] = $d;
                        $minDNeighbourItem['predLabel'] = $minDItemLabel;
                    }
                }
            }
       }
        print_r($items);
        // Macht man mehrere Abfragen mit unterschiedlichen Zielknoten, jedoch immer mit
        // gleichem Startknoten, muss man diese Methode nicht immer wieder neu aufrufen.
        // Dann reicht es, von den Knoten einen Snapshot zu machen und diesen einem
        // eigenen Objekt zu übergeben:
        return new Dijkstra ($startLabel, $items);
    }
}