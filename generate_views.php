<?php
$entities = [
    'dosen' => [
        'title' => 'Dosen',
        'route' => 'dosens',
        'var' => 'dosens',
        'single_var' => 'dosen',
        'fields' => [
            'nidn' => 'NIDN',
            'nama_dosen' => 'Nama Dosen',
            'email' => 'Email',
            'no_hp' => 'No HP',
            'alamat' => 'Alamat'
        ]
    ],
    'mahasiswa' => [
        'title' => 'Mahasiswa',
        'route' => 'mahasiswas',
        'var' => 'mahasiswas',
        'single_var' => 'mahasiswa',
        'fields' => [
            'nim' => 'NIM',
            'nama_mahasiswa' => 'Nama Mahasiswa',
            'prodi' => 'Program Studi',
            'semester' => 'Semester',
            'email' => 'Email',
            'no_hp' => 'No HP',
            'alamat' => 'Alamat'
        ]
    ]
];

foreach ($entities as $folder => $data) {
    if (!is_dir("resources/views/$folder")) {
        mkdir("resources/views/$folder", 0777, true);
    }
    
    // Index
    $index = "@extends('layouts.app')\n@section('title', 'Data {$data['title']}')\n@section('page-title', 'Data {$data['title']}')\n\n@section('content')\n";
    $index .= "<div class=\"card animate-fade-in\">\n";
    $index .= "    <div class=\"card-header bg-white d-flex justify-content-between align-items-center py-3\">\n";
    $index .= "        <h5 class=\"mb-0 fw-bold\"><i class=\"bi bi-list me-2\"></i>Daftar {$data['title']}</h5>\n";
    $index .= "        <a href=\"{{ route('{$data['route']}.create') }}\" class=\"btn btn-primary\"><i class=\"bi bi-plus-lg me-1\"></i> Tambah {$data['title']}</a>\n";
    $index .= "    </div>\n";
    $index .= "    <div class=\"card-body\">\n";
    $index .= "        <div class=\"table-responsive\">\n";
    $index .= "            <table class=\"table table-hover align-middle\">\n";
    $index .= "                <thead class=\"table-light\">\n";
    $index .= "                    <tr>\n";
    $index .= "                        <th>No</th>\n";
    foreach ($data['fields'] as $key => $label) {
        $index .= "                        <th>{$label}</th>\n";
    }
    $index .= "                        <th class=\"text-center\">Aksi</th>\n";
    $index .= "                    </tr>\n";
    $index .= "                </thead>\n";
    $index .= "                <tbody>\n";
    $index .= "                    @forelse(\${$data['var']} as \$index => \$item)\n";
    $index .= "                    <tr>\n";
    $index .= "                        <td>{{ \${$data['var']}->firstItem() + \$index }}</td>\n";
    foreach ($data['fields'] as $key => $label) {
        $index .= "                        <td>{{ \$item->{$key} }}</td>\n";
    }
    $index .= "                        <td class=\"text-center\">\n";
    $index .= "                            <a href=\"{{ route('{$data['route']}.edit', \$item) }}\" class=\"btn btn-sm btn-warning text-white\"><i class=\"bi bi-pencil\"></i></a>\n";
    $index .= "                            <form id=\"delete-form-{{ \$item->id }}\" action=\"{{ route('{$data['route']}.destroy', \$item) }}\" method=\"POST\" class=\"d-inline\">\n";
    $index .= "                                @csrf\n";
    $index .= "                                @method('DELETE')\n";
    $index .= "                                <button type=\"button\" class=\"btn btn-sm btn-danger\" onclick=\"confirmDelete('delete-form-{{ \$item->id }}')\"><i class=\"bi bi-trash\"></i></button>\n";
    $index .= "                            </form>\n";
    $index .= "                        </td>\n";
    $index .= "                    </tr>\n";
    $index .= "                    @empty\n";
    $index .= "                    <tr>\n";
    $index .= "                        <td colspan=\"10\" class=\"text-center py-4 text-muted\">Belum ada data.</td>\n";
    $index .= "                    </tr>\n";
    $index .= "                    @endforelse\n";
    $index .= "                </tbody>\n";
    $index .= "            </table>\n";
    $index .= "        </div>\n";
    $index .= "        <div class=\"d-flex justify-content-end\">{{ \${$data['var']}->links() }}</div>\n";
    $index .= "    </div>\n</div>\n@endsection";
    file_put_contents("resources/views/$folder/index.blade.php", $index);

    // Create
    $create = "@extends('layouts.app')\n@section('title', 'Tambah {$data['title']}')\n@section('page-title', 'Tambah {$data['title']}')\n\n@section('content')\n";
    $create .= "<div class=\"card animate-fade-in\">\n";
    $create .= "    <div class=\"card-body\">\n";
    $create .= "        <form action=\"{{ route('{$data['route']}.store') }}\" method=\"POST\">\n";
    $create .= "            @csrf\n";
    foreach ($data['fields'] as $key => $label) {
        $create .= "            <div class=\"mb-3\">\n";
        $create .= "                <label class=\"form-label\">{$label}</label>\n";
        $create .= "                <input type=\"text\" name=\"{$key}\" class=\"form-control @error('{$key}') is-invalid @enderror\" value=\"{{ old('{$key}') }}\">\n";
        $create .= "                @error('{$key}')<div class=\"invalid-feedback\">{{ \$message }}</div>@enderror\n";
        $create .= "            </div>\n";
    }
    $create .= "            <button type=\"submit\" class=\"btn btn-primary\">Simpan</button>\n";
    $create .= "            <a href=\"{{ route('{$data['route']}.index') }}\" class=\"btn btn-secondary\">Batal</a>\n";
    $create .= "        </form>\n";
    $create .= "    </div>\n</div>\n@endsection";
    file_put_contents("resources/views/$folder/create.blade.php", $create);

    // Edit
    $edit = "@extends('layouts.app')\n@section('title', 'Edit {$data['title']}')\n@section('page-title', 'Edit {$data['title']}')\n\n@section('content')\n";
    $edit .= "<div class=\"card animate-fade-in\">\n";
    $edit .= "    <div class=\"card-body\">\n";
    $edit .= "        <form action=\"{{ route('{$data['route']}.update', \${$data['single_var']}) }}\" method=\"POST\">\n";
    $edit .= "            @csrf @method('PUT')\n";
    foreach ($data['fields'] as $key => $label) {
        $edit .= "            <div class=\"mb-3\">\n";
        $edit .= "                <label class=\"form-label\">{$label}</label>\n";
        $edit .= "                <input type=\"text\" name=\"{$key}\" class=\"form-control @error('{$key}') is-invalid @enderror\" value=\"{{ old('{$key}', \${$data['single_var']}->{$key}) }}\">\n";
        $edit .= "                @error('{$key}')<div class=\"invalid-feedback\">{{ \$message }}</div>@enderror\n";
        $edit .= "            </div>\n";
    }
    $edit .= "            <button type=\"submit\" class=\"btn btn-primary\">Update</button>\n";
    $edit .= "            <a href=\"{{ route('{$data['route']}.index') }}\" class=\"btn btn-secondary\">Batal</a>\n";
    $edit .= "        </form>\n";
    $edit .= "    </div>\n</div>\n@endsection";
    file_put_contents("resources/views/$folder/edit.blade.php", $edit);
}
echo "Done.";
?>
