<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Thesis;
use App\Models\Resource;
use App\Models\Ask;

class DashboardController extends Controller
{
    public function index(){        
        // info
        $new_thesis = DB::table('thesis')->where('selesai', 0)->get()->count();
        $new_resource = DB::table('resource')->where('selesai', 0)->get()->count();
        $new_ask = DB::table('ask')->where('selesai', 0)->get()->count();

        $user = auth()->user();

        // E-THESIS DELIVERY CHART - KATEGORI
        $thesis_monthly = Thesis::select(\DB::raw("Count(*) as count"))
                        ->whereMonth('created_at', date('m'))
                        ->whereYear('created_at', date('Y'))
                        ->groupBy(\DB::raw('kategori'))
                        ->orderByRaw('count DESC')
                        ->pluck('count');

        $thesis_monthly_list = Thesis::select(\DB::raw("Count(*) as count, kategori"))
                        ->whereMonth('created_at', date('m'))
                        ->whereYear('created_at', date('Y'))
                        ->groupBy(\DB::raw('kategori'))
                        ->orderByRaw('count DESC')
                        ->pluck('kategori');
                        
        $thesis_yearly = Thesis::select(\DB::raw("Count(*) as count"))
                        ->whereYear('created_at', date('Y'))
                        ->groupBy(\DB::raw('kategori'))
                        ->orderByRaw('count DESC')
                        ->pluck('count');

        $thesis_yearly_list = Thesis::select(\DB::raw("Count(*) as count, kategori"))
                        ->whereYear('created_at', date('Y'))
                        ->groupBy(\DB::raw('kategori'))
                        ->orderByRaw('count DESC')
                        ->pluck('kategori');


        //  E-THESIS DELIVERY CHART - PUSTAKAWAN
        $thesis_pustakawan_monthly = Thesis::select(\DB::raw("Count(*) as count"))
                        ->join('users', 'users.id', '=', 'thesis.id_pustakawan')
                        ->whereMonth('thesis.created_at', date('m'))
                        ->whereYear('thesis.created_at', date('Y'))
                        ->groupBy(\DB::raw('id_pustakawan'))
                        ->orderByRaw('count DESC')
                        ->pluck('count');

        $thesis_pustakawan_monthly_list = Thesis::select(\DB::raw("Count(*) as count, users.name"))
                        ->join('users', 'users.id', '=', 'thesis.id_pustakawan')
                        ->whereMonth('thesis.created_at', date('m'))
                        ->whereYear('thesis.created_at', date('Y'))
                        ->groupBy(\DB::raw('name'))
                        ->orderByRaw('count DESC')
                        ->pluck('name');

        $thesis_pustakawan_yearly = Thesis::select(\DB::raw("Count(*) as count"))
                        ->join('users', 'users.id', '=', 'thesis.id_pustakawan')
                        ->whereYear('thesis.created_at', date('Y'))
                        ->groupBy(\DB::raw('id_pustakawan'))
                        ->orderByRaw('count DESC')
                        ->pluck('count');

        $thesis_pustakawan_yearly_list = Thesis::select(\DB::raw("Count(*) as count, users.name"))
                        ->join('users', 'users.id', '=', 'thesis.id_pustakawan')
                        ->whereYear('thesis.created_at', date('Y'))
                        ->groupBy(\DB::raw('name'))
                        ->orderByRaw('count DESC')
                        ->pluck('name');

        //  E-RESOURCE DELIVERY CHART - KATEGORI
        $resource_monthly = Resource::select(\DB::raw("Count(*) as count"))
                        ->whereMonth('created_at', date('m'))
                        ->whereYear('created_at', date('Y'))
                        ->groupBy(\DB::raw('kategori'))
                        ->orderByRaw('count DESC')
                        ->pluck('count');

        $resource_monthly_list = Resource::select(\DB::raw("Count(*) as count, kategori"))
                        ->whereMonth('created_at', date('m'))
                        ->whereYear('created_at', date('Y'))
                        ->groupBy(\DB::raw('kategori'))
                        ->orderByRaw('count DESC')
                        ->pluck('kategori');
                        
        $resource_yearly = Resource::select(\DB::raw("Count(*) as count"))
                        ->whereYear('created_at', date('Y'))
                        ->groupBy(\DB::raw('kategori'))
                        ->orderByRaw('count DESC')
                        ->pluck('count');

        $resource_yearly_list = Resource::select(\DB::raw("Count(*) as count, kategori"))
                        ->whereYear('created_at', date('Y'))
                        ->groupBy(\DB::raw('kategori'))
                        ->orderByRaw('count DESC')
                        ->pluck('kategori');


        //  E-RESOURCE DELIVERY CHART - PUSTAKAWAN
        $resource_pustakawan_monthly = Resource::select(\DB::raw("Count(*) as count"))
                        ->join('users', 'users.id', '=', 'resource.id_pustakawan')
                        ->whereMonth('resource.created_at', date('m'))
                        ->whereYear('resource.created_at', date('Y'))
                        ->groupBy(\DB::raw('id_pustakawan'))
                        ->orderByRaw('count DESC')
                        ->pluck('count');

        $resource_pustakawan_monthly_list = Resource::select(\DB::raw("Count(*) as count, users.name"))
                        ->join('users', 'users.id', '=', 'resource.id_pustakawan')
                        ->whereMonth('resource.created_at', date('m'))
                        ->whereYear('resource.created_at', date('Y'))
                        ->groupBy(\DB::raw('name'))
                        ->orderByRaw('count DESC')
                        ->pluck('name');

        $resource_pustakawan_yearly = Resource::select(\DB::raw("Count(*) as count"))
                        ->join('users', 'users.id', '=', 'resource.id_pustakawan')
                        ->whereYear('resource.created_at', date('Y'))
                        ->groupBy(\DB::raw('id_pustakawan'))
                        ->orderByRaw('count DESC')
                        ->pluck('count');

        $resource_pustakawan_yearly_list = Resource::select(\DB::raw("Count(*) as count, users.name"))
                        ->join('users', 'users.id', '=', 'resource.id_pustakawan')
                        ->whereYear('resource.created_at', date('Y'))
                        ->groupBy(\DB::raw('name'))
                        ->orderByRaw('count DESC')
                        ->pluck('name');
        

        //  ASK A LIBRARIAN CHART - KATEGORI
        $ask_monthly = Ask::select(\DB::raw("Count(*) as count"))
                        ->whereMonth('created_at', date('m'))
                        ->whereYear('created_at', date('Y'))
                        ->groupBy(\DB::raw('kategori'))
                        ->orderByRaw('count DESC')
                        ->pluck('count');

        $ask_monthly_list = Ask::select(\DB::raw("Count(*) as count, kategori"))
                        ->whereMonth('created_at', date('m'))
                        ->whereYear('created_at', date('Y'))
                        ->groupBy(\DB::raw('kategori'))
                        ->orderByRaw('count DESC')
                        ->pluck('kategori');
                        
        $ask_yearly = Ask::select(\DB::raw("Count(*) as count"))
                        ->whereYear('created_at', date('Y'))
                        ->groupBy(\DB::raw('kategori'))
                        ->orderByRaw('count DESC')
                        ->pluck('count');

        $ask_yearly_list = Ask::select(\DB::raw("Count(*) as count, kategori"))
                        ->whereYear('created_at', date('Y'))
                        ->groupBy(\DB::raw('kategori'))
                        ->orderByRaw('count DESC')
                        ->pluck('kategori');

        //  ASK A LIBRARIAN CHART - PUSTAKAWAN
        $ask_pustakawan_monthly = Ask::select(\DB::raw("Count(*) as count"))
                        ->join('users', 'users.id', '=', 'ask.id_pustakawan')
                        ->whereMonth('ask.created_at', date('m'))
                        ->whereYear('ask.created_at', date('Y'))
                        ->groupBy(\DB::raw('id_pustakawan'))
                        ->orderByRaw('count DESC')
                        ->pluck('count');

        $ask_pustakawan_monthly_list = Ask::select(\DB::raw("Count(*) as count, users.name"))
                        ->join('users', 'users.id', '=', 'ask.id_pustakawan')
                        ->whereMonth('ask.created_at', date('m'))
                        ->whereYear('ask.created_at', date('Y'))
                        ->groupBy(\DB::raw('name'))
                        ->orderByRaw('count DESC')
                        ->pluck('name');

        $ask_pustakawan_yearly = Ask::select(\DB::raw("Count(*) as count"))
                        ->join('users', 'users.id', '=', 'ask.id_pustakawan')
                        ->whereYear('ask.created_at', date('Y'))
                        ->groupBy(\DB::raw('id_pustakawan'))
                        ->orderByRaw('count DESC')
                        ->pluck('count');

        $ask_pustakawan_yearly_list = Ask::select(\DB::raw("Count(*) as count, users.name"))
                        ->join('users', 'users.id', '=', 'ask.id_pustakawan')
                        ->whereYear('ask.created_at', date('Y'))
                        ->groupBy(\DB::raw('name'))
                        ->orderByRaw('count DESC')
                        ->pluck('name');

        return view('admin/dashboard',
            compact('new_thesis', 'new_resource', 'new_ask', 'user',
            'thesis_monthly', 'thesis_yearly', 'thesis_monthly_list', 'thesis_yearly_list', 
            'thesis_pustakawan_monthly', 'thesis_pustakawan_monthly_list', 'thesis_pustakawan_yearly', 'thesis_pustakawan_yearly_list',
            'resource_monthly', 'resource_yearly', 'resource_monthly_list', 'resource_yearly_list', 
            'resource_pustakawan_monthly', 'resource_pustakawan_monthly_list', 'resource_pustakawan_yearly', 'resource_pustakawan_yearly_list',
            'ask_monthly', 'ask_yearly', 'ask_monthly_list', 'ask_yearly_list', 
            'ask_pustakawan_monthly', 'ask_pustakawan_monthly_list', 'ask_pustakawan_yearly', 'ask_pustakawan_yearly_list')
        );
    }
}
