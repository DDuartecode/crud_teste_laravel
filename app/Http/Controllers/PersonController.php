<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use Illuminate\Support\Facades\Auth;

class PersonController extends Controller
{
    private $objPerson;

    public function __construct()
    {
        $this->objPerson=new Person();
    }

    public function showPeoples()
	{	

		if(Auth::check()){
			$peoples=$this->objPerson->all()->sortBy('name');
			return view('pessoas.home', compact('peoples'));
		}

		return redirect()->route('admin_login');
	}

	public function showLogin()
	{
		return view('auth.login');
	}

	public function login(Request $request)
	{
		if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
			return redirect()->back()->withInput()->withErrors(['O email informado não é válido!]']);
		}

		$credencials = [
			'email' => $request->email,
			'password' => $request->password
		];
		if(Auth::attempt($credencials)){
			return redirect()->route('admin');
		}

		return redirect()->back()->withInput()->withErrors(['Login ou senha estão incorretos!']);
	}

	public function logout()
	{
		Auth::logout();
		return redirect()->route('admin');
	}

	public function store(Request $request)
    {
    	$cad=$this->objPerson->create([
    		'name' => $request->name,
            'cpf' => $request->cpf,
            'birthdate' => $request->birthdate,
            'email' => $request->email,
            'phone' => $request->phone,
            'post' => $request->post,

    	]);
    	if($cad){
    		return redirect()->route('admin');
    	}
    }

	public function show($id)
	{
		$people = $this->objPerson->find($id);
		return view('pessoas.show', compact('people'));
	}

    public function create()
    {
    	return view('pessoas.create');
    }

    public function edit($id)
    {
        $people = $this->objPerson->find($id);
        return view('pessoas.create', compact('people'));
    }

    public function update(Request $request, $id)
    {
        $this->objPerson->where(['id'=>$id])->update([
            'name' => $request->name,
            'cpf' => $request->cpf,
            'birthdate' => $request->birthdate,
            'email' => $request->email,
            'phone' => $request->phone,
            'post' => $request->post,
        ]);
        return redirect('admin');
    }

    public function destroy($id)
    {
        $del=$this->objPerson->destroy($id);
        return($del)?"sim":"não";
    }
    

    public function cadUser()
    {
    	return view('auth.register');
    }


}

    
