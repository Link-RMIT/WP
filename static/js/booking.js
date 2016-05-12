function getPrice(type,date,time){
    var type_list='SA,SP,SC,FA,FC,B1,B2,B3'.split(',');
    var discount_price_list=[12,10,8,25,20,20,20,20];
    var full_price_list=[18,25,12,30,25,30,30,30];

    var index = type_list.indexOf(type);
    if(/^(Mon|Tue|Wed|Thu|Fir)$/.exec(date) && time == '1pm'
       || /^(Mon|Tue)$/.exec(date)){
        return discount_price_list[index];
    }
    return full_price_list[index];
}

function _test_getPrice(){
    var test_case=[
        [['SA','Mon','5pm'],12],
        [['SP','Sat','5pm'],15],
        [['asdf','Mon','4pm'],undefined],
        [['FA','Wed','1pm'],25],
        [['FC','Thu','3pm'],25],
    ];
    for( var i in test_case){
        i=test_case[i];
        var actual=getPrice.apply(undefined,i[0]);
        var expected = i[1];
        console.log([i[0],expected,actual, expected==actual]);
    }
}


$(function(){
    $("#day-picker")
	.html(
	    Object.keys(available_sessions).reduce(function(s,a){
		return s+'<option value="'+a+'">'+a+'</option>'
	    }),"")
	.on('change',on_day_change);

    $('#time-picker').on('change',on_select_change);
    $('#order-table select').on('change',on_select_change);
    on_day_change();
})

function on_day_change(){
    var day = $( "#day-picker option:selected" ).val();
    $("#time-picker").html(
	available_sessions[day].reduce(function(s,a){
	    console.log(a);
	    return s+'<option value="'+a+'">'+a+'</option>'
	},""));
    on_select_change();
}


function on_select_change(){
     day = $( "#day-picker option:selected" ).val();
     time = $( "#time-picker option:selected" ).val();
     tr = $('#order-table tr:not(:first):not(:last)');
     sum=0;
    tr.each(function(){
	var quantity = parseFloat($('td:nth(1) select option:selected',this).text());
	var type = $('td:nth(1) select',this).attr('name');
	var price = getPrice(type,day,time)*quantity;
	console.log([quantity,type,price]);
	$('td:nth(2)',this)
	    .text('$'+price.toFixed(2));
	sum += price;
    });
    $('#order-table tr:last').children(':last').text('$'+sum.toFixed(2));
}
