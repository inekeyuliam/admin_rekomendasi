<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use FarhanWazir\GoogleMaps\GMaps;

class MapController extends Controller
{
    public function googleAutoAddress()
    {
    	return view('map');
    }

    public function map()
    {
        $config['center'] = 'Sydney Airport,Sydney';
        $config['zoom'] = '14';
        $config['map_height'] = '400px';

        $gmap = new GMaps();
        $gmap->initialize($config);
     
        $map = $gmap->create_map();
        return view('map',compact('map'));
    }
    public function direction()
    {
        $config['center'] = 'Sydney Airport,Sydney';
        $config['zoom'] = '14';
        $config['map_height'] = '500px';
        $config['geocodeCaching'] = true;
    
        $config['directions'] = true;
        $config['directionsStart'] = 'Sydney Airport,Sydney';
        $config['directionsEnd'] = 'Kogarah Golf Club,Sydney';
        $config['directionsDivID'] =  'directionsDiv';
    
        $gmap = new GMaps();
        $gmap->initialize($config);
        $map = $gmap->create_map();
        return view('map',compact('map'));
    
    }
}
