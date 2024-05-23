<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $roles = Role::query();
            return datatables()->of($roles)
                ->addColumn('action', function ($role) {
                    $btnGroup = '<div class="btn-group" role="group" aria-label="Role Actions">';
                    $btnGroup .= '<a href="' . route('roles.edit', $role->id) . '" class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Edit</a>';
                    $btnGroup .= '<button type="button" class="deleteRole btn btn-sm btn-danger" data-id="' . $role->id . '"><i class="fa fa-trash"></i> Delete</button>';
                    $btnGroup .= '</div>';
                    return $btnGroup;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $title = 'Role Management';
        return view('admin.content.role', compact('title'));
    }

    public function create()
    {
        // Mengambil semua izin untuk pembuatan peran baru
        $permissions = Permission::all();
        return view('admin.form.create-role', ['permissions' => $permissions]);
    }

    public function store(Request $request)
    {
        // Validasi data yang dikirim dari formulir
        $validatedData = $request->validate([
            'name' => 'required|unique:roles|max:255',
            'permissions' => 'required|array',
            'permissions.*' => 'exists:permissions,id',
        ]);

        // Membuat peran baru
        $role = Role::create([
            'name' => $validatedData['name'],
        ]);

        // Menambahkan izin ke peran yang baru dibuat
        $role->permissions()->attach($validatedData['permissions']);

        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
    }

    public function show($id)
    {
        $role = Role::findOrFail($id);
        $rolePermissions = $role->permissions;

        return view('roles.show', compact('role', 'rolePermissions'));
    }

    public function edit(Role $role)
    {
        // Mengambil semua izin untuk pengeditan peran
        $permissions = Permission::all();
        // Mengambil semua izin yang dimiliki oleh peran
        $rolePermissions = $role->permissions->pluck('id')->toArray();
        return view('admin.form.create-role', ['role' => $role, 'permissions' => $permissions, 'rolePermissions' => $rolePermissions]);
    }

    public function update(Request $request, Role $role)
    {
        // Validasi data yang dikirim dari formulir
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:roles,name,' . $role->id,
            'permissions' => 'required|array',
            'permissions.*' => 'exists:permissions,id',
        ]);

        // Memperbarui nama peran
        $role->name = $validatedData['name'];
        $role->save();

        // Menghapus semua izin yang terkait dengan peran
        $role->permissions()->detach();
        // Menambahkan izin baru ke peran
        $role->permissions()->attach($validatedData['permissions']);

        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
    }

    public function destroy(Role $role)
    {
        try {
            $role->delete();
            return response()->json(['status' => 'success', 'message' => 'Role berhasil dihapus']);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
