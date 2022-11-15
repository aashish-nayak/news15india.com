<?php

namespace App\DataTables;

use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use App\Models\Page;
use Illuminate\Support\Carbon;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PageDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->setRowId('id')
            ->addColumn('selectbox', '')
            ->editColumn('created_at', function (Page $page) {
                return Carbon::create($page->created_at)->format('Y-m-d h:iA');
            })
            ->editColumn('updated_at', function (Page $page) {
                return Carbon::create($page->updated_at)->format('Y-m-d h:iA');
            })
            ->addColumn('views', function (Page $page) {
                return $page->getViews();
            })
            ->editColumn('status', function (Page $page) {
                return view('components.datatable.status', [
                    'status' => $page->status,
                    'id' => $page->id,
                    'url' => route('admin.page.status',$page->id),
                    'element'=>'switch',
                ]);
            })
            ->addColumn('action', function (Page $page) {
                return view('components.datatable.actions', [
                    'buttons' => [
                        'view'=>[
                            'url'       => route('page', $page->slug),
                            'icon'      => 'bx bxs-show',
                            'target'    => '_blank',
                            'permission'=> 'read-page',
                        ],
                        'edit'=>[
                            'url'       => route('admin.page.edit', $page->id),
                            'icon'      => 'bx bxs-edit',
                            'permission'=> 'update-page',
                        ],
                        'delete'=>[
                            'url'       => route('admin.page.delete', $page->id),
                            'icon'      => 'bx bxs-trash',
                            'classes'   => 'delete text-danger',
                            'permission'=> 'delete-page',
                        ],
                    ]
                ]);
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \Page $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Page $model): QueryBuilder
    {
        $data = $model->newQuery();

        if (request()->from_date != '' && request()->to_date != '') {
            $data = $data->whereDate('created_at', '>=', request()->from_date)->whereDate('created_at', '<=', request()->to_date);
        }
        if (request()->status != 'all') {
            $data = $data->where('status', request()->status);
        }
        return $this->applyScopes($data);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->lengthMenu([10, 25, 50, 100, 200])
                    ->select(["style" => 'os', "selector" => 'td:first-child'])
                    ->stateSave('true')
                    ->addTableClass('w-100')
                    ->setTableId('pagedatatable-table')
                    ->columns($this->getColumns())
                    ->postAjax([
                        'dataType' => 'json',
                        'data' => 'function ( d ) {
                            d.from_date =  $("#filter_from").val();
                            d.to_date = $("#filter_to").val();
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
                        Button::make('reload'),
                        Button::make('reset'),
                    );
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
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
            Column::make('name'),
            Column::make('slug'),
            Column::make('views', 'views')->addClass('text-center'),
            Column::make('status'),
            Column::make('created_at'),
            Column::make('updated_at'),
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
    protected function filename(): string
    {
        return 'Page_' . date('YmdHis');
    }
}
