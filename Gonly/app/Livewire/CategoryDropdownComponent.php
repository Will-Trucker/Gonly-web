<?php
namespace App\Livewire;
use Livewire\Component;
use Illuminate\Http\Request; // Importa la clase Request
use App\Models\Category;
use App\Models\SubCategory;

class CategoryDropdownComponent extends Component
{
    public $selectedCategoryId; // propiedad para almacenar el ID de la categoría seleccionada
    public $selectedSubcategoryId; // propiedad para almacenar el ID de la subcategoría seleccionada
    public $subcategories; // declara la variable $subcategories
    public $categories; // declara la variable $categories

    public function loadSubcategories()
{
    if (!empty($this->selectedCategoryId)) {
        $category = Category::find($this->selectedCategoryId);
        $this->subcategories = $category->subcategories;
    } else {
        $this->subcategories = collect();
    }
}

    public function render()
    {
        // Obtén todas las categorías y subcategorías (puedes personalizar esto según tus modelos)
        $this->categories = Category::orderBy('name', 'ASC')->get();
        $this->subcategories = SubCategory::orderBy('name', 'ASC')->get();
        return view('livewire.category-dropdown-component');
    }
}