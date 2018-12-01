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

    /**
     * Destroy users
     */
    public function destroy($id)
    {
        $user = User::find($id);

        foreach ($user->bookings as $item) {
            $item->delete();
        }

        $user->delete();

        return redirect()
                    ->route('admin.customers')
                    ->with('success', 'Customer has been removed.');  
    }
}
