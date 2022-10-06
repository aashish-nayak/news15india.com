<?php

namespace App\DataTables;

use App\Models\Admin;
use Carbon\Carbon;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AdminDataTable extends DataTable
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
                ->setRowId('id')
                // ->addColumn('selectbox', '')
                ->editColumn('phone', function (Admin $admin) {
                    return $admin->details->phone;
                })
                ->filterColumn('phone', function ($query, $keyword) {
                    $query->whereHas('details', function ($q) use ($keyword) {
                        $q->where('phone','like', "%$keyword%");
                    });
                })
                ->editColumn('state_id', function (Admin $admin) {
                    return $admin->details->state->name ?? '-';
                })
                ->filterColumn('state_id', function ($query, $keyword) {
                    $query->whereHas('details.state', function ($q) use ($keyword) {
                        $q->where('name','like', "%$keyword%");
                    });
                })
                ->editColumn('city_id', function (Admin $admin) {
                    return $admin->details->city->name ?? '-';
                })
                ->filterColumn('city_id', function ($query, $keyword) {
                    $query->whereHas('details.city', function ($q) use ($keyword) {
                        $q->where('name','like', "%$keyword%");
                    });
                })
                ->editColumn('zip', function (Admin $admin) {
                    return $admin->details->zip ?? '-';
                })
                ->filterColumn('zip', function ($query, $keyword) {
                    $query->whereHas('details', function ($q) use ($keyword) {
                        $q->where('zip','like', "%$keyword%");
                    });
                })
                ->editColumn('designation', function (Admin $admin) {
                    return view('components.datatable.badges',[
                        'data' => $admin->roles,
                        'param' => 'name',
                    ]);
                })
                ->filterColumn('designation', function ($query, $keyword) {
                    $query->whereHas('roles', function ($q) use ($keyword) {
                        $q->where('name', 'like', "%$keyword%")->orWhere('slug', 'like', "%$keyword%");
                    });
                })
                ->editColumn('id_card', function (Admin $admin) {
                    return $admin->id_card ?? '-';
                })
                ->editColumn('is_card', function (Admin $admin) {
                    return ($admin->is_card == 1) ? 'Yes' : 'No';
                })
                ->editColumn('letter', function (Admin $admin) {
                    return ($admin->letter == 1) ? 'Yes' : 'No';
                })
                ->editColumn('pro', function (Admin $admin) {
                    return ($admin->pro == 1) ? 'Yes' : 'No';
                })
                ->editColumn('status', function (Admin $admin) {
                    return view('components.datatable.status', ['status' => $admin->status, 'id' => $admin->id]);
                })
                ->addColumn('action', function (Admin $admin) {
                    return view('components.datatable.actions', [
                        'buttons' => [
                            'edit'=>[
                                'url'       => route('admin.user.edit', $admin->id),
                                'icon'      => 'bx bxs-edit',
                                'permission'=> 'update-member',
                            ],
                            'trash'=>[
                                'url'       => route('admin.user.delete', $admin->id),
                                'classes'   => 'delete text-danger',
                                'icon'      => 'bx bxs-trash',
                                'permission'=> 'delete-member',
                            ],
                        ]
                    ]);
                });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \Admin $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Admin $model)
    {
        $data = $model->newQuery();
        $data = $data->whereHas('roles', function ($query) {
            $query->where('slug', '!=', 'super-admin');
        });
        if (request()->designation != 'all') {
            $data = $data->whereHas('roles', function($q){
                $q->where('role_id',request()->designation);
            });
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
    public function html()
    {
        return $this->builder()
                    ->scrollX(true)
                    ->addTableClass('w-100 table-responsive')
                    ->lengthMenu([10, 25, 50, 100, 200])
                    ->select(["style" => 'os', "selector" => 'td:first-child'])
                    ->stateSave('true')                    
                    ->setTableId('admindatatable-table')
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
                    ->buttons(
                        Button::make('pageLength'),
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
            // Column::computed('selectbox', '')
            //     ->exportable(false)
            //     ->printable(false)
            //     ->searchable(false)
            //     ->orderable(false)
            //     ->width(10)
            //     ->addClass('text-center select-checkbox'),
            Column::make('id'),
            Column::make('name'),
            [
                "name" => "phone",
                "title" => "Mobile",
                "data" => "phone"
            ],
            [
                "name" => "email",
                "title" => "Official Email",
                "data" => "email"
            ],
            [
                "name" => "state_id",
                "title" => "State",
                "data" => "state_id",
            ],
            [
                "name" => "city_id",
                "title" => "Location",
                "data" => "city_id"
            ],
            [
                "name" => "zip",
                "title" => "Pincode",
                "data" => "zip"
            ],
            [
                "name" => "designation",
                "title" => "Designation",
                "data" => "designation"
            ],
            [
                "name" => "id_card",
                "title" => "ID Card No",
                "data" => "id_card"
            ],
            [
                "name" => "is_card",
                "title" => "ID Card",
                "data" => "is_card"
            ],
            Column::make('letter'),
            Column::make('pro'),
            Column::make('status'),
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
    protected function filename()
    {
        return 'Admin_' . date('YmdHis');
    }
}
