<?php

namespace App\Http\Livewire;

use App\Models\Link;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class LinkTable extends Component
{   

    Use WithPagination;
    
    public function render()
    {      
        $data = DB::table('links')->orderByDesc('created_at')->paginate(10);

        return view('livewire.link-table', [
            'links' => $data,
        ]);
    }
}
