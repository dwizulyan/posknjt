const editBarangPage = document.querySelector(".edit-barang-page");
const closeEditButton = document.querySelector(".close-edit");
const openEditButton = document.querySelectorAll(".display-edit");
console.log(openEditButton);
closeEditButton.addEventListener("click", () => {
  editBarangPage.classList.add("hidden");
});

for (let gg of openEditButton) {
  gg.addEventListener("click", (e) => {
    e.preventDefault();
    console.log("JJJJJJ");
    editBarangPage.classList.remove("hidden");
  });
}
