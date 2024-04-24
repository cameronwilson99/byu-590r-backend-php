<?php

namespace App\Http\Controllers\API;

use App\Models\Category;
use App\Models\Game;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class GameController extends BaseController
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::orderBy('id', 'desc')->with('publisher', 'categories')->get();
        foreach ($games as $game) {
            $game->image = $this->getS3Url($game->image);
        }
        return $this->sendResponse($games, 'Games retrieved successfully.');
    }

    //get categories
    public function getCategories() {
        $categories = Category::get();
        return $this->sendResponse($categories, 'Categories retrieved successfully.');
    }

    //get publishers
    public function getPublishers() {
        $publishers = Publisher::get();
        return $this->sendResponse($publishers, 'Publishers retrieved successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        $game = Game::where('id', $id)->first();

        $game->image = $this->getS3Url($game->image);

        return $this->sendResponse($game, 'Game retrieved successfully.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request POST /games {payload}
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'required',
            'description' => 'required',
            'publisher_id' => 'required',
            'price' => 'required',
            'stock' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $game = new Game();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $path = $request->file('image')->storeAs('images', $name, 's3');
            storage::disk('s3')->setVisibility($path, 'public');
            if (!$path) {
                return $this->sendError('Image upload failed.');
            }
            $game->image = $path;
        }

        $game->name = $request['name'];
        $game->description = $request['description'];
        $game->publisher_id = $request['publisher_id'];
        $game->price = $request['price'];
        $game->stock = $request['stock'];
        $game->save();

        if (isset($game->image)) {
            $game->image = $this->getS3Url($game->image);
        }
        $success['game'] = $game;

        if($request['categories']) {
            $categories = collect($request['categories'])->toArray();
            $categories_games = [];
            foreach($categories as $category){
                $categoryIds = explode(",", $category);
                foreach($categoryIds as $categoryId) {
                    array_push($categories_games, [
                        'category_id' => $categoryId,
                        'game_id' => $game->id
                    ]);
                }
            }
            DB::table('categories_games')->insert($categories_games);
        }
        return $this->sendResponse($success, 'Game updated successfully.');
    }

    public function updateGameImage(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $game = Game::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $path = $request->file('image')->storeAs('images', $name, 's3');
            storage::disk('s3')->setVisibility($path, 'public');
            if (!$path) {
                return $this->sendError('Image upload failed.');
            }
            $game->image = $path;
        }

        $game->save();

        if (isset($game->image)) {
            $game->image = $this->getS3Url($game->image);
        }
        $success['game'] = $game;
        return $this->sendResponse($success, 'Game updated successfully.');
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request -> PUT /games/{id} {payload}
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'publisher_id' => 'required',
            'price' => 'required',
            'stock' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $game = Game::findOrFail($id);

        $game->name = $request['name'];
        $game->description = $request['description'];
        $game->publisher_id = $request['publisher_id'];
        $game->price = $request['price'];
        $game->stock = $request['stock'];
        $game->save();

        if (isset($game->image)) {
            $game->image = $this->getS3Url($game->image);
        }
        $success['game'] = $game;
        return $this->sendResponse($success, 'Game updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $game = Game::findOrFail($id);
        Storage::disk('s3')->delete($game->image);
        $game->delete();

        $success['game']['id'] = $id;
        return $this->sendResponse($game, 'Game deleted successfully.');
    }
}
