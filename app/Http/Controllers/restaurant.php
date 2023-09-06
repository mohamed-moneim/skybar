<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\food;
use App\Models\bar;
use App\Models\events;
use App\Models\shisha;
use App\Models\tables;
use App\Models\tablereserve;
use App\Models\setting;
use App\Models\offers;
use App\Models\restuser;
use App\Models\eventusers;
use App\Models\social;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use JeroenDesloovere\VCard\VCard;

class restaurant extends Controller
{
    public function index(){
        return view("restaurant");
    }
    public function categories(){
        $cat =  Category::where("rid",\Auth::user()->id)->orderBy('order', 'asc')->paginate(10);

        return view("category")->with("cat",$cat);
    }
    public function deletecat($id){
        $cat =  Category::where("id",$id)->delete();
        return redirect("categories");
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }
    public function addimg(Request $request){
        if($request->validate([
            'file' => 'required|mimes:png,jpg,jpeg|max:2048'
        ])){
        $fileName = uniqid() . '_' . time() . '.'. $request->file->extension();  

        $type = $request->file->getClientMimeType();
        $size = $request->file->getSize();

        $request->file->move(public_path('file'), $fileName);
        return $fileName;
        }
    }
    public function addvideo(Request $request){
        if($request->validate([
            'file' => 'required|mimes:mp4,avi|max:10048'
        ])){
        $fileName = uniqid() . '_' . time() . '.'. $request->file->extension();  

        $type = $request->file->getClientMimeType();
        $size = $request->file->getSize();

        $request->file->move(public_path('file'), $fileName);
        return $fileName;
        }
    }
    public function uploadrestaurant(Request $request){
        $this->validator($request->all())->validate();
        $user = new User();
        $user->name = $request->name;
        $user->name_en = $request->namee;
        $user->email = $request->email;
        $user->password =  Hash::make($request->password);
        $user->address = $request->address;
        $user->address_en = $request->addresse;
        $user->mobile = $request->mobile;
        $user->type = $request->type;
        $user->profilepic = $request->profile;
        $user->coverpic = $request->cover;
        $user->save();
        $set = new setting();
        $set->rid = $user->id;
        $set->save(); 

        return redirect("/addrestaurant");

    }
    public function uploadcategory(Request $request){
        $cat = new Category();
        $cat->name = $request->name;
        $cat->name_en = $request->namee;
        $cat->img = $request->profile;
        $cat->order = $request->order;
        $cat->rid = \Auth::user()->id;
        $cat->save();
        return redirect("/categories");

    }
    public function updatecategory(Request $request){
        $cat =  Category::where("id",$request->old)->first();
        $cat->name = $request->name;
        $cat->name_en = $request->namee;
        $cat->img = $request->profile;
        $cat->order = $request->order;
        $cat->rid = \Auth::user()->id;
        $cat->save();
        return redirect("/categories");

    }
    public function ordercategory(Request $request){
        $cat =  Category::where("id",$request->old)->first();
        $cat->name = $request->name;
        $cat->img = $request->profile;
        $cat->rid = \Auth::user()->id;
        $cat->save();
        return redirect("/categories");

    }
    public function food(){
        $food =  food::where("rid",\Auth::user()->id)->paginate(10);
        $cat =  Category::where("rid",\Auth::user()->id)->get();
        return view("food")->with(["food"=>$food,"cat"=>$cat]);
    }
    public function uploadfood(Request $request){
        $food  = new food();
        $food->name = $request->name;
        $food->name_en = $request->namee;
        $food->catid = $request->cat;
        $food->desc = $request->description;
        $food->desc_en = $request->descriptione;
        $food->img = $request->profile;
        $food->price = $request->price;
        $food->rid = \Auth::user()->id;
        $food->save();
        return redirect("/food");

    }
    public function updatefood(Request $request){
        $food =  food::where("id",$request->old)->first();
        $food->name = $request->name;
        $food->catid = $request->cat;
        $food->desc = $request->description;
        $food->name_en = $request->namee;
        $food->desc_en = $request->descriptione;
        $food->img = $request->profile;
        $food->price = $request->price;
        $food->save();
        return redirect("/food");

    }
    public function bar(){
    $food =  bar::where("rid",\Auth::user()->id)->paginate(10);
        $cat =  Category::where("rid",\Auth::user()->id)->get();


        return view("bar")->with(["food"=>$food,"cat"=>$cat]);
    }
    public function deletefood($id){
        $cat =  food::where("id",$id)->delete();
        return redirect("food");
    }
    public function uploadbar(Request $request){
        $food  = new bar();
        $food->name = $request->name;
        $food->name_en = $request->namee;
        $food->desc_en = $request->descriptione;
        $food->catid = $request->cat;
        $food->desc = $request->description;
        $food->img = $request->profile;
        $food->price = $request->price;
        $food->rid = \Auth::user()->id;
        $food->save();
        return redirect("/bar");

    }
    public function updatebar(Request $request){
        $food =  bar::where("rid",\Auth::user()->id)->where("id",$request->old)->first();
        $food->name = $request->name;
        $food->name_en = $request->namee;
        $food->desc_en = $request->descriptione;
        $food->catid = $request->cat;
        $food->desc = $request->description;
        $food->img = $request->profile;
        $food->price = $request->price;
        $food->save();
        return redirect("/bar");

    }
    public function deletebar($id){
        $cat =  bar::where("id",$id)->delete();
        return redirect("bar");
    }
    public function shisha(){
        $food =  shisha::where("rid",\Auth::user()->id)->paginate(10);
        $cat =  Category::where("rid",\Auth::user()->id)->get();

        return view("shisha")->with(["food"=>$food,"cat"=>$cat]);
    }
    public function uploadshisha(Request $request){
        $food  = new shisha();
        $food->name = $request->name;
        $food->name_en = $request->namee;
        $food->desc_en = $request->descriptione;
        $food->catid = $request->cat;
        $food->desc = $request->description;
        $food->img = $request->profile;
        $food->price = $request->price;
        $food->rid = \Auth::user()->id;
        $food->save();
        return redirect("/shisha");

    }
    public function updateshisha(Request $request){
        $food =  shisha::where("id",$request->old)->first();
        $food->name = $request->name;
        $food->name_en = $request->namee;
        $food->desc_en = $request->descriptione;
        $food->catid = $request->cat;
        $food->desc = $request->description;
        $food->img = $request->profile;
        $food->price = $request->price;
        $food->save();
        return redirect("/shisha");

    }
    public function deleteshisha($id){
        $cat =  shisha::where("id",$id)->delete();
        return redirect("shisha");
    }


    public function events(){
        $food =  events::where("rid",\Auth::user()->id)->paginate(10);
        return view("event")->with("event",$food);
    }
    public function uploadevent(Request $request){
        $food  = new events();
        $food->name = $request->name;
        $food->desc = $request->description;
        $food->name_en = $request->namee;
        $food->desc_en = $request->descriptione;
        $food->img = $request->profile;
        $food->date = $request->date;
        $food->price = $request->price;
        $food->rid = \Auth::user()->id;
        $food->video = $request->vid;
        $food->save();
        return redirect("/events");

    }
    public function updateevent(Request $request){
        $food =  events::where("id",$request->old)->first();
        $food->name = $request->name;
        $food->desc = $request->description;
        $food->name_en = $request->namee;
        $food->desc_en = $request->descriptione;
        $food->img = $request->profile;
        $food->date = $request->date;
        $food->price = $request->price;
        $food->rid = \Auth::user()->id;
        $food->video = $request->vid;
        $food->save();
        return redirect("/events");

    }
    public function eventtables($id){
        $t= array();
        $tbls =  tablereserve::where("eid",$id)->paginate(10);
        foreach($tbls as $t2){
            $u = eventusers::where("email",$t2->uid)->first();
            $t2->email = $u->email;
            $t2->mobile = $u->mobile;
            $t2->name = $u->name;
            array_push($t,$t2);
        }
        return view("eventtables")->with("tbls",$t);
    }
    public function deleteevent($id){
        $cat =  events::where("id",$id)->delete();
        return redirect("events");
    }
    public function tables(){
        $tbls =  tables::where("rid",\Auth::user()->id)->paginate(10);
        return view("tables")->with("tbls",$tbls);
    }
    public function uploadtable(Request $request){
        $tbl  = new tables();
        $tbl->name = $request->name;
        $tbl->type = $request->cat;
        $tbl->price = $request->price;
        $tbl->rid = \Auth::user()->id;
        $tbl->save();
        return redirect("/tables");

    }
    public function updatetable(Request $request){
        $tbl =  tables::where("id",$request->old)->first();
        $tbl->name = $request->name;
        $tbl->type = $request->cat;
        $tbl->price = $request->price;
        $tbl->save();
        return redirect("/tables");

    }
    public function deletetable($id){
        $cat =  tables::where("id",$id)->delete();
        return redirect("tables");
    }
    
    public function offers(){
        $offer =  offers::where("rid",\Auth::user()->id)->paginate(10);
        return view("offers")->with("offer",$offer);
    }
    public function uploadoffer(Request $request){
        $tbl  = new offers();
        $tbl->name = $request->name;
        $tbl->desc = $request->description;
        $tbl->name_en = $request->namee;
        $tbl->desc_en = $request->descriptione;
        $tbl->price = $request->price;
        $tbl->beforeprice = $request->beforeprice;
        $tbl->img  = $request->profile;
        $tbl->img2  = $request->img2;
        $tbl->img3  = $request->img3;
        $tbl->active  = true;
        $tbl->rid  = \Auth::user()->id;
        $tbl->save();
        return redirect("/offers");

    }
    public function updateoffer(Request $request){
        $tbl =  offers::where("id",$request->old)->first();
        $tbl->name = $request->name;
        $tbl->desc = $request->description;
        $food->name_en = $request->namee;
        $food->desc_en = $request->descriptione;
        $tbl->price = $request->price;
        $tbl->img  = $request->profile;
        $tbl->img2  = $request->img2;
        $tbl->img3  = $request->img3;
        $tbl->beforeprice = $request->beforeprice;
        $tbl->save();
        return redirect("/offers");

    }
    public function deleteoffer($id){
        $cat =  offers::where("id",$id)->delete();
        return redirect("offers");
    }
    
    public function social(){
        $social =  social::where("rid",\Auth::user()->id)->paginate(10);
        return view("social")->with("social",$social);
    }
    public function uploadsocial(Request $request){
        $tbl  = new social();
        $tbl->name = $request->name;
        $tbl->url = $request->url;
        $tbl->img  = $request->profile;
        $tbl->rid  = \Auth::user()->id;
        $tbl->save();
        return redirect("/social");

    }
    public function updatesocial(Request $request){
        $tbl =  social::where("id",$request->old)->first();
        $tbl->name = $request->name;
        $tbl->url = $request->url;
        $tbl->img  = $request->profile;
        $tbl->rid  = \Auth::user()->id;
        $tbl->save();
        return redirect("/social");

    }
    public function deletesocial($id){
        $cat =  social::where("id",$id)->delete();
        return redirect("social");
    }
    public function activeoffer($id){
        $offer =  offers::where("id",$id)->first();
        if($offer->active){
            $offer->active = false;
        }else{
            $offer->active = true;
        }
        $offer->save();
        return redirect("/offers");
    }
    public function getrest(Request $request){
        $rest =  user::where("name","like","%".$request->name."%")->get();
        return view("restaurants")->with("rest",$rest);

    }
    public function profile(Request $request,$id){
        $rest =  user::where("id",$id)->first();
        $setting =  setting::where("rid",$id)->first();
        $social =  social::where("rid",$id)->get();
        $request->session()->put('restid',$id);
        $request->session()->put('img',$rest->img);
        return view("profile")->with(["rest"=>$rest,"setting"=>$setting,"soc"=>$social]);


    }
    public function menu($id,$type){
        $cats =  DB::table('categories as c')->where('c.rid',$id)
        ->join('food as f', 'f.catid', '=', 'c.id')->select("c.*")->distinct()->get();
        $food =  food::where("rid",$id)->get();

        return view("menu")->with(["cats"=>$cats,"type"=>$type,"food"=>$food]);
    }
    public function barmenu($id,$type){
        $cats =  DB::table('categories as c')->where('c.rid',$id)
        ->join('bars as f', 'f.catid', '=', 'c.id')->select("c.*")->distinct()->get();
        return view("menu")->with(["cats"=>$cats,"type"=>$type]);
    }
    public function shishamenu($id,$type){
        $cats =  DB::table('categories as c')->where('c.rid',$id)
        ->join('shishas as f', 'f.catid', '=', 'c.id')->select("c.*")->distinct()->get();
        return view("menu")->with(["cats"=>$cats,"type"=>$type]);
    }
    
    public function getitemsbycat($id,$type){
        if($type=="food"){
        $food =  food::where("catid",$id)->get();
        return view("item")->with("food",$food);
    }else    if($type=="bar"){
        $food =  bar::where("catid",$id)->get();
        return view("item")->with("food",$food);
    }else    if($type=="shisha"){
        $food =  shisha::where("catid",$id)->get();
        return view("item")->with("food",$food);
    }
}
public function eventslist($id){
    $ev =  events::where("rid",$id)->where("date",">",date("Y-m-d"))->get();
    $old =  events::where("rid",$id)->where("date","<",date("Y-m-d"))->paginate(10);
    return view("eventslist")->with(["ev"=>$ev,"old"=>$old]);
}
public function getevent($id){
    $ev =  events::where("id",$id)->first();
    $t =  tables::where("rid",$ev->rid)->get();
    $emptytbls = array();
    foreach($t as $e){
        $rt =  tablereserve::where(["tid"=>$e->id,"eid"=>$id])->get();
        if($rt->count() <1){

            array_push($emptytbls,$e);
        
    }
}
        return view("singleevent")->with(["f"=>$ev,"rt"=>$emptytbls]);
}
public function offerslist($id){
    $of =  offers::where(["rid"=>$id,"active"=>1])->get();
    return view("offerslist")->with("ev",$of);
}
public function adduser(Request $request){
    $user = restuser::where(["email"=>$request->email,"rid"=>$request->rid])->first();
    if($user){
        return back();
    }else{
        $user = new restuser();
        $user->email = $request->email;
        $user-> mobile = $request->mob;
        $user->name = $request->name;
        $user->rid = $request->rid;
        $user->save();
        return back();
    }
}
public function addeventuser(Request $request){


    $user = eventusers::where(["email"=>$request->email,"eid"=>$request->eid])->first();
    if($user){
        return back();
    }else{
        $user = new eventusers();
        $user->email = $request->email;
        $user->mobile = $request->mob;
        $user->name = $request->name;
        $user->eid = $request->eid;
        $user->save();
        $tbl = new tablereserve();
        $tbl->eid = $request->eid;
        $tbl->uid = $request->email;
        $tbl->tid = $request->tbl;
        $tbl->save();
        \Mail::send("mail", $request->all(), function($message) use($request) {
            $message->to($request->email,$request->name);
            $message->from('youremail@example.com', 'سكاي بار'); 
            $message->subject('تم استلام حجز الحفل');
        });

        return back();
    }
}
public function setlang(Request $request,$locale){
    $request->session()->put('locale',$locale);
    return back();
}
public function setting(){
    $users = User::paginate(10);
    return view('setting')->with("users",$users);
}
public function addsett(Request $request){
    $setting = setting::where('rid',$request->rid)->first();
    $setting[$request->type]= $request->val;
    $setting->save();
    
    return redirect('setting');
}
public function disablerest(Request $request,$id){
    $user = User::where("id",$request->id)->first();
    if($user->active){
        $user->active = 0;
    }else{
        $user->active = 1;

    }
    $user->save();
    return redirect('setting');
}
public function arrange(Request $request){
    $cat  = Category::where('id',$request->rid)->first();
    $neworder = $request->order;
    $max = Category::max('order');
    if($neworder>$max){
        $neworder = $max;
    }
    if($neworder<1){
        $neworder = 1;
    } 
    $cat2  = Category::where('order',$neworder)->first();
    $cat2->order = $cat->order;
    $cat->order = $neworder;
    $cat->save();
    $cat2->save();
    return redirect('categories');

}
public function restevents(Request $request){
    $events = events::where('rid',$request->id)->paginate(10);
    return view('adminevent')->with("ev",$events);
}
public function restusers(Request $request){
    $events = restuser::where('rid',$request->id)->paginate(10);
    return view('adminusers')->with("ev",$events);
}
public function eventusers(Request $request){
    $events = eventusers::where('eid',$request->id)->paginate(10);
    return view('admineventusers')->with("ev",$events);
}
public function download(Request $request){
    $u = User::where('id',$request->id)->first();
    $vcard = new VCard();
    $lastname = $u->name;
    $firstname = 'مطعم';
    $additional = '';
    $prefix = '';
    $suffix = '';
    $vcard->addPhoneNumber($u->mobile, 'WORK');

    // add personal data
    $vcard->addName($lastname, $firstname, $additional, $prefix, $suffix);
    return $vcard->download();
}

}
