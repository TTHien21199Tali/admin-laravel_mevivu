<?php

namespace App\Admin\DataTables\Post1;

use App\Admin\DataTables\BaseDataTable;
use App\Admin\Repositories\Post1\Post1RepositoryInterface;
use App\Enums\DefaultStatus;
Use App\Enums\Is_featured;

class Post1DataTable extends BaseDataTable
{

    protected $nameTable = 'post1Table';

    protected $repoCat;

    public function __construct(
        Post1RepositoryInterface $repository,
        
    ){
        $this->repository = $repository;
        
        parent::__construct();
    }

    public function setView(){
        $this->view = [
            // trường image   xử lý theo dường dẫn file image.blade.php
            'action' => 'admin.post1.datatable.action',
            'image' => 'admin.post1.datatable.image',
            'title' => 'admin.post1.datatable.title',
            'status' => 'admin.post1.datatable.status',
            'checkbox' => 'admin.post1.datatable.checkbox',
            'is_featured'=> 'admin.post1.datatable.is_featured',
        ];
    }

    public function setColumnSearch(){
        $this->columnAllSearch = [ 2, 3, 4, 5];
        $this->columnSearchDate = [5];
        
        $this->columnSearchSelect = [
            [
                'column' => 3,
                'data' => DefaultStatus::asSelectArray()
            ],
            [
                'column' => 4,
                'data' => Is_featured::asSelectArray()
            ],
        ];
    }
    
    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */

     public function query()
     {
         return $this->repository->getByQueryBuilder([]);
     }

    protected function setCustomColumns(){
        $this->customColumns = config('datatables_columns.post1', []);
    }

    protected function setCustomEditColumns(){
        $this->customEditColumns = [
            'image' => $this->view['image'],
            'title' => $this->view['title'],
            'status' => $this->view['status'],
            'created_at' => '{{ format_date($created_at) }}',
            'checkbox' => $this->view['checkbox'],
            'is_featured' => $this->view['is_featured'],
            'checkbox' => $this->view['checkbox'],
        ];
    }
   
    protected function setCustomAddColumns(){
        $this->customAddColumns = [
            'action' => $this->view['action'],
        ];
    }

    protected function setCustomRawColumns(){
        $this->customRawColumns = ['checkbox', 'image', 'title', 'status','is_featured', 'action'];
        // $this->customRawColumns = ['action'];
    }
}