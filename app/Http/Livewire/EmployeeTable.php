<?php

namespace App\Http\Livewire;

use App\Models\netsuite\Employee;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\{ActionButton, WithExport};
use PowerComponents\LivewirePowerGrid\Filters\Filter;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridColumns};

final class EmployeeTable extends PowerGridComponent
{
    use ActionButton;
    use WithExport;
    public string $primaryKey = 'GTemployee.EmployeeID';

    public string $sortField = 'GTemployee.EmployeeID';
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
            Exportable::make('Employee')
                ->striped('#A6ACCD')
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
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
     * @return Builder<\App\Models\netsuite\Employee>
     */
    public function datasource(): Builder
    {
        return Employee::query();
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
            ->addColumn('EmployeeID')

           /** Example of custom column using a closure **/
            ->addColumn('EmployeeID_lower', fn (Employee $model) => strtolower(e($model->EmployeeID)))

            ->addColumn('EmployeeCode')
            ->addColumn('EmployeeName')
            ->addColumn('CyberCode')
            ->addColumn('JobTitles')
            ->addColumn('Email')
            ->addColumn('Phone')
            ->addColumn('MobilePhone')
            ->addColumn('OfficePhone')
            ->addColumn('Branch')
            ->addColumn('Department')
            ->addColumn('Section')
            ->addColumn('Location')
            ->addColumn('Roles')
            ->addColumn('CreatedDate_formatted', fn (Employee $model) => Carbon::parse($model->CreatedDate)->format('d/m/Y'))
            ->addColumn('CreatedBy')
            ->addColumn('LastModifiedDate_formatted', fn (Employee $model) => Carbon::parse($model->LastModifiedDate)->format('d/m/Y'))
            ->addColumn('LastModifiedBy')
            ->addColumn('Status')
            ->addColumn('Message')
            ->addColumn('SyncDate_formatted', fn (Employee $model) => Carbon::parse($model->SyncDate)->format('d/m/Y'));
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
            Column::make('EmployeeID', 'EmployeeID')
                ->sortable()
                ->searchable(),

            Column::make('EmployeeCode', 'EmployeeCode')
                ->sortable()
                ->searchable(),

            Column::make('EmployeeName', 'EmployeeName')
                ->sortable()
                ->searchable(),

            Column::make('CyberCode', 'CyberCode')
                ->sortable()
                ->searchable(),

            Column::make('JobTitles', 'JobTitles')
                ->sortable()
                ->searchable(),

            Column::make('Email', 'Email')
                ->sortable()
                ->searchable(),

            Column::make('Phone', 'Phone')
                ->sortable()
                ->searchable(),

            Column::make('MobilePhone', 'MobilePhone')
                ->sortable()
                ->searchable(),

            Column::make('OfficePhone', 'OfficePhone')
                ->sortable()
                ->searchable(),

            Column::make('Branch', 'Branch')
                ->sortable()
                ->searchable(),

            Column::make('Department', 'Department')
                ->sortable()
                ->searchable(),

            Column::make('Section', 'Section')
                ->sortable()
                ->searchable(),

            Column::make('Location', 'Location')
                ->sortable()
                ->searchable(),

            Column::make('Roles', 'Roles')
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
            Filter::inputText('EmployeeID')->operators(['contains']),
            Filter::inputText('EmployeeCode')->operators(['contains']),
            Filter::inputText('EmployeeName')->operators(['contains']),
            Filter::inputText('CyberCode')->operators(['contains']),
            Filter::inputText('JobTitles')->operators(['contains']),
            Filter::inputText('Email')->operators(['contains']),
            Filter::inputText('Phone')->operators(['contains']),
            Filter::inputText('MobilePhone')->operators(['contains']),
            Filter::inputText('OfficePhone')->operators(['contains']),
            Filter::inputText('Branch')->operators(['contains']),
            Filter::inputText('Department')->operators(['contains']),
            Filter::inputText('Section')->operators(['contains']),
            Filter::inputText('Location')->operators(['contains']),
            Filter::inputText('Roles')->operators(['contains']),
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
     * PowerGrid Employee Action Buttons.
     *
     * @return array<int, Button>
     */

    /*
    public function actions(): array
    {
       return [
           Button::make('edit', 'Edit')
               ->class('bg-indigo-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm')
               ->route('employee.edit', function(\App\Models\netsuite\Employee $model) {
                    return $model->id;
               }),

           Button::make('destroy', 'Delete')
               ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
               ->route('employee.destroy', function(\App\Models\netsuite\Employee $model) {
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
     * PowerGrid Employee Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($employee) => $employee->id === 1)
                ->hide(),
        ];
    }
    */
}
