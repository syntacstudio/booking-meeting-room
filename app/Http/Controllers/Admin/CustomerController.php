<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class CustomerController extends Controller
{
    /**
     * Customers page
     */
    public function index()
    {
    	$data = User::whereHas('roles', function($query){
			    		$query->where('name', 'customer');
			    	})
    				->paginate(10);

        return view('admin.customer.list', compact('data'));
    }
}
