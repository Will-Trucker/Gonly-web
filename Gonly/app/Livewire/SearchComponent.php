<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Products_user;

class SearchComponent extends Component
{
    public $showlist = false;
    public $search = "";
    public $results;
    public $product;

    public function searchProduct()
{
    if (!empty($this->search)) {
        $this->results = Products_user::where('tittle', 'like', '%' . $this->search . '%')
            ->get();
        $this->showlist = true;
    } else {
        $this->showlist = false;
    }
}

    public function getProduct($id = 0)
    {
        $result = Products_user::find($id);

        if ($result) {
            $this->search = $result->tittle;
            $this->product = $result;
            $this->showlist = false;
        }
    }

    public function render()
    {
        $productos = Products_user::all();
        return view('livewire.search-component', compact('productos'));
    }

    public function updatedSearch()
    {
        if (!empty($this->search)) {
            $this->results = Products_user::where('tittle', 'like', '%' . $this->search . '%')
                ->get();

            $this->showlist = count($this->results) > 0;
        } else {
            $this->showlist = false;
        }
    }
}