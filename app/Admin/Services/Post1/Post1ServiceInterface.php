<?php

namespace App\Admin\Services\Post1;
use Illuminate\Http\Request;

interface Post1ServiceInterface
{
    public function store(Request $request);
    public function update(Request $request);
    public function delete($id);
    public function actionMultipleRecode(Request $request);
}