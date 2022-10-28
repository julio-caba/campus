<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Usuario;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Usuarios extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name,$email,$password;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.usuarios.view', [
            'usuarios' => User::latest()
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        User::create([ 
            'name' => $this-> name,
            'email' => $this-> email,
            'password' => Hash::make($this-> password),
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Usuario Successfully created.');
    }

    public function edit($id)
    {
        $record = User::findOrFail($id);

        $this->selected_id = $id; 
		$this->name = $record-> name;
        $this->email = $record-> email;
        $this->password = $record-> password;
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($this->selected_id) {
			$record = User::find($this->selected_id);
            $record->update([ 
                'name' => $this-> name,
                'email' => $this-> email,
                'password' => Hash::make($this-> password),
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Usuario Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = User::where('id', $id);
            $record->delete();
        }
    }
}
