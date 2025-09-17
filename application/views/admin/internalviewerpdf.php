<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Viewer with Scroll</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.min.js" integrity="sha512-Z8CqofpIcnJN80feS2uccz+pXWgZzeKxDsDNMD/dJ6997/LSRY+W4NmEt9acwR+Gt9OHN0kkI1CTianCwoqcjQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <div id="pdfContainer"></div>

    <script type="text/javascript">
        // JavaScript code to display a PDF from a URL with scroll-based navigation
        const pdfURL = '<?= $detail->url_file ?>';
        let totalPages;

        // Load PDF document from URL
        pdfjsLib.getDocument(pdfURL).promise.then(pdfDoc => {
            totalPages = pdfDoc.numPages;

            // Create a container for the entire PDF
            const pdfContainer = document.getElementById('pdfContainer');
            pdfContainer.style.height = `${totalPages * 100}%`;

            // Render all pages
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

        // Add event listener for scroll
        document.addEventListener('scroll', handleScroll);

        function handleScroll() {
            const scrollPercentage = (window.scrollY / (document.documentElement.scrollHeight - window.innerHeight)) * 100;
            const currentPage = Math.ceil(scrollPercentage / (100 / totalPages));

            // Do something with the current page if needed
            console.log(`Current Page: ${currentPage}`);
        }
    </script>
</body>

</html>