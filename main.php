<!DOCTYPE html>
<html>
<head>
    <title>Generating QR Codes with PHP</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <h1>Scanning QR Codes with PHP</h1>
    <div style="display:flex; justify-content: center;">
    <div id="my-qr-reader" style="width:500px;">

    </div>

    </div>  
    
    <script src="https://unpkg.com/html5-qrcode"></script>
    <script>
        function domReady(fn){
            if(document.readyState === "complete" || document.readyState === "interactive"){
                setTimeout(fn, 1)
            }
            else{
                document.addEventListener("DOMContentLoaded", fn)
            }

        }
        domReady(function(){
            var myqr = document.getElementById('you-qr-result')
            var lastResult, countResults =0;
            function onScanSuccess(decodeText, decodeResult){
                if(decodeText !=lastResult){
                    ++countResults;
                    lastResult =decodeText;

                    alert("You Qr is: " + decodeText, decodeResult)

                    myqr.innerHTML = `you scan ${countResults} : ${decodeText}`
                }
            }

            var htmlscanner = new Html5QrcodeScanner(
                "my-qr-reader",{fps:10,qrbox:450})

            htmlscanner.render(onScanSuccess)
            
        })
    

</script>
   
</body>
</html>