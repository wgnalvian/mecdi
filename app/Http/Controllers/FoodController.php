<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Food;
use App\Models\order;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Echo_;
use Symfony\Component\CssSelector\XPath\Extension\FunctionExtension;

class FoodController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $foods = Food::all();
        return view('index', compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:5120',
            'name' => 'required|unique:foods',
            'type' => 'required',
            'price' => 'required'

        ]);

        $price = "$" . $request->price;
        $file = $request->file('image');
        $newName = uniqid() . "." . $file->extension();
        $food = new Food;
        $food->name = $request->name;
        $food->type = $request->type;
        $food->price = $price;
        $food->image = $newName;
        $food->save();
        $file->move('image', $newName);
        return redirect('/food')->with('status', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        return view('show', compact('food'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        return view('edit', compact('food'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Food $food)
    {


        if ($request->file('image') == null) {
            $image = $request->photo;
        } else {
            $file = $request->file('image');
            $image = uniqid() . "." . $file->extension();
            $file->move('image', $image);
            if ($request->photo) {
                unlink('image/' . $request->photo);
            }
        }

        $price = "$" . $request->price;
        Food::where('id', $food->id)->update([
            'name' => $request->name,
            'type' => $request->type,
            'price' => $price,
            'image' => $image
        ]);
        return redirect('/food')->with('status', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        Food::destroy($food->id);

        return redirect('/food')->with('status', 'Data berhasil dihapus');
    }
    public function ajax()
    {
        return view('ajax');
    }
    public function ajax_coba()
    {
        $result = Food::all();
        // return json_encode($result);
        return view('cobaAjax', compact('result'));
    }
    public function user()
    {

        session_start();

        if (!isset($_SESSION['name']) && !isset($_SESSION['table'])) {
            return redirect('/user/input');
        }
        $result = Food::all();
        return view('user', compact('result'));
    }
    public function all()
    {
        $result = Food::all();
        return view('userAll', compact('result'));
    }
    public function burger()
    {
        $result = Food::where('type', 'Burger')->get();
        return view('userBurger', compact('result'));
    }
    public function pizza()
    {
        $result = Food::where('type', 'Pizza')->get();
        return view('userPizza', compact('result'));
    }
    public function drink()
    {
        $result = Food::where('type', 'Drink')->get();
        return view('userDrink', compact('result'));
    }
    public function print(Request $request)
    {
        $result = Food::all();
        session_start();
        $order = new order();
        $order->name = $_SESSION['name'];
        $order->no_table = $_SESSION['table'];

        $dataOrder = [];


        foreach ($result as $item) :

            if ($request->jumitem == "0 item") {
                return redirect('/user')->with('status', 'Menu Belum Dipilih');
            }
            if ($request->{str_replace(" ", '', $item->name) . "val"} != '0') {

                $dataOrder[] = $item->name . ',' .
                    $request->{str_replace(" ", '', $item->name) . "val"} . ',' . $request->{str_replace(" ", '', $item->name)};
            }


        endforeach;

        $order->order = serialize($dataOrder);
        $order->total = $request->jumitem;
        $order->presentation = 'menunggu';
        $order->cost = $request->total;
        $order->save();



        return redirect('/user')->with('wait', 'Mohon tunggu sejenak pesanan akan segera datang');





        // $pdf = PDF::loadview('print', ["data" => [
        //     compact('result'),
        //     $request


        // ]]);

        // return $pdf->download('PRINT-FOOD-pdf');
    }
    public function search(Request $request)
    {

        $post = Food::where('name', 'like', '%' . $request->get('keyword') . '%')->get();

        return view('search', compact('post'));
    }
    public function opener(Request $request)
    {

        if (isset($_POST['submit'])) {
            session_start();
            $_SESSION['name'] = $request->name;
            $_SESSION['table'] = $request->table;

            return redirect('/user');
        }
    }

    public function input()
    {
        return view('opener');
    }
    public function order()
    {
        $result = order::all();

        return view('order', compact('result'));
    }

    public function done(order $order)
    {

        $result = order::find($order->id);
        $result->presentation = 'done';
        $result->save();
        return redirect('/user/order');
    }
    public function delete(order $order)
    {
        order::destroy($order->id);

        return redirect('/user/order')->with('status', 'Data berhasil dihapus');
    }
    public function chasier()
    {
        $result = order::all();

        return view('chasier', compact('result'));
    }
    public function ChasierPaid(order $order)
    {
        return view('ChasierPaid', compact('order'));
    }
    public function ChasierStore(order $order, Request $request)
    {

        order::where('id', $order->id)
            ->update([
                'paid' => '$' . $request->paid,
                'money-change' => '$' . $request->changeMoney,
                'status' => 'terbayar'
            ]);

        return redirect()->to('/user/chasier');
    }
    public function ChasierDestroy(order $order)
    {

        order::destroy($order->id);
        return redirect()->back();
    }
}
