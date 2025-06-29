@extends('admin-dashboard')

@section('title', 'Dashboard')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Administrar Productos</h5>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
                <i class="fas fa-plus"></i> Agregar Producto
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
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Categoría</th>
                            <th>Stock</th>
                            <th>Destacado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>
                                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" width="50" class="img-thumbnail">
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>${{ number_format($product->price, 2) }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>
                                @if($product->is_featured)
                                    <span class="badge bg-success">Sí</span>
                                @else
                                    <span class="badge bg-secondary">No</span>
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-sm btn-warning edit-product" 
                                        data-id="{{ $product->id }}"
                                        data-name="{{ $product->name }}"
                                        data-description="{{ $product->description }}"
                                        data-price="{{ $product->price }}"
                                        data-category_id="{{ $product->category_id }}"
                                        data-is_featured="{{ $product->is_featured }}"
                                        data-stock="{{ $product->stock }}"
                                        data-urlimg="{{ $product->image_url }}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger delete-product" 
                                        data-id="{{ $product->id }}">
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

<!-- Modal para agregar producto -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="addProductForm" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Agregar Nuevo Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Precio</label>
                                <input type="number" step="0.01" class="form-control" id="price" name="price" required>
                            </div>
                            <div class="mb-3">
                                <label for="category_id" class="form-label">Categoría</label>
                                <select class="form-select" id="category_id" name="category_id" required>
                                    <option value="">Seleccione una categoría</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="stock" class="form-label">Stock</label>
                                <input type="number" class="form-control" id="stock" name="stock" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="image" class="form-label">Imagen</label>
                                <input type="text" class="form-control" id="image" name="image_url" required>
                            </div>
                            <div class="mb-3">
                                <label for="is_featured" class="form-check-label">Destacado</label>
                                <input type="checkbox" class="form-check-input" id="is_featured" name="is_featured" value="1">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Descripción</label>
                                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                            </div>
                        </div>
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

<!-- Modal para editar producto -->
<div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="editProductForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editProductModalLabel">Editar Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="edit_name" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="edit_name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit_price" class="form-label">Precio</label>
                                <input type="number" step="0.01" class="form-control" id="edit_price" name="price" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit_category_id" class="form-label">Categoría</label>
                                <select class="form-select" id="edit_category_id" name="category_id" required>
                                    <option value="">Seleccione una categoría</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="edit_stock" class="form-label">Stock</label>
                                <input type="number" class="form-control" id="edit_stock" name="stock" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="edit_image" class="form-label">Imagen</label>
                                <input type="text" class="form-control" id="edit_image" name="image_url">
                            </div>
                            <div class="mb-3">
                                <label for="edit_is_featured" class="form-check-label">Destacado</label>
                                <input type="checkbox" class="form-check-input" id="edit_is_featured" name="is_featured" value="1">
                            </div>
                            <div class="mb-3">
                                <label for="edit_description" class="form-label">Descripción</label>
                                <textarea class="form-control" id="edit_description" name="description" rows="4" required></textarea>
                            </div>
                        </div>
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

<!-- Modal para eliminar producto -->
<div class="modal fade" id="deleteProductModal" tabindex="-1" aria-labelledby="deleteProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="deleteProductForm" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteProductModalLabel">Confirmar Eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Estás seguro de que deseas eliminar este producto? Esta acción no se puede deshacer.</p>
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
    // Manejar clic en botones de edición
    document.querySelectorAll('.edit-product').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            const name = this.getAttribute('data-name');
            const description = this.getAttribute('data-description');
            const price = this.getAttribute('data-price');
            const category_id = this.getAttribute('data-category_id');
            const is_featured = this.getAttribute('data-is_featured');
            const stock = this.getAttribute('data-stock');
            const img = this.getAttribute('data-urlimg');

            document.getElementById('edit_name').value = name;
            document.getElementById('edit_description').value = description;
            document.getElementById('edit_price').value = price;
            document.getElementById('edit_category_id').value = category_id;
            document.getElementById('edit_stock').value = stock;
            document.getElementById('edit_image').value = img;

            // Marcar checkbox si es destacado
            const featuredCheckbox = document.getElementById('edit_is_featured');
            featuredCheckbox.checked = is_featured === '1';
            
            const form = document.getElementById('editProductForm');
            form.action = `/products/${id}`;
            
            const modal = new bootstrap.Modal(document.getElementById('editProductModal'));
            modal.show();
        });
    });
    
    // Manejar clic en botones de eliminación
    document.querySelectorAll('.delete-product').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            
            const form = document.getElementById('deleteProductForm');
            form.action = `/products/${id}`;
            
            const modal = new bootstrap.Modal(document.getElementById('deleteProductModal'));
            modal.show();
        });
    });
});
</script>
@endsection