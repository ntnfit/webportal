<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\{ActionButton, WithExport};
use PowerComponents\LivewirePowerGrid\Filters\Filter;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridColumns};

final class UserTable extends PowerGridComponent
{
    use ActionButton;
    use WithExport;
    public int $perPage = 5;
    public array $perPageValues = [0, 5, 10, 20, 50];
    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): array
    {
        
        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput()->withoutLoading(),
            Footer::make()
                ->showPerPage(50)
                ->showRecordCount(mode: 'full'),
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
     * @return Builder<\App\Models\User>
     */
    public function datasource(): Builder
    {
        return User::query();
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
            ->addColumn('id')
            ->addColumn('name')

           /** Example of custom column using a closure **/
            ->addColumn('name_lower', fn (User $model) => strtolower(e($model->name)))

            ->addColumn('email')
            ->addColumn('status')
           // ->addColumn('role')
            ->addColumn('phone')
           // ->addColumn('last_seen_formatted', fn (User $model) => Carbon::parse($model->last_seen)->format('d/m/Y H:i:s'))
            // ->addColumn('is_online')
            // ->addColumn('about')
            //->addColumn('photo_url')
            // ->addColumn('activation_code')
            // ->addColumn('is_system')
            // ->addColumn('email_verified_at_formatted', fn (User $model) => Carbon::parse($model->email_verified_at)->format('d/m/Y H:i:s'))
            // ->addColumn('permitter_id')
            // ->addColumn('site_id')
            // ->addColumn('department_id')
            // ->addColumn('is_permitter')
            ->addColumn('job_title')
            ->addColumn('created_at_formatted', fn (User $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'));
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
            Column::make('Id', 'id'),
            Column::make('Name', 'name')
                ->sortable()
                ->searchable()->editOnClick(),

            Column::make('Email', 'email')
                ->sortable()
                ->searchable(),

            Column::make('Status', 'status')->sortable()
            ->searchable()->toggleable('1','0',true)->bodyAttribute('text-center', 'color:red'),
            //Column::make('Role', 'role'),
            Column::make('Phone', 'phone')
                ->sortable()
                ->searchable()->editOnClick(),

           // Column::make('Last seen', 'last_seen_formatted', 'last_seen')
           //     ->sortable(),

         //   Column::make('Is online', 'is_online'),
            // Column::make('About', 'about')
            //     ->sortable()
            //     ->searchable(),

            // Column::make('Photo url', 'photo_url')
            //     ->sortable()
            //     ->searchable(),

            // Column::make('Activation code', 'activation_code')
            //     ->sortable()
            //     ->searchable(),

            // Column::make('Is system', 'is_system'),
            // Column::make('Email verified at', 'email_verified_at_formatted', 'email_verified_at')
            //     ->sortable(),

            // Column::make('Permitter id', 'permitter_id'),
            // Column::make('Site id', 'site_id'),
            // Column::make('Department id', 'department_id'),
            // Column::make('Is permitter', 'is_permitter'),
            Column::make('Job title', 'job_title')
                ->sortable()
                ->searchable(),

            Column::make('Created at', 'created_at_formatted', 'created_at')
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
            Filter::inputText('name')->operators(['contains']),
            Filter::inputText('email')->operators(['contains']),
            Filter::inputText('phone')->operators(['contains']),
            Filter::datetimepicker('last_seen'),
            Filter::inputText('about')->operators(['contains']),
            Filter::inputText('photo_url')->operators(['contains']),
            Filter::inputText('activation_code')->operators(['contains']),
            Filter::datetimepicker('email_verified_at'),
            Filter::inputText('job_title')->operators(['contains']),
            Filter::datetimepicker('created_at'),
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
     * PowerGrid User Action Buttons.
     *
     * @return array<int, Button>
     */

    /*
    public function actions(): array
    {
       return [
           Button::make('edit', 'Edit')
               ->class('bg-indigo-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm')
               ->route('user.edit', function(\App\Models\User $model) {
                    return $model->id;
               }),

           Button::make('destroy', 'Delete')
               ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
               ->route('user.destroy', function(\App\Models\User $model) {
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
     * PowerGrid User Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($user) => $user->id === 1)
                ->hide(),
        ];
    }
    */
    public function onUpdatedToggleable(string $id, string $field, string $value): void
    {
        User::query()->find($id)->update([
            $field => $value,
        ]);
        $this->dispatchBrowserEvent('alert', ['message' =>'Upate success']);
    }

}
