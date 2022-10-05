<?php

namespace App\DataTables;

use App\Models\Reporter;
use Illuminate\Support\Carbon;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ReporterDataTable extends DataTable
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
            ->addColumn('selectbox', '')
            ->editColumn('created_at', function (Reporter $report) {
                return Carbon::create($report->created_at)->format('d-m-y');
            })
            ->editColumn('dob', function (Reporter $report) {
                return Carbon::createFromDate($report->dob)->format('d M Y');
            })
            ->editColumn('city_id', function (Reporter $report) {
                return $report->city->name;
            })
            ->filterColumn('city_id', function ($query, $keyword) {
                $query->whereHas('city', function ($q) use ($keyword) {
                    $q->where('name', 'like', "%$keyword%");
                });
            })
            ->editColumn('state_id', function (Reporter $report) {
                return $report->state->name;
            })
            ->filterColumn('state_id', function ($query, $keyword) {
                $query->whereHas('state', function ($q) use ($keyword) {
                    $q->where('name', 'like', "%$keyword%");
                });
            })
            ->editColumn('payment_status', function (Reporter $report) {
                return ($report->payment->payment_status == 0) ? 'Pending' : 'Recevied';
            })
            ->filterColumn('payment_status', function ($query, $keyword) {
                $query->whereHas('payment', function ($q) use ($keyword) {
                    $q->where('payment_status', 'like', "%$keyword%");
                });
            })
            ->editColumn('payment_method', function (Reporter $report) {
                return ucwords($report->payment->payment_method) ?? '';
            })
            ->filterColumn('payment_method', function ($query, $keyword) {
                $query->whereHas('payment', function ($q) use ($keyword) {
                    $q->where('payment_method', 'like', "%$keyword%");
                });
            })
            ->editColumn('order_id', function (Reporter $report) {
                return $report->payment->order_id ?? '';
            })
            ->filterColumn('order_id', function ($query, $keyword) {
                $query->whereHas('payment', function ($q) use ($keyword) {
                    $q->where('order_id',$keyword);
                });
            })
            ->addColumn('action', function (Reporter $report) {
                return view('components.datatable.actions', [
                    'item' => $report,
                    'current' => true,
                    'view' => 'admin.reporter.view',
                    'viewParam' => $report->id,
                ]);
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \Reporter $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Reporter $model)
    {
        $data = $model->newQuery();

        if (request()->from_date != '' && request()->to_date != '') {
            $data = $data->whereDate('created_at', '>=', request()->from_date)->whereDate('created_at', '<=', request()->to_date);
        }
        if (request()->designation != 'all') {
            $data = $data->where('applied_designation', request()->designation);
        }
        if (request()->status != 'all') {
            $data = $data->where('app_status', request()->status);
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
                    ->addTableClass('table-responsive')
                    ->lengthMenu([10, 25, 50, 100, 200])
                    ->select(["style" => 'os', "selector" => 'td:first-child'])
                    ->stateSave('true')
                    ->setTableId('reporterdatatable-table')
                    ->columns($this->getColumns())
                    ->postAjax([
                        'dataType' => 'json',
                        'data' => 'function ( d ) {
                            d.from_date =  $("#filter_from").val();
                            d.to_date = $("#filter_to").val();
                            d.designation = $("#designation").val();
                            d.status = $("#status").val();
                            return d;
                          }',
                    ])
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('pageLength'),
                        Button::make('excel'),
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
            [
                "name" => "created_at",
                "title" => "Date",
                "data" => "created_at"
            ],
            Column::make('name'),
            [
                "name" => "dob",
                "title" => "Date of Birth",
                "data" => "dob"
            ],
            [
                "name" => "phone_number",
                "title" => "Phone",
                "data" => "phone_number"
            ],
            [
                "name" => "city_id",
                "title" => "Location",
                "data" => "city_id"
            ],
            [
                "name" => "applied_designation",
                "title" => "Designation",
                "data" => "applied_designation"
            ],
            [
                "name" => "state_id",
                "title" => "State",
                "data" => "state_id"
            ],
            [
                "name" => "app_status",
                "title" => "Status",
                "data" => "app_status"
            ],
            [
                "name" => "payment_status",
                "title" => "P-Status",
                "data" => "payment_status"
            ],
            [
                "name" => "payment_method",
                "title" => "P-Mode",
                "data" => "payment_method"
            ],
            [
                "name" => "order_id",
                "title" => "P-ID",
                "data" => "order_id"
            ],
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
        return 'Reporter_' . date('YmdHis');
    }
}
