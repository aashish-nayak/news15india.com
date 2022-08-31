<?php

namespace App\DataTables;

use App\Models\News;
use Carbon\Carbon;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class NewsDataTable extends DataTable
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
            ->addColumn('selectbox', function(News $news) {
                return view('components.datatable.checkbox',['id'=>$news->id]);
            })
            ->editColumn('image', function(News $news) {
                $image = ($news->image != NULL) ? asset('storage/media/'.$news->newsImage->filename) : null;
                return view('components.datatable.thumb',['image'=>$image]);
            })
            ->editColumn('title', '{{Str::limit($title,66)}}')
            ->addColumn('categories', function(News $news) {
                $cats = $news->categories;
                return view('components.datatable.badges',['data'=>$cats]);
            })
            ->filterColumn('categories', function($query, $keyword) {
                $query->whereHas('categories', function($q)use($keyword){
                    $q->where('cat_name','like',"%$keyword%")->orWhere('slug','like',"%$keyword%");
                });
            })
            ->editColumn('admin_id', function(News $news) {
                return $news->creator->name;
            })
            ->filterColumn('admin_id', function($query, $keyword) {
                $query->whereHas('creator', function($q)use($keyword){
                    $q->where('name','like',"%$keyword%");
                });
            })
            ->editColumn('status', function(News $news) {
                return view('components.datatable.status',['status'=>$news->status,'id'=>$news->id]);
            })
            ->addColumn('views', function(News $news) {
                return $news->getViews();
            })
            ->editColumn('created_at', function(News $news) {
                return Carbon::parse($news->created_at)->format('Y-m-d h:iA');
            })
            ->addColumn('action', function(News $news) {
                return view('components.datatable.actions',[
                    'edit' => 'admin.news.edit',
                    'delete' => 'admin.news.delete',
                    'item' => $news,
                    'view' => 'single-news',
                    'viewParam' => $news->slug,
                ]);
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\News $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(News $model)
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
                    ->lengthMenu([10,25,50,100,200])
                    ->setTableId('news-table')
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
            Column::computed('selectbox','<input type="checkbox" />')
                  ->exportable(false)
                  ->printable(false)
                  ->width(10)
                  ->addClass('text-center'),
            Column::make('id'),
            Column::make('image'),
            Column::make('title'),
            Column::make('categories'),
            Column::make('admin_id'),
            Column::make('status'),
            Column::make('views','views'),
            Column::make('created_at'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(30)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'News_' . date('YmdHis');
    }
}
