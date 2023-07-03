<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\netsuite\Vendor;

class SearchDropdown extends Component
{
    public $selectedVendorId = '';
    public $venpicName = '';
    public $venpicTitle = '';

    protected $listeners = ['updateVendorData'];
    public function hydrate()
    {
        $this->emit('select2');
    }

    public function render()
    {
        $webseries = Vendor::get();

        return view('livewire.search-dropdown', compact('webseries'));
    }

    public function updateVendorData($item)
    {
        $vendor = Vendor::where('VendorID', $item)->first();
        $this->selectedVendorId=$item;
        if ($vendor) {
            $this->venpicName = $vendor->ShippingAddress;
            $this->venpicTitle = $vendor->Phone;
        } else {
            $this->venpicName = '';
            $this->venpicTitle = '';
        }
    }


}
