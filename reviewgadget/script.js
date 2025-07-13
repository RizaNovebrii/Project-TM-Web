document.addEventListener("DOMContentLoaded", () => {
  const filterButtons = document.querySelectorAll(".filter-btn");
  const cards = document.querySelectorAll(".card");
  const searchInput = document.getElementById("searchInput");

  // Filter berdasarkan kategori
  filterButtons.forEach(button => {
    button.addEventListener("click", () => {
      const kategori = button.getAttribute("data-kategori");
      cards.forEach(card => {
        const cardKategori = card.getAttribute("data-kategori");
        if (kategori === "all" || cardKategori === kategori) {
          card.style.display = "block";
        } else {
          card.style.display = "none";
        }
      });

      // Update tombol aktif
      filterButtons.forEach(btn => btn.classList.remove("active"));
      button.classList.add("active");
    });
  });

  // Filter berdasarkan pencarian teks
  searchInput.addEventListener("input", () => {
    const keyword = searchInput.value.toLowerCase();
    cards.forEach(card => {
      const content = card.textContent.toLowerCase();
      card.style.display = content.includes(keyword) ? "block" : "none";
    });
  });
});
