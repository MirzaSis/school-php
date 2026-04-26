// JavaScript Document
//دانلود فایل
const p = fetch('https://upload.wikimedia.org/wikipedia/commons/f/f9/Phoenicopterus_ruber_in_S%C3%A3o_Paulo_Zoo.jpg');

p.then(response => response.blob())
	.then(function (myBlob) {
	// ساخت لینک موقت 
		let fileURL = URL.createObjectURL(myBlob);
	// ساخت لینک دانلود
		let link = document.createElement('a');
	// ساخت تصویر
	let pic = document.createElement('img');
	pic.src=fileURL;
	
	link.appendChild(pic);
		
	// افزودن خاصیت دانلود شدن بجای نمایش
		link.download = 'my-image.jpg';
		document.body.appendChild(link);
		link.href= fileURL;
	
	
	
	});