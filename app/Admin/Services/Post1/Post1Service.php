<?php

namespace App\Admin\Services\Post1;

use App\Admin\Services\Post1\Post1ServiceInterface;
use  App\Admin\Repositories\Post1\Post1RepositoryInterface;
use App\Enums\DefaultStatus;
use App\Enums\Is_featured;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Post1Service implements Post1ServiceInterface
{
    /**
     * Current Object instance
     *
     * @var array
     */
    protected $data;
    
    protected $repository;

    public function __construct(Post1RepositoryInterface $repository){
        $this->repository = $repository;
    }
    
    public function store(Request $request){

        $this->data = $request->validated();
        $this->data['posted_at'] = now();

        DB::beginTransaction();
        try {
            $post1 = $this->repository->create($this->data);

            DB::commit();
            return $post1;
        } catch (\Throwable $th) {
            // throw $th;
            DB::rollBack();
            return false;
        }
    }

    public function update(Request $request){
        
        $this->data = $request->validated();

        DB::beginTransaction();
        try {
            $post1 = $this->repository->update($this->data['id'], $this->data);
            DB::commit();
            return $post1;
        } catch (\Throwable $th) {
            // throw $th;
            DB::rollBack();
            return false;
        }
    }

    public function delete($id){

        return $this->repository->delete($id);
    }

    public function actionMultipleRecode(Request $request){

        if(!$request->input('id') || empty($request->input('id'))){
            return false;
        }

        $data = $request->all();
        
        if($data['action'] == 'delete'){

            foreach($data['id'] as $id){

                $this->delete($id);
            }

            return back()->with('success', __('notifySuccess'));
        }elseif($data['action'] == 'publishedStatus' || $data['action'] == 'draftStatus'){

            $this->repository->updateMultipleBy([
                ['id', 'in', $data['id']]
            ], [
                'status' => $data['action'] == 'publishedStatus' ? DefaultStatus::Published : DefaultStatus::Draft
            ]);
            
            return back()->with('success', __('notifySuccess'));
        }elseif($data['action'] == 'YesIs_featured' || $data['action'] == 'NoIs_featured'){

            $this->repository->updateMultipleBy([
                ['id', 'in', $data['id']]
            ], [
                'is_featured' => $data['action'] == 'YesIs_featured' ? Is_featured::Yes : Is_featured::No
            ]);
            
            return back()->with('success', __('notifySuccess'));
        }

        return false;
    }
}