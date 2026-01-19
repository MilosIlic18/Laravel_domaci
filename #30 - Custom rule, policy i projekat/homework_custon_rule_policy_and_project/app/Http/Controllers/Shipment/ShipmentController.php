<?php

namespace App\Http\Controllers\Shipment;

use App\Models\Shipment;
use Illuminate\Http\Request;
use App\Models\ShipmentDocument;
use App\Traits\ImageUploadTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\Shipment\EditShipmentRequest;
use App\Http\Requests\Shipment\StoreShipmentRequest;
use Illuminate\Support\Facades\Gate;

class ShipmentController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        Cache::remember('shipments_status_unassigned',300,fn()=>Shipment::where('status',Shipment::STATUS_UNASSIGNED)->get()); // Kes traje 5 min
        return view('shipments.index',['shipments'=>Cache::get('shipments_status_unassigned')]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        Gate::authorize('createViewPage',Shipment::class);
        return view('shipments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShipmentRequest $request)
    {
        
        //
        Gate::authorize('create',Shipment::class);
        $shipment = Shipment::create($request->validated());
        $allowedMimeTypes = [
            'application/pdf',
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        ];
        
        foreach($request->file("documents") as $document){
            if(str_starts_with($document->getMimeType(),'image/')){
                
                ShipmentDocument::create([
                    'document_title'=> $shipment->id.'/'.$this->uploadImage($document,"documents/$shipment->id"),
                    'shipments_id' =>$shipment->id
                ]);
            }
            else if(in_array($document->getMimeType(),$allowedMimeTypes)){
                $file = uniqid().".".$document->getClientOriginalExtension();
                $path = $document->storeAs("documents/{$shipment->id}",$file,"public");
                $path = str_replace('documents/','',$path);
                ShipmentDocument::create([
                    'document_title'=> $path,
                    'shipments_id' =>$shipment->id
                ]);
            }
            else{
                dd("Nije dozvoljeno");
            }
        }
        return redirect()->route('shipments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Shipment $shipment)
    {
        //
        return view('shipments.show',['shipment'=>$shipment]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shipment $shipment)
    {
        //
        return view('shipments.edit',['shipment'=>$shipment]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditShipmentRequest $request, Shipment $shipment)
    {
        //
        $shipment->update($request->validated());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shipment $shipment)
    {
        //
    }
}
