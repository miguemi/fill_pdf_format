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
        // Buscar el reporte por ID
        $reporte = Reporte::find($id);

        if (!$reporte) {
            return response()->json(['error' => 'Reporte no encontrado'], 404);
        }

        // Convertir los datos del reporte en un array
        $datos = $reporte->toArray();

        // Ruta del PDF original
        $rutaPdfOriginal = public_path('report/reporte.pdf');

        try {
            // Crear una instancia de Pdf y rellenar el formulario
            $pdf = new Pdf($rutaPdfOriginal);
            $pdf->fillForm($datos)->needAppearances();

            // Ejecutar la generación del PDF
            if (!$pdf->execute()) {
                Log::error('Error al generar PDF: ' . $pdf->getError());
                throw new \Exception($pdf->getError());
            }

            // Leer el contenido desde el archivo temporal generado por pdftk
            $tmpFile = (string) $pdf->getTmpFile();
            $pdfContent = file_get_contents($tmpFile);

            if ($pdfContent === false) {
                throw new \Exception('Error al leer el contenido del PDF desde memoria.');
            }

            // Limpiar buffers
            if (ob_get_length()) {
                ob_end_clean();
            }

            // Enviar el PDF como respuesta al navegador
            return response($pdfContent)
                ->header('Content-Type', 'application/pdf')
                ->header('Content-Disposition', 'inline; filename="reporte_llenado.pdf"')
                ->header('Content-Transfer-Encoding', 'binary')
                ->header('Accept-Ranges', 'bytes')
                ->header('Content-Length', strlen($pdfContent));
        } catch (\Exception $e) {
            // Registrar cualquier error en los logs
            Log::error('Error al generar PDF: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
