<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\vehicle;
use App\Models\vehicleAddon;
use App\Models\vehicleAddonSub;
use App\Models\vehicleAvailability;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VehicleController extends Controller
{
    public function allVehicles(){
        return response()->json([
            'vehicles' => vehicle::with('isAvailable')->with('addons')->with('files')->get()
        ],200);
    }

    public function addVehicles(Request $request){
        $data = json_decode($request->input('mainData'));
        $addons = json_decode($request->input('addonData'));

        $vehicle = vehicle::create([
            'name'=>$data->vehicle_name,
            'category' => $data->vehicle_category,
            'model'=>$data->vehicle_model,
            'year'=>$data->vehicle_year,
            'price'=>$data->price,
            'seat'=>$data->seat,
            'detail'=>$data->vehicle_details,
            'subDetail'=>$data->additional_vehicle_details,
        ]);

        vehicleAvailability::create([
            'vehicle_id'=>$vehicle->id,
            'isAvailable'=>1,
            'startDate'=>$data->startEndDate[0],
            'endDate'=>$data->startEndDate[1],
        ]);

        foreach ($addons as $addon ) {
            $storedAddon = vehicleAddon::create([
                'vehicle_id'=>$vehicle->id,
                'title'=>$addon->title,
                'details'=>'testing',
            ]);
            foreach ($addon->subAddon as $sub) {
                vehicleAddonSub::create([
                    'addon_id'=>$storedAddon->id,
                    'title'=>$sub->title,
                    'details'=> 'sub test',
                    'rate'=>$sub->price,
                ]);
            }
        }

        $files = [];
        // $paths = [];
        // $extensions = [];
        if ($request->hasFile('files')) {

            foreach($request->file('files') as $key => $file)
            {
                $name = $file->hashName();
                $extension = $file->getClientOriginalExtension();
                
                switch ($extension) {
                    case 'mp3':
                        $type = 'video';
                        $file->move(public_path('vehicle'), 'vehicle/'.$vehicle->id.'-'.$name);
                        $path = 'vehicle/'.$vehicle->id.'-'.$name;
                        break;
                    
                    default:
                        $type = 'image';
                        $file->move(public_path('vehicle'), 'vehicle/'.$vehicle->id.'-'.$name);
                        $path = 'vehicle/'.$vehicle->id.'-'.$name;
                        break;
                }
                $insert[$key]['vehicle_id'] = $vehicle->id;
                $insert[$key]['name'] = $vehicle->id.'-'.$name;
                $insert[$key]['type'] = $type;
                $insert[$key]['default'] = 0;
                $insert[$key]['path'] = $path;
                
                // array_push($paths,$path);
                // array_push($extensions,$extension);
 
            }
        }
        File::insert($insert);

        return response()->json([
            'success' => 'vehicle added'
        ],200);
    }

    public function editVehicles(Request $request){
        $data = json_decode($request->input('mainData'));
        $addons = json_decode($request->input('addonData'));
        $oldFile = json_decode($request->input('oldFile'));

        $vehicle = vehicle::find($data->vehicle_id);
        $vehicle->name =$data->vehicle_name;
        $vehicle->category = $data->vehicle_category;
        $vehicle->model = $data->vehicle_model;
        $vehicle->year = $data->vehicle_year;
        $vehicle->price = $data->price;
        $vehicle->seat = $data->seat;
        $vehicle->detail = $data->vehicle_details;
        $vehicle->subDetail = $data->additional_vehicle_details;
        $vehicle->save();

        // /////////////////////////////
        $vehicleAvailability = vehicleAvailability::where('vehicle_id','=',$data->vehicle_id)->get();
        // $vehicleAvailability->delete();
        
        vehicleAvailability::create([
            'vehicle_id'=>$vehicle->id,
            'isAvailable'=>1,
            'startDate'=>$data->startEndDate[0],
            'endDate'=>$data->startEndDate[1],
        ]);

        // ///////////////////////////////

        $vehicleAddon = vehicleAddon::where('vehicle_id','=',$data->vehicle_id)->get();
        $vehicleAddonSub = vehicleAddonSub::where('addon_id','=',$vehicleAddon[0]->id)->delete();
        $vehicleAddon = vehicleAddon::where('vehicle_id','=',$data->vehicle_id)->delete();
        // $vehicleAddonSub->delete();
        // $vehicleAddon->delete();
        
        $test = [];
        foreach ($addons as $addon ) {
            $storedAddon = vehicleAddon::create([
                'vehicle_id'=>$vehicle->id,
                'title'=>$addon->title,
                'details'=>'testing',
            ]);
            // array_push($test,$addon);
            if (property_exists($addon, 'subAddon')) {
                foreach ($addon->subAddon as $sub) {
                    vehicleAddonSub::create([
                        'addon_id'=>$storedAddon->id,
                        'title'=>$sub->title,
                        'details'=> 'sub test',
                        'rate'=>$sub->price,
                    ]);
                }
            }
            if (property_exists($addon, 'sub_addons')) {
                foreach ($addon->sub_addons as $sub) {
                    vehicleAddonSub::create([
                        'addon_id'=>$storedAddon->id,
                        'title'=>$sub->title,
                        'details'=> 'sub test',
                        'rate'=>$sub->rate,
                    ]);
                }
            }
        }

        // ///////////////////////////////
        // $test = [];
        function arrdiff($a1, $a2) {
            $res = [];
            foreach($a1 as $file) if (!in_array($file->name, $a2)) {
                array_push($res,$file);
                $userPhoto = public_path('vehicle/').$file->name;
                if(file_exists($userPhoto)){
                    @unlink($userPhoto); 
                    File::find($file->id)->delete();
                }
            };
            return $res;
        }
        $storedFiles = File::where('vehicle_id','=',$data->vehicle_id)->get();
        $arr1 = [];
        $arr2 = [];
        foreach ($oldFile as $temp) {
            array_push($arr2,$temp->name);
        }
        $test = arrdiff($storedFiles,$arr2);
        // $paths = [];
        // $extensions = [];
        if ($request->hasFile('files')) {
            $insert = [];
            foreach($request->file('files') as $key => $file)
            {
                $name = $file->hashName();
                $extension = $file->getClientOriginalExtension();
                
                switch ($extension) {
                    case 'mp3':
                        $type = 'video';
                        $file->move(public_path('vehicle'), 'vehicle/'.$vehicle->id.'-'.$name);
                        $path = 'vehicle/'.$vehicle->id.'-'.$name;
                        break;
                    
                    default:
                        $type = 'image';
                        $file->move(public_path('vehicle'), 'vehicle/'.$vehicle->id.'-'.$name);
                        $path = 'vehicle/'.$vehicle->id.'-'.$name;
                        break;
                }
                $insert[$key]['vehicle_id'] = $vehicle->id;
                $insert[$key]['name'] = $vehicle->id.'-'.$name;
                $insert[$key]['type'] = $type;
                $insert[$key]['default'] = 0;
                $insert[$key]['path'] = $path;
                
                // array_push($paths,$path);
                // array_push($extensions,$extension);
 
            }
            File::insert($insert);
        }
        return response()->json([
            'success' => $test
        ],200);
    }

    public function delete_vehicles(Request $request){
        vehicle::find($request->input('vehicle_id'))->delete();
        return response()->json([
            'success' => 'vehicle deleted'
        ],200);
    }
}
