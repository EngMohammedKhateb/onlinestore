<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductsTable extends Component
{
    use WithPagination;
    public $perPage = 10;
    public $search = '';
    public $orderBy = 'id';

    public $orderAsc = true;
    public $selected_id = '';


    public $category;



    public function mount($id)
    {
        $this->category = Category::find($id);
    }


    public function render()
    {
        $products=Product::search($this->search)
            ->where('category_id',$this->category->id)
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->simplePaginate($this->perPage);

        return view('livewire.products-table', [
            'products' => $products,
        ]);

    }


    public function selectedId($id)
    {
        $this->selected_id = $id;

    }

    public function increasePriority($id)
    {

        if(auth()->user()->hasPermission('update product'))
        {
            $product =Product::find($id);
            $last_priority = $product->priority;
            $last_priority++;
            $product->priority=$last_priority;
            $product->save();
        }

    }
    public function decreasePriority($id)
    {

        if(auth()->user()->hasPermission('update product'))
        {
            $product =Product::find($id);
            $last_priority = $product->priority;
            $last_priority--;
            $product->priority=$last_priority;
            $product->save();
        }

    }

    public function active($id)
    {
        if(auth()->user()->hasPermission('update product'))
        {
            $product =Product::find($id);
            $product->is_active=1;
            $product->save();
        }
    }

    public function hide($id)
    {
        if(auth()->user()->hasPermission('update product')) {
            $category = Product::find($id);
            $category->is_active = 0;
            $category->save();
        }
    }



    public function delete()
    {
        if(auth()->user()->hasPermission('delete product')) {
            $product = Product::find($this->selected_id);
            $product->delete();
        }
    }
}
