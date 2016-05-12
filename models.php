<?php
class Movie{
    public $id;
    public $title;
    public $director;
    public $cast;
    public $genre;
    public $rating;
    public $length;
    public $plot;
    public $poster;
    
    public function __construct($id,$title,$director,$cast,$gengre,$rating,$length,$plot,$poster){
	$this->id = $id;
	$this->title = $title;
	$this->director = $director;
	$this->cast = $cast;
	$this->gengre = $gengre;
	$this->rating = $rating;
	$this->length = $length;
	$this->plot = $plot;
	$this->poster = $poster;
    }
}





class MovieModel{
    static public $movies;
    static public function get($field, $value){
	foreach (MovieModel::$movies as $m){
	    if($m->$field == $value){
		return $m;
	    }
	}
    }
}
MovieModel::$movies = array(
    new Movie(
	"AC",
	"Batman V Superman: Dawn of Justice",
	"Zack Snyder",
	"Ben Affleck, Henry Cavill, Amy Adams",
	"Action, Adventure, Fantasy",
	"M",
	"238 Minutes",
	"Fearing the actions of a god-like Super Hero left unchecked, Gotham City's own formidable, forceful vigilante takes on Metropolis' most revered, modern-day savior, while the world wrestles with what sort of hero it really needs. With Batman and Superman at war with one another, a new threat quickly arises, putting mankind in greater danger than it's ever known before.",
	"static/img/batvsup.jpg"),
    new Movie(
	"CH","The Jungle Book", "Jon Favreau", "Bill Murray, Ben Kingsley, Idris Elba", "Action, Adventure, Childrens", "PG", "106 Minutes", "An all-new live-action epic adventure about Mowgli (newcomer Neel Sethi), a man-cub who's been raised by a family of wolves. But Mowgli finds he is no longer welcome in the jungle when fearsome tiger Shere Khan (voice of Idris Elba), who bears the scars of Man, promises to eliminate what he sees as a threat.", "static/img/junbook.jpg"
    ),
    new Movie(
	"AF","How to be Single", "Christian Dittler", "Dakota Johnson,  Alison Brie", "Comedy, Romance", "PG", "110 Minutes", "There's a right way to be single, a wrong way to be single, and then...there's Alice. And Robin. Lucy. Meg. Tom. David. New York City is full of lonely hearts seeking the right match, be it a love connection, a hook-up, or something in the middle.", "static/img/htbs.jpg"
    ),
    new Movie(
	"RC","Ambarsayiya", "Mandeep Kaumar", "Diljit Dosanjh, Navneet Kaur Dhillon", "Bollywood, Comedy", "PG", "140 Minutes", "Diljit Dosanjh stars as the rogueish Ambarsariya, an insurance agent with a record number of sales to his name and great pride in his home and faith. However, when he meets those who aren't living up to their Sikh name and promise, even corrupting his great city, Ambarsariya's life is thrown into turmoil.", "static/img/ambar.jpg"
    ),
);






class Session {
    static private $_last_id = 0;
    public $id;
    public $movie_id;
    public $day;
    public $time;
    public function __construct($movie_id,$day,$time){
	$this->movie_id = $movie_id;
	$this->day = $day;
	$this->time = $time;
	$this->id = Session::$_last_id;
	Session::$_last_id++;
    }
}


class SessionModel{
    static public $sessions;
    static public function get($field,$value){
	foreach (SessionModel::$sessions as $s){
	    if($s->$field == $value){
		return $s;
	    }
	}
    }
    static public function filter($field,$value){
	return array_filter(SessionModel::$sessions,function($a) use (&$field,&$value){
	    return $a->$field==$value;
	});
    }
}

/*
AC = Action movie
CH = Childrens movie
AF = Art / Foreign movie
RC = Romantic Comedy movie
*/
SessionModel::$sessions = array(
    new Session('CH','Mon','1pm'),
    new Session('AF','Mon','6pm'),
    new Session('RC','Mon','9pm'),
    new Session('CH','Tue','1pm'),
    new Session('AF','Tue','6pm'),
    new Session('RC','Tue','9pm'),
    new Session('RC','Wed','1pm'),
    new Session('CH','Wed','6pm'),
    new Session('AC','Wed','9pm'),
    new Session('RC','Thu','1pm'),
    new Session('CH','Thu','6pm'),
    new Session('AC','Thu','9pm'),
    new Session('RC','Fri','1pm'),
    new Session('CH','Fri','6pm'),
    new Session('AC','Fri','9pm'),
    new Session('CH','Sat','12pm'),
    new Session('AF','Sat','3pm'),
    new Session('RC','Sat','6pm'),
    new Session('AC','Sat','9pm'),
    new Session('CH','Sun','12pm'),
    new Session('AF','Sun','3pm'),
    new Session('RC','Sun','6pm'),
    new Session('AC','Sun','9pm'),
);


$_type_list = array("SA", "SP", "SC", "FA", "FC", "B1", "B2", "B3");

function _get_price($type,$day,$time){
    global $_type_list;
    $_discount_price_list = array(12,10,8,25,20,20,20,20);
    $_full_price_list = array(18,25,12,30,25,30,30,30);
    
    $index = array_search($type, $_type_list);
    if (array_search(
	$day,
	array("Mon", "Tue", "Wed", "Thu", "Fir"))
     && $time=='1pm'
	    || ($day=="Mon" || $day=="Tue")){
	return $_discount_price_list[$index];
    }
    return $_full_price_list[$index];
}


class Booking{
    
    public $session_id;
    public $items;

    static public $translate = array(
	"SA" => "Standard Adult",
	"SP" => "Standard Concession",
	"SC" => "Standard Child",
	"FA" => "First Class Adult",
	"FC" => "First Class Child",
	"B1" => "Beanbag (1 person)",
	"B2" => "Beanbag (2 People)",
	"B3" => "Beanbag (3 Children)",
    );
    
    /*public function __construct($session_id,$items){
	$this->session_id = $session_id;
	$this->items = $items;
    }*/
    public function row($i){
	$s = SessionModel::get('id',$this->session_id);
	$r = $this->items[$i];

	return array(
	    'row_number' => $i,
	    'type' => $r['type'],
	    'type_name' => Booking::$translate[$r['type']],
	    'quantity' => $r['quantity'],
	    'cost' => _get_price($r['type'],$s->day,$s->time),
	    'subtotal' => _get_price($r['type'],$s->day,$s->time)*$r['quantity']
	);
    }
    public function each_row($fun){
	$c=count($this->items);
	for($i=0;$i<$c;$i++){
	    $fun($this->row($i));
	}
    }
    private function _total(){
	$sum=0;
	$this->each_row(function($row)use(&$sum){
	    $sum+=$row['subtotal'];
	});
	return $sum;
    }
    public function __get($property) {
	if($property == 'total')
	    return $this->_total();
    }        
    public function __construct($form){
	global $_type_list;
	foreach(SessionModel::$sessions as $s){
	    if(
		$s->movie_id == $form['movie']
		&& $s->day == $form['day']
		&& $s->time == $form['time']
	    ){
		$this->session_id = $s->id;
		$this->items=array();
		foreach ($_type_list as $type){
		    if($form[$type]>0)
			array_push($this->items,array(
			    "type"=>$type,
			    "quantity"=>intval($form[$type])
			));
		}
	    }
	}	
    }
    

    /*public function __get($property) {
	if($property == 'price')
	    return _getPrice();
    }*/
}
//$m = new Booking(1,'Standard-Full','Mon','5pm');

class CustomerInfo{
    public $name;
    public $email;
    public $phone;
    public function __construct($form){
	$this->name = $form['name'];
	$this->email = $form['email'];
	$this->phone = $form['phone'];
    }
}


class ShoppingCart{
    public $items=array();
    public function add_item($item){
	array_push($this->items,$item);
    }
    public function delete_item($index){
	array_splice($this->items, $index, 1);
    }
    private function _total(){
	$sum=0;
	foreach($this->items as $i){
	    $sum+=$i->total;
	}
	return $sum;
    }
    public function __get($property) {
	if($property == 'total')
	    return $this->_total();
    }
    public function clear(){
	//unset($_SESSION['cart']);
	$this->items = array();
    }
}

//$json = json_encode( (array)$object );
?>

