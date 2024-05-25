<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\serviceList;
use Livewire\WithPagination;

class ListService extends Component
{

    use WithPagination;

    public $perPage = 10;
    public $search = '';
    public $type;
    public $modal = false;

    public $service_desc, $service_endpoint_esb, $service_endpoint_msr, $service_postman, $selectedService;

    public function openModal($service)
    {
        $this->selectedService = $service;
        $this->modal = true;
    }

    public function closeModal()
    {
        $this->modal = false;
        $this->selectedService = null;
    }

    public function render()
    {
        $allservice = serviceList::get();

        return view('livewire.service-list', [
            'servicelists' => serviceList::search($this->search)->paginate($this->perPage)
        ])->layout('layouts.app');
    }

    public function download($id)
    {
        dd($id);
        // return view('livewire.service-list',[
        //     'servicelists' =>  serviceList::where($id)

        // ]);

    }
}
