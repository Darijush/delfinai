<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Movie;
use Auth;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function homeList(Request $request)
    {
        //filter
        if ($request->s) {
            $search = explode(' ', $request->s);
            if (count($search) == 1) {
                $movies = Movie::where('title', 'like', '%' . $request->s . '%');
            } else {
                $movies = Movie::where('title', 'like', '%' . $search[0] . '%' . $search[1] . '%')
                    ->orWhere('title', 'like', '%' . $search[1] . '%' . $search[0] . '%')
                    ->orWhere('title', 'like', '%' . $search[0] . '%')
                    ->orWhere('title', 'like', '%' . $search[1] . '%');
            }
        } else {
            $movies = Movie::where('id', '>', 0);
        }
        //sort
        if ($request->sort == 'rate_asc') {
            $movies = $movies->orderBy('rating');
        } elseif ($request->sort == 'rate_desc') {
            $movies = $movies->orderBy('rating', 'desc');
        } elseif ($request->sort == 'title_asc') {
            $movies = $movies->orderBy('title');
        } elseif ($request->sort == 'title_desc') {
            $movies = $movies->orderBy('rating', 'desc');
        } elseif ($request->sort == 'price_asc') {
            $movies = $movies->orderBy('price');
        } elseif ($request->sort == 'price_desc') {
            $movies = $movies->orderBy('price', 'desc');
        }
        return view('home.index', [
            'movies' => $movies->paginate(5)->withQueryString(),
            'sort' => $request->sort ?? 0,
            'sortSelect' => Movie::SORT_SELECT,
            's' => $request->s ?? ''
        ]);
    }
    public function index()
    {
        return view('home');
    }

    public function rate(Request $request, Movie $movie)
    {

        $votes = json_decode($movie->votes ?? json_encode([]));
        if (in_array(Auth::user()->id, $votes)) {
            return redirect()->back()->with('not', "You already rated this movie!!!");
        }
        $title = $movie->title;
        $votes[] = Auth::user()->id;
        $movie->votes = json_encode($votes);
        $movie->rating_sum = $movie->rating_sum + $request->rate;
        $movie->rating_count++;
        $movie->rating = $movie->rating_sum / $movie->rating_count;
        $movie->save();
        return redirect()->back()->with('ok', "$title rated! Thanks");
    }
    public function addComment(Request $request, Movie $movie)
    {
        Comment::create([
            'movie_id' => $movie->id,
            'post' => $request->post,
        ]);
        return redirect()->back()->with('ok', 'All good!');
    }
}
