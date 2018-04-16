<?php 
/**
    * Gewichtete Kante.
    * Container
    */
   class Edge
   {
      private $destinationNode;
      private $cost;
      
      /**
       * @param Node $destinationNode Ziel der gerichteten Kante.
       * @param number $cost Kosten (Gewicht)
       */
      function __construct(Node $destinationNode, $cost)
      {
         $this->destinationNode = $destinationNode;
         $this->cost = $cost;
      }
      /**
       * @return Node
       */
      function getDestinationNode()
      {
         return $this->destinationNode;
      }
      /**
       * @return number
       */
      function getCost()
      {
         return $this->cost;
      }
   }  

