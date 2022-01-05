<?php

namespace App\Http\Livewire;

use App\Http\Controllers\LinkController;
use Carbon\Carbon;
use App\Models\Link;
use Livewire\Component;
use Illuminate\Support\Str;
use Vinkla\Hashids\Facades\Hashids;

class CreateLink extends Component
{
    public $url;
    public $slug;
    public $expiration;

    protected $rules = [
        'url' => 'required|url|max:255',
        'slug' => 'nullable|alpha_dash|unique:links,slug|min:3|max:25',
        'expiration' => 'date|after:today|nullable|before: +1 year'
    ];

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function saveLink()
    {
        $this->validate();

        //dd(Carbon::parse($this->expiration));

        $link = Link::create([
            'url'=> $this->url,
            'slug' => $this->slug ?? Str::random(20),
        ]);

        if(!! $this->expiration){
            $link->update([ 'expires_at' =>  Carbon::parse($this->expiration)]);
        }
     
        if (! $this->slug) {
            $link->update(['slug' => Hashids::encode($link->id)]);
        }

        return redirect()->action([LinkController::class, 'result'], ['slug' => $link->slug]);
    }

    public function resetForm()
    {
        $this->reset();
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.create-link');
    }
}
