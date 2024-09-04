<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PurchaseItem;
use App\Models\Product;
use App\Models\Purchase;

class PurchaseItemController extends Controller
{
    public function index()
    {
        $purchaseItems = PurchaseItem::with('product', 'purchase')->get();
        return view('purchase_items.index', compact('purchaseItems'));
    }

    public function create()
    {
        $purchases = Purchase::all();
        $products = Product::all();
        return view('purchase_items.create', compact('purchases', 'products'));
    }

    public function store(Request $request)
    {
        PurchaseItem::create([
            'purchase_id' => $request->purchase_id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'price' => $request->price,
        ]);

        return redirect()->route('purchase_items.index');
    }

    public function show(PurchaseItem $purchaseItem)
    {
        return view('purchase_items.show', compact('purchaseItem'));
    }

    public function edit(PurchaseItem $purchaseItem)
    {
        $purchases = Purchase::all();
        $products = Product::all();
        return view('purchase_items.edit', compact('purchaseItem', 'purchases', 'products'));
    }

    public function update(Request $request, PurchaseItem $purchaseItem)
    {
        $purchaseItem->update([
            'purchase_id' => $request->purchase_id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'price' => $request->price,
        ]);

        return redirect()->route('purchase_items.index');
    }

    public function destroy(PurchaseItem $purchaseItem)
    {
        $purchaseItem->delete();
        return redirect()->route('purchase_items.index');
    }
}
