<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>PDF Editor CI3</title>
    <script src="<?= base_url('assets/js/pdf-lib.min.js') ?>"></script>
    <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
    <style>
        #pdf-container canvas {
            border: 1px solid #ccc;
            margin: 10px 0;
        }

        .toolbar {
            margin: 20px 0;
        }
    </style>
</head>

<body>
    <h2>Edit PDF - CodeIgniter 3</h2>

    <form id="uploadForm" enctype="multipart/form-data">
        <input type="file" name="pdf_file" accept="application/pdf" required>
        <button type="submit">Upload</button>
    </form>

    <div class="toolbar">
        <input type="text" id="text" placeholder="Teks yang ditambahkan">
        <button onclick="addText()">Tambah Teks</button>
        <button onclick="savePDF()">Simpan PDF</button>
    </div>

    <div id="pdf-container"></div>

    <script>
        let pdfDoc = null;
        let pdfBytes = null;

        document.getElementById('uploadForm').onsubmit = async function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const res = await fetch('<?= site_url("pdfeditor/upload") ?>', {
                method: 'POST',
                body: formData
            });
            const result = await res.json();
            if (result.status) {
                loadPDF(result.path);
            } else {
                alert(result.error || "Gagal upload.");
            }
        };

        async function loadPDF(url) {
            const loadingTask = pdfjsLib.getDocument(url);
            pdfDoc = await loadingTask.promise;
            document.getElementById('pdf-container').innerHTML = '';
            for (let i = 1; i <= pdfDoc.numPages; i++) {
                const page = await pdfDoc.getPage(i);
                const viewport = page.getViewport({
                    scale: 1.5
                });
                const canvas = document.createElement('canvas');
                canvas.height = viewport.height;
                canvas.width = viewport.width;
                await page.render({
                    canvasContext: canvas.getContext('2d'),
                    viewport
                }).promise;
                document.getElementById('pdf-container').appendChild(canvas);
            }

            const res = await fetch(url);
            pdfBytes = await res.arrayBuffer();
        }

        async function addText() {
            const text = document.getElementById('text').value;
            const pdfDoc = await PDFLib.PDFDocument.load(pdfBytes);
            const pages = pdfDoc.getPages();
            const firstPage = pages[0];
            firstPage.drawText(text, {
                x: 50,
                y: 700,
                size: 24,
                color: PDFLib.rgb(0, 0, 0)
            });
            pdfBytes = await pdfDoc.save();
            alert('Teks berhasil ditambahkan.');
        }

        async function savePDF() {
            const blob = new Blob([pdfBytes], {
                type: 'application/pdf'
            });
            const formData = new FormData();
            formData.append('pdf_data', blob, 'edited.pdf');

            const res = await fetch('<?= site_url("pdfeditor/save") ?>', {
                method: 'POST',
                body: formData
            });
            const result = await res.json();
            if (result.status) {
                alert('PDF disimpan di: ' + result.path);
            } else {
                alert('Gagal menyimpan PDF');
            }
        }
    </script>
</body>

</html>