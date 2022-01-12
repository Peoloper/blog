<?php

namespace App\DataTables\backend;

use App\Models\Post;
use Illuminate\Support\Str;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PostsDataTable extends DataTable
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
            ->addColumn('action', function (Post $model) {
                return view('backend\post.action', compact('model'));
            })
            ->editColumn('Kategoria', function ($model)
            {
                return $model->category->name;
            })
            ->filterColumn('category_id', function ($query, $keyword)
            {
               $query->whereHas('category', function ($q) use ($keyword)
               {
                   $q->where('name', 'like', "%{$keyword}%");
               });
            })
            ->editColumn('User', function ($model)
            {
                return $model->user->name;
            })
            ->filterColumn('user_id', function ($query, $keyword)
            {
                $query->whereHas('user', function ($q) use ($keyword)
                {
                    $q->where('name', 'like', "%{$keyword}%");
                });
            })
            ->editColumn('content', function($model){
               return Str::limit($model->content, 30);
            })
            ->editColumn('title', function($model){
                return Str::limit($model->title, 30);
            })
            ->editColumn('created_at', function($model){
                return $model->created_at->diffForHumans();
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Post $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Post $model)
    {
        return $model::with(['category', 'user'])->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('post-table')
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
            Column::make('title')->title('Tytuł'),
            Column::make('content')->title('Treść'),
            Column::make('User', 'user_id'),
            Column::make('Kategoria', 'category_id'),
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
        return 'backend\Posts_' . date('YmdHis');
    }
}
