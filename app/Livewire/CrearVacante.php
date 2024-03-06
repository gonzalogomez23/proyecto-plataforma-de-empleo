<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearVacante extends Component
{

    public $title;
    public $salario;
    public $categoria;
    public $company;
    public $last_day;
    public $description;
    public $image;

    use WithFileUploads;

    protected $rules = [
        'title' => 'required|string',
        'salario' => 'required',
        'categoria' => 'required',
        'company' => 'required',
        'last_day' => 'required',
        'description' => 'required',
        'image' => 'nullable|image|max:1024'
    ];

    public function crearVacante()
    {
        $datos = $this->validate();

        // Almacenar la imagen
        $image = $this->image->store('public/vacantes');
        $nombre_imagen = str_replace('public/vacantes', '', $image);

        // Crear la vacante
        Vacante::create([
            'title' => $datos['title'],
            'salario_id' => $datos['salario'],
            'categoria_id' => $datos['categoria'],
            'company' => $datos['company'],
            'last_day' => $datos['last_day'],
            'description' => $datos['description'],
            'image' => $nombre_imagen,
            'user_id' => auth()->user()->id,
        ]);
        
        // Crear un mensaje
        session()->flash('mensaje', 'Te job was posted succesfully.');
        // Redireccionar al usuario
        return redirect()->route('vacantes.index');
    }

    public function render()
    {
        //Consultar BD
        $salarios = Salario::all();
        $categorias = Categoria::all();

        return view('livewire.crear-vacante', [
            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
    }
}
