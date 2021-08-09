<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Paths;
use App\Http\Controllers\Controller;
use App\Models\AssetsModel;
use App\Models\Investment;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Log;
use File;
use  Illuminate\Http\Response;
use Storage;

class AssetsController extends Controller
{
    public function assetsPreview(Request $request)
    {
        try {
            if (Auth::user()->user_type === 'admin' || Auth::user()->user_type === 'support') {
            $assets = Investment::where('user_id', Auth::id())->get();
            $all_assets = AssetsModel::all();

            $data = [
                'page' => 'assets',
                'subs' => '',
                'assets' => $assets,
                'all_assets' => $all_assets
                 ];
                return view('App.marketing-assets', $data);
             }else {
                return redirect()->back();
            }

        } catch (Exception $error) {
            Log::info("Admin\AssetsController@assetsPreview error message:" . $error->getMessage());
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
            if ($request->hasFile('image')) {
                $imagePath = storage_path('app/' . Paths::MARKT_ASSETS);
                $extension = $request->file('image')->getClientOriginalExtension();
                if (in_array(strtolower($extension), ["jpg", "png", "jpeg", "svg"])) {
                    $fileName = time() . '.' . $extension;
                    $request->file('image')->move($imagePath, $fileName);
                    $assets = new AssetsModel();
                    $assets->user_id = Auth::id();
                    $assets->niche = $request->niche;
                    $assets->description = $request->description;
                    $assets->image = $fileName;
                    $assets->save();
                    return response()->json([
                        "message" => "Assets created successfully!" ], 200);

                } else {
                    $message = "Invalid file format!";
                    return response()->json(['message' => $message], 400);
                }

            } else {
                $message = "Request has no file";
                return response()->json(['message' => $message], 400);
            }

        } catch (Exception $error) {
            Log::info('Admin\AssetsContoller@createAssets error message: ' . $error->getMessage());
            $message = 'Sorry, unable to create template. Please try again';
            return response()->json([
                'error' => true,
                "message" => $message,
            ], 500);
        }
    }


    public function assetsFile(Request $request)
    {
        try {  
            $path = storage_path('app/' .  Paths::MARKT_ASSETS . $request->file);
            if (!File::exists($path)) {
                abort(404);
            }
            $file = File::get($path);
            $type = File::mimeType($path);
            $response = new Response($file, 200);
            return $response;

        } catch (Exception $error) {
            Log::info('Admin\AdminController@adisplayImage error message: ' . $error->getMessage());
            $message = 'Sorry, unable to create template. Please try again';
            return response()->json([
                'error' => true,
                "message" => $message,
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
            return response()->json(["message" => "Assets updated successfully !"], 200);

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

    public function deleteThumbnail(Request $request, $id)
    {
        try {

            $assets = AssetsModel::where('id', $id)->first();
            if (!$assets) {
                $message = "Assets not found!";
                return response()->json(['message' => $message], 404);
            }
            $imageUrl = Paths::MARKT_ASSETS . $assets->image;
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
            'niche' => ['required', 'string'],
            'description' => ['required', 'string'],

        ]);
    }

}
