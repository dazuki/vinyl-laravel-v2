<?php

namespace App\Livewire;

use App\Models\Artist;
use App\Models\Record;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\Attributes\Url;
use Illuminate\Support\Facades\Auth;

class CreateVinyl extends Component
{
    #[Url(history: true)]
    public $artist_id;

    public $record_name = '';

    public function mount(Request $request)
    {
        if ($request->artist_id) {
            $this->artist_id = $request->artist_id;
        }
    }

    public function save()
    {
        $this->record_name = mb_strtolower($this->record_name);

        if ($this->artist_id == 0) {
            $this->artist_id = null;
        }

        $formFields = $this->validate([
            'artist_id' => 'required',
            'record_name' => 'required|min:1'
        ]);

        $formFields['user_id'] = auth()->id();

        $createRecord = Record::create($formFields);

        session()->flash('status', 'Vinylen är tillagd!');

        $this->redirect('/artist/' . $this->artist_id . '?msg=vinyl');
    }

    public function render()
    {
        return view('livewire.create-vinyl', [
            'artists' => Auth::user()->artists()->whereRAW('user_id = ' . auth()->id())
        ]);
    }
}
