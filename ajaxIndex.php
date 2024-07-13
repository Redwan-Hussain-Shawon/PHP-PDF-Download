<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate and Download PDF</title>
</head>
<body>
    <button id="generate-pdf">Generate PDF</button>

    <script>
        document.getElementById('generate-pdf').addEventListener('click', function() {
            let x = document.querySelector('#generate-pdf');
            x.innerHTML='loading....'
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'generator.php', true);
            xhr.responseType = 'blob'; // Response type as blob for binary data (PDF)

            xhr.onload = function() {
                if (xhr.status === 200) {
                    // Create a temporary link element
                    var a = document.createElement('a');
                    var url = window.URL.createObjectURL(xhr.response);
                    console.log(url)
                    a.href = url;
                    a.download = 'cob-php-course.pdf';
                    document.body.appendChild(a);
                    a.click(); 
                    a.remove();
                    window.URL.revokeObjectURL(url);
                    x.innerHTML='Generate PDF'
                } else {
                    alert('Error generating PDF.');
                }
            };

            xhr.send();
        });
    </script>
</body>
</html>
