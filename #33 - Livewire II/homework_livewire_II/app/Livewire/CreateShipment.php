<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Shipment;
use Livewire\WithFileUploads;
use App\Services\ShipmentService;
use App\Http\Requests\Shipment\StoreShipmentRequest;

class CreateShipment extends Component
{
    use WithFileUploads;

    public string $title ="";
    public string $fromCity = "";
    public string $fromCountry = "";
    
    public string $toCity = "";
    public string $toCountry = "";
    public string $status = "";
    public string $details = "";

    public int $price = 0;
    public array $statuses = [];
    public array $documents = [];

    public int $clientsId;
    public string $clientError = "";

    public function validateUser(){
        /*$user = User::firstWhere('id',$this->clientsId);
        $this->clientError = !$user?"Ovaj korisnik ne postoji":"";*/
        $this->validate([
            'clientsId' => 'required|integer|exists:users,id'
        ]);
    }

    public function mount(){
        $this->statuses = Shipment::ALLOWED_STATUS;
    }

    public function render()
    {
        return view('livewire.create-shipment');
    }

    public function submit(ShipmentService $shipmentService){
        $request = new StoreShipmentRequest();
        $data = $this->validate($request->rules());

        $data['title']         = $this->title;
        $data['from_city']     = $this->fromCity;
        $data['from_country']  = $this->fromCountry;
        $data['to_city']       = $this->toCity;
        $data['to_country']    = $this->toCountry;
        $data['clients_id']    = $this->clientsId;
        $data['status']        = $this->status;
        $data['details']       = $this->details;

        $shipmentService->store($data);
    }
}
