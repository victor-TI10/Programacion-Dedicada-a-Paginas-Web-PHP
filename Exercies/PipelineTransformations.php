<?php

declare(strict_types=1);

$productos = [
    ["nombre" => "Laptop",    "precio" => 15000, "stock" => 5,  "categoria" => "electronica"],
    ["nombre" => "Camiseta",  "precio" => 350,   "stock" => 0,  "categoria" => "ropa"],
    ["nombre" => "Monitor",   "precio" => 5000,  "stock" => 3,  "categoria" => "electronica"],
    ["nombre" => "Pantalon",  "precio" => 800,   "stock" => 12, "categoria" => "ropa"],
    ["nombre" => "Teclado",   "precio" => 1200,  "stock" => 0,  "categoria" => "electronica"],
    ["nombre" => "Zapatos",   "precio" => 1500,  "stock" => 7,  "categoria" => "ropa"],
];

// Paso 1 — Filtrar solo los que tienen stock
$conStock = array_filter(
    $productos,
    fn(array $p): bool => $p["stock"] > 0
);

// Paso 2 — Aplicar 10% de descuento a cada precio
$conDescuento = array_map(function(array $p): array {
    $p["precio_original"] = $p["precio"];
    $p["precio"]          = $p["precio"] * 0.90;
    return $p;
}, $conStock);

// Paso 3 — Ordenar de menor a mayor precio
usort($conDescuento, fn(array $a, array $b): float => $a["precio"] - $b["precio"]);

// Paso 4 — Calcular el total del inventario
$totalInventario = array_reduce(
    $conDescuento,
    fn(float $total, array $p): float => $total + ($p["precio"] * $p["stock"]),
    0
);

// Paso 5 — Mostrar resultados
echo "===== PRODUCTOS CON STOCK ===== \n\n";

foreach ($conDescuento as $producto) {
    [$nombre, $precio, $original, $stock] = [
        $producto["nombre"],
        $producto["precio"],
        $producto["precio_original"],
        $producto["stock"],
    ];

    echo "{$nombre} | Antes: \${$original} | Ahora: \${$precio} | Stock: {$stock} \n\n" ;
}

echo "Total inventario: $" . number_format($totalInventario, 1) ."\n\n";
?>