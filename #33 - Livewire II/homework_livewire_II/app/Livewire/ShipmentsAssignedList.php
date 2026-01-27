<?php

namespace App\Livewire;

use Livewire\Component;

class ShipmentsAssignedList extends Component
{
    public int $count = 0;
    public int $amount = 1;
    public string $errorMessage = "";
    public function increment(){
        $this->count += $this->amount;
        $this->errorMessage ="";
    }
    public function decrement(){
        if($this->count-$this->amount >0)
            $this->count -= $this->amount;
        else
            $this->errorMessage = "Invakid math operation, it will go under 0";
    }
    public function validateAmount(){
        $this->errorMessage = $this->amount < 1?"Amount ne moze biti manji od 1":"";
    }
    public function render()
    {
        return view('livewire.shipments-assigned-list');
    }
}
