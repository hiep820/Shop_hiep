<?php

namespace App\Http\Controllers;

use App\Class\Repositories\Categories\CategoryRepository;
use App\Class\Repositories\Menu\MenuCategoryRepository;
use App\Class\Repositories\Menu\MenuRepository;
use App\Class\Services\Category\CategoryService;
use App\Class\Services\MenuCategoryService;
use App\Class\Services\MenuService;
use App\Http\Requests\MenuRequest;
use App\Http\Requests\StatisticsRequest;
use App\Models\Category;
use App\Models\MenuCategory;
use App\Models\Menus;
use Illuminate\Http\Request;

class MenusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $menuRepository;
    protected $menuCategoryService;
    protected $menuService;
    protected $categoryRepository;
    protected $menuCategoryRepository;
    protected $categoryService;

    public function __construct(
        MenuRepository $menuRepository,
        MenuService $menuService,
        CategoryRepository $categoryRepository,
        CategoryService $categoryService,
        MenuCategoryRepository $menuCategoryRepository,
        MenuCategoryService $menuCategoryService
    ) {
        $this->menuRepository = $menuRepository;
        $this->menuService = $menuService;
        $this->categoryRepository = $categoryRepository;
        $this->menuCategoryRepository = $menuCategoryRepository;
        $this->menuCategoryService = $menuCategoryService;
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $menu = $this->menuService->all();
        return view('store.menus.list', ['menu' => $menu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('store.menus.create', ['category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->menuCategoryService->store($request);
        return redirect()->route('web.store.menus.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $menu = $this->menuService->editRp($id);
        $ary= $this->menuService->edit($id);
        $category =$this->categoryService->all();
        return view('store.menus.edit',[
            'menu'=>$menu,
            'ary'=>$ary,
            'category'=>$category

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->menuCategoryService->update($request, $id);
        return redirect()->route('web.store.menus.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Menus::where('id_menu', $id)->delete();
        $this->menuRepository->delete($id);
        return redirect()->back();
    }
}
