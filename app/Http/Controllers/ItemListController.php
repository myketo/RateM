<?php

namespace App\Http\Controllers;

use App\Models\ItemList;
use App\Models\User;
use Illuminate\Http\Request;

class ItemListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        return view('list.index', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        return $user->name == auth()->user()->name ? view('list.create') : redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => ['prohibited'],
            'name' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'type' => ['required', 'in:songs,albums,artists'],
            'cover' => ['nullable', 'file', 'image'],
        ]);
        
        $validated['user_id'] = auth()->user()->id;

        $list = ItemList::create($validated);

        $params = [
            'user' => auth()->user()->name,
            'list' => $list->name,
        ];
        return redirect()->route('user.list.show', $params)->with('message', 'Successfully created a new list.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ItemList  $list
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, ItemList $list)
    {
        return view('list.show', ['list' => $list]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ItemList  $itemList
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, ItemList $list)
    {
        if(auth()->user()->name != $user->name) return redirect()->route('user.profile', ['user' => auth()->user()->name]);
      
        return view('list.edit', ['list' => $list]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ItemList  $itemList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, ItemList $list)
    {
        $validated = $request->validate([
            'user_id' => ['prohibited'],
            'name' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'type' => ['required', 'in:songs,albums,artists'],
            'cover' => ['nullable', 'file', 'image'],
        ]);
        
        ItemList::where('name', $list->name)->where('user_id', auth()->user()->id)->update($validated);

        $params = [
            'user' => auth()->user()->name,
            'list' => $request->name,
        ];
        return redirect()->route('user.list.edit', $params)->with('message', 'Successfully edited the list.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ItemList  $itemList
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, ItemList $list)
    {
        ItemList::where('user_id', $user->id)->where('name', $list->name)->delete();

        return redirect()->route('user.list.index', ['user' => $user->name])->with('message', 'Deleted list ' . $list->name);
    }
}
