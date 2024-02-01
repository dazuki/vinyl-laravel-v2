<?php

namespace App\Livewire;

use App\Models\Artist;
use Livewire\Component;
use Livewire\Attributes\Url;

class CreateArtist extends Component
{
    #[Url(history: true)]
    public $name = '';

    public function save()
    {
        $this->name = mb_strtoupper($this->name);

        $formFields = $this->validate([
            'name' => 'required|min:1'
        ]);

        $formFields['user_id'] = auth()->id();

        $createRecord = Artist::create($formFields);

        $this->redirect('/artist/' . $createRecord->id . '?msg=artist');
    }

    public function render()
    {
        return view('livewire.create-artist');
    }
}
