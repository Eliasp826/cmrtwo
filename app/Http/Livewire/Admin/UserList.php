<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
//use livewire\withPagination;

class UserList extends Component
{
    public $state = [];

    public function addNew()
    {
        $this->dispatchBrowserEvent('show-form');
    }

    public function createUser()
    {
        $validatedData = validator::make($this->state,[
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ])->validate();

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        $this->dispatchBrowserEvent('hide-form');

        return redirect()->back();
    }
    //use withPagination;

    public function render()
    {
        $users = User::latest()->paginate();

        return view('livewire.admin.user-list', [
            'users' => $users,
        ]);

    }
}
