<?php

namespace App\DataTables;

use App\Models\Corte;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CortesDataTable extends DataTable
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
            ->editColumn('numero', function($query){
                return "Corte " .$query->numero ;
            })
            ->filterColumn('numero', function($query, $keyword) {
                $sql = "CONCAT('Corte ',cortes.numero)  like ?";
                return $query->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->editColumn('estado', function($query){
                return view('maestrias.cortes.estado',['corte'=>$query])->render();
            })

            ->addColumn('action', function($query){
                return view('maestrias.cortes.acciones',['corte'=>$query])->render();
            })
            ->rawColumns(['estado','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Corte $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Corte $model)
    {
        $idMaestria=$this->idMaestria;
        return $model->where('maestria_id',$idMaestria)->select();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('cortes-table')
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
                  ->width(60)
                  ->title('Acciones')
                  ->addClass('text-center'),
            Column::make('numero')->title('Corte'),
            Column::make('estado'),
            Column::make('created_at')->title('Fecha de creación'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Cortes_' . date('YmdHis');
    }
}
