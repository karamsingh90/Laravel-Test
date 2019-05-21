<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ItemsManagement;
use Session;
use PhpParser\Node\Expr\AssignOp\Concat;

class BackendController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('backend/home');
    }

    public function itemsManagement()
    {
        $items = ItemsManagement::paginate(5);
        return view('backend/items-management', compact('items'));
    }

    public function AddItem()
    {
        return view('backend/add-item');
    }

    public function UpdateItem($id)
    {

        $item = ItemsManagement::where(['id' => $id])->first();
        if(!$item){
            return redirect()->route('items-management');
        }

        return view('backend/update-item', compact('item'));
    }

    public function AddUpdateItem(Request $request)
    {

        $this->validate($request,[
            'name' => 'required|max:191',
            'price' => 'required|numeric|between:0,9999999999.99'
        ]);

        $item = [
            'name' => $request->name,
            'price' => $request->price,
        ];

        if(isset($request->item_id)){
            ItemsManagement::where(['id' => $request->item_id])->update($item);
            $message = 'Item has been updated successfully..';
        }else{
            ItemsManagement::create($item);
            $message = 'Item has been created successfully..';
        }



        Session::flash('message', $message);

        return redirect()->route('items-management');
    }

    public function DeleteItem($id)
    {
        ItemsManagement::where(['id' => $id])->delete();
        Session::flash('message', 'Item has been deleted successfully..');
        return redirect()->route('items-management');
    }


    public function search(Request $request)
    {

      if($request->ajax()){
        echo $request->search;
        $output="";
        $items = ItemsManagement::where('name','LIKE','%'.$request->search."%")->get();

        if($items){

           foreach ($items as  $item) {

            $output.='<tr>'.

            '<td>'.$item->name.'</td>'.

            '<td>'.$item->price.'</td>'.

            '<td>'.date('d-m-Y H:i:s', strtotime($item->created_at)).'</td>'.

            '<td><a href="'.route('update-item', $item->id).'">Update</a></td>'.
            '<td><a onclick="return confirm(Are you sure?);" href="'.route('delete-item', $item->id).'">Delete</a></td>'.
        '</tr>';

           }
           return $output;
        }else{
            return '<td>No record found</td>';
        }

      }
   }

}
