<?php

namespace App\Http\Livewire;

use App\Models\netsuite\Customer;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\{ActionButton, WithExport};
use PowerComponents\LivewirePowerGrid\Filters\Filter;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridColumns};

final class CustomerTable extends PowerGridComponent
{
    use ActionButton;
    use WithExport;
    public string $primaryKey = 'GTCustomer.CustomerID';

    public string $sortField = 'GTCustomer.CustomerID';
    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): array
    {
       // $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput()->withoutLoading(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */

    /**
     * PowerGrid datasource.
     *
     * @return Builder<\App\Models\netsuite\Customer>
     */
    public function datasource(): Builder
    {
        return Customer::query();
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    | ❗ IMPORTANT: When using closures, you must escape any value coming from
    |    the database using the `e()` Laravel Helper function.
    |
    */
    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('CustomerID')

           /** Example of custom column using a closure **/
            ->addColumn('CustomerID_lower', fn (Customer $model) => strtolower(e($model->CustomerID)))

            ->addColumn('CustomerCode')
            ->addColumn('CustomerName')
            ->addColumn('CyberCode')
            ->addColumn('CustomerGroupRef')
            ->addColumn('CustomerType')
            ->addColumn('ShippingAddress')
            ->addColumn('BillingAddress')
            ->addColumn('Phone')
            ->addColumn('Email')
            ->addColumn('Fax')
            ->addColumn('TaxCode')
            ->addColumn('WebAddress')
            ->addColumn('Currency')
            ->addColumn('Balance')
            ->addColumn('PriceCode')
            ->addColumn('PaymentTerm')
            ->addColumn('CreditLimit')
            ->addColumn('Comments')
            ->addColumn('Booth')
            ->addColumn('BranchRef')
            ->addColumn('CreatedDate_formatted', fn (Customer $model) => Carbon::parse($model->CreatedDate)->format('d/m/Y'))
            ->addColumn('CreatedBy')
            ->addColumn('LastModifiedDate_formatted', fn (Customer $model) => Carbon::parse($model->LastModifiedDate)->format('d/m/Y'))
            ->addColumn('LastModifiedBy')
            ->addColumn('Status')
            ->addColumn('Message')
            ->addColumn('SyncDate_formatted', fn (Customer $model) => Carbon::parse($model->SyncDate)->format('d/m/Y'));
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

     /**
      * PowerGrid Columns.
      *
      * @return array<int, Column>
      */
    public function columns(): array
    {
        return [
            Column::make('CustomerID', 'CustomerID')
                ->sortable()
                ->searchable(),

            Column::make('CustomerCode', 'CustomerCode')
                ->sortable()
                ->searchable(),

            Column::make('CustomerName', 'CustomerName')
                ->sortable()
                ->searchable(),

            Column::make('CyberCode', 'CyberCode')
                ->sortable()
                ->searchable(),

            Column::make('CustomerGroupRef', 'CustomerGroupRef')
                ->sortable()
                ->searchable(),

            Column::make('CustomerType', 'CustomerType')
                ->sortable()
                ->searchable(),

            Column::make('ShippingAddress', 'ShippingAddress')
                ->sortable()
                ->searchable(),

            Column::make('BillingAddress', 'BillingAddress')
                ->sortable()
                ->searchable(),

            Column::make('Phone', 'Phone')
                ->sortable()
                ->searchable(),

            Column::make('Email', 'Email')
                ->sortable()
                ->searchable(),

            Column::make('Fax', 'Fax')
                ->sortable()
                ->searchable(),

            Column::make('TaxCode', 'TaxCode')
                ->sortable()
                ->searchable(),

            Column::make('WebAddress', 'WebAddress')
                ->sortable()
                ->searchable(),

            Column::make('Currency', 'Currency')
                ->sortable()
                ->searchable(),

            Column::make('Balance', 'Balance')
                ->sortable()
                ->searchable(),

            Column::make('PriceCode', 'PriceCode')
                ->sortable()
                ->searchable(),

            Column::make('PaymentTerm', 'PaymentTerm')
                ->sortable()
                ->searchable(),

            Column::make('CreditLimit', 'CreditLimit')
                ->sortable()
                ->searchable(),

            Column::make('Comments', 'Comments')
                ->sortable()
                ->searchable(),

            Column::make('Booth', 'Booth')
                ->sortable()
                ->searchable(),

            Column::make('BranchRef', 'BranchRef')
                ->sortable()
                ->searchable(),

            Column::make('CreatedDate', 'CreatedDate_formatted', 'CreatedDate')
                ->sortable(),

            Column::make('CreatedBy', 'CreatedBy')
                ->sortable()
                ->searchable(),

            Column::make('LastModifiedDate', 'LastModifiedDate_formatted', 'LastModifiedDate')
                ->sortable(),

            Column::make('LastModifiedBy', 'LastModifiedBy')
                ->sortable()
                ->searchable(),

            Column::make('Status', 'Status')
                ->sortable()
                ->searchable(),

            Column::make('Message', 'Message')
                ->sortable()
                ->searchable(),

            Column::make('SyncDate', 'SyncDate_formatted', 'SyncDate')
                ->sortable(),

        ];
    }

    /**
     * PowerGrid Filters.
     *
     * @return array<int, Filter>
     */
    public function filters(): array
    {
        return [
            Filter::inputText('CustomerID')->operators(['contains']),
            Filter::inputText('CustomerCode')->operators(['contains']),
            Filter::inputText('CustomerName')->operators(['contains']),
            Filter::inputText('CyberCode')->operators(['contains']),
            Filter::inputText('CustomerGroupRef')->operators(['contains']),
            Filter::inputText('CustomerType')->operators(['contains']),
            Filter::inputText('ShippingAddress')->operators(['contains']),
            Filter::inputText('BillingAddress')->operators(['contains']),
            Filter::inputText('Phone')->operators(['contains']),
            Filter::inputText('Email')->operators(['contains']),
            Filter::inputText('Fax')->operators(['contains']),
            Filter::inputText('TaxCode')->operators(['contains']),
            Filter::inputText('WebAddress')->operators(['contains']),
            Filter::inputText('Currency')->operators(['contains']),
            Filter::inputText('PriceCode')->operators(['contains']),
            Filter::inputText('PaymentTerm')->operators(['contains']),
            Filter::inputText('Comments')->operators(['contains']),
            Filter::inputText('Booth')->operators(['contains']),
            Filter::inputText('BranchRef')->operators(['contains']),
            Filter::datepicker('CreatedDate'),
            Filter::inputText('CreatedBy')->operators(['contains']),
            Filter::datepicker('LastModifiedDate'),
            Filter::inputText('LastModifiedBy')->operators(['contains']),
            Filter::inputText('Status')->operators(['contains']),
            Filter::inputText('Message')->operators(['contains']),
            Filter::datepicker('SyncDate'),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

    /**
     * PowerGrid Customer Action Buttons.
     *
     * @return array<int, Button>
     */

    /*
    public function actions(): array
    {
       return [
           Button::make('edit', 'Edit')
               ->class('bg-indigo-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm')
               ->route('customer.edit', function(\App\Models\netsuite\Customer $model) {
                    return $model->id;
               }),

           Button::make('destroy', 'Delete')
               ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
               ->route('customer.destroy', function(\App\Models\netsuite\Customer $model) {
                    return $model->id;
               })
               ->method('delete')
        ];
    }
    */

    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

    /**
     * PowerGrid Customer Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($customer) => $customer->id === 1)
                ->hide(),
        ];
    }
    */
}
