@extends('layouts.app')
@section('title')
   Contract
@endsection
@section('page_css')
    <link rel="stylesheet" href="{{ mix('assets/css/jquery.toast.min.css') }}">
    <link rel="stylesheet" href="{{ mix('assets/css/admin_panel.css') }}">
    <link rel="stylesheet"
    href="{{asset('app/bootstrap-datetimepicker.min.css')}}">
<!-- Latest compiled and minified JavaScript -->

    <style>
        .generate-button {
        border-radius: 20px;
        background-color: #228B22;
        color: #ffffff;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        }

        .generate-button:hover {
        background-color: #006400;
        }
        .button-container {
        text-align: right;
        }

    .col-form-label {
            max-width: fit-content !important;
        }


.select2-container {
    max-width: 240px;
    width: 223px !important;
}

    </style>
@endsection
@section('content')
<div class="container-fluid page__container">
<label for="template"><h5>Choose template:</h5></label>
<select class="form-control col-sm-3" id="template" name="template">
    <option value=""></option>
    <option value="1">Po Contract</option>
    <option value="2">Po Service</option>
</select>

<div id="POITEM" style="display: none;">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="companyName">Tên công ty ADV:</label>
            <input type="text" class="form-control" id="companyName" nanme="company_name" placeholder="Enter company name" value="{{env('company_name')}}">
          </div>
          <div class="form-group col-md-4">
            <label for="addressEn">Địa chỉ ADV EN:</label>
            <input type="text" class="form-control" id="addressEn"
                nanme="address_en" placeholder="Enter English address"
                value="{{env('address_en')}}">
          </div>
          <div class="form-group col-md-4">
            <label for="addressVI">Địa chỉ ADV VI:</label>
            <input type="text" class="form-control" id="addressVI"
                nanme="address_vn" placeholder="Enter vietnam address"
                value="{{env('address_vn')}}">
          </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
          <label for="phone">SĐT CTY ADV:</label>
          <input type="text" class="form-control" nanme="phone" id="phone" placeholder="Enter phone number" value="{{env('phone')}}">
        </div>
        <div class="form-group col-md-6">
          <label for="taxCode">Mã số thuế ADV:</label>
          <input type="text" class="form-control"  nanme="taxcode" id="taxCode" placeholder="Enter tax code" value="{{env('taxcode')}}">
        </div>
      </div>
    <div class="form-group row">
        <label for="posting_date" class="col-sm-2 col-form-label">Ngày tạo/Posting Date:</label>
        <div class="col-sm-2 input-group date" id="posting_dates" data-target-input="nearest">
            <input type="text" name="date" id="posting_date" class="form-control datetimepicker-input" data-target="#posting_dates" placeholder="Select Date" />
            <div class="input-group-append" data-target="#posting_dates" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
            </div>
        </div>
        <label for="contract_no" class="col-sm-2 col-form-label">Số hợp đồng /Contract No:</label>
        <div class="col-sm-2">
            <input type="text" class="form-control" id="contract_no" name="contract_no">
        </div>
        <label for="contract_date" class="col-sm-2 col-form-label">Ngày kí /Contract Date:</label>
        <div class="col-sm-2 input-group date" id="contract_dates" data-target-input="nearest">
            <input type="text" name="date" id="contract_date" class="form-control datetimepicker-input" data-target="#contract_dates" placeholder="dd/mm/yyyy" />
            <div class="input-group-append" data-target="#contract_dates" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="period" class="col-sm-2 col-form-label">Thời hạn bảo hành/Warranty Period:</label>
        <div class="col-sm-1">
            <input type="number" class="form-control" id="period" name="period" min="1" step="1" placeholder="1">
        </div>
        <label for="pic_name" class="col-sm-2 col-form-label">Đại diện ADV/Represented:</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" id="pic_name" name="pic_name">
        </div>
        <label for="pic_title" class="col-sm-2 col-form-label">Chức vụ của đại diện bên ADV/Title:</label>
        <div class="col-sm-2">
            <input type="text" class="form-control" id="pic_title" name="pic_title">
        </div>
    </div>
    <div class="form-group row">
        <label for="venpic_name" class="col-sm-2 col-form-label">Đại diện bên NCC/Represented:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="venpic_name" name="venpic_name">
        </div>
        <label for="venpic_title" class="col-sm-2 col-form-label">Chức vụ của đại diện bên NCC/Title:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="venpic_title" name="venpic_title">
        </div>
    </div>
    <livewire:search-dropdown />

    chờ tí, tớ dev thêm phần data SQ 😉😉
    <div class="button-container">
        <button class="generate-button">Generate</button>
    </div>
</div>


<div id="form2" style="display: none;">
    <!-- Form 2 -->
    <h2>Form 2</h2>
    <!-- Thêm các trường và điều kiện tương ứng cho Form 2 -->
</div>
</div>
@endsection
@section('page_js')
    <script src="{{ mix('assets/js/jquery.toast.min.js') }}"></script>
@endsection
@section('scripts')
<script
src="{{asset('app/bootstrap-datetimepicker.min.js')}}">
</script>
    <script>
        let token = '{{ csrf_token() }}'
        let AuthUserRoleId = "{{ isset(getLoggedInUser()->roles) ? getLoggedInUser()->roles->first()->id : '' }}"
    </script>
     <script>
        // Lắng nghe sự kiện thay đổi của dropdown
        document.getElementById('template').addEventListener('change', function () {
            var selectedOption = this.value;
            document.getElementById('POITEM').style.display = (selectedOption === '1') ? 'block' : 'none';
            document.getElementById('form2').style.display = (selectedOption === '2') ? 'block' : 'none';
        });
        //
        $('#posting_dates').datetimepicker({
            format: 'DD/MM/YYYY',
            defaultDate: new Date(),
            keepOpen: false
        }).on('click', function () {
            $(this).datetimepicker('show');
        }).on('blur', function () {
            $(this).datetimepicker('hide');
        });
        $('#contract_dates').datetimepicker({
            format: 'DD/MM/YYYY',
            keepOpen: false
        }).on('click', function () {
            $(this).datetimepicker('show');
        }).on('blur', function () {
            $(this).datetimepicker('hide');
        });
    </script>
    <script>
      $(document).ready(function() {
    $('.select2').select2({
      placeholder: 'Select an option',
      allowClear: true,
     // minimumResultsForSearch: Infinity // Hide search box initially
    });

        $('#vendor').select2({
        placeholder: 'Chọn nhà cung cấp',
       // allowClear: true,
        // minimumResultsForSearch: Infinity // Hide search box initially
});
  });


      </script>
@endsection
