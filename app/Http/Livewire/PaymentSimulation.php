<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PaymentSimulation extends Component
{
    public $order;
    public function render()
    {
        return view('livewire.payment-simulation');
    }
}
