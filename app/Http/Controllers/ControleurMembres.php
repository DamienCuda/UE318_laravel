<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
// Obligatoire pour avoir accès au modèle
use App\Models\User;
//Pour accéder à l'authentification
use Illuminate\Support\Facades\Auth;

use Spatie\Html\Elements\Form;

class ControleurMembres extends Controller
{

    // des variables
    protected $les_membres;
    protected $soumissions;
    
    public function __construct( User $les_membres, Request $requetes)
    {
    $this->les_membres = $les_membres;
    $this->soumissions = $requetes;
    }

    public function index()
    {
        $les_membres = $this->les_membres->all();
        return view('pages_site/membres', compact('les_membres'));
    }

    
    public function consult()
    {
        $les_membres = $this->les_membres->all();
        return view('pages_site/consultation_edition', compact('les_membres'));
    }
    
    public function identite() {
        if (Auth::check()){
            $utilisateur = Auth::user();
            $id = Auth::id();
            return view('pages_site/identite',compact('utilisateur','id'));
        }else
        echo "<h1>Accès non autorisé</h1>";
    }
    
    public function acces_protege() {
        $infos_utilisateur = Auth::user();
        $utilisateur = $infos_utilisateur->name;
        echo "<h1>Utilisateur authentifié : ".$utilisateur."</h1>";
    }

    public function afficher($numero)
    {
        $un_membre = User::findOrFail($numero);
        return view('pages_site/membre', compact('un_membre'));
    }

    public function creer()
    {
        return view('pages_site/creation');
    }

    public function enregistrer(Request $request)
    {
        $membre = new User();
        $membre->name = $request->name;
        $membre->email = $request->email;
        $membre->password = $request->password;
        $membre->save();
        $message = 'Membre créé 😀';
        return redirect()->route('message_redirect', ['message' => $message]);
    }

    public function miseAJour($numero)
    {
        $un_membre = $this->les_membres->find($numero);
        $la_soumission = $this->soumissions;
        $un_membre->name =$la_soumission->name;
        $un_membre->email =$la_soumission->email;
        $un_membre->save();
        $message = 'Modification enregistré 👍';
        return redirect()->route('message_redirect', ['message' => $message]);
    }

    public function showMessagePage(Request $request)
    {
        $message = $request->query('message');
        return view('pages_site/message_redirect', compact('message'));
    }

    public function editer($numero)
    {
        $un_membre = $this->les_membres->find($numero);
        if(!$un_membre){
            $message = 'Il n\'y a pas d\'utilisateur avec ce numéro 😉';
            return view('pages_site/message_redirect', compact('message'));
        }else{
            return view('pages_site/edition', compact('un_membre'));
        }
    }
}
