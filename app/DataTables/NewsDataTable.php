<?php

namespace App\DataTables;

use App\Models\News;
use Carbon\Carbon;
use Yajra\DataTables\Exports\DataTablesCollectionExport;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class NewsDataTable extends DataTable
{

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->setRowId('id')
            ->addColumn('selectbox', '')
            ->editColumn('image', function (News $news) {
                $image = ($news->image != NULL) ? asset('storage/media/' . $news->newsImage->filename) : null;
                return view('components.datatable.thumb', ['image' => $image]);
            })
            ->editColumn('title', '{{Str::limit($title,66)}}')
            ->addColumn('categories', function (News $news) {
                $cats = $news->categories;
                return view('components.datatable.badges', ['data' => $cats]);
            })
            ->filterColumn('categories', function ($query, $keyword) {
                $query->whereHas('categories', function ($q) use ($keyword) {
                    $q->where('cat_name', 'like', "%$keyword%")->orWhere('slug', 'like', "%$keyword%");
                });
            })
            ->editColumn('admin_id', function (News $news) {
                return $news->creator->name;
            })
            ->filterColumn('admin_id', function ($query, $keyword) {
                $query->whereHas('creator', function ($q) use ($keyword) {
                    $q->where('name', 'like', "%$keyword%");
                });
            })
           
            ->editColumn('status', function (News $news) {
                return view('components.datatable.status', ['status' => $news->status, 'id' => $news->id]);
            })
            ->addColumn('views', function (News $news) {
                return $news->getViews();
            })
            ->editColumn('created_at', function (News $news) {
                return Carbon::parse($news->created_at)->format('Y-m-d h:iA');
            })
            ->addColumn('action', function (News $news) {
                return view('components.datatable.actions', [
                    'edit' => 'admin.news.edit',
                    'delete' => 'admin.news.delete',
                    'item' => $news,
                    'view' => 'single-news',
                    'viewParam' => $news->slug,
                    'download' => 'javascript:void(0)'
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
        $data = $model->query();
        if (request()->from_date != '' && request()->to_date != '') {
            $data = $data->whereBetween('created_at', [request()->from_date, request()->to_date]);
        }
        if (request()->author != 'all') {
            $data = $data->where('admin_id', request()->author);
        }
        if (request()->status != '') {
            $data = $data->where('status', request()->status);
        }
        return $this->applyScopes($data);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->lengthMenu([10, 25, 50, 100, 200])
            ->select(["style"=>'os',"selector"=>'td:first-child'])
            ->stateSave('true')
            ->setTableId('news-table')
            ->columns($this->getColumns())
            // ->minifiedAjax('', null, ['from_date'=> "07-05-2022",
            //          'to_date'=> "30-06-2022",])
            ->postAjax([
                'dataType'=>'json',
                'data'=>'function ( d ) {
                    d.from_date =  $("#filter_from").val();
                    d.to_date = $("#filter_to").val();
                    d.author = $("#author").val();
                    d.status = $("#status").val();
                    return d;
                  }',
            ])
            ->dom('Bfrtip')
            ->orderBy(1)
            ->parameters([
                'rowCallback' => 'function( row, data ) {
                    if ( $.inArray(row.id, selected) !== -1 ) {
                        $(row).find("td.select-checkbox").trigger("click");
                        $(row).addClass("selected");
                    }
                }',
            ])
            ->buttons(
                Button::make('pageLength'),
                // Button::make('export')->exportOptions('modifier: { selected: null }'),
                Button::make('print')->exportOptions('modifier: { selected: null }'),
                Button::make('reload'),
                Button::make('reset'),
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
            Column::computed('selectbox', '')
                ->exportable(false)
                ->printable(false)
                ->searchable(false)
                ->orderable(false)
                ->width(10)
                ->addClass('text-center select-checkbox'),
            Column::make('id'),
            Column::make('image'),
            Column::make('title'),
            Column::make('categories'),
            Column::make('admin_id'),
            Column::make('status'),
            Column::make('views', 'views')->addClass('text-center'),
            Column::make('created_at')->addClass('text-center'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->searchable(false)
                ->orderable(false)
                ->width(80)
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
