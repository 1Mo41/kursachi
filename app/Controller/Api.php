<?php

namespace Controller;

use Model\Menu;
use Src\Request;
use Src\View;

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
}

