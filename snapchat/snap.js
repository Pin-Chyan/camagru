function genScreenshot() {
    html2canvas(document.body, {
      onrendered: function(canvas) {
      $('#box1').html("");
			$('#box1').append(canvas);
      
      if (navigator.userAgent.indexOf("MSIE ") > 0 || 
					navigator.userAgent.match(/Trident.*rv\:11\./)) 
			{
      	var blob = canvas.msToBlob();
        window.navigator.msSaveBlob(blob,'Test file.png');
      }
      else {
        $('#test').attr('href', canvas.toDataURL("image/png"));
        $('#test').attr('download','Test file.png');
        $('#test')[0].click();
      }
      
      
      }
    });
}