<?php

namespace App\DataTables;

use App\Models\MateriaMaestria;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class MateriasMaestriasDataTable extends DataTable
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
                return view('maestrias.materiasMaestrias.estado',['materiaMaestria'=>$query])->render();
            })
            ->addColumn('action', function($query){
                return view('maestrias.materiasMaestrias.acciones',['materiaMaestria'=>$query])->render();
            })->rawColumns(['estado','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\MateriasMaestria $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(MateriaMaestria $model)
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
                    ->setTableId('materiasmaestrias-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                      // ->buttons(
                    //     Button::make('create'),
                    //     Button::make('export'),
                    //     Button::make('print'),
                    //     Button::make('reset'),
                    //     Button::make('reload')
                    // );
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
            
            Column::make('nombre'),
            Column::make('descripcion')->title('Descripción'),
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
        return 'MateriasMaestrias_' . date('YmdHis');
    }
}
