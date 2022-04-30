<?php

namespace App\Http\Livewire;

use App\Models\Role;
use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;


class UsersTable extends Component
{
    use WithPagination;
    public $perPage = 10;
    public $search = '';
    public $orderBy = 'id';
    public $role = 0;

    public $orderAsc = true;
    public $selected_id = '';


    public function render()
    {
        if($this->role==0){
        $users=User::search($this->search)
                ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                ->simplePaginate($this->perPage);
        }else{
            $users=User::search($this->search)
                ->where('role_id',$this->role)
                ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                ->simplePaginate($this->perPage);
        }
        return view('livewire.users-table', [
            'users' => $users,
            'roles'=>Role::all()
        ]);
    }


    public function selectedId($id)
    {
        $this->selected_id = $id;

    }
    public function updateUserRole($id)
    {
        if(auth()->user()->hasPermission('update user'))
        {
            $user =User::find($this->selected_id);
            $user->role_id=$id;
            $user->save();

        }

    }


    public function blockUser($id)
    {
        if(auth()->user()->hasPermission('update user'))
        {
            $user=User::find($id);
            $user->block=1;
            $user->save();
         }
    }

    public function unBlockUser($id)
    {
        if(auth()->user()->hasPermission('update user'))
        {
            $user=User::find($id);
            $user->block=0;
            $user->save();
        }
    }
    public function makeUser($id)
    {
        if(auth()->user()->hasPermission('update user'))
        {
            $user=User::find($id);
            $user->type="user";
            $user->save();
         }
    }

    public function makeDelivery($id)
    {
        if(auth()->user()->hasPermission('update user'))
        {
            $user=User::find($id);
            $user->type='delivery';
            $user->save();
        }
    }
}
