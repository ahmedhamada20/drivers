<?php

namespace App\Http\Controllers;

use App\Address;
use App\Order;
use App\Package;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','show']]);
        $this->middleware('permission:user-create', ['only' => ['create','store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
        $this->middleware('permission:user-status', ['only' => ['statusUpdate']]);
        $this->middleware('permission:user-wallet', ['only' => ['wallet']]);
    }


    public function index(Request $request)
    {
        $data = User::where('type', 1)->where('status', 1)->orderByDesc('created_at')->simplePaginate(15);

        return view('admin.list_users', compact('data'));
    }

    public function create(Request $request)
    {
        $roles = Role::pluck('name','name')->all();
        return view('Users.create_user',compact('roles'));
    }

    // searchbox
    public function searchBox(Request $request)
    {

        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if ($query != '') {
                $data = User::orWhere('type', 1)->where('status', 1)
                    ->where('firstname', 'LIKE', "%{$query}%")
                    ->orWhere('lastname', 'LIKE', "%{$query}%")
                    ->orWhere('email', 'LIKE', "%{$query}%")
                    ->limit(15)
                    ->get();
            } else {
                $data = User::where('type', 1)->where('status', 1)
                    ->orderByDesc('created_at')
                    ->limit(15)->get();
            }
            $total_row = $data->count();
            if ($total_row > 0) {

                $i = 0;
                foreach ($data as $row) {
                    if ($row->status == 1) {
                        $userStatus = '<a href="' . route('user.status', ['id' => $row->id]) . '" class="btn btn-danger" style="padding: 5px !important;"> <i class="ft-x-circle"></i> Disable</a>';
                    } else {
                        $userStatus = '<a href="' . route('user.status', ['id' => $row->id]) . '" class="btn btn-success" style="padding: 5px !important;"><i class="ft-check-circle"></i> Enable</a>';
                    }

                    $output .=
                        '<tr>
                            <td>' . ++$i . '</td>
                            <td>' . $row->firstname . ' ' . $row->lastname . '</td>
                            <td>' . $row->email . '</td>
                            <td>' . $row->phone . '</td>
                            <td>
                                <a href="view/' . $row->id . '" class="btn btn-warning" style="padding: 5px !important;"><i class="ft-eye"></i> View</a>
                                <a href="view/' . $row->id . '" class="btn btn-success" style="padding: 5px !important;"><i class="ft-eye"></i> Edit</a>
                                ' . $userStatus . '
                            </td>
                        </tr>';
                }
                // <a href="' . route('user.delete', ['id' => $row->id]) . '" class="btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>Delete</a>
                // <a href="user-edit/' . $row->id . '" class="btn dark btn-xs"><i class="fa fa-trash" aria-hidden="true"></i>Edit</a>
            } else {
                $output .= '<tr>
                <td align="center" colspan="5"> No Data Found </td>
                 </tr>';
            }

            $data = array(
                'table_data' => $output
            );

            // dd($data);
            // echo json_encode($data);
            return response()->json($data);
        }
    }

    public function statusUpdate($id)
    {

        $obj = User::find($id);
        // print_r($obj->status);
        // exit();
        $obj->toggleStatus()->save();

        if ($obj->status == 0) {
            // return redirect::back()->with('message', 'User has Deactivated');
            return back()->with('message', 'User has Deactivated');
        } else {
            // return redirect::back()->with('message', 'User has Activated');
            return back()->with('message', 'User has Activated');
        }
    }

    public function destroy($id)
    {

        User::where('id', $id)->delete();

        return back()->with('message', 'User Deleted');
    }

    public function viewUserdetails($id)
    {
        $users = User::find($id);
        $orders = Order::where('user_id', $id)->with('package')->orderByDesc('created_at')->get();
        $packages = Package::where('user_id', $id)->get();
        $address = Address::where('user_id', $id)->orderByDesc('created_at')->get();
        return view('Users/show', ['user' => $users, 'address' => $address, 'orders' => $orders]);
    }

    public function wallet(Request $request)
    {
        // $data = $request->wallet;

        $existingUser = User::find($request->user_id);
        if ($existingUser) {
            $updateWallet = User::where('id', $request->user_id)->update(['wallet' => $request->wallet]);
            return response()->json(['status' => 'success', 'message' => "Wallet amount updated successfully"]);
        } else {
            return response()->json(['status' => 'error', 'message' => "user doesnot exist."]);
        }


    }


    public function store(Request $request)
    {

        try {
            $this->validate($request, [
                'firstname' => 'required|string',
                'lastname' => 'required|string',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string',
                'phone' => 'required',
                'roles' => 'required'
            ]);

            $users = User::create([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'type' => 1,
                'status' => 0,
                'is_admin' => 0,
            ]);

            $users->assignRole($request->input('roles'));

            return back()->with('success','Add Users successfully');
        } catch (\Exception $exception) {
            return back()->with('error', 'Error No Add User');
        }

    }

    public function update(Request $request ,$id)
    {
        try {

            $this->validate($request, [
                'firstname' => 'required|string',
                'lastname' => 'required|string',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string',
                'phone' => 'required',
                'roles' => 'required'
            ]);

            $users = User::findorfail($id);
            $users->update([
                'firstname' => $request->firstname ?? $users->firstname,
                'lastname' => $request->lastname ?? $users->lastname,
                'email' => $request->email ?? $users->email,
                'phone' => $request->phone ?? $users->phone,
                'type' => 1,
                'status' => 0,
                'is_admin' => 0,
            ]);

            DB::table('model_has_roles')->where('model_id',$id)->delete();

            $users->assignRole($request->input('roles'));

            return back()->with('message', 'Edit User Successfully');
        }catch (\Exception $exception){
            return back()->with('error', 'Error No Edit User');
        }

    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        return view('admin.edit',compact('user','roles','userRole'));
    }
}
