<?php

namespace Controller;

use Illuminate\Database\Capsule\Manager as DB;
use Model\Position;
use Model\Reviews;
use Model\Menu;
use Src\FileUploader;
use Src\View;
use Src\Request;
use Model\Personal;
use Model\Typedish;
use Model\Tables;
use Src\Auth\Auth;
use Src\Validator\Validator;
class Admin
{
    public function add_menu(Request $request): string
    {
        $typeDish = Typedish::all();
        if ($request->method === 'POST') {
//            $validator = new Validator($request->all(), [
//                'nameImg' => ['required'],
//                'ves' => ['required'],
//                'price' => ['required'],
//                'description' => ['required'],
//                'photo' => ['required', 'fileType', 'fileSize']
//            ], [
//                'required' => 'Поле :field пусто'
//            ]);

            $fileUploader = new FileUploader($_FILES['photo']);

            $destination = 'uploads';

            $newFileName = $fileUploader->upload($destination);

            if (DB::table('menu')->insert([
                'nameIng' => $_POST['nameIng'],
                'ves' => $_POST['ves'],
                'price' => $_POST['price'],
                'description' => $_POST['description'],
                'photo' => $destination . '/' . $newFileName,
                'typeDishId' => $_POST['typeDishId'],
            ])) {
                app()->route->redirect('/proverkaAdmin');
            }
        }
        return (new View())->render('site.add_menu', ['typeDish' => $typeDish]);
    }

    public function proverkaAdmina(Request $request): string
    {
        $carton = Menu::all();
        $typeDish = Typedish::all();
        if (isset($_GET['del'])) {
            $id = $_GET['del'];
            $carton = DB::table('menu')
                ->where('menu.id', $id)
                ->delete();
            app()->route->redirect('/proverkaAdmina');
        }


        return (new View())->render('site.proverkaAdmina', ['carton' => $carton, 'typeDish' => $typeDish]);
    }

    public function izmenenie(Request $request): string
    {

        $typeDish = Typedish::all();
        if (isset($_GET['izmena'])) {
            $id = $_GET['izmena'];
            $carton = DB::table('menu')
                ->where('menu.id', $id)
                ->select('menu.*')
                ->get();
            $carton = (array)$carton[0];


            return (new View())->render('site.izmenenie', ['carton' => $carton, 'typeDish' => $typeDish]);
        }
    }
    
}
