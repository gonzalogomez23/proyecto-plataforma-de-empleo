<?php

namespace App\Livewire;

use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class PostularVacante extends Component
{

    use WithFileUploads;

    public $cv;
    public $vacante;

    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];

    public function mount(Vacante $vacante)
    {
        $this->vacante = $vacante;
    }

    public function postularme()
    {

        $datos = $this->validate();

        // Almacenar CV
        $cv = $this->cv->store('public/cv');
        $nombre_cv = str_replace('public/cv/', '', $cv);

        // Crear candidato a la vacante
        $this->vacante->candidatos()->create([
            'user_id' => auth()->user()->id,
            'cv' => $nombre_cv,
        ]);


        // Crear notificación y enviar el email
        $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id, $this->vacante->title, auth()->user()->id));

        //Mostrar al usuario un mensaje de ok
        session()->flash('mensaje', 'Your information has been succesfully sent, good luck!');
        return redirect()->back();

    }

    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
