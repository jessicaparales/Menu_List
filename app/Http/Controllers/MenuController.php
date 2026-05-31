<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    
    public function showMenu(){
        $menuList= Menu::all()-> where('archieved', 0); 
        return view('menu', compact("menuList"));
    }

    public function showMenuFoods(){
        $menuList= Menu::all()
        -> where('archieved', 0) 
        -> where('menu_category', 'foods'); 
        return view('menu', compact("menuList"));
    }

    public function showMenuDrinks(){
        $menuList= Menu::all()
        -> where('archieved', 0) 
        -> where('menu_category', 'drinks'); 
        return view('menu', compact("menuList"));
    }
    
    public function showmanageMenu(){
        $menuList= Menu::all()
        -> where('archieved', 0);    
        return view("manageMenu", compact("menuList"));
    }

    public function addMenu(Request $request){
           
        if($request->hasFile('menu_picture')){
            $file = $request->file('menu_picture');
            $filename = time() . "." . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'),$filename);

            Menu::create([
                "menu_name"=> $request->menu_name,
                "menu_price"=> $request->menu_price,
                "menu_picture"=> $filename,
                "menu_category"=> $request->menu_category
            ]);
        }else{
            Menu::create([
                "menu_name"=> $request->menu_name,
                "menu_price"=> $request->menu_price,
                "menu_category"=> $request->menu_category
            ]);
        }

        return back()->with('success', 'Added successfully!');
    }

    public function editMenu(Request $request, $id){
        $menu = Menu::where('menu_id', $id);

        if(!$menu){
            return back()->with('error', 'Unable to edit');
        }else{
            if($request->hasFile('menupic')){
                $file = $request->file('menupic');
                $filename = time() . "." . $file->getClientOriginalExtension();
                $file->move(public_path('uploads'),$filename);

                $menu->update([
                    'menu_name'=> $request->editname,
                    'menu_description'=> $request->editdescription,
                    'menu_price'=> $request->editprice,
                    'menu_category'=> $request->editcategory,
                    'menu_picture'=> $filename
                ]);
            }else{
                $menu->update([
                    'menu_name'=> $request->editname,
                    'menu_description'=> $request->editdescription,
                    'menu_price'=> $request->editprice,
                    'menu_category'=> $request->editcategory
                ]);
            }

            return back()->with('success', 'Update Successfully');
        }
    }

    public function deleteMenu(Request $request){
        $menu = Menu::where('menu_id', $request->menu_id);

        if(!$menu){
            return back()->with('error', 'Unable to delete');
        }else{
            $menu->update([
                'archieved'=> 1
            ]);

            return back()->with('success', 'Deleted Successfully');
        }
    }

    public function showDashboard(){
        $userCount     = User::count();
        $menuCount     = Menu::where('archieved', 0)->count();
        $foodsCount    = Menu::where('menu_category', 'foods')->where('archieved', 0)->count();
        $drinksCount   = Menu::where('menu_category', 'drinks')->where('archieved', 0)->count();
        $archivedCount = Menu::where('archieved', 1)->count();
        $avgPrice      = Menu::where('archieved', 0)->avg('menu_price');

        // Items per category and avg price per category (active only)
        $categoryStats = Menu::where('archieved', 0)
            ->selectRaw('menu_category, COUNT(*) as total, ROUND(AVG(menu_price), 2) as avg_price')
            ->groupBy('menu_category')
            ->get();

        $categoryLabels   = $categoryStats->pluck('menu_category');
        $categoryCounts   = $categoryStats->pluck('total');
        $categoryAvgPrice = $categoryStats->pluck('avg_price');

        // Active items missing a picture or description
        $incompleteItems = Menu::where('archieved', 0)
            ->where(function($query){
                $query->whereNull('menu_picture')
                      ->orWhere('menu_picture', '')
                      ->orWhereNull('menu_description')
                      ->orWhere('menu_description', '');
            })
            ->get();

        return view('home', compact(
            'userCount',
            'menuCount',
            'foodsCount',
            'drinksCount',
            'archivedCount',
            'avgPrice',
            'categoryLabels',
            'categoryCounts',
            'categoryAvgPrice',
            'incompleteItems'
        ));
    }
}