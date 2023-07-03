<div>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="vendor">Nhà cung cấp:</label>
            <select class="col-md-3 form-control" style=" max-width: 240px;
            width: 223px !important;" id="vendor" wire:model="selectedVendorId">
                <option value="">Select Option</option>
                @foreach($webseries as $item)
                    <option value="{{ $item['VendorID'] }}">{{ $item['VendorCode'] }}</option>
                @endforeach
            </select>
        </div>
        <label for="venpic_name" class="col-md-3 col-form-label">Đại diện bên NCC/Represented:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="venpic_name" name="venpic_name" wire:model="venpicName">
        </div>
        <label for="venpic_title" class="col-md-3 col-form-label">Chức vụ của đại diện bên NCC/Title:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="venpic_title" name="venpic_title" wire:model="venpicTitle">
        </div>
    </div>
</div>

@push('scripts')
    <script>
$(document).ready(function() {
            window.initSelectCompanyDrop=()=>{
                $('#vendor').select2({
                    placeholder: 'Chọn nhà cung cấp',
                  //  allowClear: true
                });
            }
            initSelectCompanyDrop();
            $('#vendor').on('change', function (e) {
                livewire.emit('updateVendorData', e.target.value)
            });
            window.livewire.on('select2',()=>{
                initSelectCompanyDrop();
            });

        });

    </script>
@endpush
