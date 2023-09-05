<div>
    <label for="category">Categoría</label>
    <select name="category_id" style="margin-bottom: 15px" id="category" class="form-control">
        <option value="">Seleccione su categoría</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>

    <label for="subcategory">Subcategoría</label>
    <select name="sub_category_id" id="subcategory" class="form-control">
        <option value="">Seleccione su subcategoría</option>
        {{-- Las opciones se cargarán dinámicamente con JavaScript --}}
    </select>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const categorySelect = document.getElementById('category');
        const subcategorySelect = document.getElementById('subcategory');

        // Agregar un evento para detectar cambios en el select de categoría
        categorySelect.addEventListener('change', function () {
            // Obtener el valor seleccionado en el select de categoría
            const selectedCategoryId = categorySelect.value;

            // Limpiar el select de subcategoría
            subcategorySelect.innerHTML = '<option value="">Seleccione su subcategoría</option>';

            // Verificar si se ha seleccionado una categoría
            if (selectedCategoryId !== '') {
                // Filtrar las subcategorías que coincidan con la categoría seleccionada
                const filteredSubcategories = @json($subcategories->toArray())
                    .filter(subcategory => subcategory.category_id == selectedCategoryId);

                // Agregar las opciones de subcategoría al select
                filteredSubcategories.forEach(subcategory => {
                    const option = document.createElement('option');
                    option.value = subcategory.id;
                    option.textContent = subcategory.name;
                    subcategorySelect.appendChild(option);
                });
            }
        });
    });
</script>
