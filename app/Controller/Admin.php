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
    public function add_personal (Request $request): string
    {
        $personal = Personal::all();
        $tables = Tables::all();
        $positions = Position::all();



        $fileUploader = new FileUploader($_FILES['photoNaPass']);

            $destination = 'uploads';

            $newFileName = $fileUploader->upload($destination);

            if (DB::table('personal')->insert([
                'firstName' => $_POST['firstName'],
                'positionID' => $_POST['positionID'],
                'tableID' => $_POST['tableID'],
                'photoNaPass' => $destination . '/' . $newFileName,
            ])) {
                app()->route->redirect('/proverkaAdmin');
            }


        return  new View('site.add_personal',['personal'=>$personal,'tables'=>$tables,'positions'=>$positions]);
    }
    }
