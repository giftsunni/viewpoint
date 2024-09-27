<script>
    function autoCloseTags(html) {
        const parser = new DOMParser();
        const doc = parser.parseFromString(html, 'text/html');
        return doc.documentElement.outerHTML;
    }

    const htmlString = '<div><p>Unclosed paragraph';
    const fixedHtml = autoCloseTags(htmlString);
    console.log(fixedHtml); // Output will have all tags closed
</script>