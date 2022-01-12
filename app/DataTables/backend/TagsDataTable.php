<?php

namespace App\DataTables\backend;

use App\Models\Tag;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class TagsDataTable extends DataTable
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
            ->addColumn('action', function (Tag $model) {
                return view('backend.tag.action', compact('model'));
            })
            ->editColumn('created_at', function($model){
                return $model->created_at->diffForHumans();
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Tag $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Tag $model)
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
                    ->setTableId('tag-table')
            ->columns($this->getColumns())
            ->buttons(["csv", "excel", "pdf", "print"])
            ->minifiedAjax()
            ->dom('Bfrtlip')
            ->orderBy(1, 'asc');
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id'),
            Column::make('name')->title('Tag'),
            Column::make('created_at')->title('Dodano'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center')->title('Action'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'backend\Tags_' . date('YmdHis');
    }
}
