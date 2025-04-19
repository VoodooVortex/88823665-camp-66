<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\ProductList;
use App\Models\User;

class ProductController extends Controller
{
    //
    function index()
    {
        // $data['category']  = Category::all();
        // $data['product'] = ProductList::all();
        // $data['user'] = User::all();

        // return view('product', $data);

        $categories = Category::with('products.users')->get();

        $countPro = $categories->sum(function ($category) {
            return $category->products->count();
        });

        $cs = ProductList::withCount('users')->get(); // จะมี $product->users_count
        // $totalUsers = $products->sum('users_count');

        return view('product', ['categories' => $categories, 'countPro' => $countPro]);
    }

    // $employees = Employee::all();
    // $employee = Employee::find(1);
    // $employees = Employee::where('position', 'Manager')->get();
    // $employee = Employee::where('email', 'john@example.com')->first();
    // $names = Employee::pluck('name');
    // $nameWithId = Employee::pluck('name', 'id');
    // $employees = Employee::orderBy('created_at', 'desc')->get();
    // $employees = Employee::paginate(10);
    // $employees = Employee::limit(5)->get();
    // $employees = Employee::where('status', 'active')
    //     ->where('salary', '>', 20000)
    //     ->orderBy('name')
    //     ->get();
    // $employees = Employee::where('position', 'Manager')
    //     ->orWhere('position', 'Supervisor')
    //     ->get();
    // $employees = Employee::where('name', 'like', '%john%')->get();
    // if (Employee::where('email', 'john@example.com')->exists()) {

    // }
    // $employees = Employee::with('department')->get();
    // $employees = Employee::all();

    // $activeEmployees = $employees->where('status', 'active');
    // $employees = DB::select('SELECT * FROM employees WHERE salary > ?', [20000]);


    //     <table class="table table-striped">
    //     <thead>
    //         <tr>
    //             <th>#</th>
    //             <th>name</th>
    //             <th>email</th>
    //             <th>job</th>
    //         </tr>
    //     </thead>
    //     <tbody>
    //         @foreach($employees as $index => $employee)
    //             <tr>
    //                 <td>{{ $employees->firstItem() + $index }}</td>
    //                 <td>{{ $employee->name }}</td>
    //                 <td>{{ $employee->email }}</td>
    //                 <td>{{ $employee->position }}</td>
    //             </tr>
    //         @endforeach
    //     </tbody>
    // </table>

    // <div class="d-flex justify-content-center mt-4">
    //     {{ $employees->links('pagination::bootstrap-5') }}
    // </div>
    // pagination::simple-bootstrap-5

    //If this upward error occurs, follow the steps below.

    //||||| HERE |||||
    // go to "app" folder and Providers folder and open AppServiceProvider.php and add this code "Paginator::useBootstrapFive();" in boot function


    function add_product(Request $req)
    {
        $category = new Category();
        $category->name = $req->category_name;
        $category->save();

        foreach ($req->product_name as $value) {
            $product = new ProductList();
            $product->name = $value;
            $product->category_id = $category->id;
            $product->user_id = session('user')->id;
            $product->save();
        }

        return redirect('/product');
    }

    public function delete(Request $req)
    {
        $categories = Category::find($req->id);
        $categories->delete();
        return redirect('/product');
    }
}
