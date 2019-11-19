<?php

namespace App\DataTables;

use App\Models\Inscripcion;


use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class InscritosCorteDataTable extends DataTable
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
            ->editColumn('user_id',function($inscri){
                return $inscri->user->apellidos .' '.$inscri->user->nombres  ;
            })
            ->editColumn('comprobante',function($inscri){
                return view('maestrias.cortes.comprobante',['inscripcion'=>$inscri])->render();
            })
            ->addColumn('action', function($inscri){
                return view('maestrias.cortes.accionesInscritos',['inscripcion'=>$inscri])->render();
            })->rawColumns(['comprobante','estado','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\InscritosCorte $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Inscripcion $model)
    {
        $idCorte=$this->idCorte;
        return $model->where('corte_id',$idCorte)->select();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('inscritoscorte-table')
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
            
            Column::make('user_id')->title('Aspirante'),
            Column::make('comprobante')
                ->exportable(false)
                ->printable(false),
            Column::make('estado'),
            Column::make('created_at')->title('Inscrito el'),
            
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'InscritosCorte_' . date('YmdHis');
    }
}
