$(document).ready(function(){
    let path = window.location.pathname.split("/").pop();
      let fileName = path.split(".");
      let countLength = fileName[0].toUpperCase();
      document.querySelector("#pageName").innerHTML = countLength;
      console.log(countLength);  
     let target = $('nav a[href="'+path+'"]');
     target.addClass('active');

    let pathh = window.location.pathname.split("/").pop();
        console.log(pathh);
      let fileNamee = pathh.split(".");
      let countLengthh = fileNamee[0].substr(0,1).toUpperCase()+fileNamee[0].substr(1);
      document.querySelector("#pageName1").innerHTML = countLengthh;
      console.log(countLengthh);  
     let targett = $('nav a[href="'+pathh+'"]');
     targett.addClass('active');
 })