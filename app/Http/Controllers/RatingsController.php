<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class RatingsController extends Controller
{
    public function ratings()
    {
        $ratings = Rating::with(['user', 'product'])->get()->toArray();
        
        return view('admin.rating.index', ['ratings' => $ratings]);
    }

    public function addRating(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            if(!Auth::check()){
                $message = "Login rate this product";
                return redirect()->back()->withError($message);
            }
            
            if (!isset($data['rating'])) {
                $message = "Add atleast one star rating";
                return redirect()->back()->withError($message);
            }

            if (!isset($data['review'])) {
                $message = "Add review";
                return redirect()->back()->withError($message);
            }

            $ratingCount = Rating::where(['user_id'=>Auth::user()->id, 'product_id'=>$data['product_id']])->count();
            if($ratingCount>0){
                $message = "Your rating already exist for this product";
                return redirect()->back()->withError($message);
            }else{
                $rating = new Rating;
                $rating->user_id = Auth::user()->id;
                $rating->product_id = $data['product_id'];
                $rating->review = $data['review'];
                $rating->rating = $data['rating'];
                $rating->status = 0;
                $rating->save();

                $message = "Thanks for rating this product!";
                
                return redirect()->back()->withSuccess($message);
            }
        }
    }

    public function destroy($id)
    {

        $rating = Rating::find($id);
        
        $rating->delete();

        return redirect('/dashboard/ratings')->with('success', 'Product has been deleted!');
    }
}
