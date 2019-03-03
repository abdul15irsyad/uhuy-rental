$(document).ready(function(){

	//ajax tampilkan user table dari database
	tampil_user_table();
	// $(".konten").hide();

	$(window).scroll(function() {
	    if ($(this).scrollTop()) {
			$('#navbar_sticky').addClass('navbar-sticky');
	    } else {
			$('#navbar_sticky').removeClass('navbar-sticky');
	    }
	});

	$("#btn_user").click(function(){
		tampil_user_table();
		$(".nav-link").removeClass("nav-link-aktif");
		$(".nav-link-user").addClass("nav-link-aktif");
	});
	$("#btn_mobil").click(function(){
		tampil_mobil_table();
		$(".nav-link").removeClass("nav-link-aktif");
		$(".nav-link-mobil").addClass("nav-link-aktif");
	});

	$("#btn_add_mobil").click(function(){
		tampil_tambah_mobil();
		$("#form_tambah_mobil input[name='merk']").focus();
	});	

	$("#batal_tambah_mobil").click(function(){
		tampil_mobil_table();
		$(".nav-link").removeClass("nav-link-aktif");
		$(".nav-link-mobil").addClass("nav-link-aktif");
		emptyFormTambahMobil();
	});

	$("#form_tambah_mobil").on("submit",function(e){
		e.preventDefault();

		var formData = new FormData(this);
		var merk,model,jenis,transmisi,tahun,harga;

		merk = $("#form_tambah_mobil").find("input[name='merk']").val();
		model = $("#form_tambah_mobil").find("input[name='model']").val();
		jenis = $("#form_tambah_mobil").find("input[name='jenis']").val();
		transmisi = $("#form_tambah_mobil").find("select[name='transmisi'] option:selected").val();
		tahun = $("#form_tambah_mobil").find("input[name='tahun']").val();
		harga = $("#form_tambah_mobil").find("input[name='harga']").val();

		formData.append('act',"tambah_mobil");
		formData.append('merk',merk);
		formData.append('model',model);
		formData.append('jenis',jenis);
		formData.append('transmisi',transmisi);
		formData.append('tahun',tahun);
		formData.append('harga',harga);

		$.ajax({
			type 	: "post",
			url 	: "konten/tampil_database.php",
			dataType: "json",
			contentType: false,
			processData:false,
			data 	: formData,
		  	error: function(){
	    	} 
		}).done(function(){
			// alert(response);
			tampil_mobil_table();
		});
	});

	$("#batal_edit_mobil").click(function(){
		tampil_mobil_table();
		$(".nav-link").removeClass("nav-link-aktif");
		$(".nav-link-mobil").addClass("nav-link-aktif");
	});

	$("#form_edit_mobil").on("submit",function(e){
		e.preventDefault();

		var formData2 = new FormData(this);
		var id_mobil,merk,model,jenis,transmisi,tahun,harga;

		id_mobil = $("#form_edit_mobil").find("input[name='id_mobil']").val();
		merk = $("#form_edit_mobil").find("input[name='merk']").val();
		model = $("#form_edit_mobil").find("input[name='model']").val();
		jenis = $("#form_edit_mobil").find("input[name='jenis']").val();
		transmisi = $("#form_edit_mobil").find("select[name='transmisi'] option:selected").val();
		tahun = $("#form_edit_mobil").find("input[name='tahun']").val();
		harga = $("#form_edit_mobil").find("input[name='harga']").val();

		formData2.append('act',"edit_mobil");
		formData2.append('id_mobil',id_mobil);
		formData2.append('merk',merk);
		formData2.append('model',model);
		formData2.append('jenis',jenis);
		formData2.append('transmisi',transmisi);
		formData2.append('tahun',tahun);
		formData2.append('harga',harga);

		$.ajax({
			type 	: "post",
			url 	: "konten/tampil_database.php",
			dataType: "json",
			contentType: false,
			processData:false,
			data 	: formData2,
		  	error: function(){
	    	} 
		}).done(function(response){
			// alert(response);
			tampil_mobil_table();
		});
	});

	$("#btn_peminjaman").click(function(){
		tampil_peminjaman_table();
		$(".nav-link").removeClass("nav-link-aktif");
		$(".nav-link-peminjaman").addClass("nav-link-aktif");
	});

	// search user
	$("#search_user").keyup(function(){
		var searchText = $(this).val();
		$.ajax({
			type 	:"post",
			url   	:"konten/tampil_database.php",
	      	dataType:'json',
	      	data  	:{
	      		act:"search_user",
	      		search_text:searchText
	      	}
		}).done(function(response){
			var result = response;
			var add_user_text="";
			if (result.length>0) {
				for(var i=0;i<result.length;i++){
					add_user_text+="<tr id='baris_user_"+result[i][0]+"'><td style='text-transform:capitalize'>"+
						result[i][1]+"</td><td>"+
						result[i][2]+"</td><td>"+
						result[i][3]+"</td><td>"+
						result[i][4]+"</td><td>"+
						result[i][5]+"</td>";
					add_user_text+="<td style='text-align:center'><a href='#' id='btn_hapus_user' onclick='hapus_user("+result[i][0]+")'><i class='fas fa-trash'></i></a></td>";
				}
			}else{
				add_user_text+="<tr><td colspan='7' style='text-align:center'>Pengguna tidak ada</td></tr>"
			}
			$("#tbody_user").html(add_user_text);
		});
	});

	// search mobil
	$("#search_mobil").keyup(function(){
		var searchText = $(this).val();
		$.ajax({
			type 	:"post",
			url   	:"konten/tampil_database.php",
	      	dataType:'json',
	      	data  	:{
	      		act:"search_mobil",
	      		search_text:searchText
	      	}
		}).done(function(response){
			var result = response;
			var add_mobil_text="";
			var a_aksi="";
			if(result.length>0){
				for(var i=0;i<result.length;i++){
					add_mobil_text+="<tr id='baris_mobil_"+result[i][0]+"' ><td style='text-transform:capitalize'>"+
						result[i][1]+"</td><td style='text-transform:capitalize'>"+
						result[i][8]+"</td><td style='text-transform:capitalize'>"+
						result[i][2]+"</td><td style='text-transform:capitalize'>"+
						result[i][3]+"</td><td>"+
						result[i][4]+"</td><td>Rp. "+
						result[i][5]+"</td><td style='text-transform:capitalize' id='status_mobil_"+result[i][0]+"'>"+
						result[i][7]+"</td>";
					add_mobil_text+="<td style='text-align:center' id='aksi_mobil_"+result[i][0]+"' name='aksi'>";
					add_mobil_text+="<a href='#' id='btn_edit' onclick='edit_mobil("+result[i][0]+")' title='Edit Mobil'><i class='fas fa-edit'></i></a>";
					add_mobil_text+="<a href='#' id='btn_hapus_mobil' onclick='hapus_mobil("+result[i][0]+")'><i class='fas fa-trash'></i></a>";
					add_mobil_text+="</td>";
				}
			}else{
				add_mobil_text+="<tr><td colspan='8' style='text-align:center'>Mobil tidak ada</td></tr>";
			}
			$("#tbody_mobil").html(add_mobil_text);
		});
	});

	// search peminjaman
	$("#search_peminjaman").keyup(function(){
		var searchText = $(this).val();
		// $("title").html(searchText);
		$.ajax({
			type 	:"post",
			url   	:"konten/tampil_database.php",
	      	dataType:'json',
	      	data  	:{
	      		act:"search_peminjaman",
	      		search_text:searchText
	      	}
		}).done(function(response){
			var result = response;
			var add_peminjaman_text="";
			if (result.length>0) {
				for(var i=0;i<result.length;i++){
					add_peminjaman_text+="<tr id='baris_peminjaman_"+result[i][0]+"'><td style='text-transform:capitalize'>"+
						result[i][4]+" "+result[i][5]+"</td><td style='text-transform:capitalize'>"+
						result[i][2]+" - "+result[i][3]+"</td><td>"+
						result[i][7]+"</td><td>"+
						result[i][8]+"</td><td class='status_bayar' style='text-transform:capitalize'>"+
						result[i][9]+"</td><td class='tdaksi' style='text-align:center'>";
					if(result[i][9]=='belum'){
						add_peminjaman_text+="<a href='#' onclick='sudah("+result[i][0]+")' title='Sudah'><i class='fas fa-check'></i></a>";
					}else{
						add_peminjaman_text+="<a href='#' onclick='belum("+result[i][0]+")' title='Belum'><i class='fas fa-times'></i></a>";
					}
					add_peminjaman_text+="<a href='#' id='btn_hapus_peminjaman' onclick='hapus_peminjaman("+result[i][0]+")' title='Hapus'><i class='fas fa-trash'></i></a>";
					add_peminjaman_text+="</td></tr>";
				}
			}else{
				add_peminjaman_text+="<tr><td colspan='6' style='text-align:center'>Peminjaman tidak ada</td></tr>";
			}
			$("#tbody_peminjaman").html(add_peminjaman_text);
		});
	});

});

function tampil_user_table(){
	$(".konten").hide();
	$.ajax({
		type 	:"post",
		url   	:"konten/tampil_database.php",
      	data  	:{act:"tampil_user"},
      	dataType:'json'
	}).done(function(response){
		var result = response;
		var add_user_text="";
		for(var i=0;i<result.length;i++){
			add_user_text+="<tr id='baris_user_"+result[i][0]+"'><td style='text-transform:capitalize'>"+
				result[i][1]+"</td><td>"+
				result[i][2]+"</td><td>"+
				result[i][3]+"</td><td>"+
				result[i][4]+"</td><td>"+
				result[i][5]+"</td>";
			add_user_text+="<td style='text-align:center'><a href='#' id='btn_hapus_user' onclick='hapus_user("+result[i][0]+")'><i class='fas fa-trash'></i></a></td>";
		}
		$("#tbody_user").html(add_user_text);
	});
	emptyFormEditMobil();
	$(".konten-user-table").show();
	goTopWindow();
}

function tampil_mobil_table(){
	$(".konten").hide();
	$.ajax({
		type 	:"post",
		url   	:"konten/tampil_database.php",
      	data  	:{act:"tampil_mobil"},
      	dataType:'json'
	}).done(function(response){
		var result = response;
		var add_mobil_text="";
		var a_aksi="";
		for(var i=0;i<result.length;i++){
			add_mobil_text+="<tr id='baris_mobil_"+result[i][0]+"'><td style='text-transform:capitalize'>"+
				result[i][1]+"</td><td style='text-transform:capitalize'>"+
				result[i][8]+"</td><td style='text-transform:capitalize'>"+
				result[i][2]+"</td><td style='text-transform:capitalize'>"+
				result[i][3]+"</td><td>"+
				result[i][4]+"</td><td>Rp. "+
				result[i][5]+"</td><td style='text-transform:capitalize' id='status_mobil_"+result[i][0]+"'>"+
				result[i][7]+"</td>";
			add_mobil_text+="<td style='text-align:center' id='aksi_mobil_"+result[i][0]+"' name='aksi'>";
			add_mobil_text+="<a href='#' id='btn_edit' onclick='edit_mobil("+result[i][0]+")' title='Edit Mobil'><i class='fas fa-edit'></i></a>";
			add_mobil_text+="<a href='#' id='btn_hapus_mobil' onclick='hapus_mobil("+result[i][0]+")' title='Hapus Mobil'><i class='fas fa-trash'></i></a>";
			add_mobil_text+="</td>";
		}
		$("#tbody_mobil").html(add_mobil_text);
	});
	emptyFormEditMobil();
	$(".konten-mobil-table").show();
	goTopWindow();
}

function tampil_tambah_mobil(){
	$(".konten").hide();
	emptyFormTambahMobil();
	$(".konten-tambah-mobil").show();
	goTopWindow();
}

function tampil_edit_mobil(){
	$(".konten").hide();
	$(".konten-edit-mobil").show();
	goTopWindow();
}

function tampil_peminjaman_table(){
	$(".konten").hide();
	$.ajax({
		type 	:"post",
		url   	:"konten/tampil_database.php",
      	data  	:{act:"tampil_peminjaman"},
      	dataType:'json'
	}).done(function(response){
		var result = response;
		var add_peminjaman_text="";
		var a_aksi="";
		if (result.length>0) {
			for(var i=0;i<result.length;i++){
				add_peminjaman_text+="<tr id='baris_peminjaman_"+result[i][0]+"'><td style='text-transform:capitalize'>"+
					result[i][5]+" "+result[i][6]+"</td><td style='text-transform:capitalize'>"+
					result[i][2]+" "+result[i][3]+"</td><td>"+
					result[i][7]+"</td><td>"+
					result[i][8]+"</td><td class='status_bayar' style='text-transform:capitalize'>"+
					result[i][9]+"</td><td class='tdaksi' style='text-align:center'>";
					if(result[i][9]=='belum'){
						add_peminjaman_text+="<a href='#' onclick='sudah("+result[i][0]+")' title='Sudah'><i class='fas fa-check'></i></a>";
					}else{
						add_peminjaman_text+="<a href='#' onclick='belum("+result[i][0]+")' title='Belum'><i class='fas fa-times'></i></a>";
					}
					add_peminjaman_text+="<a href='#' id='btn_hapus_peminjaman' onclick='hapus_peminjaman("+result[i][0]+")' title='Hapus'><i class='fas fa-trash'></i></a>";
					add_peminjaman_text+="</td></tr>";
			}
		}else{
			add_peminjaman_text+="<tr><td colspan='6' style='text-align:center'>Peminjaman tidak ada</td></tr>";
		}
		$("#tbody_peminjaman").html(add_peminjaman_text);
	});
	emptyFormEditMobil();
	$(".konten-peminjaman-table").show();
	goTopWindow();
}

// function available(id_mobil) {
// 	var add_available_text="";
// 	$.ajax({
//       	type  :"post",
//       	url   :"konten/available.php",
//       	data  :{id:id_mobil}
//     }).done(function(){
//     	$("#status_mobil_"+id_mobil).html("available");
//     	add_available_text+="<a href='#' id='btn_hapus_mobil' onclick='hapus_mobil("+id_mobil+")'><i class='fas fa-trash'></i></a>";
//     	add_available_text+="<a class='col' href='#' id='btn_rented_user' onclick='rented("+id_mobil+")'><i class='fas fa-times'></i></a>";
//     	$("#aksi_mobil_"+id_mobil).html(add_available_text);
//     });
// }

// function rented(id_mobil) {
// 	var add_rented_text="";
// 	$.ajax({
//       	type  :"post",
//       	url   :"konten/rented.php",
//       	data  :{id:id_mobil}
//     }).done(function(){
//     	$("#status_mobil_"+id_mobil).html("rented");
//     	add_rented_text+="<a href='#' id='btn_hapus_mobil' onclick='hapus_mobil("+id_mobil+")'><i class='fas fa-trash'></i></a>";
//     	add_rented_text+="<a class='col' href='#' id='btn_available_user' onclick='available("+id_mobil+")'><i class='fas fa-check'></i></a>";
//     	$("#aksi_mobil_"+id_mobil).html(add_rented_text);
//     });
// }

function hapus_user(id_user){
	$.ajax({
		method 	:"post",
		url 	:"konten/hapus_user.php",
		data 	:{id:id_user}
	}).done(function(){
		$("tr#baris_user_"+id_user).hide();
	});
}

function hapus_mobil(id_mobil){
	$.ajax({
		type 	:"post",
		url 	:"konten/hapus_mobil.php",
		data 	:{id:id_mobil}
	}).done(function(){
		$("tr#baris_mobil_"+id_mobil).hide();
	});
}

function showPreview(image,form){
	var div=form;
	if (image.files[0]) {
        var fileReader = new FileReader();
        fileReader.onload = function (e) {
        	$("."+div+"_mobil.image_preview").html('<img src="'+e.target.result+'"/>');
            $("."+div+"_mobil.image_preview").css("background-color","#fff");
            $("."+div+"_mobil.image_preview").css("text-align","left");
            $("."+div+"_mobil.image_preview").css("height","");
            $("."+div+"_mobil.image_preview").css("width","");
            $("."+div+"_mobil.image_preview").css("padding","0px");
			$("."+div+"_mobil.image_preview img").css('opacity','1');
			$("."+div+"_mobil.image_preview img").css('display','block');
			$("."+div+"_mobil.image_preview img").css('height','200px');
			$("."+div+"_mobil.image_preview img").css('width','auto');
        }
		fileReader.readAsDataURL(image.files[0]);
    }
}

function batalUploadFotoMobil(){
	$(".image_preview").html('<img src="img/assets/image_preview.png"/>');
	$(".image_preview").css('width','250px');
	$(".image_preview").css('height','200px');
    $(".image_preview").css("text-align","center");
    $(".image_preview").css("padding","25px 35px");
    $(".image_preview").css("background-color","#d2d2d2");
	$(".image_preview img").css('opacity','0.05');
	$(".image_preview img").css('width','100%');
	$(".image_preview img").css('height','100%');
}

function emptyFormTambahMobil(){
	$("#form_tambah_mobil input").val("");
	batalUploadFotoMobil();
}

function emptyFormEditMobil(){
	$("#form_edit_mobil input").val("");
	batalUploadFotoMobil();
}

function edit_mobil(id_mobil){
	var result;
	$.ajax({
		type    :"post",
		url     :"konten/tampil_database.php",
		data    :{
		  act:"tampil_detail_mobil",
		  id:id_mobil
		},
		dataType:'json'
	}).done(function(response){
		result = response;

		$("#form_edit_mobil input[name='id_mobil']").val(result[0][0]);
		$("#form_edit_mobil input[name='merk']").val(result[0][1]);
		$("#form_edit_mobil input[name='model']").val(result[0][8]);
		$("#form_edit_mobil input[name='jenis']").val(result[0][2]);
		$("#form_edit_mobil input[name='transmisi']").val(result[0][3]);
		$("#form_edit_mobil input[name='tahun']").val(result[0][4]);
		$("#form_edit_mobil input[name='harga']").val(result[0][5]);
		$("#form_edit_mobil select[name='status']").val(result[0][7]);
		
		$("#form_edit_mobil .image_preview").html('<img src="'+result[0][6]+'"/>');
        $("#form_edit_mobil .image_preview").css("background-color","#fff");
        $("#form_edit_mobil .image_preview").css("text-align","left");
        $("#form_edit_mobil .image_preview").css("height","");
        $("#form_edit_mobil .image_preview").css("width","");
        $("#form_edit_mobil .image_preview").css("padding","0px");
		$("#form_edit_mobil .image_preview img").css('opacity','1');
		$("#form_edit_mobil .image_preview img").css('display','block');
		$("#form_edit_mobil .image_preview img").css('height','200px');
		$("#form_edit_mobil .image_preview img").css('width','auto');
		tampil_edit_mobil();
	});
}

function sudah(id_peminjaman){
	var id=id_peminjaman;
	$.ajax({
		type	:"POST",
		url 	:"konten/tampil_database.php",
		data 	:{
			act:"sudah",
			id:id
		}
	}).done(function(response){
		var add_sudah_text="<a href='#' onclick='belum("+id_mobil+")' title='Belum'><i class='fas fa-times'></i></a>";
		$("#baris_peminjaman_"+id_mobil+" .status_bayar").html("Sudah");
		$("#baris_peminjaman_"+id_mobil+" .tdaksi").html(add_sudah_text);
	});
}

function belum(id_peminjaman){
	var id=id_peminjaman;
	$.ajax({
		type	:"POST",
		url 	:"konten/tampil_database.php",
		data 	:{
			act:"belum",
			id:id
		}
	}).done(function(response){
		var add_belum_text="<a href='#' onclick='sudah("+id_mobil+")' title='Sudah'><i class='fas fa-check'></i></a>";
		$("#baris_peminjaman_"+id_mobil+" .status_bayar").html("Belum");
		$("#baris_peminjaman_"+id_mobil+" .tdaksi").html(add_belum_text);
	});
}

function hapus_peminjaman(id_peminjaman){
	var id=id_peminjaman;
	$.ajax({
		type 	:"POST",
		url 	:"konten/hapus_peminjaman.php",
		data 	:{
			id:id
		}
	}).done(function(){
		tampil_peminjaman_table();
	});
}

function capitalizeTxt(txt) {
	return txt.charAt(0).toUpperCase() + txt.slice(1);
}

function goTopWindow() {
    window.scrollTo(0, 0);
}