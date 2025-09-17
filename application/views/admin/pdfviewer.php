<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://unpkg.com/mammoth/mammoth.browser.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Viewer</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.min.js" integrity="sha512-Z8CqofpIcnJN80feS2uccz+pXWgZzeKxDsDNMD/dJ6997/LSRY+W4NmEt9acwR+Gt9OHN0kkI1CTianCwoqcjQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        iframe {
            width: 100%;
            height: 90vh;
            border: none;
        }
    </style>
</head>

<body>
    <div id="viewerContainer">
        <!-- Diisi oleh JS sesuai jenis file -->
    </div>

    <script type="text/javascript">
        const fileUrl = '<?= $detail->url_file ?>';
        const fileExtension = fileUrl.split('.').pop().toLowerCase();
        const viewerContainer = document.getElementById('viewerContainer');

        if (fileExtension === 'pdf') {
            // Jika file PDF, gunakan PDF.js
            let totalPages;

            const pdfContainer = document.createElement('div');
            viewerContainer.appendChild(pdfContainer);

            pdfjsLib.getDocument(fileUrl).promise.then(pdfDoc => {
                totalPages = pdfDoc.numPages;
                pdfContainer.style.height = `${totalPages * 100}%`;

                for (let pageNumber = 1; pageNumber <= totalPages; pageNumber++) {
                    pdfDoc.getPage(pageNumber).then(page => {
                        const viewport = page.getViewport({
                            scale: 1.5
                        });
                        const canvas = document.createElement('canvas');
                        const context = canvas.getContext('2d');

                        canvas.width = viewport.width;
                        canvas.height = viewport.height;

                        const renderContext = {
                            canvasContext: context,
                            viewport: viewport
                        };

                        pdfContainer.appendChild(canvas);
                        page.render(renderContext);
                    });
                }
            });

            document.addEventListener('scroll', () => {
                const scrollPercentage = (window.scrollY / (document.documentElement.scrollHeight - window.innerHeight)) * 100;
                const currentPage = Math.ceil(scrollPercentage / (100 / totalPages));
                console.log(`Current Page: ${currentPage}`);
            });

        } else if (['doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx'].includes(fileExtension)) {
            // Jika Word, Excel, atau PowerPoint, pakai Google Docs Viewer
            const iframe = document.createElement('iframe');
            iframe.src = `https://docs.google.com/gview?url=${encodeURIComponent(fileUrl)}&embedded=true`;
            viewerContainer.appendChild(iframe);

        } else {
            // Format tidak dikenali
            viewerContainer.innerHTML = `<p>Tipe file <strong>${fileExtension}</strong> belum didukung untuk preview.</p>`;
        }
    </script>
</body>

</html>