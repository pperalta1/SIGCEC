<?php
require_once '../src/CitaManager.php';

$citas = new CitaManager();

$citas->agregarCita("Juan Perez", "2025-12-15", "10:30");
$citas->agregarCita("Ana Gomez", "2025-12-16", "11:00");

print_r($citas->listarCitas());
