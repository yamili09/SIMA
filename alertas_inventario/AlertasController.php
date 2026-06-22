<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlertasController extends Controller
{
    // Método para verificar stock y generar alerta
    public function verificarStock()
    {
        // Simulamos una consulta de inventario
        $productosBajos = [
            'Producto A' => 2,
            'Producto B' => 0
        ];

        return response()->json([
            'mensaje' => 'Verificación de stock realizada',
            'alertas' => $productosBajos
        ]);
    }
}