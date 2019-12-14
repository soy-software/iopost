<?php

namespace App\DataTables\Maestrias\MisMaestrias;

use App\Models\Inscripcion;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class InscritosDataTable extends DataTable
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
            ->editColumn('user_id',function($insc){
                return $insc->user->nombres.' '.$insc->user->apellidos;
            })
            ->filterColumn('user_id',function($query, $keyword){
                $query->whereHas('user', function($query) use ($keyword) {
                    $query->whereRaw("concat(nombres,' ',apellidos) like ?", ["%{$keyword}%"]);
                });            
            })
            ->editColumn('comprobante',function($insc){
                return $insc->user->identificacion;
            })
            ->filterColumn('comprobante',function($query, $keyword){
                $query->whereHas('user', function($query) use ($keyword) {
                    $query->whereRaw("identificacion like ?", ["%{$keyword}%"]);
                });            
            })
            ->filterColumn('corte_id',function($query, $keyword){
                $query->whereHas('user', function($query) use ($keyword) {
                    $query->whereRaw("email like ?", ["%{$keyword}%"]);
                });            
            })
            ->editColumn('corte_id',function($insc){
                return $insc->user->email;
            })
            ->editColumn('updated_at',function($insc){
                return $insc->user->celular;
            })
            ->filterColumn('updated_at',function($query, $keyword){
                $query->whereHas('user', function($query) use ($keyword) {
                    $query->whereRaw("celular like ?", ["%{$keyword}%"]);
                });            
            })
            
            ->addColumn('action', function($insc){
                return view('maestrias.misMaestrias.ifoAspirante',['insc'=>$insc])->render();
            })
            ->rawColumns(['action','user_id','comprobante']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Maestrias/MisMaestrias/Inscrito $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Inscripcion $model)
    {
        return $model->where('corte_id',$this->corte);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('maestrias-mismaestrias-inscritos-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('frtip')
                    ->orderBy(1)
                    // ->buttons(
                    //     Button::make('create'),
                    //     Button::make('export'),
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
                  ->addClass('text-center')
                  ->title('Acción'),
            
            Column::make('id')->title('# de registro'),
            Column::make('user_id')->title('Nombres y Apellidos'),
            Column::make('comprobante')->title('Identificación'),
            Column::make('corte_id')->title('Email'),
            Column::make('updated_at')->title('# de celular'),
            Column::make('created_at')->title('Fecha de registro'),
            
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
        return 'Maestrias_MisMaestrias_Inscritos_' . date('YmdHis');
    }
}
