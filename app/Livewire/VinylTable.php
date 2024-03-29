<?php

namespace App\Livewire;

use App\Models\Artist;
use App\Models\Record;
use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use App\Exports\ArtistExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class VinylTable extends Component
{
    use WithPagination, LivewireAlert;

    #[Url(history: true)]
    public $search = '';

    public bool $loadData = false;

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function init()
    {
        $this->loadData = true;
    }

    public function render()
    {
        if (!auth()->id()) {
            return view('livewire.login');
        } else {
            return view('livewire.vinyl-table', [
                'artists' => $this->loadData ? Auth::user()->artists()->search($this->search)
                    ->orderBy('name', 'asc')
                    ->paginate(25) : [],
                'records' => $this->loadData ? Auth::user()->records()->count() : [],
                'art_count' => $this->loadData ? Auth::user()->artists()->count() : [],
                'searchCountArtist' => $this->loadData ? Artist::searchCount($this->search)->count() : [],
                'searchCountRecord' => $this->loadData ? Record::search($this->search)->count() : []
            ]);
        }
    }

    public function export()
    {
        return Excel::download(new ArtistExport, 'Vinyler Förteckning(' . date('Y-m-d') . ' vid ' . date('H.i') . ').xls', \Maatwebsite\Excel\Excel::XLS);
    }

    public function view()
    {
        return view('exports.collection', [
            'collections' => Artist::all()
                ->sortBy('name'),
            'collections_records' => Record::all()->count()
        ]);
    }
}
