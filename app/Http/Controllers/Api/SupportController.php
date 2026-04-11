<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\MassageSupport;

class SupportController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email'   => 'nullable|email|max:255',
            'hp'      => 'nullable|string|max:20',
            'message' => 'required|string',
        ]);

        // Simpan ke database
        $support = MassageSupport::create([
            'email'   => $request->email,
            'hp'      => $request->hp,
            'message' => $request->message,
        ]);

        // Format pesan WA
        $pesan = "📩 Pesan Support Baru\n\n";
        $pesan .= "Email: " . ($request->email ?? '-') . "\n";
        $pesan .= "HP: " . ($request->hp ?? '-') . "\n";
        $pesan .= "Pesan:\n" . $request->message;

        // Kirim WhatsApp (fallback ke nomor admin kalau kosong)
        $target = '6288289445437'; // Nomor admin

        $waResult = $this->sendWhatsApp($target, $pesan);

        return response()->json([
            'success' => true,
            'message' => 'Pesan berhasil dikirim & disimpan',
            'data'    => $support,
            'wa'      => $waResult
        ], 200);
    }

    private function sendWhatsApp($nohp, $pesan)
    {
        $url = 'https://app.whacenter.com/api/send';

        // Normalisasi nomor (085 → 6285)
        $nohp = preg_replace('/^0/', '62', $nohp);

        try {
            $response = Http::timeout(10)->asForm()->post($url, [
                'device_id' => env('WHACENTER_DEVICE_ID'),
                'number'    => $nohp,
                'message'   => $pesan,
            ]);

            if ($response->failed()) {
                Log::error('Gagal kirim WA', [
                    'status' => $response->status(),
                    'body'   => $response->body(),
                ]);

                return [
                    'success' => false,
                    'message' => 'Gagal mengirim WhatsApp',
                ];
            }

            return [
                'success' => true,
                'data'    => $response->json(),
            ];

        } catch (\Exception $e) {
            Log::error('Error kirim WA', [
                'error' => $e->getMessage(),
            ]);

            return [
                'success' => false,
                'message' => 'Terjadi error saat mengirim WA',
            ];
        }
    }
}