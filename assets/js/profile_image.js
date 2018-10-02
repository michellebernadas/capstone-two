$(".update_image2").change(function () {
let imageid = $(this).data('id');
    if (this.files && this.files[0]) {
        let reader = new FileReader();
        reader.onload = imageIsLoaded;
        reader.readAsDataURL(this.files[0]);
    }
	
	function imageIsLoaded(e) {
		$("img[data-id='"+imageid+"']").attr('src', e.target.result);
		let form = $("form[data-id='"+imageid+"']").submit();
	};

});

