<?php
// Ejercicio 1
$arreglo = [
    'keyStr1' => 'lado',
	0 => 'ledo',
	'keyStr2' => 'lido',
	1 => 'lodo',
	2 => 'ludo'
];

echo <<<EAT
<h3>Ejercicio 1</h3>
EAT;
echo "$arreglo[keyStr1], $arreglo[0], $arreglo[keyStr2], $arreglo[1], $arreglo[2]<br>";
echo "decirlo al revés lo dudo<br> ";
echo "$arreglo[2], $arreglo[1], $arreglo[keyStr2], $arreglo[0], $arreglo[keyStr1]<br>";
echo "¡Qué trabajo me ha costado!";
echo "<br/>";
echo "<hr>";


// Ejercicio 2
$ejercicio2 = [
  'Colombia' => [
    'Sibaté', 'Fusagasugá', 'Barranquilla'
  ],
    'Mexico' => [
      'Monterrey', 'Queretaro', 'Guadalajara'
    ],
    'Perú' => [
      'Lima', 'Arequipa', 'Cuzco'
    ],
    'Argentina' => [
      'Buenos Aires', 'Rosario', 'Mar de Plata'
    ],
    'Venezuela' => [
      'Caracas', 'Valencia', 'Maracay'
    ]
  ];

echo "<h3>Ejercicio 2</h3>";

foreach ($ejercicio2 as $pais => $ciudades) {
	echo "<br><strong>$pais</strong> de tiene ciudades como :<br/><ul>";
	foreach ($ciudades as $valor){

		echo "<li>$valor</li> ";
	}
  echo "</ul>";
}
echo "<br>";
echo "<hr>";

// Ejercicio 3

echo "<h3>Ejercicio 3</h3>";

$ejercicio3 = [23, 54, 32, 67, 34, 78, 98, 56, 21, 34, 57, 92, 12, 5, 61];
rsort($ejercicio3); // Acomoda el arrego de mayor a menor
echo "<br>";
echo "Los tres valores más altos son: ";
for ($i=0; $i < 3; $i++) {
	echo "$ejercicio3[$i] ";
}
echo "<br>";
echo "Los tres valores más bajos son: ";
//var_dump($ejercicio3);
$numeros=count($ejercicio3);
for ($i=$numeros; $i >= ($numeros - 3); $i--) {
	echo "$ejercicio3[$i] ";
}
