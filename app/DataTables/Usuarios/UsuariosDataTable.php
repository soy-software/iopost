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
        return $model->newQuery();
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
            Column::make('nombres'),
            Column::make('apellidos'),
            Column::make('identificacion')->title('Identificación'),
            // Column::make('tipo_identificacion')->title('T.identificación'),
            // Column::make('fecha_nacimiento')->title('F.nacimiento'),
            // Column::make('sexo'),
            // Column::make('estado_civil'),
            // Column::make('etnia'),
            // Column::make('estado'),
            // Column::make('telefono')->title('Teléfono'),
            Column::make('celular'),
            // Column::make('pais')->title('País'),
            // Column::make('provincia'),
            // Column::make('canton')->title('Cantón'),
            // Column::make('parroquia'),
            // Column::make('direccion')->title('Dirección'),
            // Column::make('tiene_discapacidad')->title('Discapacidad'),
            // Column::make('porcentaje_discapacidad')->title('% discapacidad'),
            // Column::make('tiene_carnet_conadis')->title('Carnet conadis'),
            // Column::make('porcentaje_carnet_conadis')->title('% carnet conadis'),
            Column::make('estado')
                ->exportable(false)
                ->printable(false)
            ,

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
