<?php

namespace App\Http\Controllers\Admin;

use App\Models\Shoe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ShoeAddRequest;
use App\Http\Requests\Admin\ShoeUpdateRequest;
use App\Models\ShoeSizeWithStock;
use Illuminate\Support\Facades\DB;

class ShoeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $shoes = Shoe::when($search, function ($q, $search) {
            $q->where('name', 'LIKE', "$search%");
        })->simplePaginate(20);

        return view('admin.shoes.index', compact('shoes', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $shoeSizes = config('constants.shoes_sizes');
        $shoeTypes = config('constants.shoeType');

        return view('admin.shoes.create', compact('shoeSizes', 'shoeTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ShoeAddRequest $request)
    {
        $data = $request->validated();

        $sizeWithStock = array_combine($data['size'], $data['stock']);
        try {
            DB::beginTransaction();

            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $data['image'] = $imageName;

            $shoe = Shoe::create($data);
            $image->move(public_path('images/shoes/'), $imageName);

            foreach ($sizeWithStock as $key => $value) {
                ShoeSizeWithStock::create([
                    'shoe_id' => $shoe->id,
                    'size' => $key,
                    'stock' => $value
                ]);
            }
            DB::commit();

            return to_route('shoes.index')->with('success', 'Shoes added successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return to_route('shoes.index')->with('failure', 'Shoes not added!' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Shoe $shoe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shoe $shoe)
    {
        $shoeSizes = config('constants.shoes_sizes');
        $shoeTypes = config('constants.shoeType');

        $shoeStock = ShoeSizeWithStock::where('shoe_id', $shoe->id)->get();

        $size = [];
        $stock = [];

        foreach ($shoeStock as $s) {
            $size[] = $s->size;
            $stock[] = $s->stock;
        }
        $sizeStock = array_combine($size, $stock);

        return view('admin.shoes.edit', compact('shoe', 'shoeSizes', 'shoeStock', 'sizeStock', 'shoeTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ShoeUpdateRequest $request, Shoe $shoe)
    {
        $data = $request->validated();

        $sizeWithStock = array_combine($data['size'], $data['stock']);
        try {
            DB::beginTransaction();

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = $image->getClientOriginalName();
                $data['image'] = $imageName;
            }

            $shoe->update($data);

            if ($request->hasFile('image'))
                $image->move(public_path('images/shoes/'), $imageName);

            ShoeSizeWithStock::where('shoe_id', $shoe->id)->delete();

            foreach ($sizeWithStock as $key => $value) {

                ShoeSizeWithStock::create([
                    'shoe_id' => $shoe->id,
                    'size' => $key,
                    'stock' => $value
                ]);
            }

            DB::commit();

            return to_route('shoes.index')->with('success', 'Shoes updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return to_route('shoes.index')->with('failure', 'Shoes not updated!' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shoe $shoe)
    {
        try {
            DB::beginTransaction();

            ShoeSizeWithStock::where('shoe_id', $shoe->id)->delete();
            $shoe->delete();

            DB::commit();
            return to_route('shoes.index')->with('success', 'Shoes deleted successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return to_route('shoes.index')->with('failure', 'Shoes not deleted!' . $e->getMessage());
        }
    }

    public function changeStatus($id)
    {
        try {
            DB::beginTransaction();

            $shoe = Shoe::findOrFail($id);

            $shoe->is_active = $shoe->is_active == Shoe::ACTIVE ? Shoe::INACTIVE : Shoe::ACTIVE;
            $shoe->save();

            DB::commit();

            return back()->with('success', 'Status updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('failure', 'Status not updated!' . $e->getMessage());
        }
    }
}
