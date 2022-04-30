<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Market;
use Livewire\Component;
use Livewire\WithPagination;

class CategoriesTable extends Component
{

    use WithPagination;
    public $perPage = 10;
    public $search = '';
    public $orderBy = 'id';

    public $orderAsc = true;
    public $selected_id = '';


    public $market;



    public function mount($id)
    {
        $this->market = Market::find($id);
    }


    public function render()
    {
        $categories=Category::search($this->search)
            ->where('market_id',$this->market->id)
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->simplePaginate($this->perPage);

        return view('livewire.categories-table', [
            'categories' => $categories,
        ]);

    }


    public function selectedId($id)
    {
        $this->selected_id = $id;

    }
    public function updateMarketName($name)
    {

        if(auth()->user()->hasPermission('update market'))
        {
            $category =Category::find($this->selected_id);
            $category->name=$name;
            $category->save();
        }

    }
    public function increasePriority($id)
    {

        if(auth()->user()->hasPermission('update market'))
        {
            $category =Category::find($id);
            $last_priority = $category->priority;
            $last_priority++;
            $category->priority=$last_priority;
            $category->save();
        }

    }
    public function decreasePriority($id)
    {

        if(auth()->user()->hasPermission('update market'))
        {
            $category =Category::find($id);
            $last_priority = $category->priority;
            $last_priority--;
            $category->priority=$last_priority;
            $category->save();
        }

    }

    public function active($id)
    {
        if(auth()->user()->hasPermission('update market'))
        {
            $category =Category::find($id);
            $category->is_active=1;
            $category->save();
        }
    }

    public function hide($id)
    {
        if(auth()->user()->hasPermission('update market')) {
            $category = Category::find($id);
            $category->is_active = 0;
            $category->save();
        }
    }



    public function delete()
    {
        if(auth()->user()->hasPermission('delete market')) {
            $category = Category::find($this->selected_id);
            $category->delete();

        }
    }

}
