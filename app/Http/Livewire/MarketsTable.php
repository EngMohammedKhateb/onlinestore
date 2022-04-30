<?php

namespace App\Http\Livewire;

use App\Models\Market;
use Livewire\Component;
use Livewire\WithPagination;

class MarketsTable extends Component
{

    use WithPagination;
    public $perPage = 10;
    public $search = '';
    public $orderBy = 'id';

    public $orderAsc = true;
    public $selected_id = '';

    public function render()
    {

        $markets=Market::search($this->search)
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->simplePaginate($this->perPage);

        return view('livewire.markets-table', [
         'markets' => $markets,
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
            $market =Market::find($this->selected_id);
            $market->name=$name;
            $market->save();
        }

    }
    public function increasePriority($id)
    {

        if(auth()->user()->hasPermission('update market'))
        {
            $market =Market::find($id);
            $last_priority = $market->priority;
            $last_priority++;
            $market->priority=$last_priority;
            $market->save();
        }

    }
    public function decreasePriority($id)
    {

        if(auth()->user()->hasPermission('update market'))
        {
            $market =Market::find($id);
            $last_priority = $market->priority;
            $last_priority--;
            $market->priority=$last_priority;
            $market->save();
        }

    }

    public function active($id)
    {
        if(auth()->user()->hasPermission('update market'))
        {
            $market =Market::find($id);
            $market->is_active=1;
            $market->save();
        }
    }

    public function hide($id)
    {
        if(auth()->user()->hasPermission('update market')) {
            $market = Market::find($id);
            $market->is_active = 0;
            $market->save();
        }
    }



    public function delete()
    {
        if(auth()->user()->hasPermission('delete market')) {
            $market = Market::find($this->selected_id);
            $market->delete();

        }
    }

}
