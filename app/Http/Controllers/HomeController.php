<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use App\Notifications\OrderNotification;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Notification;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
//        $user=auth()->user();
//        $role=auth()->user()->role;
//        $permissions=array();
//        foreach ( $user->role->permissions as $permission){
//            array_push($permissions,$permission->name);
//        }
//
//        return view('home')->with('permissions',$permissions)->with('role',$role);
           return view('admin.home');
    }

    public function dashboard(){

        $models = [];

        $modelsPath = app_path('Models');
        $modelFiles = File::allFiles($modelsPath);
        foreach ($modelFiles as $modelFile) {

            $mod_name=$modelFile->getFilenameWithoutExtension();
            $model = app("App\Models\\".$mod_name);
            array_push($models,['name'=>$mod_name,'count'=>  $model::count() ])  ;
        }


        $chart_options = [
            'chart_title' => 'Users Chart',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\User',
            'group_by_field' => 'created_at',
            'group_by_period' => 'day',
            'chart_type' => 'line',
            'conditions'=>[['condition' => '1 = 1','color' => '#6a61d9', 'fill' => true]]
        ];
        $chart1 = new LaravelChart($chart_options);

        // auth()->user()->notify(new OrderNotification());
           Notification::send(User::all(),new OrderNotification());
         return view('admin.dashboard')->with('models',$models)->with('chart1',$chart1);
        //   return  $models ;
    }
    public function createRole(){

         return view('admin.role.create');
        //   return  $models ;
    }
    public function showRoles()
    {
        abort_if(!auth()->user()->role->name == "manager"  ,403 ,'you dont have permission to access this page');

        $roles=Role::all();
        return view('admin.role.index')->with('roles',$roles);
    }

    public function editRole($id)
    {
        abort_if(!auth()->user()->role->name == "manager"  ,403 ,'you dont have permission to access this page');

        $role=Role::findOrFail($id);
        $permissions=Permission::all();
        $role_permissions=[];
        foreach ($role->permissions as $per):
            $role_permissions[]=$per->id;
        endforeach;

        return view('admin.role.edit')->with('role',$role)->with('permissions',$permissions)->with('role_permissions',$role_permissions);
    }


    public function updateRole(Request $request,$id)
    {
        abort_if(!auth()->user()->role->name == "manager"  ,403 ,'you dont have permission to access this page');

        $request->validate([
            'name'=>'required|string',
            'permissions'=>'required'
        ]);

        $role=Role::findOrFail($id);
        $role->name=$request->name;
        $role->permissions()->sync($request->permissions);

        $role->save();

        toastr()->success('role updated successfully');
        return redirect()->route('admin.roles.index');
    }

    public function storeRole(Request $request)
    {
        abort_if(!auth()->user()->role->name == "manager"  ,403 ,'you dont have permission to access this page');

        $request->validate([
            'name'=>'required|string'
        ]);
        Role::create([
            'name'=>$request->name
        ]);

        toastr()->success('role created successfully');
        return redirect()->route('admin.roles.index');
    }

    public function deleteRole($id)
    {
        abort_if(!auth()->user()->role->name == "manager"  ,403 ,'you dont have permission to access this page');
        $role=Role::findOrFail($id);


        $role->delete();
        toastr()->success('role deleted successfully');
        return redirect()->back();
    }

}
