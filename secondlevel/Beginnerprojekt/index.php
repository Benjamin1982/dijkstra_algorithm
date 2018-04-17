<?php
require_once('Graph.php');
echo "____________________________________________\n";
echo " Test der Eclipse Umgebung Oxygen March 2018\n";
echo "____________________________________________\n";
echo"  Testdatum: ".date('h:i:s');


$graph = new Graph(1);
$graph->testFunction(16); // initialsiert den Graph mit Nodes 