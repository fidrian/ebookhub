function detailBuku(book_id){
	bookPurchase(book_id);
	$.ajax({
		url: "https://desolate-reaches-00434.herokuapp.com/services/ajax.php",
		datatype: "html",
		data: { book_id : book_id, command : "detail" },
		method: "POST"
	}).done(function(obj){
		var temp = JSON.parse(obj);
		$("#displayBuku").html("<td><img id='fotoBuku' src='"+ temp[1] + "'></td>");
		$("#judulBuku").html(temp[2]);
		$("#deskripsiBuku").html(temp[5]);
		$("#detailBuku").html("<td id='book_id'>"+ temp[0] + "</td>" + "<td>"+ temp[3] + "</td>" + "<td>"+ temp[4] + "</td>");
		
		if (temp[6] <= 0){
			$("#detailBuku").html($("#detailBuku").html() + "<td>"+ '<p class="list-group-item-text" style="color:red;">Stok Kosong.</p>' + "</td>");
		}else {
			$("#detailBuku").html($("#detailBuku").html() + "<td>"+ temp[6] + "</td>");
		}
		
		$("#detailPinjam").html($("#tombolPinjam" + book_id).html());
	});
}
function bookPurchase(book_id){
	$.ajax({
		url: "https://desolate-reaches-00434.herokuapp.com/services/ajax.php",
		datatype: "html",
		data: { book_id : book_id, command : "purchase" },
		method: "POST"
	}).done(function(obj){
		var temp = JSON.parse(obj);
		$("#bookPurchase").html("");
		$("#detailPurchase").html("");
		for (var i = 0; i < temp.length; i++){
			$("#bookPurchase").html($("#bookPurchase").html() + (i+1) + ".	" + temp[i][4] + "<br>");
			var tmp = "";
			for (var j = 0; j < temp[i].length; j++){
				if (j !== 4){
					tmp = tmp + "<td>" + temp[i][j] + "</td>";
				}
			}
			
			$("#detailPurchase").html($("#detailPurchase").html() +"<tr>"+ tmp +"</tr>");	
		}
	}); 
}
function komenBuku(user_id){
	var idBuku = $("#book_id").html();
	var isi = $("#update-bookPurchase").val();
	$.ajax({
		url: "https://desolate-reaches-00434.herokuapp.com/services/ajax.php",
		datatype: "html",
		data: { book_id : idBuku, user_id : user_id, content : isi, command : "komentar" },
		method: "POST"
	}).done(function(obj){
		bookPurchase(idBuku);
	});
}