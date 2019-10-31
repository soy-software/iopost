<?php

namespace App\DataTables;

use App\Models\Maestria;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class MaestriasDataTable extends DataTable
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
            ->editColumn('estado',function($query){
                return view('maestrias.estado',['maestria'=>$query])->render();
            })
            ->addColumn('Acciones', function($query){
                return view('maestrias.acciones',['maestria'=>$query])->render();
            })
            ->rawColumns(['estado','Acciones']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Maestria $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Maestria $model)
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
                    ->setTableId('maestrias-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::computed('Acciones')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('id')->title('#'),
            Column::make('nombre')->title('Nombre'),
            Column::make('tipoPrograma')->title('Tipo Programa'),
            Column::make('titulo')->title('Título'),
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
        return 'Maestrias_' . date('YmdHis');
    }
}
