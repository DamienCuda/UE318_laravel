<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $les_membres;
    public function __construct(User $les_membres)
    {

        $this->les_membres = $les_membres;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $les_membres = $this->les_membres->all();
        return view('pages_site/membres', compact('les_membres'));
    }
}
