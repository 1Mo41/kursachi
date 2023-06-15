<?php

namespace Controller;

use Illuminate\Database\Capsule\Manager as DB;
use Model\Menu;
use Model\User;
use Src\Request;
use Src\View;
use Src\FileUploader;
use Src\Auth\Auth;

class Api
{
    public function index(): void
    {
        $menu = Menu::all()->toArray();

        (new View())->toJSON($menu);
    }

    public function echo(Request $request): void
    {
        (new View())->toJSON($request->all());
    }

    public function signup(Request $request)
    {
        $user = new User();
        $user->id = $request->id;
        $user->name = $request->name;
        $user->login = $request->login;
        $user->password = $request->password;
        $user->prof = 0;

        if ($user->save()) {
            (new View())->toJSON($request->all());
        }
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['login' => $request->login, 'password' => $request->password])) {
            $user = Auth::user();
            $token = Auth::generateCSRF();
            (new View())->toJSON(['user' => $user, 'token' => $token, 'message' => 'Вы успешно вошли']);
        } else (new View())->toJSON(['message' => 'Такого пользователя не существует']);
    }

    public function add_menu(Request $request)
    {

        $fileUploader = new FileUploader($_FILES['photo']);
        $destination = 'uploads';
        $newFileName = $fileUploader->upload($destination);

        $photo = $destination . '/' . $newFileName;

        $menu = new Menu();
        $menu->id = $request->id;
        $menu->nameing = $request->nameing;
        $menu->ves = $request->ves;
        $menu->price = $request->price;
        $menu->description = $request->description;
        $menu->typeDishid = $request->typeDishid;
        $menu->photo = $photo;

        if ($menu->save()) {
            (new View())->toJSON($request->all());
        }
    }

    public function delete_menu($id)
    {
        if (Menu::find($id)) {
            $menu = Menu::find($id);
            if ($menu->delete()) {
                (new View())->toJSON(['user' => $menu, 'message' => 'Успешно удалено']);
            } else (new View())->toJSON(['message' => 'Удаление не было произведено']);
        } else (new View())->toJSON(['message' => 'Такого блюда в меню не существует']);
    }

    public function izmenenie_menu($id, Request $request)
    {
            if (Menu::find($id)) {
                $menu = Menu::find($id);

                $fileUploader = new FileUploader($_FILES['photo']);
                $destination = 'uploads';
                $newFileName = $fileUploader->upload($destination);

                $photo = $destination . '/' . $newFileName;

                    $menu->nameing = $request->nameing;
                    $menu->ves = $request->ves;
                    $menu->price = $request->price;
                    $menu->description = $request->description;
                    $menu->typeDishid = $request->typeDishid;
                    $menu->photo = $photo;
                if ($menu->save()) {
                    (new View())->toJSON(['menu' => $menu, 'message' => 'Успешно изменено']);
                }
            } else (new View())->toJSON(['message' => 'Ничего не найдено']);
    }
    public function search(Request $request){
        $search1 = $request->search1;
        $cartons = DB::table('menu')
            ->join('typedish', 'menu.typeDishId', '=', 'typedish.typeDishId')
            ->where('menu.nameIng', 'LIKE', '%' . $search1 . '%')
            ->get()
            ->toArray();
        (new View())->toJSON($cartons);
    }
    public function logout(Request $request){
        if(Auth::user()){
        Auth::logout();
        (new View())->toJSON(['message' => 'Вы успешно вышли']);
        } else (new View())->toJSON(['message' => 'Вы не в системе']);
    }
}

