<?php

namespace App\DataTables;

use App\Models\Advert;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AdvertDataTable extends DataTable
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
            ->editColumn('ad_category', function (Advert $advert) {
                return $advert->advert_category->category;
            })
            ->filterColumn('ad_category', function ($query, $keyword) {
                $query->whereHas('advert_category', function ($q) use ($keyword) {
                    $q->where('category', 'like', "%$keyword%");
                });
            })
            ->addColumn('ad_locations', function (Advert $advert) {
                $locations = $advert->ad_locations;
                return view('components.datatable.badges', [
                    'data' => $locations,
                    'param' => 'name',
                ]);
            })
            ->filterColumn('ad_locations', function ($query, $keyword) {
                $query->whereHas('ad_locations', function ($q) use ($keyword) {
                    $q->where('name', 'like', "%$keyword%")->orWhere('slug', 'like', "%$keyword%");
                });
            })
            ->editColumn('status', function (Advert $advert) {
                return view('components.datatable.status', [
                    'status' => $advert->status,
                    'id' => $advert->id,
                    'url' => route('admin.advert.status',$advert->id),
                    'element'=>'switch',
                ]);
            })
            ->addColumn('action', function (Advert $advert) {
                return view('components.datatable.actions', [
                    'buttons' => [
                        'edit'=>[
                            'url'       => route('admin.advert.edit', $advert->booking_id),
                            'icon'      => 'bx bxs-edit',
                            'permission'=> 'update-member',
                        ],
                        'trash'=>[
                            'url'       => route('admin.advert.delete', $advert->booking_id),
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
     * @param \Advert $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Advert $model)
    {
        $data = $model->newQuery();

        if (request()->from_date != '' && request()->to_date != '') {
            $data = $data->whereDate(request()->date_type, '>=', request()->from_date)->whereDate(request()->date_type, '<=', request()->to_date);
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
                    ->setTableId('advertdatatable-table')
                    ->columns($this->getColumns())
                    ->postAjax([
                        'dataType' => 'json',
                        'data' => 'function ( d ) {
                            d.from_date =  $("#filter_from").val();
                            d.to_date = $("#filter_to").val();
                            d.date_type = $("#date_type").val();
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
            Column::computed('selectbox', '')
                ->exportable(false)
                ->printable(false)
                ->searchable(false)
                ->orderable(false)
                ->width(10)
                ->addClass('text-center select-checkbox'),
            Column::make('id'),
            Column::make('advertiser_name'),
            Column::make('advertiser_email'),
            Column::make('ad_category'),
            Column::make('ad_locations')
            ->addClass('d-flex flex-column gap-1'),
            Column::make('publish_date'),
            Column::make('expire_date'),
            Column::make('status'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->searchable(false)
                ->orderable(false)
                ->width(90)
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
        return 'Advert_' . date('YmdHis');
    }
}
