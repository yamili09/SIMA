<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistroMaestroController extends Controller
{
    // POST: Recibir y procesar los datos de un cliente y su vehículo asignado
    public function storeCliente(Request $request) 
    {
        // almacenamiento exitoso en BD
        return response()->json([
            'success' => true, 
            'message' => 'Propietario y datos del vehículo vinculados correctamente.'
        ]);
    }

    // GET: Obtener el catálogo de mecánicos para las tarjetas de asignación
    public function getMecanicos() 
    {
        return response()->json([
            [
                'id' => 101, 
                'nombre' => 'Juan Pérez', 
                'especialidad' => 'Sistemas Eléctricos', 
                'status' => 'Disponible', 
                'color' => '#10b981'
            ],
            [
                'id' => 102, 
                'nombre' => 'Mario Martínez', 
                'especialidad' => 'Mecánica de Motores', 
                'status' => 'Ocupado', 
                'color' => '#f59e0b'
            ]
        ]);
    }

    // POST: Crear un nuevo mecánico técnico en el sistema
    public function storeMecanico(Request $request) 
    {
        // Simula la recepción de datos y un archivo de imagen multimedia
        return response()->json([
            'success' => true, 
            'message' => 'Nuevo mecánico registrado con éxito en el catálogo operativo.'
        ]);
    }
}