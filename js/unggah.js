function detailBuku(no){
	bookPurchase(no);
	$.ajax({
		url: "https://desolate-reaches-00434.herokuapp.com/services/detail_upload.php",
		datatype: "html",
		data: { no : no, command : "detail" },
		method: "POST"
	}).done(function(obj){
		var temp = JSON.parse(obj);
		$("#judulBuku").html(temp[1]);
		$("#namaPenulis").html(temp[2]);
		$("#kategori").html(temp[3]);
		$("#deskripsiBuku").html(temp[4]);
		$("#tanggalUpload").html(temp[6]);
		$("#status").html(temp[7]);
		// $("#detailBuku").html("<td id='book_id'>"+ temp[0] + "</td>" + "<td>"+ temp[3] + "</td>" + "<td>"+ temp[4] + "</td>");
	});
}
