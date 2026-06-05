<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KrsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'mahasiswa_id' => 'required|exists:mahasiswas,id',
            'mata_kuliah_id' => 'required|exists:mata_kuliahs,id',
            'tahun_akademik' => 'required|string|max:20',
            'semester' => 'required|integer|min:1|max:14',
        ];
    }

    public function messages(): array
    {
        return [
            'mahasiswa_id.required' => 'Mahasiswa wajib dipilih.',
            'mahasiswa_id.exists' => 'Mahasiswa tidak ditemukan.',
            'mata_kuliah_id.required' => 'Mata kuliah wajib dipilih.',
            'mata_kuliah_id.exists' => 'Mata kuliah tidak ditemukan.',
            'tahun_akademik.required' => 'Tahun akademik wajib diisi.',
            'semester.required' => 'Semester wajib diisi.',
        ];
    }
}
