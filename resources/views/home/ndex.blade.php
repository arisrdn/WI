<html>
<head>

<style>
.wrapper {
            width: 850px;
            margin: auto;
            border: 2px solid #444;
            padding: 20px;
        }
        #konvert {
            background: #444;
            border: 2px solid #444;
            border-radius: 1px;
            padding: 10px;
            color: #fff;
            font-weight: bold;
        }
        #konvert:hover {
            background: #fff;
            color: #444;
        }
</style>

</head>
<body>
    <div class="wrapper">
        <div id="konten">
            <h2>Hello, Lorem Ipsum is simply dummy text</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
        </div>
        <div id="editor"></div>
        <button id="konvert">Generate PDF</button>
    </div>
<script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
<script type="text/javascript">
    var doc = new jsPDF();
        var specialElementHandlers = {
            '#editor': function (element, renderer) {
            return true;
        }
    };

    $('#konvert').click(function () {   
        doc.fromHTML($('#konten').html(), 15, 15, {
            'width': 170,
                'elementHandlers': specialElementHandlers
        });
        doc.save('contoh-file.pdf');
    });
</script>
	</body>
</html>