<?php

namespace App\DataTables\Usuarios;

use App\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UsuariosDataTable extends DataTable
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
            ->addColumn('action', function($query){
                return view('usuarios.usuarios.acciones',['usuario'=>$query])->render();
            })
            ->editColumn('estado',function($user){
                return view('usuarios.usuarios.estado',['user'=>$user])->render();
            })
            ->editColumn('primer_nombre',function($user){
                return $user->primer_nombre.' '.$user->segundo_nombre;
            })
            ->filterColumn('primer_nombre', function($query, $keyword) {
                $sql = "CONCAT(primer_nombre,' ',segundo_nombre)  like ?";
                return $query->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->editColumn('primer_apellido',function($user){
                return $user->primer_apellido.' '.$user->segundo_apellido;
            })
            ->filterColumn('primer_apellido', function($query, $keyword) {
                $sql = "CONCAT(primer_apellido,' ',segundo_apellido)  like ?";
                return $query->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->rawColumns(['estado','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        if($this->rol){
            return $model->role($this->rol)->newQuery()->orderBy('primer_apellido','asc');
        }else{
            return $model->newQuery()->orderBy('primer_apellido','asc');
        }

    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('usuarios-usuarios-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    // ->buttons(
                    //     Button::make('create'),
                    //     Button::make('export')->text('Exportar'),
                    //     Button::make('print'),
                    //     Button::make('reset'),
                    //     Button::make('reload')
                    // )
                    ->parameters($this->getBuilderParameters());
    }


    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->title('Acciones'),
            Column::make('email'),
            Column::make('primer_apellido')->title('Apellidos'),
            Column::make('primer_nombre')->title('Nombres'),
            // Column::make('segundo_nombre'),
            // Column::make('segundo_apellido'),
            Column::make('identificacion')->title('Identificación'),
            Column::make('celular'),
            Column::make('estado'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Usuarios_Usuarios_' . date('YmdHis');
    }
}
