<?php

namespace App\DataTables;

use App\Models\Complaint;
use Carbon\Carbon;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ComplaintDataTable extends DataTable
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
            ->editColumn('created_at', function (Complaint $complaint) {
                return Carbon::create($complaint->created_at)->format('d-m-y');
            })
            ->editColumn('updated_at', function (Complaint $complaint) {
                return Carbon::create($complaint->updated_at)->format('d-m-y');
            })
            ->editColumn('status', function (Complaint $complaint) {
                $color = '';
                switch ($complaint->status) {
                    case 'pending':
                        $color = 'bg-warning';
                        break;
                    case 'process':
                        $color = 'bg-info';
                        break;
                    case 'solve':
                        $color = 'bg-success';
                        break;
                    case 'reject':
                        $color = 'bg-danger';
                        break;
                    default:
                        $color = 'bg-secondary';
                        break;
                }
                return view('components.datatable.badges', ['data' => [['status'=>ucwords($complaint->status)]],'param'=>'status','bgcolor'=>$color]);
            })
            ->editColumn('email', function (Complaint $complaint) {
                return $complaint->user->email;
            })
            ->filterColumn('email', function ($query, $keyword) {
                $query->whereHas('user', function ($q) use ($keyword) {
                    $q->where('email', 'like', "%$keyword%");
                });
            })
            ->editColumn('phone_number', function (Complaint $complaint) {
                return $complaint->user->details->phone_number ?? '-';
            })
            ->filterColumn('phone_number', function ($query, $keyword) {
                $query->whereHas('user.details', function ($q) use ($keyword) {
                    $q->where('phone_number', 'like', "%$keyword%");
                });
            })
            ->addColumn('action', function (Complaint $complaint) {
                return view('components.datatable.actions', [
                    'buttons' => [
                        'view'=>[
                            'url'       => route('admin.complaint.view', $complaint->id),
                            'icon'      => 'bx bxs-show',
                            'permission'=> 'approve-reporters',
                        ],
                    ]
                ]);
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \Complaint $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Complaint $model)
    {
        $data = $model->newQuery();

        if (request()->from_date != '' && request()->to_date != '') {
            $data = $data->whereDate('created_at', '>=', request()->from_date)->whereDate('created_at', '<=', request()->to_date);
        }
        if (request()->subject != 'all') {
            $data = $data->where('subject', request()->subject);
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
                    ->setTableId('complaintdatatable-table')
                    ->columns($this->getColumns())
                    ->postAjax([
                        'dataType' => 'json',
                        'data' => 'function ( d ) {
                            d.from_date =  $("#filter_from").val();
                            d.to_date = $("#filter_to").val();
                            d.subject = $("#subject").val();
                            d.status = $("#status").val();
                            return d;
                          }',
                    ])
                    ->dom('Bfrtip')
                    ->orderBy(0)
                    ->buttons(
                        Button::make('pageLength'),
                        Button::make('excel'),
                        Button::make('print'),
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
            Column::make('id'),
            Column::make('name'),
            [
                "name" => "created_at",
                "title" => "Date",
                "data" => "created_at"
            ],
            Column::make('email'),
            [
                "name" => "phone_number",
                "title" => "Phone",
                "data" => "phone_number"
            ],
            Column::make('subject'),
            [
                "name" => "updated_at",
                "title" => "Solve Date",
                "data" => "updated_at"
            ],
            Column::make('status'),
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
        return 'Complaint_' . date('YmdHis');
    }
}
