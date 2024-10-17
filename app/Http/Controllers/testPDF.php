<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use mikehaertl\pdftk\Pdf;

class testPDF extends Controller
{
    public function generarPDF($id)
    {
        // Buscar el reporte en la base de datos por ID
        $reporte = Reporte::find($id);

        if (!$reporte) {
            return response()->json(['error' => 'Reporte no encontrado'], 404);
        }

        // Convertir los datos del reporte en un array
        $datos = $reporte->toArray();

        // Ruta del PDF original y del PDF temporal
        $rutaPdfOriginal = public_path('report/reporte.pdf');
        $rutaPdfSalidaTemporal = public_path('report/reporte_debug.pdf');

        try {
            // Crear una instancia de Pdf y rellenar el formulario
            $pdf = new Pdf($rutaPdfOriginal);
            $pdf->fillForm($datos)->needAppearances();

            // Guardar el PDF temporalmente para verificar si se genera correctamente
            if (!$pdf->saveAs($rutaPdfSalidaTemporal)) {
                Log::error('Error al generar PDF: ' . $pdf->getError());
                throw new \Exception($pdf->getError());
            }

            // Leer el contenido del PDF desde el archivo temporal
            $pdfContent = file_get_contents($rutaPdfSalidaTemporal);

            // Limpiar buffers antes de enviar la respuesta
            if (ob_get_length()) {
                ob_end_clean();
            }

            // Establecer las cabeceras HTTP adecuadas
            return response($pdfContent)
                ->header('Content-Type', 'application/pdf')
                ->header('Content-Disposition', 'inline; filename="reporte_llenado.pdf"')
                ->header('Content-Transfer-Encoding', 'binary')
                ->header('Accept-Ranges', 'bytes')
                ->header('Content-Length', strlen($pdfContent));
        } catch (\Exception $e) {
            // Registrar cualquier error en los logs
            Log::error('Error al generar PDF: ' . $e->getMessage());

            // Devolver un error JSON si ocurre algún problema
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
