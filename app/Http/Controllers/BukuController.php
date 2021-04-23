<?php  
namespace App\Http\Controllers; 
 
use App\Models\Buku; 
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB;
 
class BukuController extends Controller 
{ 
    public function __construct()
    {
        $this->middleware('auth');
    }
   /** 

*	Display a listing of the resource. 
     * 
*	@return \Illuminate\Http\Response 
     */     
    public function index() 
    { 
        // $mahasiswas = Mahasiswa::all();
        $bukus = Buku::orderBy('id_buku', 'asc')
        ->paginate(5);
        return view('bukus.index', compact('bukus'));
        // ->with('i', (request()->input('page', 1) - 1) * 5);
        

     }     
     public function create() 
    {         
        return view('bukus.create'); 
    }     
    public function store(Request $request) 
    { 
 
    //melakukan validasi data 
        $request->validate([ 
            'id_buku' => 'required', 
            'judul' => 'required', 
            'kategori' => 'required', 
            'penerbit' => 'required', 
            'pengarang' => 'required',
            'jumlah'=>'required',
            'status'=>'required' 
        ]); 
 
        //fungsi eloquent untuk menambah data 
        Buku::create($request->all()); 
 
        //jika data berhasil ditambahkan, akan kembali ke halaman utama         
        return redirect()->route('bukus.index') 
            ->with('success', 'Data Buku Berhasil Ditambahkan'); 
    }      
    
    public function show($id_buku) 
    { 
        //menampilkan detail data dengan menemukan/berdasarkan Nim Mahasiswa 
        $bukus = Buku::find($id_buku);         
        return view('bukus.detail', compact('bukus'));     
    }   
    public function edit($id_buku)    
    { 
 //menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit 
        $bukus = Buku::find($id_buku);         
        return view('bukus.edit', compact('bukus'));     
    }     
    public function update(Request $request, $id_buku) 
    { 
 
 //melakukan validasi data 
        $request->validate([ 
            'id_buku' => 'required', 
            'judul' => 'required', 
            'kategori' => 'required', 
            'penerbit' => 'required', 
            'pengarang' => 'required',
            'jumlah'=>'required',
            'status'=>'required' 
        ]); 
 
 //fungsi eloquent untuk mengupdate data inputan kita 
        Buku::find($id_buku)->update($request->all());  
//jika data berhasil diupdate, akan kembali ke halaman utama         
        return redirect()->route('bukus.index') 
            ->with('success', 'Data Buku Berhasil Diupdate'); 
    }    
     public function destroy( $id_buku) 
     { 
 //fungsi eloquent untuk menghapus data         
         Buku::find($id_buku)->delete();         
         return redirect()->route('bukus.index') 
            -> with('success', 'Data Buku Berhasil Dihapus'); 
     } 
     public function cari (Request $request)
    {

         $cari = $request -> get ('cari');
         $post = DB::table('buku')->where('judul','like','%'.$cari.'%')->paginate(5);
        return view('bukus.index',['bukus' => $post]);

         
    }
}; 
