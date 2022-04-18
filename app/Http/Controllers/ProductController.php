<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\User;

class ProductController extends Controller {
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request) {
        
        $products = Product::select('products.*')
                ->where('status','Active')
                ->leftJoin('users', 'products.user_id', '=', 'users.id')
            ;    
        if(isset($request)){
            if($request->search && $request->search != null):
                $search = $request->search;
                $products->where('users.name','like','%'.$search.'%');
                $products->orWhere('products.name','like','%'.$search.'%');
            endif;
            if( ($request->from_date && $request->from_date != null) && ($request->to_date && $request->to_date != null) ):
                $from_date = Carbon::createFromFormat('d/m/Y', $request->from_date)->format('Y-m-d');
                $to_date = Carbon::createFromFormat('d/m/Y', $request->to_date)->format('Y-m-d');
                $products->whereBetween('products.created_at', [$from_date, $to_date]);            
            endif;            
        }
        
        $products->orderBy('products.id','desc');
        
        if($request->ajax()){
            $products = $products->paginate(config('custom.product.searchPerPage'));
            $html = '';
            foreach ($products as $product){
                $html .= view('product.partial.list', compact('product'))->render();
            }
            echo json_encode(array('html'=>$html));
            exit;            
        }
        
        $total = $products->count();
        $products = $products->paginate(config('custom.product.searchPerPage'));
        
        $request->flash();
        return view('product.search', compact('products','total'));
        
    }
    
}
