VIEW :


->In controller :


	use App\modelname;
  
	use illuminate\http\request;


	public function View(){
	
		$data = modelname::all();
			-----------------
			modelname::find(1);
			------------------
		        modelname::where('active', 1)
				   ->orderBy('name', 'desc')
				   ->take(10)
				   ->get();
    
		return view('pagename',compact('data'));
		
	 }
   
 -> In view :
 
   @foreach($data as $d)

	   {{ $d->title }}
     
   @endforeach
   
   

 -> Limit Set :

    {{ str_limit($data->description, $limit = 4) }}



 -> paginate :

     public function index(){

        $users = Product::paginate(2);

        $data = Product::simplePaginate(2); // for differnt view

		    return view('pagename',compact('users'));

      }



    {{ $users->links() }}



    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

--------------------------------

Search :

$search = ecom_product::where('sub_category', 'LIKE', "%$s%")->get();

--------------------------------



-> Delete :

  view.blade.php

	<a href="{{ url('productdelete/'.$p->id) }}"> Delete </a>


  route ->

	Route::get('/delete/{id}', 'ViewData@delete');


  controller ->


	$delete = ViewModel::find($id);
		
	$delete->delete();
		
	return redirect()->back()->with('delete_message','deleted successfully');


  view.blade.php :
  
  @if(session()->has('delete_message'))

    <div class="alert alert-success">
      {{ session()->get('delete_message') }}
    </div>

  @endif	
  
