<?php

declare(strict_types=1);

namespace App\Controllers;
use App\Core\Response;
use App\Core\View;
use App\Models\ShopList;

class HomeController
{

    private ShopList $shop_list;

    public function __construct()
    {
        $this->shop_list=new ShopList();

    }

    public function init():string
    {
        //to create tables visit /init
        return $this->shop_list->init();
    }

    public function index():View
    {
        return View::make('index');
    }

    public function list()
    {      
        Response::Json($this->shop_list->get());
    }

    public function create()
    {
        //todo: server side validation needed
        $this->shop_list->create($_POST);
        header('Location:/');
    }

    public function update()
    {
        //todo: server side validation needed
        $this->shop_list->update((int)$_POST['id'],$_POST) ? http_response_code(200) : http_response_code(500);
    }

    public function delete($id)
    {  
        $this->shop_list->delete($id);
        header('Location:/');

    }
}
