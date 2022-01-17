<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Repositrio;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\RepositrioRequest;
use Gate;

class RepositrioController extends Controller
{

    public function index()
    {
        if (Gate::none(['repositrio_allow', 'repositrio_edit'])) {
            return redirect(route("admin.home"));
        }
        $admiko_data['sideBarActive'] = "repositrio";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data["fileInfo"] = Repositrio::$admiko_file_info;
        $tableData = Repositrio::orderByDesc("id")->get();
        return view("admin.repositrio.index")->with(compact('admiko_data', "tableData"));
    }

    public function create()
    {
        if (Gate::none(['repositrio_allow'])) {
            return redirect(route("admin.repositrio.index"));
        }
        $admiko_data['sideBarActive'] = "repositrio";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("admin.repositrio.store");
        $admiko_data["fileInfo"] = Repositrio::$admiko_file_info;
        
        return view("admin.repositrio.manage")->with(compact('admiko_data'));
    }

    public function store(RepositrioRequest $request)
    {
        if (Gate::none(['repositrio_allow'])) {
            return redirect(route("admin.repositrio.index"));
        }
        $data = $request->all();
        
        $Repositrio = Repositrio::create($data);
        
        return redirect(route("admin.repositrio.index"));
    }

    public function show($id)
    {
        return back();
    }

    public function edit($id)
    {
        $Repositrio = Repositrio::find($id);
        if (Gate::none(['repositrio_allow', 'repositrio_edit']) || !$Repositrio) {
            return redirect(route("admin.repositrio.index"));
        }

        $admiko_data['sideBarActive'] = "repositrio";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("admin.repositrio.update", [$Repositrio->id]);
        $admiko_data["fileInfo"] = Repositrio::$admiko_file_info;
        
        $data = $Repositrio;
        return view("admin.repositrio.manage")->with(compact('admiko_data', 'data'));
    }

    public function update(RepositrioRequest $request,$id)
    {
        if (Gate::none(['repositrio_allow', 'repositrio_edit'])) {
            return redirect(route("admin.repositrio.index"));
        }
        $data = $request->all();
        $Repositrio = Repositrio::find($id);
        $Repositrio->update($data);
        
        return redirect(route("admin.repositrio.index"));
    }

    public function destroy(Request $request)
    {
        if (Gate::none(['repositrio_allow'])) {
            return redirect(route("admin.repositrio.index"));
        }
        Repositrio::destroy($request->idDel);
        return back();
    }
    
    
    
}
