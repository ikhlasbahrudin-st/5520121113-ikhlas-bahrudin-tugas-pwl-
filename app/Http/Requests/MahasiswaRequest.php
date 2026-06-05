<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MahasiswaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $mahasiswaId = $this->route('mahasiswa') ? $this->route('mahasiswa')->id : null;

        return [
            'nim' => 'required|string|max:20|unique:mahasiswas,nim,' . $mahasiswaId,
            'nama_mahasiswa' => 'required|string|max:255',
            'prodi' => 'required|string|max:255',
            'semester' => 'required|integer|min:1|max:14',
            'email' => 'required|email|unique:mahasiswas,email,' . $mahasiswaId,
            'no_hp' => 'required|string|max:20',
            'alamat' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'nim.required' => 'NIM wajib diisi.',
            'nim.unique' => 'NIM sudah terdaftar.',
            'nama_mahasiswa.required' => 'Nama mahasiswa wajib diisi.',
            'prodi.required' => 'Program studi wajib diisi.',
            'semester.required' => 'Semester wajib diisi.',
            'semester.integer' => 'Semester harus berupa angka.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'no_hp.required' => 'No HP wajib diisi.',
            'alamat.required' => 'Alamat wajib diisi.',
        ];
    }
}
