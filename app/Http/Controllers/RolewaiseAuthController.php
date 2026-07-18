<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Role;
use App\Models\RolePageAccess;

class RolewaiseAuthController extends Controller
{
    function index()
    {
        $roles = Role::where('id','!=',1)->get();
        $pages = Page::orderBy('name', 'asc')->get(); 
        return view('authentication', compact('pages', 'roles'));
    }
    

    function getRoleAuthentication($id)
    {
        $rolePageAccess = RolePageAccess::where('role_id', $id)->get();
        $pages = Page::all();
        $assignedPageIds = $rolePageAccess->pluck('page_id')->toArray();
        $pages = $pages->map(function ($page) use ($assignedPageIds) {
            $page->access = in_array($page->id, $assignedPageIds) ? 1 : 0;
            return $page;
        });

        return response()->json($pages);
    }

    function giveAccess(Request $request, $id)
    {
        $role_id = $request->role_id;
        if($role_id == $id){
            return response()->json(['message' => 'Enable to your self auth.'], 400);
        }
        $page_id = $request->page_id;
        $exists = RolePageAccess::where('role_id', $id)
            ->where('page_id', $page_id)
            ->exists();

        if (!$exists) {
            RolePageAccess::create([
                'role_id' => $id,
                'page_id' => $page_id,
            ]);

            return response()->json(['message' => 'Access granted successfully.']);
        }

        return response()->json(['message' => 'Access already exists.'], 400);
    }

    function denyAccess(Request $request, $id)
    {
        $role_id = $request->role_id;
        if($role_id == $id){
            return response()->json(['message' => 'Enable to your self auth.'], 400);
        }
        $page_id = $request->page_id;
        RolePageAccess::where('role_id', $id)
            ->where('page_id', $page_id)
            ->delete();

        return response()->json(['message' => 'Access revoked successfully.']);
    }
}