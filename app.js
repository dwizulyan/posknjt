const formTransaksi = document.querySelector(".form-transaksi");
const btnTrasaksi = document.querySelector(".btn-tampil-transaksi");
const history = document.querySelector(".history");
const btnHistory = document.querySelector(".btn-tampil-histori");

let formState = "hidden";
let historyState = "hidden";

btnHistory.addEventListener("click", () => {
  if (formState === "show") {
    formTransaksi.classList.add("hidden");
    formState = "hidden";
  }
  if (historyState === "hidden") {
    history.classList.remove("hidden");
    historyState = "show";
  } else {
    history.classList.add("hidden");
    historyState = "hidden";
  }
});

btnTrasaksi.addEventListener("click", () => {
  if (historyState === "show") {
    history.classList.add("hidden");
    historyState = "hidden";
  }
  if (formState === "hidden") {
    formTransaksi.classList.remove("hidden");
    formState = "show";
  } else {
    formTransaksi.classList.add("hidden");
    formState = "hidden";
  }
});
