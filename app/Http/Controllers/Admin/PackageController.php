<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\DataTables\PackageDataTable; 
use App\Domain\Package\Models\Package;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use App\Http\Requests\Admin\PackageBulkDeleteRequest;
use App\Http\Requests\Admin\PackageStoreRequest;
use App\Http\Requests\Admin\PackageUpdateRequest;
class PackageController
{
    use AuthorizesRequests;

    public function index(PackageDataTable $dataTable)
    {
        $this->authorize('view', Package::class);

        return $dataTable->render('admin.packages.index');
    }

    public function create(): View
    {
        $this->authorize('create', Package::class);
        return view('admin.packages.create');
    }

    public function store(PackageStoreRequest $request)
    {
        $this->authorize('create', Package::class);
        $data = $request->except([ 'image','proengsoft_jsvalidation']);
        $package = Package::create($data);
        if ($request->hasFile('image')) {
            $package->addMedia($request->image)->toMediaCollection('image');
        }

        flash()->success(__('Bài viết ":model" đã được tạo thành công !', ['model' => $package->name]));

        logActivity($package, 'create'); // log activity

        return intended($request, route('admin.packages.index'));
    }

    public function edit(Package $package): View
    {
        $this->authorize('update', $package);

        return view('admin.packages.edit', compact('package'));
    }

    public function update(Package $package, PackageUpdateRequest $request)
    {
        $this->authorize('update', $package);

        if ($request->hasFile('image')) {
            $package->addMedia($request->image)->toMediaCollection('image');
        }

        $package->update($request->except([ 'image' ]));

        flash()->success(__('Bài viết ":model" đã được cập nhật !', ['model' => $package->name]));

        logActivity($package, 'update'); // log activity

        return intended($request, route('admin.packages.index'));
    }

    public function destroy(Package $package)
    {
        $this->authorize('delete', $package);
        logActivity($package, 'delete'); // log activity

        $package->delete();

        return response()->json([
            'status' => true,
            'message' => __('Bài viết đã xóa thành công !'),
        ]);
    }

    public function bulkDelete(PackageBulkDeleteRequest $request)
    {
        $count_deleted = 0;
        $deletedRecord = Package::whereIn('id', $request->input('id'))->get();
        foreach ($deletedRecord as $package) {
                logActivity($package, 'delete'); // log activity
                $package->delete();
                $count_deleted++;
        }
        return response()->json([
            'status' => true,
            'message' => __('Đã xóa ":count" gói tin thành công',
                [
                    'count' => $count_deleted,
                ]),
        ]);
    }


    public function upLoadFileImage(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'file' => ['mimes:jpeg,jpg,png', 'required', 'max:2048'],
            ],
            [
                'file.mimes' => __('Tệp tải lên không hợp lệ'),
                'file.max' => __('Tệp quá lớn'),
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->first('file'),
            ], \Illuminate\Http\Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $file = $request->file('file')->storePublicly('tmp/uploads');

        return response()->json([
            'file' => $file,
            'status' => true,
        ]);
    }
}
