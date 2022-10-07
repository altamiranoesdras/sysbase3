<?php

namespace App\DataTables;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function($User){
                $id = $User->id;
                return view('admin.users.datatables_actions',compact('User','id'));
            })->editColumn('avatar',function (User $user){

                return "<img src='{$user->thumb}' alt='' width='50' height='50'>";

            })->editColumn('roles',function (User $user){

                return view('admin.users.partials.roles',compact('user'));

            })->rawColumns(['action','avatar','roles']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model): QueryBuilder
    {
        $query = $model->newQuery()->with(['roles','media']);

        //si el usuario no puede ver a todos los usuarios
        if (auth()->user()->cannot('ver todos los usuarios')){

            //excluir los roles dev y super
            $query->whereDoesntHave('roles',function ($q){
                $q->whereIn('id',[Role::DEVELOPER,Role::SUPERADMIN]);
            });
        }

        return $query;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->ajax([
                'data' => "function(data) { formatDataDataTables($('#formFiltersDatatables').serializeArray(), data);   }"
            ])
            ->info(true)
            ->language(['url' => asset('js/SpanishDataTables.json')])
            ->responsive(true)
            ->stateSave(true)
            ->orderBy(1,'desc')
            ->dom('
                <"row mb-2"
                    <"col-sm-12 col-md-6" B>
                    <"col-sm-12 col-md-6" f>
                >
                rt
                <"row"
                    <"col-sm-6 order-2 order-sm-1" ip>
                    <"col-sm-6 order-1 order-sm-2 text-right" l>

                >
            ')
            ->buttons(

                Button::make('print')
                    ->formTitle('Titulo')->titleAttr('Titutlo2')
                    ->text('<i class="fa fa-print"></i> <span class="d-none d-sm-inline">Imprimir</span>'),
                Button::make('reset')
                    ->text('<i class="fa fa-undo"></i> <span class="d-none d-sm-inline">Reiniciar</span>'),
                Button::make('export')
                    ->text('<i class="fa fa-download"></i> <span class="d-none d-sm-inline">Exportar</span>'),
            );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        return [

            Column::make('avatar')->orderable('false')->searchable(false),
            Column::make('id'),
            Column::make('username'),
            Column::make('name'),
            Column::make('email'),
            Column::make('provider'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width('20%')
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'UserDataTable2_' . date('YmdHis');
    }
}
