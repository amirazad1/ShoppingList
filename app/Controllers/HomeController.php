<?php

declare(strict_types=1);

namespace App\Controllers;
use App\Core\Response;
use App\Core\View;
use App\Models\ShopList;

class HomeController
{
    public function __construct()
    {

    }

    public function init()
    {
        $shop_list=new ShopList("");
        return $shop_list->init() ? 'Table Create Successfully' : 'Error';
    }

    public function index():View
    {
        return View::make('index');
    }

    public function list()
    {
        $shop_list=new ShopList("list_items");
        Response::Json($shop_list->get());
    }

    public function create()
    {
        $shop_list=new ShopList("list_items");
        $shop_list->create($_POST);
        header('Location:/');
    }

    public function update()
    {
        $shop_list=new ShopList("list_items");
        $shop_list->update((int)$_POST['id'],$_POST) ? http_response_code(200) : http_response_code(500);
    }

    public function delete($id)
    {
        echo $id;
        $shop_list=new ShopList("list_items");
        $shop_list->delete($id);
        header('Location:/');

    }
}
