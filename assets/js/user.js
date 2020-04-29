$(document).ready(function () {
	// login
	$('.loginOrtu').hide()
	$('a#loginOrtu').on('click', (e) => {
		e.preventDefault()
		$('.loginOrtu').show()
		$('.loginSiswa').hide()

	})
	$('a#loginSiswa').on('click', (e) => {
		e.preventDefault()
		$('.loginSiswa').show()
		$('.loginOrtu').hide()

	})

	const flashdataGagal = $("div.flashdata-gagal").data("alert2");
	if (flashdataGagal) {
		Swal.fire({
			icon: "error",
			title: "Login Gagal",
			text: flashdataGagal,
			showConfirmButton: true,
		});
	}
	
	const flashdatasukses = $("div.flashdata-sukses").data("alert");
	if (flashdatasukses) {
		Swal.fire({
			icon: "success",
			title: "Login Sukses",
			text: flashdatasukses,
			showConfirmButton: true,
		});
	}
});
