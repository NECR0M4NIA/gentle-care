document.addEventListener('DOMContentLoaded', () => {

    const pages = document.querySelectorAll('.story-page');
    const nextBtn = document.getElementById('nextBtn');
    const prevBtn = document.getElementById('prevBtn');

    let currentPage = 0;

    function showPage(index) {

        pages.forEach(page => {
            page.style.display = 'none';
        });

        pages[index].style.display = 'block';

        prevBtn.style.visibility =
            index === 0 ? 'hidden' : 'visible';

        nextBtn.style.visibility =
            index === pages.length - 1
                ? 'hidden'
                : 'visible';
    }

    nextBtn.addEventListener('click', () => {
        if (currentPage < pages.length - 1) {
            currentPage++;
            showPage(currentPage);
        }
    });

    prevBtn.addEventListener('click', () => {
        if (currentPage > 0) {
            currentPage--;
            showPage(currentPage);
        }
    });

    showPage(0);
});