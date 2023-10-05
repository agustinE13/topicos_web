<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Review;
use App\Mail\mail_contact;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;


class SiteController extends Controller
{
    //
    public function services(){
        return view('services');
    }
    public function product_detail($id=null,$category_id=null,Request $request){

        if($request->isMethod("POST")){
            $request->validate([
                'ratting'=>'required',
                'name' => 'required|max:50',
                'email' => 'required|email|max:50',
                'review' => 'required|min:5',
            ],[
                'ratting.required' => 'Please enter a ratting.',
                'name.required' => 'Please type your name.',
                'name.max' => '50 characters maximum.',
                'email.required' => 'Please type your email.',
                'email.email' => 'Please enter a valid email address.',
                'email.max' => '50 characters maximum.',
                'review.required' => 'Please type your review.',

            ]);


            $review = new Review();
            $review->ratting=$request->input("ratting");
            $review->name=$request->input("name");
            $review->email=$request->input("email");
            $review->review=$request->input("review");
            $review->id_producto=$request->input("id");
            $review->save();
            return redirect()->route("product_detail",['id' => $id, 'category_id' => $category_id])->with('success', 'Your review has been sent.');
        }

        $categories = Category::all();

        /*$products = (is_null($category_id)?
            Product::all():
            Product::where('category_id',$category_id)->get()
        );*/
        $products=Product::where('id',$id)->
                            where('category_id',$category_id)->get();
        $products_cat=Product::where('category_id',$category_id)->get();
        $reviews=Review::where('id_producto',$id)->get();

        return view('e-commerce.product-detail',compact('categories','products','products_cat','reviews'));

    }

    public function productsByCategory()
    {
        $categories=Category::all();
        return view('e-commerce.product-by-category',compact('categories'));
    }


    public function ejercicio(){
        return view('e-commerce.ejercicio');
    }

    public function contact(Request $request)
    {
        if($request->isMethod("POST")){
            $request->validate([
                'name' => 'required|max:50',
                'email' => 'required|email|max:50',
                'subject' => 'required|max:100',
                'message' => 'required|min:5',
            ],[
                'name.required' => 'Please type your name.',
                'name.max' => '50 characters maximum.',
                'email.required' => 'Please type your email.',
                'email.email' => 'Please enter a valid email address.',
                'email.max' => '50 characters maximum.',
                'subject.required' => 'Please type your subject.',
                'subject.max' => '100 characters maximum.',
                'message.required' => 'Please type your message.',

            ]);


            $contact = new Contact();
            $contact->name=$request->input("name");
            $contact->email=$request->input("email");
            $contact->subject=$request->input("subject");
            $contact->message=$request->input("message");
            $contact->save();
            $response = Mail::to($request->input('email'))->send(new mail_contact($request->input('name'),
            $request->input('email'),$request->input('subject'),$request->input('message')));

            return redirect()->route("contact")->with('success', 'Your contact messsage has been sent.');
        }

        return view('contact');
    }

    public function product($category_id = null){
        //$products = Product::all();
        $categories = Category::all();
        $products = (is_null($category_id)?
            Product::all():
            Product::where('category_id',$category_id)->get()
        );
        //return view('product-list',['product' => $product]);
        return view('e-commerce.product-list',compact('products','categories'));
    }


    public function about(){
        $about_message="Hola, somos una empresa que se dedica al desarrollo de sofware de Sistemas de Información";
        return view('about',["about_message" => $about_message]);
    }

    public function admin_employees(){
        $response = Http::get('http://127.0.0.1:3000/api/v1/employees');
        $employees = $response->object();
        return view ('e-commerce.admin_employees',compact('employees'));
    }
    public function registro(){
        return view('e-commerce.registroUsuario');
    }
}
