<?php

namespace App\DataTables;

use App\DataTables\Core\BaseDatable;
use App\Domain\Package\Models\Package;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;

class PackageDataTable extends BaseDatable
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
            ->addIndexColumn()
            ->editColumn('name', fn (Package $package) => $package->name)
            ->editColumn('price', fn (Package $package) => number_format($package->price))
            ->editColumn('created_at', fn (Package $package) => formatDate($package->created_at))
            ->editColumn('updated_at', fn (Package $package) => formatDate($package->updated_at))
            ->addColumn('action', 'admin.packages._tableAction')
            ->filterColumn('name', function($query, $keyword) {
                $query->where('name', 'like', "%{$keyword}%");
            })
            ->rawColumns(['action', 'name']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Package $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Package $model)
    {
        return $model->newQuery();
    }

    protected function getColumns(): array
    {
        return [
            Column::checkbox(''),
            Column::make('id')->title(__('STT'))->data('DT_RowIndex')->searchable(false),
            Column::make('name')->title(__('Tên'))->width('18%'),
            Column::make('price')->title(__('Giá'))->width('10%'),
            Column::make('created_at')->title(__('Thời gian tạo'))->searchable(false),
            Column::computed('action')
                ->title(__('Tác vụ'))
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    protected function getTableButton(): array
    {
        return [
            Button::make('create')->addClass('btn btn-success')->text('<i class="fal fa-plus-circle mr-2"></i>'.__('Tạo mới')),
            Button::make('bulkDelete')->addClass('btn btn-danger')->text('<i class="fal fa-trash-alt mr-2"></i>'.__('Xóa')),
            Button::make('reset')->addClass('btn bg-primary')->text('<i class="fal fa-undo mr-2"></i>'.__('Thiết lập lại')),
        ];
    }

    protected function getBuilderParameters(): array
    {
        return [
            'id' => [5, 'desc'],
        ];
    }

     
    
}
