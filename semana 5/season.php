<?php

// Inicio de sesión
session_start();

// Libros disponibles en la tienda
$books = array(
  array("id" => 1, "title" => "Libro 1", "price" => 20),
  array("id" => 2, "title" => "Libro 2", "price" => 15),
  array("id" => 3, "title" => "Libro 3", "price" => 25),
  array("id" => 4, "title" => "Libro 4", "price" => 30),
  array("id" => 5, "title" => "Libro 5", "price" => 35)
);

// Si el carrito de compra no existe en la sesión, se crea
if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = array();
}

// Agregar un libro al carrito
if (isset($_GET['add'])) {
  $id = intval($_GET['add']);
  if ($id > 0 && $id <= count($books)) {
    $_SESSION['cart'][] = $books[$id - 1];
  }
}

// Eliminar un libro del carrito
if (isset($_GET['remove'])) {
  $id = intval($_GET['remove']);
  if ($id > 0 && $id <= count($_SESSION['cart'])) {
    unset($_SESSION['cart'][$id - 1]);
  }
}

// Cálculo del precio total de los libros en el carrito
$total = 0;
foreach ($_SESSION['cart'] as $book) {
  $total += $book['price'];
}

// Mostrar la tienda y el carrito de compra
?>

<h2>Tienda de libros</h2>

<table>
  <tr>
    <th>Título</th>
    <th>Precio</th>
    <th>Acción</th>
  </tr>
  <?php
  foreach ($books as $id => $book) {
    echo "<tr>\n";
    echo "  <td>" . $book['title'] . "</td>\n";
    echo "  <td>" . $book['price'] . "</td>\n";
    echo "  <td><a href='?add=" . ($id + 1) . "'>Agregar al carrito</a></td>\n";
    echo "</tr>\n";
  }
  ?>
</table>

<h2>Carrito de compra</h2>

<table>
  <tr>
    <th>Título</th>
    <th>Precio</th>
    </tr>
  <?php
  foreach ($_SESSION['cart'] as $id => $book) {
    echo "<tr>\n";
    echo "  <td>" . $book['title'] . "</td>\n";
    echo "  <td>" . $book['price'] . "</td>\n";
    echo "  <td><a href='?remove=" . ($id + 1) . "'>Eliminar</a></td>\n";
    echo "</tr>\n";
  }
  ?>
</table>

<p>Precio total: <?php echo $total; ?></p>

