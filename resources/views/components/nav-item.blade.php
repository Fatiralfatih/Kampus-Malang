<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
        <a href="{{ route('admin.kampus.edit', $kampus->slug) }}" class="nav-link active">
            Edit Kampus
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('admin.fakultas', $kampus->slug) }}" class="nav-link">
            Edit Fakultas
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('admin.jurusan', $kampus->slug) }}" class="nav-link">
            Edit Jurusan
        </a>
    </li>
    <li class="nav-item">
        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
            data-bs-target="#nav-edit-gambar" aria-controls="nav-edit-gambar"
            aria-selected="false">
            Edit Gambar
        </button>
    </li>
</ul>