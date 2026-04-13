<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Enums\Auth\RoleType;
use Illuminate\Http\RedirectResponse;

class UzytkownikController extends Controller
{

        public function index(Request $request){
            $this->authorize('viewAny', Uzytkownik::class);
            $request->validate([
            'sortBy' => ['nullable', Rule::in([null,'id','name','email'])],
            'sortDirection' => ['nullable', Rule::in([null, 'asc','desc'])],
            

            ]);  

            return view('uzytkownik.index',[
            'user' => User::when($request->input('sortBy'),
            function($query) use ($request) {
                return $query->orderBy(
                    $request->input('sortBy','id'),
                    $request->input('sortDirection','asc')
                );
            }
            )->paginate(config('pagination.per_page')
            )->withQueryString(),
            'roles' => RoleType::cases(),
            'sortBy' => $request->input('sortBy',null),
            'sortDirection' => $request->input('sortDirection',null),
        
        ]);
        } 
        public function updateRole(Request $request, User $user): RedirectResponse
        {
            $request->validate([
                'role' => [Rule::in(RoleType::cases())],
            ]
            );
            $user->syncRoles($request->input('role'));
            return back()->with('status',__('Role has been updated'));
        }   
}
