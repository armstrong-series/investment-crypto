<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Paths;
use App\Http\Controllers\Controller;
use App\Models\AssetsModel;
use App\Models\Investment;
use Auth;
use Exception;
use Illuminate\Http\Request;
use Log;
use Storage;

class AssetsController extends Controller
{
    public function assetsPreview(Request $request)
    {
        try {
            $assets = Investment::where('user_id', Auth::id())->get();

            $data = [
                'page' => 'assets',
                'subs' => '',
                'assets' => $assets,
            ];
            return view('App.marketing-assets', $data);
        } catch (Exception $error) {
            Log::info("Admin\AssetsController@Assets error message:" . $error->getMessage());
            return response()->json([
                "message" => "Unable to process request",
                "error" => true,
            ], 500);
        }
    }

    public function createAssets(Request $request)
    {
        try {

            $validator = $this->checkAssets($request->all());
            if ($validator->fails()) {
                $message = $validator->errors()->all();
                foreach ($message as $messages) {
                    return response()->json(['message' => $messages], 400);
                }
            }
            $assets = new AssetsModel();
            $assets->id = Auth::id();
            $assets->name = $request->name;
            $assets->niche = $request->niche;
            $assets->description = $request->description;
            $assets->save();
            return response()->json([
                "status" => "success",
                "message" => "Assets created successfully!",
            ], 200);
        } catch (Exception $error) {
            Log::info("Admin\AssetsController@createAssets error message:" . $error->getMessage());
            return response()->json([
                "message" => "Unable to process request",
                "error" => true,
            ], 500);
        }

    }

    public function updateAssets(Request $request)
    {

        try {
            $assets = AssetsModel::where('id', $request->id)->first();
            if (!$assets) {
                return response()->json(["message" => " Assets not found!"], 404);
            }
            $assets->name = $request->name ? $request->name : $assets->name;
            $assets->niche = $request->niche ? $request->niche : $assets->niche;
            $assets->description = $request->description ? $request->description : $assets->description;
            $assets->save();
            return response()->json([
                "status" => "success",
                "message" => "Assets updated successfully !",
            ], 200);

        } catch (Exception $error) {
            Log::info("Admin\AssetsController@updateAssets error message:" . $error->getMessage());
            return response()->json([
                "message" => "Unable to process request",
                "error" => true,
            ], 500);
        }
    }

    public function updateThumbnail(Request $request)
    {
        try {

            $assets = AssetsModel::where('id', $request->id)->first();
            if (!$assets) {
                $message = "Assets not found!";
                return response()->json(['message' => $message], 404);
            }

            if (!$request->hasFile('image')) {
                $message = "An Image is required to complete request!";
                return response()->json(['message' => $message], 400);
            }

            $assetsImage = Paths::MARKT_ASSETS . $assets->images;
            if (Storage::has($assetsImage)) {
                Storage::delete($assetsImage);
            }

            $imagePath = storage_path('app/' . Paths::MARKT_ASSETS);
            $extension = $request->file('images')->getClientOriginalExtension();
            if (!in_array(strtolower($extension), ["jpg", "png", "jpeg"])) {
                $message = "Invalid file format!";
                return response()->json(['message' => $message], 400);
            }

            $fileName = time() . '.' . $extension;
            $request->file('images')->move($imagePath, $fileName);
            $assets->photo_url = $fileName;
            $assets->save();
            return response()->json([
                "status" => "success",
                "message" => "Assets Thumbnail updated successfully !",
            ], 200);

        } catch (Exception $error) {
            Log::info('AssetsController@updateThumbnail error message: ' . $error->getMessage());
            $message = 'Sorry, unable to create template. Please try again';
            return response()->json([
                'error' => true,
                "message" => $message,
            ], 500);
        }
    }

    public function deleteThumbnail(Request $request)
    {
        try {

            $assets = AssetsModel::where('id', $request->id)->first();
            if (!$assets) {
                $message = "Assets not found!";
                return response()->json(['message' => $message], 404);
            }
            $imageUrl = Paths::MARKT_ASSETS . $assets->images;
            if (Storage::has($imageUrl)) {
                Storage::delete($imageUrl);
            }

            $assets->delete();

            return response()->json([
                "status" => "success",
                "message" => "Assets deleted successfully !",
            ], 200);

        } catch (Exception $error) {
            Log::info('AssetsController@deleteThumbnail error message: ' . $error->getMessage());
            $message = 'Sorry, unable to create template. Please try again';
            return response()->json([
                'error' => true,
                "message" => $message,
            ], 500);
        }
    }

    protected function checkAssets(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string'],
            'niche' => ['required', 'string'],
            'description' => ['required', 'string'],
            

        ]);
    }

}
