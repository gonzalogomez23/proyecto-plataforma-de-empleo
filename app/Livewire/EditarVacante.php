<?php

namespace App\Livewire;

use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use App\Models\Categoria;
use Carbon\Carbon;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class EditarVacante extends Component
{
    public $vacante_id; //no se puede utilizar el nombre $id porque es una palabra reservada de laravel
    public $title;
    public $salario;
    public $categoria;
    public $company;
    public $last_day;
    public $description;
    public $image;
    public $user;
    public $new_image;

    use WithFileUploads;
    
    protected $rules = [
        'title' => 'required|string',
        'salario' => 'required',
        'categoria' => 'required',
        'company' => 'required',
        'last_day' => 'required',
        'description' => 'required',
        'new_image' => 'nullable|image|max:1024'
    ];

    public function mount(Vacante $vacante)
    {
        $this->vacante_id = $vacante->id;
        $this->title = $vacante->title;
        $this->salario = $vacante->salario_id;
        $this->categoria = $vacante->categoria_id;
        $this->company = $vacante->company;
        $this->last_day = Carbon::parse($vacante->last_day)->format('Y-m-d');
        $this->description = $vacante->description;
        $this->image = $vacante->image;
    }

    public function editarVacante()
    {
        //Guardamos los datos introducidos en el formulario en la variable $datos
        $datos = $this->validate();

        //Hay una nueva imagen?
        if($this->new_image){ // Si existe una nueva imagen
            $image = $this->new_image->store('public/vacantes'); //Cambiamos la imagen por la nueva
            $datos['image'] = str_replace('public/vacantes/', '', $image); //Cambiamos el valor de la imagen dentro de la variable datos
        }

        // Encontrar la vacante a editar
        $vacante = Vacante::find($this->vacante_id);

        // Asignar los valores
        $vacante->title = $datos['title'];
        $vacante->salario_id = $datos['salario'];
        $vacante->categoria_id = $datos['categoria'];
        $vacante->company = $datos['company'];
        $vacante->last_day = $datos['last_day'];
        $vacante->description = $datos['description'];
        $vacante->image = $datos['image'] ?? $vacante->image;

        // Guardar la vacante
        $vacante->save();

        // Redireccionar
        session()->flash('mensaje', 'The job has been successfully updated');
        
        return redirect()->route('vacantes.index');

    }

    public function render(){
        //Consultar BD
        $salarios = Salario::all();
        $categorias = Categoria::all();;

        return view('livewire.editar-vacante', [
            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
    }
}
