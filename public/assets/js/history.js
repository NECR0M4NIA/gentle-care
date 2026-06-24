document.addEventListener("DOMContentLoaded", () => {
    const sections = document.querySelectorAll("section");
    const nextBtn = document.getElementById("nextBtn");
    const prevBtn = document.getElementById("prevBtn");

    let currentIndex = 0;

    function updateSections() {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });

        sections.forEach((section, index) => {
            section.classList.toggle("hidden", index !== currentIndex);
        });

        if (currentIndex === 0) {
            nextBtn.classList.add("ml-auto");
        } else {
            nextBtn.classList.remove("ml-auto");
        }

        prevBtn.classList.toggle("hidden", currentIndex === 0);
        nextBtn.classList.toggle("hidden", currentIndex === sections.length - 1);
    }

    nextBtn.addEventListener("click", () => {
        if (currentIndex < sections.length - 1) {
            currentIndex++;
            updateSections();
        }
    });

    prevBtn.addEventListener("click", () => {
        if (currentIndex > 0) {
            currentIndex--;
            updateSections();
        }
    });

    updateSections();
});