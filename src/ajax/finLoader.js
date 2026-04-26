function GetFileSize(fileid) {
try {
let fileSize = 0;
//for IE
if ($.browser.msie) {
//before making an object of ActiveXObject,
//please make sure ActiveX is enabled in your IE browser
let objFSO = new ActiveXObject("Scripting.FileSystemObject"); 
let	filePath = $("#" + fileid)[0].value;
let objFile = objFSO.getFile(filePath);
fileSize = objFile.size; //size in kb
fileSize = fileSize / 1048576; //size in mb
}
//for FF, Safari, Opeara and Others
else {
fileSize = $("#" + fileid)[0].files[0].size //size in kb
fileSize = fileSize / 1048576; //size in mb
}
alert("Uploaded File Size is" + fileSize + "MB");
}
catch (e) {
alert("Error is :" + e);
}
}