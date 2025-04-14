const editKaryawanPage = document.querySelector(".edit-karyawan-page");
const closeEditButton = document.querySelector(".close-edit");
const openEditButton = document.querySelectorAll(".display-edit");
console.log(openEditButton);
console.log(editKaryawanPage);
console.log(closeEditButton);

closeEditButton.addEventListener("click", () => {
  editKaryawanPage.classList.add("hidden");
});

for (let gg of openEditButton) {
  gg.addEventListener("click", () => {
    console.log("JJJJJJ");
    editKaryawanPage.classList.remove("hidden");
  });
}
