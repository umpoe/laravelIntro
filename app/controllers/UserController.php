<?php

class UserController extends BaseController{
    public function home() {
        // $user = User::find(1);
        $user = Auth::user();
        // $book = Book::where('user_id','=',$user->id)->first();
        // $books = Book::where('user_id','=',$user->id)->get();

        $books = $user->book;

        // return View::make('home')->with('books',$books);
        return View::make('home', compact('books'));
    }
    
    public function getLogin(){
        
        return View::make('login');
    }  
    public function postLogin(){
        //validate user input
        $rules=array(
            'username'=>'required',
            'password'=>'required|min:4'
        );
        $validator = Validator::make(Input::all(),$rules);
        if($validator->fails()){
            //invalid
            return Redirect::to('login')
            ->withErrors($validator)
            ->withInput(Input::except('password'));
        }
        else{
            //attempt to login user
            $userdata = array(
                'username'=>Input::get('username'),
                'password'=>Input::get('password')
            );

            $remember = Input::has('remeber')? true:false;

            if(Auth::attempt($userdata, $remember)){
                //authentication successful
                return Redirect::route('home');
            }
            else{
                //authentication failed
               return Redirect::to('login')
               ->with('message','wrong username or password')
               ->with('alert-class','alert-danger');
            }
        }


        //attempt to login user
        
        return View::make('login');
    }
    public function getRegister(){
        return View::make('register');
        
    }
    public function postRegister(){
        //validate user input
        $validator = User::validate(Input::all());
        if($validator->passes()){
            //attempt to register user
            User::create(array(
                'username'=>Input::get('username'),
                'email'=>Input::get('email'),
                'password'=>Input::get('password')
            ));
            return Redirect::route('login')->withMassage('You have successfully Registered!');
        }
        return Redirect::route('register')->withErrors($validator);    
    }
    public function logout(){
        Auth::logout();
        return Redirect::route('login')
        ->with('message','You have successfully logged out!');
        // ->with('alert-class','alert-danger');
    }
}