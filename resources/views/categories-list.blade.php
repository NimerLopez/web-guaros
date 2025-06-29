@extends('admin-dashboard')

@section('title', 'Dashboard')

@section('content')
    <div class="container mt-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Administrar Categorías</h5>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                <i class="fas fa-plus"></i> Agregar Categoría
            </button>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Slug</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>
                                <button class="btn btn-sm btn-warning edit-category" 
                                        data-id="{{ $category->id }}"
                                        data-name="{{ $category->name }}"
                                        data-slug="{{ $category->slug }}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger delete-category" 
                                        data-id="{{ $category->id }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal para agregar categoría -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addCategoryForm" action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addCategoryModalLabel">Agregar Nueva Categoría</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal para editar categoría -->
<div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editCategoryForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editCategoryModalLabel">Editar Categoría</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit_name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="edit_name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_slug" class="form-label">Slug</label>
                        <input type="text" class="form-control" id="edit_slug" name="slug" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal para eliminar categoría -->
<div class="modal fade" id="deleteCategoryModal" tabindex="-1" aria-labelledby="deleteCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="deleteCategoryForm" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteCategoryModalLabel">Confirmar Eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Estás seguro de que deseas eliminar esta categoría? Esta acción no se puede deshacer.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto-generar slug basado en el nombre
    document.getElementById('name').addEventListener('input', function(e) {
        const name = e.target.value;
        document.getElementById('slug').value = generateSlug(name);
    });
    
    document.getElementById('edit_name').addEventListener('input', function(e) {
        const name = e.target.value;
        document.getElementById('edit_slug').value = generateSlug(name);
    });
    
    // Manejar clic en botones de edición
    document.querySelectorAll('.edit-category').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            const name = this.getAttribute('data-name');
            const slug = this.getAttribute('data-slug');
            
            document.getElementById('edit_name').value = name;
            document.getElementById('edit_slug').value = slug;
            
            const form = document.getElementById('editCategoryForm');
            form.action = `/categories/${id}`;
            
            const modal = new bootstrap.Modal(document.getElementById('editCategoryModal'));
            modal.show();
        });
    });
    
    // Manejar clic en botones de eliminación
    document.querySelectorAll('.delete-category').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            
            const form = document.getElementById('deleteCategoryForm');
            form.action = `/categories/${id}`;
            
            const modal = new bootstrap.Modal(document.getElementById('deleteCategoryModal'));
            modal.show();
        });
    });
    
    // Función para generar slug
    function generateSlug(text) {
        return text.toString().toLowerCase()
            .replace(/\s+/g, '-')           // Reemplazar espacios con -
            .replace(/[^\w\-]+/g, '')       // Eliminar caracteres no alfanuméricos
            .replace(/\-\-+/g, '-')          // Reemplazar múltiples - con uno solo
            .replace(/^-+/, '')              // Eliminar - del inicio
            .replace(/-+$/, '');            // Eliminar - del final
    }
});
</script>
@endsection