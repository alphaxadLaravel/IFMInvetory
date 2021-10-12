<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\ReAllocations;
use App\Models\Devices;

class AllocatedList extends Component
{
      // paginating here
      use WithPagination;

      // allow pagination styles with bootstrap here
      protected $paginationTheme = 'bootstrap';

    public $counter=1;

    public function render()
    {
        return view('livewire.allocated-list', [
            'allocates'=>ReAllocations::latest()->where('status','active')->paginate(5),
            'total'=>ReAllocations::all()->count(),
            'counter'=>$this->counter,

        ]);
    }

    // reAllocate
}
