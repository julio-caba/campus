<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Curso;
use Livewire\WithFileUploads;

class Cursos extends Component
{
    use WithPagination;
    use WithFileUploads;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $imagen, $titulo, $descripcion, $profesor;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.cursos.view', [
            'cursos' => Curso::latest()
						->orWhere('imagen', 'LIKE', $keyWord)
						->orWhere('titulo', 'LIKE', $keyWord)
						->orWhere('descripcion', 'LIKE', $keyWord)
						->orWhere('profesor', 'LIKE', $keyWord)
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
		$this->imagen = null;
		$this->titulo = null;
		$this->descripcion = null;
		$this->profesor = null;
    }

    public function store()
    {
        $this->validate([
		'imagen' => 'required|max:2048',
		'titulo' => 'required',
		'descripcion' => 'required',
		'profesor' => 'required',
        ]);

        Curso::create([ 
			'imagen' => $this->imagen->store('images','public'),
			'titulo' => $this-> titulo,
			'descripcion' => $this-> descripcion,
			'profesor' => $this-> profesor
        ]);        
        
        $this->resetInput();
        
		$this->emit('closeModal');
		session()->flash('message', 'Curso Successfully created.');
    }

    public function edit($id)
    {
        $record = Curso::findOrFail($id);

        $this->selected_id = $id; 
		$this->imagen = $record-> imagen;
		$this->titulo = $record-> titulo;
		$this->descripcion = $record-> descripcion;
		$this->profesor = $record-> profesor;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'imagen' => 'required',
		'titulo' => 'required',
		'descripcion' => 'required',
		'profesor' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Curso::find($this->selected_id);
            $record->update([ 
			'imagen' => $this-> imagen->store('images','public'),
			'titulo' => $this-> titulo,
			'descripcion' => $this-> descripcion,
			'profesor' => $this-> profesor
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Curso Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Curso::where('id', $id);
            $record->delete();
        }
    }
}
