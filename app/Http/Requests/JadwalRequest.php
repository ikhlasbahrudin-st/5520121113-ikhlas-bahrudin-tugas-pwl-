<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JadwalRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'dosen_id' => 'required|exists:dosens,id',
            'mata_kuliah_id' => 'required|exists:mata_kuliahs,id',
            'hari' => 'required|string|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
            'ruangan' => 'required|string|max:50',
        ];
    }

    public function messages(): array
    {
        return [
            'dosen_id.required' => 'Dosen wajib dipilih.',
            'dosen_id.exists' => 'Dosen tidak ditemukan.',
            'mata_kuliah_id.required' => 'Mata kuliah wajib dipilih.',
            'mata_kuliah_id.exists' => 'Mata kuliah tidak ditemukan.',
            'hari.required' => 'Hari wajib dipilih.',
            'hari.in' => 'Hari tidak valid.',
            'jam_mulai.required' => 'Jam mulai wajib diisi.',
            'jam_selesai.required' => 'Jam selesai wajib diisi.',
            'jam_selesai.after' => 'Jam selesai harus setelah jam mulai.',
            'ruangan.required' => 'Ruangan wajib diisi.',
        ];
    }
}
