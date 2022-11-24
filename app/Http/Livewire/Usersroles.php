<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Usersrole;
use Illuminate\Support\Facades\DB;

class Usersroles extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $role_id, $model_id, $nombre, $rol;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        
        $roles =  DB::table('model_has_roles')        
        ->join('roles','model_has_roles.role_id','roles.id')
        ->join('users','model_has_roles.model_id','users.id')
        ->select('role_id','model_id', 'users.name','users.email')
        ->orWhere('users.name', 'LIKE', $keyWord)
		->orWhere('role_id', 'LIKE', $keyWord)
		->paginate(10);
        $usuarios = DB::table('users')
                    ->select('id','name')
                    ->get();
        $nombreRoles = DB::table('roles')            
                        ->select('id','name')
                        ->get();
        return view('livewire.usersroles.view', compact('roles','usuarios','nombreRoles'));
        
        /* $keyWord = '%'.$this->keyWord .'%';
        return view('livewire.usersroles.view', [
            'usersroles' => Usersrole::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('rol', 'LIKE', $keyWord)
						->paginate(10),
        ]); */
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->nombre = null;
		$this->rol = null;
    }

    public function store()
    {
        $this->validate([
		'model_id' => 'required',
		'role_id' => 'required',
        ]);

        /* Usersrole::create([ 
			'nombre' => $this-> nombre,
			'rol' => $this-> rol
        ]);
         */
        DB::table('model_has_roles')->insert([
	        [
			    'role_id' => $this-> role_id,
                'model_type' => 'App\Models\User',
                'model_id' => $this-> model_id
	    	]
		]);
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Usersrole Successfully created.');
    }
    /* public function store()
    {
        $this->validate([
		'nombre' => 'required',
		'rol' => 'required',
        ]);

        Usersrole::create([ 
			'nombre' => $this-> nombre,
			'rol' => $this-> rol
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Usersrole Successfully created.');
    } */
    public function edit($role_id)
    {
        $record = Usersrole::findOrFail($role_id);
            
        $this->selected_id = $role_id; 
		$this->role_id = $record-> role_id;
        $this->model_id = $record-> model_id;
				
        $this->updateMode = true;
    }

    public function update()
    {
        /* $this->validate([
		'nombre' => 'required',
		'rol' => 'required',
        ]); */
        $this->validate([
            'role_id' => 'required',
            'model_id' => 'required',            
            ]);

        /* if ($this->selected_id) {
			$record = Usersrole::find($this->selected_id);
            $record->update([ 
			'nombre' => $this-> nombre,
			'rol' => $this-> rol
            ]); */
            DB::table('model_has_roles')->update(
                [
                    'role_id' => $this-> role_id,
                    'model_id' => $this-> model_id 
                ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Usersrole Successfully updated.');
        
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Usersrole::where('id', $id);
            $record->delete();
        }
    }
}
