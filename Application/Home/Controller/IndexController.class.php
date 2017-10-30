<?php

namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $data = D("Userinfo")->order('id desc')->relation('archives')->limit(10)->select();
        $this->list = $data;
        $this->display('index');
    }

    public function Add()
    {
        $this->display('Add');
    }

    public function AddData()
    {
        $Result = M("Userinfo");
        $data['Name'] = I('Name');
        $data['Age'] = I('Age');
        $data['Email'] = I('Email');
        $data['Pwd'] = md5(I('Pwd'));
        $data['CreateAt'] = Date('Y-m-d H:i:s');
        $data['UpdateAt'] = Date('Y-m-d H:i:s');
        if ($Result->add($data)) {
            echo 0;
        } else {
            echo 1;
        }
    }

    public function Del($id)
    {
        if (M("Userinfo")->where("id = $id")->delete()) {
            echo 0;
        } else {
            echo 1;
        }
    }

    public function Edit($id)
    {
        $this->item = D("Userinfo")->relation('archives')->where("id={$id}")->find();
        $this->display('Edit');
    }

    public function EditData()
    {
        $Result = M("Userinfo");
        $data['Name'] = I('Name');
        $data['Age'] = I('Age');
        $data['Email'] = I('Email');
        $data['UpdateAt'] = Date('Y-m-d H:i:s');
        if (!empty(I('Pwd'))) {
            $data['Pwd'] = md5(I('Pwd'));
        }
        $id = I('id');
        if ($Result->where("id=$id")->save($data)) {
            echo 0;
        } else {
            echo 1;
        }
    }

    public function Info($id)
    {
        $this->item = D("Userinfo")->where("id={$id}")->relation(true)->find();
        $this->display('Info');
    }
}