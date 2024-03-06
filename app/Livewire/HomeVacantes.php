<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class HomeVacantes extends Component
{
    protected $listeners = ['terminosBusqueda' => 'buscar'];
    protected $termino;
    protected $categoria;
    protected $salario;
    
    
    public function buscar($termino, $categoria, $salario)
    {
        $this->termino = $termino;
        $this->categoria = $categoria;
        $this->salario = $salario;
    }

    public function render()
    {
        /* $vacantes = Vacante::all(); */

        //En el método when, el primer argumento es una condición. En este caso: Si existe un término, ejecuta la función de callback (segundo argumaneto)
        $vacantes = Vacante::when($this->termino, function($query) {
            $query->where('title', 'LIKE', "%" . $this->termino . "%");
            //El operador "%" permite que se busque ese término dentro de cualquier cadena de texto. Se encontrará dicho término aunque tenga cosas escritas por delante o por detrás del mismo.
            //El operador LIKE es un operador que se utiliza para hacer búsquedas en bases de datos SQL
        })
        ->when($this->termino, function($query) {
            $query->orWhere('company', $this->termino );
        })
        ->when($this->categoria, function($query) {
            $query->where('categoria_id', $this->categoria );
        })
        ->when($this->salario, function($query) {
            $query->where('salario_id', $this->salario );
        })
        
        ->paginate(10);
        
        return view('livewire.home-vacantes', [
            'vacantes' => $vacantes
        ]);
    }
}
