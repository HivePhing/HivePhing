<?php


namespace App\Http\Controllers;

use App\FirebaseModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FirebasemessageController extends FirebasehelperController
{    //
    public function __construct()
    {
        $this->middleware('auth',['except'=>'sendnoti']);
    }

    public function store_token(Request $request){
        $user_id=Auth::user()->id;
        $token=$request->token;
        $old_token=FirebaseModel::where('user_id',Auth::user()->id);
        if($old_token->count() > 0){
            if($old_token->first()->token == $token){
            }else{
                $old_token->updated(['user_id'=>$user_id,'token'=>$token,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()]);
            }
        }else{
            FirebaseModel::create(['user_id'=>$user_id,'token'=>$token,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()]);
        }
        return response()->json(['data'=>'return from server']);

    }
    public function sendnoti(){
        $ff=FirebasehelperController::sendnotimsg($body='body test',$title='Title test',$token=["e-UxXofcgyM:APA91bGLh38sdWzKkVl4FmdlYs8f8gPQ0yqxKB2VmX7j6VVpUus8MYVV3QehZlSj6Ul21Vmc7wq9oPU8RsRTPi9Z6gL9yi4UpOzQaiAuzbMTGVp5AdHLcPEQXg8szfTXJxodxfJ17A_P","dIrZ9jFMRZM:APA91bEFC4aE-intGeCcNNJHyh3zR_Ct-PFn7M_uduZWPbIlsLmB-Kfo5ekTOKEg8jepJyO5R-ETJYYB4vUbIx6t8WNXiKQDjBGwoUBv03GFyqexV3rIMpURetHPsBgyir2QvVDwmLPf"]);
        return $ff;

    }

}
