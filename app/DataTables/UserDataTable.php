<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Carbon;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
{

    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return datatables()
            ->eloquent($query)
            ->setRowId('id')
            ->editColumn('created_at', function (User $User) {
                return Carbon::create($User->created_at)->format('Y-m-d h:iA');
            })
            ->editColumn('phone_number', function (User $User) {
                return $User->details->phone_number ?? '-';
            })
            ->filterColumn('phone', function ($query, $keyword) {
                $query->whereHas('details', function ($q) use ($keyword) {
                    $q->where('phone','like', "%$keyword%");
                });
            })
            ->editColumn('whatsapp_number', function (User $User) {
                return $User->details->whatsapp_number ?? '-';
            })
            ->filterColumn('whatsapp_number', function ($query, $keyword) {
                $query->whereHas('details', function ($q) use ($keyword) {
                    $q->where('whatsapp_number','like', "%$keyword%");
                });
            })
            ->editColumn('zip', function (User $User) {
                return $User->details->zip ?? '-';
            })
            ->filterColumn('zip', function ($query, $keyword) {
                $query->whereHas('details', function ($q) use ($keyword) {
                    $q->where('zip','like', "%$keyword%");
                });
            })
            ->editColumn('city_id', function (User $User) {
                return $User->details->city->name ?? '-';
            })
            ->filterColumn('city_id', function ($query, $keyword) {
                $query->whereHas('details.city', function ($q) use ($keyword) {
                    $q->where('name','like', "%$keyword%");
                });
            })
            ->editColumn('state_id', function (User $User) {
                return $User->details->state->name ?? '-';
            })
            ->filterColumn('state_id', function ($query, $keyword) {
                $query->whereHas('details.state', function ($q) use ($keyword) {
                    $q->where('name','like', "%$keyword%");
                });
            })
            ->addColumn('action', function (User $User) {
                return view('components.datatable.actions', [
                    'buttons' => [
                        'trash'=>[
                            'url'       => route('admin.viewer.delete', $User->id),
                            'classes'   => 'delete text-danger',
                            'icon'      => 'bx bxs-trash',
                            'permission'=> 'delete-user',
                        ],
                    ]
                ]);
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model): QueryBuilder
    {
        $data = $model->newQuery();
        if (request()->from_date != '' && request()->to_date != '') {
            $data = $data->whereDate('created_at', '>=', request()->from_date)->whereDate('created_at', '<=', request()->to_date);
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
            ->scrollX(true)
            ->addTableClass('w-100 table-responsive')
            ->select(["style" => 'os', "selector" => 'td:first-child'])
            ->stateSave('true')
            ->setTableId('user-table')
            ->columns($this->getColumns())
            ->postAjax([
                'dataType' => 'json',
                'data' => 'function ( d ) {
                    d.designation = $("#designation").val();
                    d.status = $("#status").val();
                    return d;
                  }',
            ])
            ->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('pageLength'),
                Button::make('export'),
                Button::make('print')->exportOptions('modifier: { selected: null }'),
                Button::make('reload'),
                Button::make('reset'),
            ]);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('created_at'),
            Column::make('name'),
            Column::make('email'),
            [
                "name" => "phone_number",
                "title" => "Mobile",
                "data" => "phone_number"
            ],
            [
                "name" => "whatsapp_number",
                "title" => "Whatsapp",
                "data" => "whatsapp_number"
            ],
            [
                "name" => "zip",
                "title" => "Pincode",
                "data" => "zip"
            ],
            [
                "name" => "city_id",
                "title" => "Location",
                "data" => "city_id"
            ],
            [
                "name" => "state_id",
                "title" => "State",
                "data" => "state_id",
            ],
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->searchable(false)
            ->orderable(false)
            ->width(100)
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
        return 'User_' . date('YmdHis');
    }
}
