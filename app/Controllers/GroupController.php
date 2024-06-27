<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\GroupModel;
class GroupController extends BaseController
{
    
    public function table()
    {
        $model = new GroupModel();
        $data['groups'] = $model->findAll();
        return view('Dashboard/group/table', $data);
    }
    
   

   

    public function edit($id)
    {
        $model = new GroupModel();
        $data['group'] = $model->find($id);

        return view('Dashboard/group/edit', $data);
    }

    public function update($id)
    {
        $model = new GroupModel();

        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
        ];

        $model->update($id, $data);
        return redirect()->route('Table_Group');
        
        //return redirect('Table_Group');
    }   
        //tạo mới
         public function create()
        {
            return view('Dashboard/group/create');
        }
        public function store()
        {
            $model = new GroupModel();

            $data = [
                'name' => $this->request->getPost('name'),
                'description' => $this->request->getPost('description'),
            ];

            $model->save($data);
            return redirect('Table_Group');
        }



        public function delete($id)
        {
            $model = new GroupModel();
            $model->delete($id);
            
            return redirect()->back();
        }

}
