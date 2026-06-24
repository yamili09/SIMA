<?php
namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Usamos groupBy para obtener todos los conteos en UNA sola consulta
        $stats = Vehiculo::select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->pluck('total', 'status');

        // Preparamos los datos asegurando que existan aunque no haya registros
        $data = [
            'total_vehiculos'  => Vehiculo::count(),
            'en_servicio'      => $stats->get('servicio', 0),
            'espera_refaccion' => $stats->get('espera', 0),
            'terminados'       => $stats->get('terminado', 0),
        ];

        return view('home', compact('data'));
    }
}