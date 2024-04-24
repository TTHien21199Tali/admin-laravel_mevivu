<?php

namespace App\Admin\Http\Controllers\Post1;

use App\Admin\Http\Controllers\Controller;
use App\Admin\Http\Requests\Post1\Post1Request;
use App\Admin\Repositories\Post1\Post1RepositoryInterface;
use App\Admin\Services\Post1\Post1ServiceInterface;
use App\Admin\DataTables\Post1\Post1DataTable;
use App\Enums\DefaultStatus;
use App\Enums\Is_featured;
use Illuminate\Http\Request;

class Post1Controller extends Controller
{

    public function __construct(
        Post1RepositoryInterface $repository, 
        Post1ServiceInterface $service
    ){

        parent::__construct();

        $this->repository = $repository;
        $this->service = $service;
    }

    public function getView(){

        return [
            'index' => 'admin.post1.index',
            'create' => 'admin.post1.create',
            'edit' => 'admin.post1.edit'
        ];
    }

    public function getRoute(){
        return [
            'index' => 'admin.post1.index',
            'create' => 'admin.post1.create',
            'edit' => 'admin.post1.edit',
            'delete' => 'admin.post1.delete'
        ];
    }
    public function index(Post1DataTable $dataTable){
        
        // sửa tên delete
        $actionMultiple = [
            'deleteStatus' => trans('delete'),
            'publishedStatus' => DefaultStatus::Published->description(),
            'draftStatus' => DefaultStatus::Draft->description(),

            //is_featured
            'deleteIsFeatured' => trans('delete'),
            'YesIs_featured' =>Is_featured::Yes->description(),
            'NoIs_featured' =>Is_featured::No->description(),
        ];

        // dd($dataTable);
        return $dataTable->render($this->view['index'], [
            'actionMultiple' => $actionMultiple,
            'breadcrums' => $this->crums->add(__('post1'))
        ]);
        
    }

    public function create(){

        return view($this->view['create'], [
            'status' => DefaultStatus::asSelectArray(),
            'breadcrums' => $this->crums->add(__('post1'), route($this->route['index']))->add(__('add')),

            //
            'is_featured' => Is_featured::asSelectArray(),
            'breadcrums' => $this->crums->add(__('post1'), route($this->route['index']))->add(__('add'))
        ]);
    }

    public function store(Post1Request $request){
        
        $response = $this->service->store($request);
        // dd($request);

        if($response){
            return $request->input('submitter') == 'save' 
                    ? to_route($this->route['edit'], $response->id)->with('success', __('notifySuccess')) 
                    : to_route($this->route['index'])->with('success', __('notifySuccess'));
        }

        return back()->with('error', __('notifyFail'))->withInput();
    }

    // cách lấy trực tiếp các trường
    // public function edit($id){
    //     $post1 = $this->repository->findOrFail($id)->select(['id', 'image', 'title', 'status', 'is_featured', 'content', 'created_at'])->first();
    //     return view(
    //         $this->view['edit'], 
    //         [              
    //             'post1' => $post1, 
    //             'status' => DefaultStatus::asSelectArray(),
    //             'is_featured' => Is_featured::asSelectArray(),
    //             'breadcrums' => $this->crums->add(__('post1'), route($this->route['index']))->add(__('edit'))
    //         ], 
    //     );
    // }

    public function edit($id){

        // $categories = $this->repoCat->getFlatTree();
        
        $post1 = $this->repository->findOrFail($id, []);

        return view(
            $this->view['edit'], 
            [
                'post1' => $post1, 
                'status' => DefaultStatus::asSelectArray(),
                'is_featured' => Is_featured::asSelectArray(),
                'breadcrums' => $this->crums->add(__('post1'), route($this->route['index']))->add(__('edit'))
            ], 
        );
    }

    public function update(Post1Request $request){

        $response = $this->service->update($request);
        
        if($response){
            return $request->input('submitter') == 'save' 
                    ? back()->with('success', __('notifySuccess'))
                    : to_route($this->route['index'])->with('success', __('notifySuccess'));
        }

        return back()->with('error', __('notifyFail'));
    }

    public function delete($id){

        $this->service->delete($id);
        
        return to_route($this->route['index'])->with('success', __('notifySuccess'));
    }

    public function actionMultipleRecode(Request $request){

        $response = $this->service->actionMultipleRecode($request);

        if($response){

            return $response;
        }

        return back()->with('error', __('notifyFail'));
    }
}